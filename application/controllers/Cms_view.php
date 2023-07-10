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
        
        $data['title'] = 'Menages news events';
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
        $data['news'] = $this->db->get('article')->result_array();

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

    public function update_header_news_events($id)
    {
        $_id  = $this->session->userdata('id_user');
        
        $data['title'] = 'Menages news events';
        $data['user'] = $this->db->get_where('user', ['id_user' => $_id])->row_array();
        $data['news'] = $this->db->get_where('article', ['id' => $id])->row();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/update_header_news_events');
        $this->load->view('cms/templates/footer');
    }

    public function career()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages careers';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['news'] = $this->db->get_where('career', ['tampil' => 1])->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/career');
        $this->load->view('cms/templates/footer');
    }

    public function add_career()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages careers';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/add_career');
        $this->load->view('cms/templates/footer');
    }

    public function update_career($_id)
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages careers';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['career'] = $this->db->get_where('career', ['id_career' => $_id])->row();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/update_career');
        $this->load->view('cms/templates/footer');
    }

    public function candidate()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages candidate';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['candidate'] = $this->db->order_by('time', 'desc')->get_where('candidate', ['status' => 0])->result_array();
        $data['active'] = 'waiting';

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/candidate');
        $this->load->view('cms/templates/footer');
    }

    public function candidate_us($slug)
    {
        $id  = $this->session->userdata('id_user');

        if($slug == 'follow-up'){
            $data['active'] = 'follow';
            $status = 1;
        }elseif ($slug == 'assessment') {
            $data['active'] = 'assessment';
            $status = 2;
        }elseif ($slug == 'final-evaluation') {
            $data['active'] = 'final';
            $status = 3;
        }elseif ($slug == 'accepted') {
            $data['active'] = 'accepted';
            $status = 4;
        }elseif ($slug == 'database'){
            $data['active'] = 'database';
            $status = 5;
        }else{
            redirect(base_url('cms/candidate'));
        }
        
        $data['title'] = 'manages candidate';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['candidate'] = $this->db->get_where('candidate', ['status' => $status])->result_array();
        
        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/candidate');
        $this->load->view('cms/templates/footer');
    }

    public function menages_company()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages company';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['company'] = $this->db->get('company')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/menages_company');
        $this->load->view('cms/templates/footer');
    }

    public function add_company()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages company';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/add_company');
        $this->load->view('cms/templates/footer');
    }

    public function update_company($_id)
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'manages company';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['company'] = $this->db->get_where('company', ['id_company' => $_id])->row();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/update_company');
        $this->load->view('cms/templates/footer');
    }

    public function menages_direksi()
    {
        $id  = $this->session->userdata('id_user');
        
        $data['title'] = 'Manages Direksi';
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        $data['direksi'] = $this->db->order_by('sortir', 'ASC')->get('direksi')->result_array();

        $this->load->view('cms/templates/header', $data);
        $this->load->view('cms/menages_direksi');
        $this->load->view('cms/templates/footer');
    }
}