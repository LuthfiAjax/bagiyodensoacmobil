<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cms_view extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url(''));
          }
    }

    public function dashboard()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        
        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/dashboard');
        $this->load->view('cms/templates/footer');
    }

    public function create_news_events()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages news events';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/create_news_events');
        $this->load->view('cms/templates/footer');
    }

    public function menages_news_events()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages news events';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['news'] = $this->db->get('tb_articles')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/menages_news_events');
        $this->load->view('cms/templates/footer');
    }

    public function update_news_events($id)
    {
        $_id  = $this->session->userdata('id_user');
        
        $data['title'] = 'Menages news events';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['news'] = $this->db->get_where('article', ['id' => $id])->row();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/update_news_events');
        $this->load->view('cms/templates/footer');
    }
}