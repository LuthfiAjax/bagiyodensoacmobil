<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_save extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
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
  
      $title = $this->input->post('title');
      $tag = $this->input->post('tag');
      $slug = $this->input->post('slug');
      $body = $this->input->post('body');
      $type = $this->input->post('type');
      $meta_desc = $this->input->post('meta_desc');
      $meta_key = $this->input->post('meta_key');
      $description = word_limiter(strip_tags($body), 22, '') . '...';
  
      $header = $_FILES['header1']['name'];

      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
      $config['max_size']      = '5120';
      $config['upload_path'] = './assets/img/events/';
      $config['file_ext_tolower'] = TRUE;
      $this->load->library('upload', $config);
  
      if ($this->form_validation->run() == true) {
        if ($header != null) {
          $this->upload->do_upload('header1');
          $img = $this->upload->data('');
          $header = $img['file_name'];

          $config['image_library'] = 'gd2';
          $config['source_image'] = './assets/img/events/' . $img['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['quality'] = '50%';
          $config['width'] = 800;
          $config['height'] = 450;
          $config['new_image'] = './assets/img/events/small/' . $img['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

        } else {
          $header = null;
        }
  
        $data = array(
          'title_article_id' => $title,
          'slug_article_id' => $slug,
          'tag_article_id' => $tag,
          'meta_des_id' => $meta_desc,
          'meta_key_id' => $meta_key,
          'small_image' => $header,
          'thumbnail' => $header,
          'body_id' => $body,
          'deskripsi_id' => $description,
          'c' => time(),
          'publish' => null,
          'status' => 0
        );

        $this->db->insert('tb_articles', $data);
      } else {
        echo 'Error';
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Postingan</div>');
      redirect(base_url('cms/menages-news-events'));
    }

    public function save_company()
    {
        $company = $_FILES['company']['name'];

        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '15120';
        $config['upload_path'] = './assets/company-profile/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if (!$company) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error: No file selected.</div>');
            redirect(base_url('cms/company-profile'));
        } else {
            if (!$this->upload->do_upload('company')) {
                $error = $this->upload->display_errors('<div class="alert alert-danger" role="alert">', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect(base_url('cms/company-profile'));
            } else {
                $pdf = $this->upload->data();
                $company = $pdf['file_name'];

                $data = array(
                    'filename' => $company,
                    'created' => time()
                );

                $this->db->insert('tb_company_profile', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Company Profile</div>');
                redirect(base_url('cms/company-profile'));
            }
        }
    }

}