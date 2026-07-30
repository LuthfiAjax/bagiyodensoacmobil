<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');


class Cms_update extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url(''));
          }
    }

    public function publish()
    {
        $id = $this->input->post('id');
        $date = strtotime($this->input->post('date'));

        $data = array(
            'publish' => $date,
            'status' => 1
        );
        
        $this->db->where('id_article', $id);
        $this->db->update('tb_articles', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post Published</div>');
        redirect(base_url('cms/menages-news-events'));
    }

    public function pending($id)
    {
        $data = array(
            'publish' => null,
            'status' => 0
        );

        $primary = 'id_article';
        $table = 'tb_articles';
        $message = 'Postingan Tertunda';
        
        $this->db->where($primary, $id);
        $this->db->update($table, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$message.'</div>');
        redirect(base_url('cms/menages-news-events'));
    }

    public function update_post()
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
        $id_article = $this->input->post('id_article');
    
        $header = $_FILES['header1']['name'];
  
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
        $config['max_size']      = '5120';
        $config['upload_path'] = './assets/img/events/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        $old = $this->db->get_where('tb_articles', ['id_article' => $id_article])->row();
    
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

            unlink(FCPATH . './assets/img/cover/' . $old->thumbnail);
            unlink(FCPATH . './assets/img/cover/small/' . $old->small_image);
  
          } else {
            $header = $old->thumbnail;
          }
    
          $data = array(
            'title_article_id' => $title,
            'slug_article_id' => $slug,
            'tag_article_id' => $tag,
            'meta_des_id' => $meta_desc,
            'meta_key_id' => $meta_key,
            'thumbnail' => $header,
            'small_image' => $header,
            'body_id' => $body,
            'deskripsi_id' => $description,
            'publish' => null,
            'status' => 0
          );
  
        $this->db->where('id_article', $id_article);
        $this->db->update('tb_articles', $data);

        } else {
          echo 'Error';
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Updated Postingan</div>');
        redirect(base_url('cms/menages-news-events'));
      }

}