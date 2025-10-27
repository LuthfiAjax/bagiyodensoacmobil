<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email_sender');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
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
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('subject', 'Subjek', 'required');
        $this->form_validation->set_rules('message', 'Isi Pesan', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Silakan lengkapi semua field');
            redirect(base_url('kontak'));
        } else {
            $nama_pesan = htmlspecialchars($this->input->post('nama'));
            $email_pesan = htmlspecialchars($this->input->post('email'));
            $tlp_pesan = htmlspecialchars($this->input->post('tlp'));
            $subject_pesan = htmlspecialchars($this->input->post('subject'));
            $body_pesan = htmlspecialchars($this->input->post('message'));

            // Use a database transaction to ensure data consistency
            $this->db->trans_begin();

            $data = array(
                'nama_pesan' => $nama_pesan,
                'email_pesan' => $email_pesan,
                'tlp_pesan' => $tlp_pesan,
                'subject_pesan' => $subject_pesan,
                'body_pesan' => $body_pesan,
                'created' => time()
            );

            $data2 = array(
                'nama_subscriber' => $nama_pesan,
                'email_subscriber' => $email_pesan
            );

            $this->db->insert('tb_pesan', $data);
            $this->db->insert('subscriber', $data2);

            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Error occurred while saving data. Please try again.');
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('success', 'Pesan Terkirim Terimakasih');
            }

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

    public function klik_whatsapp()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            show_error('Method Not Allowed', 405);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['ip'], $data['city'], $data['name'], $data['whatsapp'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak lengkap'
            ]);
            return;
        }

        $messageData = array(
            'time' => time(),
            'ip' => $data['ip'],
            'city' => $data['city'],
            'name' => $data['name'],
            'whatsapp' => $data['whatsapp'],
        );

        $this->db->insert('tb_klik_whatsapp', $messageData);

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

        // Cek apakah $query bernilai null atau kosong
        if ($query === null || empty($query)) {
            // Jika $query null, tampilkan semua data tanpa melakukan filter
            $results = $this->db->select('title_article_id, slug_article_id')->get('tb_articles')->result_array();
        } else {
            // Jika $query tidak null, lakukan pencarian dengan like pada judul artikel atau tag artikel
            $results = $this->db->select('title_article_id, slug_article_id')->like('title_article_id', $query)->or_like('tag_article_id', $query)->get('tb_articles')->result_array();
        }

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

    public function catalog()
    {
        $file = $this->db->order_by('created', 'DESC')->limit(1)->get('tb_company_profile')->row();

        if (!$file) {
            // Handle the case when no file is found in the database
            $this->session->set_flashdata('error', 'Company profile file not found.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $message = '
            <h3>Halo ' . $nama . ',</h3>
            <p>Kami ingin memberitahukan bahwa kami, Bagiyo Denso, telah mengirimkan company profile kami kepada Anda. Terlampir file company profile untuk referensi Anda.</p>
            <p></p>
            <p>Terima kasih atas perhatiannya.</p>
            <p>Salam,</p>
            <p>Bagiyo Denso AC Mobil <br>bagiyodensoacmobil.com</p>
        ';
        $subject = 'Company Profile Bagiyo Denso';
        $file_path = FCPATH . 'assets/company-profile/' . $file->filename;

        // Assuming $this->email_sender->send() returns true on successful sending
        if ($this->email_sender->send($email, $subject, $message, $file_path)) {
            // Use a database transaction to ensure data consistency
            $this->db->trans_start();

            $data = array(
                'name_download' => $nama,
                'email_download' => $email,
                'time_download' => time()
            );
            $this->db->insert('tb_download', $data);

            $data2 = array(
                'nama_subscriber' => $nama,
                'email_subscriber' => $email
            );
            // Assuming you meant to insert data2 into another table (not tb_download)
            $this->db->insert('subscriber', $data2);

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                // Handle database transaction failure
                $this->session->set_flashdata('error', 'Database transaction failed.');
            } else {
                // Transaction succeeded
                $this->session->set_flashdata('success', 'Terimakasih Telah Menjadi bagian dari Bagiyo Denso Company Profile Sudah Kami Kirim ke email anda');
            }
        } else {
            // Handle email sending failure
            $this->session->set_flashdata('error', 'Failed to send email.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function save_slider()
    {
        // === Konfigurasi upload ===
        $config['encrypt_name']     = TRUE;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|heif|hevc|webp|svg';
        $config['max_size']         = '5120'; // 5MB
        $config['upload_path']      = './assets/img/slider/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        // === Validasi Input Wajib ===
        $title          = $this->input->post('title', TRUE);
        $subtitle       = $this->input->post('subtitle', TRUE);
        $description    = $this->input->post('description', TRUE);
        $tipe           = $this->input->post('tipe', TRUE);
        $position_order = $this->input->post('position_order', TRUE);
        $is_active      = $this->input->post('is_active', TRUE);

        if (!$title || !$tipe) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Title dan tipe wajib diisi']));
        }

        // === Upload Gambar Background ===
        $bg_filename = null;
        if (!empty($_FILES['image_background']['name'])) {
            $config['file_name'] = 'bg-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_background')) {
                $uploadData = $this->upload->data();
                $bg_filename = $uploadData['file_name'];
            } else {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload background gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // === Upload Gambar Side (opsional) ===
        $side_filename = null;
        if (!empty($_FILES['image_side']['name'])) {
            $config['file_name'] = 'img-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_side')) {
                $uploadData = $this->upload->data();
                $side_filename = $uploadData['file_name'];
            } else {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload gambar samping gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // === Simpan ke tb_slider ===
        $slider_data = [
            'title'            => $title,
            'subtitle'         => $subtitle,
            'description'      => $description,
            'tipe'             => $tipe,
            'image_background' => $bg_filename ? 'assets/img/slider/' . $bg_filename : null,
            'image_side'       => $side_filename ? 'assets/img/slider/' . $side_filename : null,
            'position_order'   => $position_order ?: 0,
            'is_active'        => $is_active ?: 1,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tb_slider', $slider_data);
        $slider_id = $this->db->insert_id();

        if (!$slider_id) {
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal menyimpan slider']));
        }

        // === Simpan Button Links (jika ada) ===
        $btn_label = $this->input->post('btn_label');
        $btn_url   = $this->input->post('btn_url');
        $btn_icon  = $this->input->post('btn_icon');
        $btn_style = $this->input->post('btn_style');

        if (!empty($btn_label) && is_array($btn_label)) {
            foreach ($btn_label as $i => $label) {
                if (trim($label) === '' || empty($btn_url[$i])) continue;

                $btn_data = [
                    'slider_id'      => $slider_id,
                    'label'          => $label,
                    'url'            => $btn_url[$i],
                    'icon_class'     => isset($btn_icon[$i]) ? $btn_icon[$i] : null,
                    'btn_style'      => isset($btn_style[$i]) ? $btn_style[$i] : 'btn-primary',
                    'position_order' => $i + 1,
                    'created_at'     => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tb_slider_links', $btn_data);
            }
        }

        // === Response Sukses ===
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => true,
                'message' => 'Slider berhasil disimpan',
                'data'    => [
                    'slider_id'        => $slider_id,
                    'image_background' => $bg_filename,
                    'image_side'       => $side_filename
                ]
            ]));
    }

    public function delete_slider($id)
    {
        // Cek apakah ID valid
        if (empty($id) || !is_numeric($id)) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'ID slider tidak valid.']));
        }

        // Cek apakah slider ada di database
        $slider = $this->db->get_where('tb_slider', ['id' => $id])->row_array();
        if (!$slider) {
            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data slider tidak ditemukan.']));
        }

        // Hapus file gambar (background & side)
        $deletedFiles = [];
        if (!empty($slider['image_background']) && file_exists(FCPATH . $slider['image_background'])) {
            unlink(FCPATH . $slider['image_background']);
            $deletedFiles[] = $slider['image_background'];
        }

        if (!empty($slider['image_side']) && file_exists(FCPATH . $slider['image_side'])) {
            unlink(FCPATH . $slider['image_side']);
            $deletedFiles[] = $slider['image_side'];
        }

        // Hapus data tombol link terkait
        $this->db->where('slider_id', $id);
        $this->db->delete('tb_slider_links');

        // Hapus data slider utama
        $this->db->where('id', $id);
        $deleted = $this->db->delete('tb_slider');

        if ($deleted) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Slider berhasil dihapus.',
                    'deleted_files' => $deletedFiles
                ]));
        } else {
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal menghapus slider dari database.']));
        }
    }

    public function update_slider($id)
    {
        // ===== Validasi ID =====
        if (empty($id) || !is_numeric($id)) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'ID slider tidak valid.']));
        }

        // ===== Ambil data lama =====
        $slider = $this->db->get_where('tb_slider', ['id' => $id])->row_array();
        if (!$slider) {
            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data slider tidak ditemukan.']));
        }

        // ===== Konfigurasi Upload =====
        $config['encrypt_name']     = TRUE;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|heif|hevc|webp|svg';
        $config['max_size']         = '5120';
        $config['upload_path']      = './assets/img/slider/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        // ===== Ambil Data Input =====
        $title          = $this->input->post('title', TRUE);
        $subtitle       = $this->input->post('subtitle', TRUE);
        $description    = $this->input->post('description', TRUE);
        $tipe           = $this->input->post('tipe', TRUE);
        $position_order = $this->input->post('position_order', TRUE);
        $is_active      = $this->input->post('is_active', TRUE);

        if (!$title || !$tipe) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Title dan tipe wajib diisi.']));
        }

        // ===== Handle Gambar Background (opsional) =====
        $bg_filename = $slider['image_background'];
        if (!empty($_FILES['image_background']['name'])) {
            $config['file_name'] = 'bg-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_background')) {
                // Hapus file lama
                if (!empty($slider['image_background']) && file_exists(FCPATH . $slider['image_background'])) {
                    unlink(FCPATH . $slider['image_background']);
                }
                $uploadData = $this->upload->data();
                $bg_filename = 'assets/img/slider/' . $uploadData['file_name'];
            } else {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload background gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // ===== Handle Gambar Side (opsional) =====
        $side_filename = $slider['image_side'];
        if (!empty($_FILES['image_side']['name'])) {
            $config['file_name'] = 'img-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_side')) {
                // Hapus file lama
                if (!empty($slider['image_side']) && file_exists(FCPATH . $slider['image_side'])) {
                    unlink(FCPATH . $slider['image_side']);
                }
                $uploadData = $this->upload->data();
                $side_filename = 'assets/img/slider/' . $uploadData['file_name'];
            } else {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload gambar samping gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // ===== Update Data Slider =====
        $update_data = [
            'title'            => $title,
            'subtitle'         => $subtitle,
            'description'      => $description,
            'tipe'             => $tipe,
            'image_background' => $bg_filename,
            'image_side'       => $side_filename,
            'position_order'   => $position_order ?: 1,
            'is_active'        => $is_active ?: 1,
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $updated = $this->db->update('tb_slider', $update_data);

        if (!$updated) {
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal memperbarui slider.']));
        }

        // ===== Update Button Links =====
        // hapus tombol lama dulu
        $this->db->where('slider_id', $id);
        $this->db->delete('tb_slider_links');

        $btn_label = $this->input->post('btn_label');
        $btn_url   = $this->input->post('btn_url');
        $btn_icon  = $this->input->post('btn_icon');
        $btn_style = $this->input->post('btn_style');

        if (!empty($btn_label) && is_array($btn_label)) {
            foreach ($btn_label as $i => $label) {
                if (trim($label) === '' || empty($btn_url[$i])) continue;

                $btn_data = [
                    'slider_id'      => $id,
                    'label'          => $label,
                    'url'            => $btn_url[$i],
                    'icon_class'     => isset($btn_icon[$i]) ? $btn_icon[$i] : null,
                    'btn_style'      => isset($btn_style[$i]) ? $btn_style[$i] : 'btn-primary',
                    'position_order' => $i + 1,
                    'created_at'     => date('Y-m-d H:i:s')
                ];
                $this->db->insert('tb_slider_links', $btn_data);
            }
        }

        // ===== Response Sukses =====
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Slider berhasil diperbarui.',
                'data' => [
                    'id' => $id,
                    'image_background' => $bg_filename,
                    'image_side' => $side_filename
                ]
            ]));
    }
}
