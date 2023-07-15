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
            'title' => 'Bagiyo Denso - Sejarah',
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
            'title' => 'Bagiyo Denso - Layanan',
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
            'title' => 'Bagiyo Denso - Kontak Hubung ',
            'page' => 'kontak',
            'meta_des' => '',
            'meta_key' => ''
        );
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/kontak');
        $this->load->view('hero/templates/footer');
    }

    public function artikel()
    {
        $data['title'] = 'Bagiyo Denso - Artikel';
        $data['page'] = 'artikel';
        $data['meta_des'] = '';
        $data['meta_key'] = '';

        // sett pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('artikel/');
		$config['total_rows'] = $this->db->get_where('tb_articles', array('status' => 1))->num_rows();
		$config['per_page'] = 3;
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(2);
		if ($data['start'] == NULL) {
			$start = 0;
		} else {
			$start = $data['start'];
		}

        // $data['articles'] = $this->db->order_by('publish', 'DESC')->get_where('tb_articles', ['status' => 1])->result_array();
        $data['articles'] = $this->db->select('*')->from('tb_articles')->where('status', 1)->where('publish <', time())->order_by('publish', 'desc')->limit($config['per_page'], $start)->get()->result_array();
        $data['url_slider'] =  $this->config->item('url_slider');
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/artikel');
        $this->load->view('hero/templates/footer');
    }

    public function artikel_details($slug)
    {
        $query = $this->db->get_where('tb_articles', ['slug_article_id' => $slug])->row();

        if (!$query) {
            redirect(base_url('artikel'));
        }

        $data['title'] = $query->title_article_id;
        $data['page'] = 'artikel';
        $data['meta_des'] = $query->meta_des_id;
        $data['meta_key'] = $query->meta_key_id;
        $data['articles'] = $query;
        $data['realated'] = $this->db->select('title_article_id, slug_article_id, publish')->where('slug_article_id !=', $slug)->where('status =', 1)->order_by('publish', 'DESC')->limit(10)->get('tb_articles')->result_array();
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/artikel_detail');
        $this->load->view('hero/templates/footer');
    }
    
}
