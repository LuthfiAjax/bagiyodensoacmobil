<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function viewer()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            show_error('Method not allowed', 405);
        }

        $requestData = json_decode(file_get_contents('php://input'));

        if (empty($requestData)) {
            show_error('Invalid data', 400);
        }

        $ip = $requestData->ip;
        $city = $requestData->city;
        $countryName = $requestData->country_name;
        $url = $requestData->url;

        // Cek apakah data dengan IP dan URL yang sama sudah ada di database
        $this->db->where('ip', $ip);
        $this->db->where('url', $url);
        $this->db->where('time >=', strtotime('today midnight'));
        $this->db->where('time <=', strtotime('tomorrow midnight') - 1);
        $query = $this->db->get('tb_view');

        if ($query->num_rows() > 0) {
            // Data sudah ada, tidak perlu dimasukkan lagi
            $response = array('status' => 'data_exists');
        } else {
            // Data belum ada, masukkan ke dalam tabel tb_view
            $data = array(
                'ip' => $ip,
                'city' => $city,
                'country_name' => $countryName,
                'url' => $url,
                'time' => time()
            );

            $this->db->insert('tb_view', $data);
            $response = array('status' => 'success');
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function get_data()
    {
        // Mendapatkan tanggal awal bulan saat ini
        $startOfMonth = date('Y-m-01');
        
        // Mendapatkan tanggal saat ini
        $currentDate = date('Y-m-d');
        
        // Mengambil data dari tabel berdasarkan rentang tanggal dan mengelompokkannya
        $query = $this->db->select('DATE(FROM_UNIXTIME(time)) AS date, COUNT(*) AS count')
                          ->from('tb_view')
                          ->where("DATE(FROM_UNIXTIME(time)) BETWEEN '$startOfMonth' AND '$currentDate'")
                          ->group_by('DATE(FROM_UNIXTIME(time))')
                          ->get();
    
        $result = $query->result_array();
    
        // Membuat array dengan tanggal awal hingga tanggal saat ini
        $dates = [];
        $current = $startOfMonth;
        while ($current <= $currentDate) {
            $dates[] = date('d', strtotime($current));
            $current = date('Y-m-d', strtotime($current . '+1 day'));
        }
    
        // Mengisi array dengan tanggal dan jumlah data, termasuk tanggal yang tidak memiliki data (count = 0)
        $data = [];
        foreach ($dates as $date) {
            $found = false;
            foreach ($result as $row) {
                if ($date === date('d', strtotime($row['date']))) {
                    $data[] = [
                        'date' => $date,
                        'count' => $row['count'],
                    ];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $data[] = [
                    'date' => $date,
                    'count' => '0',
                ];
            }
        }
    
        echo json_encode($data);
    }

    public function save_kontak()
    {
        // Load library Form Validation
        $this->load->library('form_validation');
    
        // Atur aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('subject', 'Subjek', 'required');
        $this->form_validation->set_rules('message', 'Isi Pesan', 'required');
    
        // Jalankan validasi
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan pesan error
            $this->session->set_flashdata('error', 'Silakan lengkapi semua field');
            redirect(base_url('kontak'));
        } else {
            // Jika validasi berhasil, simpan data ke database
            $nama_pesan = htmlspecialchars($this->input->post('nama'));
            $email_pesan = htmlspecialchars($this->input->post('email'));
            $tlp_pesan = htmlspecialchars($this->input->post('tlp'));
            $subject_pesan = htmlspecialchars($this->input->post('subject'));
            $body_pesan = htmlspecialchars($this->input->post('message'));
    
            $data = array(
                'nama_pesan' => $nama_pesan,
                'email_pesan' => $email_pesan,
                'tlp_pesan' => $tlp_pesan,
                'subject_pesan' => $subject_pesan,
                'body_pesan' => $body_pesan,
                'created' => time()
            );
    
            $this->db->insert('tb_pesan', $data);
    
            $this->session->set_flashdata('success', 'Pesan Terkirim Terimakasih');
            redirect(base_url('kontak'));            
        }
    }

    public function messageklik()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $messageData = array(
            'time' => time(),
            'ip' => $data['ip'],
            'city' => $data['city']
        );
        $this->db->insert('tb_klikmessage', $messageData);
        
        $response = array('status' => 'success');
        echo json_encode($response);
    }

    public function uploadImages()
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
        $config['max_size']      = '5120';
        $config['upload_path'] = './assets/img/body/';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
        $this->output->set_header('HTTP/1.0 500 Server Error');
        exit;
        } else {
        $file = $this->upload->data();
        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(['location' => base_url() . 'assets/img/body/' . $file['file_name']]))
            ->_display();
        exit;
        }
    }

    public function get_search_article()
    {
        $query = $this->input->post('query');
		$results = $this->db->select('title_article_id, slug_article_id')->like('title_article_id', $query)->or_like('tag_article_id', $query)->get('tb_articles')->result_array();

        foreach ($results as &$result) {
            $result['title_article_id'] = ucwords(strtolower($result['title_article_id']));
        }

		$data = array(
			'success' => true,
			'results' => $results
		);

		echo json_encode($data);
    }

    public function post_subscribe()
    {
        $email = $this->input->post('email');

        $query = $this->db->get_where('subscriber', ['email_subscriber' => $email])->num_rows();

        if ($query != 0) {
            $this->session->set_flashdata('error', 'Email ini telah menjadi bagian dari Bagiyo Denso');
            redirect($_SERVER['HTTP_REFERER']);  
        }

        $data = array(
            'nama_subscriber' => 'Bagiyo Denso',
            'email_subscriber' => $email
        );

        $this->db->insert('subscriber', $data);
    
        $this->session->set_flashdata('success', 'Terimakasih Telah Menjadi bagian dari Bagiyo Denso');
        redirect($_SERVER['HTTP_REFERER']);  
    }
}

