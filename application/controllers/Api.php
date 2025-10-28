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

    public function save_cabang()
    {
        // === Konfigurasi Upload ===
        $config['encrypt_name']     = TRUE;
        $config['allowed_types']    = 'gif|jpg|jpeg|png|heif|hevc|webp|svg';
        $config['max_size']         = '5120'; // 5MB
        $config['upload_path']      = './assets/img/cabang/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        // === Input utama ===
        $name            = $this->input->post('name', TRUE);
        $slug = $this->generate_slug($name);
        $alamat = $this->input->post('alamat', TRUE);
        $iframe_map = $this->input->post('iframe_map', TRUE);
        $url_map    = $this->input->post('url_map', TRUE);
        $email      = $this->input->post('email', TRUE);
        $phone      = $this->input->post('phone', TRUE);
        $instagram  = $this->input->post('instagram', TRUE);
        $facebook   = $this->input->post('facebook', TRUE);
        $tiktok     = $this->input->post('tiktok', TRUE);
        $youtube    = $this->input->post('youtube', TRUE);
        $open_hours = $this->input->post('open_hours', TRUE);
        $open_hours2 = $this->input->post('open_hours2', TRUE);
        $slide_title     = $this->input->post('slide_title', TRUE);
        $slide_subtitle  = $this->input->post('slide_subtitle', TRUE);
        $slide_deskripsi = $this->input->post('slide_deskripsi', TRUE);
        $tipe            = $this->input->post('tipe', TRUE);
        $is_active       = $this->input->post('is_active', TRUE);

        if (!$name || !$tipe) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Nama cabang dan tipe wajib diisi'
                ]));
        }

        // === Upload background ===
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
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Upload background gagal: ' . $this->upload->display_errors('', '')
                    ]));
            }
        }

        // === Upload side image (opsional) ===
        $side_filename = null;
        if (!empty($_FILES['image_side']['name'])) {
            $config['file_name'] = 'side-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_side')) {
                $uploadData = $this->upload->data();
                $side_filename = $uploadData['file_name'];
            } else {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Upload gambar samping gagal: ' . $this->upload->display_errors('', '')
                    ]));
            }
        }

        // === Simpan ke tb_cabang ===
        $cabang_data = [
            'name'             => $name,
            'slug' => $slug,
            'alamat'            => $alamat,
            'iframe_map' => $iframe_map,
            'url_map'    => $url_map,
            'email'             => $email,
            'phone'        => $phone,
            'instagram'    => $instagram,
            'facebook'     => $facebook,
            'tiktok'       => $tiktok,
            'youtube'      => $youtube,
            'open_hours'   => $open_hours,
            'open_hours2' => $open_hours2,
            'slide_title'      => $slide_title,
            'slide_subtitle'   => $slide_subtitle,
            'slide_deskripsi'  => $slide_deskripsi,
            'image_background' => $bg_filename ? 'assets/img/cabang/' . $bg_filename : null,
            'image_side'       => $side_filename ? 'assets/img/cabang/' . $side_filename : null,
            'tipe'             => $tipe,
            'is_active'        => $is_active ?: 1,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tb_cabang', $cabang_data);
        $cabang_id = $this->db->insert_id();

        if (!$cabang_id) {
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal menyimpan cabang']));
        }

        // === 1️⃣ Simpan Link Cabang ===
        $link_label = $this->input->post('link_label');
        $link_url   = $this->input->post('link_url');
        $link_icon  = $this->input->post('link_icon');
        $link_style = $this->input->post('link_style');

        if (!empty($link_label) && is_array($link_label)) {
            foreach ($link_label as $i => $label) {
                if (trim($label) === '' || empty($link_url[$i])) continue;
                $this->db->insert('tb_cabang_link', [
                    'cabang_id'      => $cabang_id,
                    'label'          => $label,
                    'url'            => $link_url[$i],
                    'icon_class'     => $link_icon[$i] ?? null,
                    'btn_style'      => $link_style[$i] ?? 'btn-primary',
                    'position_order' => $i + 1,
                ]);
            }
        }

        // === 2️⃣ Simpan Review Pelanggan ===
        $review_name  = $this->input->post('review_name');
        $review_city  = $this->input->post('review_city');
        $review_text  = $this->input->post('review_text');
        $review_star  = $this->input->post('review_star');

        if (!empty($review_name) && is_array($review_name)) {
            foreach ($review_name as $i => $nama) {
                if (trim($nama) === '' || empty($review_text[$i])) continue;
                $this->db->insert('tb_cabang_review', [
                    'cabang_id'     => $cabang_id,
                    'reviewer_name' => $nama,
                    'reviewer_city' => $review_city[$i] ?? null,
                    'rating'        => $review_star[$i] ?? 5,
                    'review_text'   => $review_text[$i],
                    'is_active'     => 1,
                    'created_at'    => date('Y-m-d H:i:s')
                ]);
            }
        }

        // === 3️⃣ Simpan Galeri (multi upload) ===
        if (!empty($_FILES['gallery_image']['name'][0])) {
            $gallery_files = $_FILES['gallery_image'];
            $count = count($gallery_files['name']);

            for ($i = 0; $i < $count; $i++) {
                $_FILES['single_gallery']['name']     = $gallery_files['name'][$i];
                $_FILES['single_gallery']['type']     = $gallery_files['type'][$i];
                $_FILES['single_gallery']['tmp_name'] = $gallery_files['tmp_name'][$i];
                $_FILES['single_gallery']['error']    = $gallery_files['error'][$i];
                $_FILES['single_gallery']['size']     = $gallery_files['size'][$i];

                $config['file_name'] = 'gallery-' . time() . '-' . $i;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('single_gallery')) {
                    $uploadData = $this->upload->data();
                    $this->db->insert('tb_cabang_galery', [
                        'cabang_id'      => $cabang_id,
                        'image_path'     => 'assets/img/cabang/' . $uploadData['file_name'],
                        'caption'        => $this->input->post('gallery_caption')[$i] ?? null,
                        'position_order' => $i + 1,
                        'is_active'      => 1,
                        'created_at'     => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // === Response Sukses ===
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => true,
                'message' => 'Cabang dan data terkait berhasil disimpan',
                'data'    => [
                    'cabang_id'        => $cabang_id,
                    'image_background' => $bg_filename,
                    'image_side'       => $side_filename
                ]
            ]));
    }

    private function generate_slug($text)
    {
        $slug = strtolower(trim($text));                    // ubah ke huruf kecil
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);  // hapus karakter selain huruf, angka, spasi, strip
        $slug = preg_replace('/\s+/', '-', $slug);          // ubah spasi jadi strip
        $slug = preg_replace('/-+/', '-', $slug);           // hindari double strip
        return trim($slug, '-');                            // hapus strip di depan/belakang
    }

    public function delete_cabang($id)
    {
        if (!$id) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'ID cabang tidak ditemukan']));
        }

        // Ambil data cabang
        $cabang = $this->db->get_where('tb_cabang', ['id' => $id])->row();
        if (!$cabang) {
            return $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data cabang tidak ditemukan']));
        }

        // Hapus file gambar background & side
        if (!empty($cabang->image_background) && file_exists(FCPATH . $cabang->image_background)) {
            unlink(FCPATH . $cabang->image_background);
        }
        if (!empty($cabang->image_side) && file_exists(FCPATH . $cabang->image_side)) {
            unlink(FCPATH . $cabang->image_side);
        }

        // Ambil galeri untuk hapus file-nya
        $galeri = $this->db->get_where('tb_cabang_galery', ['cabang_id' => $id])->result();
        foreach ($galeri as $g) {
            if (!empty($g->image_path) && file_exists(FCPATH . $g->image_path)) {
                unlink(FCPATH . $g->image_path);
            }
        }

        // Hapus relasi tabel
        $this->db->delete('tb_cabang_link', ['cabang_id' => $id]);
        $this->db->delete('tb_cabang_review', ['cabang_id' => $id]);
        $this->db->delete('tb_cabang_galery', ['cabang_id' => $id]);
        $this->db->delete('tb_cabang', ['id' => $id]);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => true, 'message' => 'Cabang dan seluruh data terkait berhasil dihapus']));
    }

    public function update_cabang($id)
    {
        if (!$id) {
            return $this->output->set_status_header(400)->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'ID cabang tidak ditemukan']));
        }

        $cabang = $this->db->get_where('tb_cabang', ['id' => $id])->row();
        if (!$cabang) {
            return $this->output->set_status_header(404)->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data cabang tidak ditemukan']));
        }

        // ==== Konfigurasi upload ====
        $upload_dir = FCPATH . 'assets/img/cabang/';
        if (!is_dir($upload_dir)) {
            @mkdir($upload_dir, 0775, true);
        }

        $config = [
            'encrypt_name'     => true,
            'allowed_types'    => 'gif|jpg|jpeg|png|heif|hevc|webp|svg',
            'max_size'         => 5120,
            'upload_path'      => $upload_dir,
            'file_ext_tolower' => true,
        ];
        $this->load->library('upload', $config);

        // ==== Input utama ====
        $name            = $this->input->post('name', true);
        $slug            = $this->generate_slug($name);
        $alamat          = $this->input->post('alamat', true);
        $iframe_map      = $this->input->post('iframe_map', true);
        $url_map         = $this->input->post('url_map', true);
        $email           = $this->input->post('email', true);
        $phone           = $this->input->post('phone', true);
        $instagram       = $this->input->post('instagram', true);
        $facebook        = $this->input->post('facebook', true);
        $tiktok          = $this->input->post('tiktok', true);
        $youtube         = $this->input->post('youtube', true);
        $open_hours      = $this->input->post('open_hours', true);
        $open_hours2     = $this->input->post('open_hours2', true);
        $slide_title     = $this->input->post('slide_title', true);
        $slide_subtitle  = $this->input->post('slide_subtitle', true);
        $slide_deskripsi = $this->input->post('slide_deskripsi', true);
        $tipe            = $this->input->post('tipe', true);
        $is_active       = (string)$this->input->post('is_active', true);

        if (!$name || !$tipe) {
            return $this->output->set_status_header(400)->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Nama cabang dan tipe wajib diisi']));
        }

        // ==== Background ====
        $bg_filename = $cabang->image_background;
        if (!empty($_FILES['image_background']['name'])) {
            $this->upload->initialize($config);
            $config['file_name'] = 'bg-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_background')) {
                if (!empty($cabang->image_background) && file_exists(FCPATH . $cabang->image_background)) {
                    @unlink(FCPATH . $cabang->image_background);
                }
                $up = $this->upload->data();
                $bg_filename = 'assets/img/cabang/' . $up['file_name'];
            } else {
                return $this->output->set_status_header(400)->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload background gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // ==== Side ====
        $side_filename = $cabang->image_side;
        if (!empty($_FILES['image_side']['name'])) {
            $config['file_name'] = 'side-' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_side')) {
                if (!empty($cabang->image_side) && file_exists(FCPATH . $cabang->image_side)) {
                    @unlink(FCPATH . $cabang->image_side);
                }
                $up = $this->upload->data();
                $side_filename = 'assets/img/cabang/' . $up['file_name'];
            } else {
                return $this->output->set_status_header(400)->set_content_type('application/json')
                    ->set_output(json_encode(['status' => false, 'message' => 'Upload gambar samping gagal: ' . $this->upload->display_errors('', '')]));
            }
        }

        // ==== Update tb_cabang ====
        $this->db->update('tb_cabang', [
            'name'             => $name,
            'slug'             => $slug,
            'alamat'           => $alamat,
            'email'            => $email,
            'iframe_map'       => $iframe_map,
            'url_map'          => $url_map,
            'phone'            => $phone,
            'instagram'        => $instagram,
            'facebook'         => $facebook,
            'tiktok'           => $tiktok,
            'youtube'          => $youtube,
            'open_hours'       => $open_hours,
            'open_hours2'      => $open_hours2,
            'slide_title'      => $slide_title,
            'slide_subtitle'   => $slide_subtitle,
            'slide_deskripsi'  => $slide_deskripsi,
            'image_background' => $bg_filename,
            'image_side'       => $side_filename,
            'tipe'             => $tipe,
            'is_active'        => ($is_active === '0' ? 0 : 1),
            'updated_at'       => date('Y-m-d H:i:s')
        ], ['id' => $id]);

        // =========================
        // ====== LINKS (reset sesuai form)
        // =========================
        $link_label = $this->input->post('link_label');
        $link_url   = $this->input->post('link_url');
        $link_icon  = $this->input->post('link_icon');
        $link_style = $this->input->post('link_style');

        // Hapus dulu biar posisi/urutan ikut form
        $this->db->delete('tb_cabang_link', ['cabang_id' => $id]);

        if (is_array($link_label) && is_array($link_url)) {
            foreach ($link_label as $i => $label) {
                $label = trim((string)$label);
                $url   = isset($link_url[$i]) ? trim((string)$link_url[$i]) : '';
                if ($label === '' || $url === '') continue;

                $this->db->insert('tb_cabang_link', [
                    'cabang_id'      => $id,
                    'label'          => $label,
                    'url'            => $url,
                    'icon_class'     => $link_icon[$i]  ?? null,
                    'btn_style'      => $link_style[$i] ?? 'btn-primary',
                    'position_order' => $i + 1,
                ]);
            }
        }

        // =========================
        // ====== REVIEW (reset sesuai form)
        // =========================
        $review_name = $this->input->post('review_name');
        $review_city = $this->input->post('review_city');
        $review_star = $this->input->post('review_star');
        $review_text = $this->input->post('review_text');

        $this->db->delete('tb_cabang_review', ['cabang_id' => $id]);

        if (is_array($review_name) && is_array($review_text)) {
            foreach ($review_name as $i => $nama) {
                $nama = trim((string)$nama);
                $text = isset($review_text[$i]) ? trim((string)$review_text[$i]) : '';
                if ($nama === '' || $text === '') continue;

                $this->db->insert('tb_cabang_review', [
                    'cabang_id'     => $id,
                    'reviewer_name' => $nama,
                    'reviewer_city' => $review_city[$i] ?? null,
                    'rating'        => isset($review_star[$i]) && $review_star[$i] !== '' ? (float)$review_star[$i] : 5,
                    'review_text'   => $text,
                    'is_active'     => 1,
                    'created_at'    => date('Y-m-d H:i:s')
                ]);
            }
        }

        // =========================
        // ====== GALERI (diff-aware)
        // =========================

        // 1) Hapus yang diminta
        $to_delete = $this->input->post('gallery_delete_existing');
        if (is_array($to_delete) && count($to_delete) > 0) {
            foreach ($to_delete as $del_id) {
                $del_id = (int)$del_id;
                $row = $this->db->get_where('tb_cabang_galery', ['id' => $del_id, 'cabang_id' => $id])->row_array();
                if ($row) {
                    if (!empty($row['image_path']) && file_exists(FCPATH . $row['image_path'])) {
                        @unlink(FCPATH . $row['image_path']);
                    }
                    $this->db->delete('tb_cabang_galery', ['id' => $del_id]);
                }
            }
        }

        // 2) Update caption (existing yg tidak dihapus)
        $caption_existing = $this->input->post('caption_existing'); // [id] => text
        if (is_array($caption_existing) && count($caption_existing) > 0) {
            foreach ($caption_existing as $gid => $cap) {
                $gid = (int)$gid;
                // skip yang sudah ditandai delete
                if (is_array($to_delete) && in_array($gid, array_map('intval', $to_delete), true)) continue;
                $this->db->update('tb_cabang_galery', [
                    'caption' => $cap
                ], ['id' => $gid, 'cabang_id' => $id]);
            }
        }

        // 3) Replace file untuk existing (key by id)
        if (!empty($_FILES['gallery_replace']['name']) && is_array($_FILES['gallery_replace']['name'])) {
            foreach ($_FILES['gallery_replace']['name'] as $gid => $namefile) {
                $gid = (int)$gid;
                if (empty($namefile)) continue; // tidak pilih file baru
                // skip jika dihapus
                if (is_array($to_delete) && in_array($gid, array_map('intval', $to_delete), true)) continue;

                // siapkan $_FILES single
                $_FILES['__gal_tmp__'] = [
                    'name'     => $_FILES['gallery_replace']['name'][$gid],
                    'type'     => $_FILES['gallery_replace']['type'][$gid],
                    'tmp_name' => $_FILES['gallery_replace']['tmp_name'][$gid],
                    'error'    => $_FILES['gallery_replace']['error'][$gid],
                    'size'     => $_FILES['gallery_replace']['size'][$gid],
                ];

                $config['file_name'] = 'gallery-repl-' . $gid . '-' . time();
                $this->upload->initialize($config);

                if ($this->upload->do_upload('__gal_tmp__')) {
                    $up = $this->upload->data();
                    $new_path = 'assets/img/cabang/' . $up['file_name'];

                    // hapus file lama
                    $old = $this->db->get_where('tb_cabang_galery', ['id' => $gid, 'cabang_id' => $id])->row_array();
                    if ($old && !empty($old['image_path']) && file_exists(FCPATH . $old['image_path'])) {
                        @unlink(FCPATH . $old['image_path']);
                    }

                    $this->db->update('tb_cabang_galery', [
                        'image_path' => $new_path,
                        'caption'    => $caption_existing[$gid] ?? $old['caption'] ?? null
                    ], ['id' => $gid, 'cabang_id' => $id]);
                }
            }
        }

        // 4) Tambah galeri baru
        $caption_new = $this->input->post('caption_new'); // array sejajar dengan gallery_new[]
        if (!empty($_FILES['gallery_new']['name']) && is_array($_FILES['gallery_new']['name'])) {
            // hitung posisi order terakhir
            $last = $this->db->select_max('position_order')->get_where('tb_cabang_galery', ['cabang_id' => $id])->row();
            $pos = $last && $last->position_order ? (int)$last->position_order : 0;

            $n = count($_FILES['gallery_new']['name']);
            for ($i = 0; $i < $n; $i++) {
                if (empty($_FILES['gallery_new']['name'][$i])) continue;

                $_FILES['__gal_new__'] = [
                    'name'     => $_FILES['gallery_new']['name'][$i],
                    'type'     => $_FILES['gallery_new']['type'][$i],
                    'tmp_name' => $_FILES['gallery_new']['tmp_name'][$i],
                    'error'    => $_FILES['gallery_new']['error'][$i],
                    'size'     => $_FILES['gallery_new']['size'][$i],
                ];

                $config['file_name'] = 'gallery-new-' . time() . '-' . $i;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('__gal_new__')) {
                    $up = $this->upload->data();
                    $pos++;

                    $this->db->insert('tb_cabang_galery', [
                        'cabang_id'      => $id,
                        'image_path'     => 'assets/img/cabang/' . $up['file_name'],
                        'caption'        => $caption_new[$i] ?? null,
                        'position_order' => $pos,
                        'is_active'      => 1,
                        'created_at'     => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        return $this->output->set_content_type('application/json')->set_output(json_encode([
            'status'  => true,
            'message' => 'Data cabang berhasil diperbarui',
            'data'    => [
                'cabang_id'        => $id,
                'image_background' => $bg_filename,
                'image_side'       => $side_filename,
            ]
        ]));
    }
}
