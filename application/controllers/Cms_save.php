<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_save extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
          redirect(base_url(''));
        }
    }

    public function save_news_event()
    {
      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('body', 'Body', 'trim|required');
      $this->form_validation->set_rules('meta_desc', 'Meta Deskripsi', 'trim|required');
      $this->form_validation->set_rules('meta_key', 'Meta Keyword', 'trim|required');
      $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
  
      $id  = $this->session->userdata('id_user');
      $title = $this->input->post('title');
      $tag = $this->input->post('tag');
      $slug = $this->input->post('slug');
      $body = $this->input->post('body');
      $type = $this->input->post('type');
      $meta_desc = $this->input->post('meta_desc');
      $meta_key = $this->input->post('meta_key');
      $description = word_limiter(strip_tags($body), 22, '') . '...';
  
      $header1 = $_FILES['header1']['name'];
      $header2 = $_FILES['header2']['name'];
      $header3 = $_FILES['header3']['name'];
  
  
      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
      $config['max_size']      = '5120';
      $config['upload_path'] = './assets/images/events/';
      $config['file_ext_tolower'] = TRUE;
      $this->load->library('upload', $config);
  
      if ($this->form_validation->run() == true) {
        // upload slider 1
        if ($header1 != null) {
          $this->upload->do_upload('header1');
          $img1 = $this->upload->data('');
          $header1 = $img1['file_name'];

          $config['image_library'] = 'gd2';
          $config['source_image'] = './assets/images/events/' . $img1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['quality'] = '50%';
          $config['width'] = 800;
          $config['height'] = 450;
          $config['new_image'] = './assets/images/events/small/' . $img1['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

        } else {
          $header1 = null;
        }
        // upload slider 2
        if ($header2 != null) {
          $this->upload->do_upload('header2');
          $img2 = $this->upload->data('');
          $header2 = $img2['file_name'];
        } else {
          $header2 = null;
        }
        // upload slider 3
        if ($header3 != null) {
          $this->upload->do_upload('header3');
          $img3 = $this->upload->data('');
          $header3 = $img3['file_name'];
        } else {
          $header3 = null;
        }
  
        $data = array(
          'type' => $type,
          'title_id' => $title,
          'title_en' => $title,
          'slug_id' => $slug,
          'slug_en' => $slug,
          'tag' => $tag,
          'deskripsi' => $description,
          'deskripsi_en' => $description,
          'header_image' => $header1,
          'header_image_2' => $header2,
          'header_image_3' => $header3,
          'small_image' => $header1,
          'body_text' => $body,
          'body_text_en' => $body,
          'meta_des_id' => $meta_desc,
          'meta_des_en' => $meta_desc,
          'meta_key_id' => $meta_key,
          'meta_key_en' => $meta_key,
          'author' => $id,
          'c' => time()
        );

        $this->db->insert('article', $data);
      } else {
        // redirect(base_url('editor/creator'));
        echo 'Error';
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">News Events Added</div>');
      redirect(base_url('cms/menages-news-events'));
    }

    public function save_career()
    {
      $title = $this->input->post('title');
      $type = $this->input->post('type');
      $slug = $this->input->post('slug');
      $body = $this->input->post('body');

      $cover = $_FILES['cover']['name'];

      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
      $config['max_size']      = '5120';
      $config['upload_path'] = './assets/images/career/';
      $config['file_ext_tolower'] = TRUE;
      $this->load->library('upload', $config);

      if ($cover != null) {
        $this->upload->do_upload('cover');
        $img1 = $this->upload->data('');
        $cover = $img1['file_name'];

      } else {
        $cover = null;
      }

      $data = array(
        'type_jobs' => $type,
        'title_jobs' => $title,
        'slug_jobs' => $slug,
        'body_jobs' => $body,
        'status_jobs' => 0,
        'created_jobs' => time(),
        'cover_career' => $cover
      );

      $this->db->insert('career', $data);
      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Career Added</div>');
      redirect(base_url('cms/career'));
    }

    public function save_company()
    {
      $type = $this->input->post('type');
      $status = $this->input->post('status');
      $name_company = $this->input->post('name_company');
      $tagline_company = $this->input->post('tagline_company');
      $url = $this->input->post('website');
      $body = $this->input->post('body');
      $button = (filter_var($url, FILTER_VALIDATE_URL)) ? 1 : 0;

      $header1 = $_FILES['header1']['name'];
      $header2 = $_FILES['header2']['name'];

      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
      $config['max_size']      = '5120';
      $config['upload_path'] = './assets/images/company/subholding/';
      $config['file_ext_tolower'] = TRUE;
      $this->load->library('upload', $config);

      if ($header1 != null) {
        $this->upload->do_upload('header1');
        $img2 = $this->upload->data('');
        $header1 = $img2['file_name'];
      } else {
        $header1 = null;
      }

      if ($header2 != null) {
        $this->upload->do_upload('header2');
        $img2 = $this->upload->data('');
        $header2 = $img2['file_name'];
      } else {
        $header2 = null;
      }

      $data = array(
        'nama_company' => $name_company,
        'tagline' => $tagline_company,
        'type' => $type,
        'status' => $status,
        'des_company' => $body,
        'images_company' => $header1,
        'small_images' => $header2,
        'button' => $button,
        'url' => $url
      );

      $this->db->insert('company', $data);
      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Company Added</div>');
      redirect(base_url('cms/company'));
    }

    public function save_direksi()
    {
      $lates = $this->db->select('sortir')->order_by('sortir', 'DESC')->limit(1)->get('direksi')->row();
      $sortir = 1 + $lates->sortir;

      $nama = $this->input->post('nama');
      $jabatan = $this->input->post('jabatan');
      $perusahaan = $this->input->post('perusahaan');

      $header1 = $_FILES['header1']['name'];
      
      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
      $config['max_size']      = '5120';
      $config['upload_path'] = './assets/images/direksi/';
      $config['file_ext_tolower'] = TRUE;
      $this->load->library('upload', $config);

      if ($header1 != null) {
        $this->upload->do_upload('header1');
        $img2 = $this->upload->data('');
        $header1 = $img2['file_name'];
      } else {
        $header1 = null;
      }

      $data = array(
        'nama_direksi' => $nama,
        'jabatan_direksi' => $jabatan,
        'perusahaan' => $perusahaan,
        'foto_direksi' => $header1,
        'sortir' => $sortir
      );

      $this->db->insert('direksi', $data);
      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direksi R17 Group Added</div>');
      redirect(base_url('cms/menages-direksi'));
    }
}