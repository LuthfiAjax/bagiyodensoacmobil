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
}

