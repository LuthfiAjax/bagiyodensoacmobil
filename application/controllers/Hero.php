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
            'meta_des' => 'Bengkel AC Mobil Bagiyo Denso terbaik di Gerobogan, Purwodadi, Semarang, Jawa Tengah. Layanan AC Mobil berkualitas dengan teknisi berpengalaman.',
            'meta_key' => 'Bengkel AC Mobil, Bagiyo Denso, Gerobogan, Purwodadi, Semarang, Jawa Tengah, Layanan AC Mobil, Teknisi Berpengalaman.',
            'image' => base_url('assets/img/imglink.jpg')
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
            'meta_des' => 'Tentang Kami - Bagiyo Denso AC Mobil. Bengkel AC terpercaya di Gerobogan Purwodadi, Semarang, Jawa Tengah. Berpengalaman dalam layanan AC mobil.',
            'meta_key' => 'Tentang Kami, Bagiyo Denso, Bengkel AC Mobil, Gerobogan, Purwodadi, Semarang, Jawa Tengah, Layanan AC Mobil, Berpengalaman',
            'image' => base_url('assets/img/imglink.jpg')
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
            'meta_des' => 'Layanan AC Mobil - Bagiyo Denso. Bengkel AC terpercaya di Gerobogan Purwodadi, Semarang, Jawa Tengah. Ahli dalam perbaikan dan perawatan AC mobil.',
            'meta_key' => 'Layanan AC Mobil, Bagiyo Denso, Bengkel AC, Perbaikan AC Mobil, Perawatan AC Mobil, Gerobogan, Purwodadi, Semarang, Jawa Tengah.',
            'image' => base_url('assets/img/imglink.jpg')
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
            'meta_des' => 'Kontak Bagiyo Denso AC Mobil. Hubungi kami di Gerobogan Purwodadi, Semarang, Jawa Tengah untuk layanan AC mobil terbaik. Info kontak kami di sini.',
            'meta_key' => 'Kontak, Bagiyo Denso, AC Mobil, Hubungi Kami, Gerobogan, Purwodadi, Semarang, Jawa Tengah, Info Kontak.',
            'image' => base_url('assets/img/imglink.jpg')
        );
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/kontak');
        $this->load->view('hero/templates/footer');
    }

    public function artikel()
    {
        $data['title'] = 'Bagiyo Denso - Artikel';
        $data['page'] = 'artikel';
        $data['meta_des'] = 'Baca artikel menarik seputar AC mobil di Bagiyo Denso. Informasi terbaru tentang perawatan, masalah umum, dan tips untuk AC mobil Anda.';
        $data['meta_key'] = 'Artikel AC Mobil, Informasi AC Mobil, Perawatan AC Mobil, Masalah AC Mobil, Tips AC Mobil, Bagiyo Denso.';
        $data['image'] = base_url('assets/img/imglink.jpg');

        // sett pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('artikel/');
		$config['total_rows'] = $this->db->get_where('tb_articles', array('status' => 1))->num_rows();
		$config['per_page'] = 6;
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
        $data['image'] = base_url('assets/img/events/'.$query->thumbnail);
        $data['articles'] = $query;
        $data['realated'] = $this->db->select('title_article_id, slug_article_id, publish')->where('slug_article_id !=', $slug)->where('status =', 1)->order_by('publish', 'DESC')->limit(10)->get('tb_articles')->result_array();
        
        $this->load->view('hero/templates/header', $data);
        $this->load->view('hero/artikel_detail');
        $this->load->view('hero/templates/footer');
    }

    public function sitemap()
	{
        $data['articles'] = $this->db->get_where('tb_articles', ['status' => 1])->result_array();

		$this->load->view('hero/sitemap', $data);
	}
    
}
