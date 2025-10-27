<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cms_view extends CI_Controller
{

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

        $data['totalpost'] = $this->db->get('tb_articles')->num_rows();
        $data['totalmessage'] = $this->db->get('tb_klikmessage')->num_rows();
        $data['totalpengunjung'] = $this->db->get('tb_view')->num_rows();
        $data['totalklikwa'] = $this->db->get('tb_klik_whatsapp')->num_rows();

        $data['whatsapp'] = $this->db->get('tb_klik_whatsapp')->result_array();

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

        $data['title'] = 'manages news events';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['news'] = $this->db->get_where('tb_articles', ['id_article' => $id])->row();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/update_news_events');
        $this->load->view('cms/templates/footer');
    }

    public function company_profile()
    {
        $_id  = $this->session->userdata('id_user');

        $data['title'] = 'manages news company';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['companies'] = $this->db->order_by('created')->get('tb_company_profile')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/company_profile');
        $this->load->view('cms/templates/footer');
    }

    public function subscribe()
    {
        $_id  = $this->session->userdata('id_user');

        $data['title'] = 'manages news subscribe';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['subs'] = $this->db->get('subscriber')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/subscribe');
        $this->load->view('cms/templates/footer');
    }

    public function download_compro()
    {
        $_id  = $this->session->userdata('id_user');

        $data['title'] = 'manages news download';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['subs'] = $this->db->get('tb_download')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/download_compro');
        $this->load->view('cms/templates/footer');
    }
}
