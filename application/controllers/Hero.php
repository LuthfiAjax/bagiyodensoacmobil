<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => 'Bagiyo Denso AC Mobil',
            'page' => 'beranda',
            'meta_des' => '',
            'meta_key' => ''
        );

        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/home');
        $this->load->view('hero/templates/footer');
    }

    public function tentang()
    {
        $data = array(
            'title' => 'Tentang Bengkel Bagiyo Denso AC Mobil',
            'page' => 'tentang',
            'meta_des' => '',
            'meta_key' => ''
        );
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/tentang');
        $this->load->view('hero/templates/footer');
    }

    public function layanan()
    {
        $data = array(
            'title' => 'Layanan Bengkel Bagiyo Denso AC Mobil',
            'page' => 'layanan',
            'meta_des' => '',
            'meta_key' => ''
        );
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/layanan');
        $this->load->view('hero/templates/footer');
    }

    public function kontak()
    {
        $data = array(
            'title' => 'Kontak Hubung Bagiyo Denso',
            'page' => 'kontak',
            'meta_des' => '',
            'meta_key' => ''
        );
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/kontak');
        $this->load->view('hero/templates/footer');
    }
}
