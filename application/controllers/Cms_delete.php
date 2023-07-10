<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_delete extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url(''));
          }
    }

    public function delete($id, $url)
    {
       if($url == 'menages-news-events'){
            $post = $this->db->get_where('article', ['id' => $id])->row();

            $query = $this->db->delete('article', ['id' => $id]);
            if ($query) {
            unlink(FCPATH . 'assets/images/events/' . $post->header_image);
            unlink(FCPATH . 'assets/images/events/' . $post->header_image_2);
            unlink(FCPATH . 'assets/images/events/' . $post->header_image_3);
            unlink(FCPATH . 'assets/images/events/small/' . $post->header_image);
            }

            $message = 'Post Deleted';
       }

       if($url == 'menages-direksi'){
            $direksi = $this->db->get_where('direksi', ['id_direksi' => $id])->row();
            $query = $this->db->delete('direksi', ['id_direksi' => $id]);
            
            if ($query) {
            unlink(FCPATH. 'assets/images/direksi/'. $direksi->foto_direksi);
            }

            $message = 'Direction Deleted';
       }

       if($url == 'career'){
            $data = array(
                'tampil' => 0
            );
            $this->db->where('id_career', $id);
            $this->db->update('career', $data);

            $message = 'Career Deleted';
       }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$message.'</div>');
        redirect(base_url('cms/'.$url));
    }

    public function delete_header($id, $header)
    {
        $post = $this->db->get_where('article', ['id' => $id])->row();
        
        if($header == 1){
            $data = array(
                'header_image' => NULL,
                'small_image' => NULL
            );
            
            $this->db->where('id', $id);
            $this->db->update('article', $data);

            unlink(FCPATH . 'assets/images/events/' . $post->header_image);
            unlink(FCPATH . 'assets/images/events/small/' . $post->small_image);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Header 1 Deleted</div>');
            redirect(base_url('cms/update-header-news-events/'.$id));
        }

        if($header == 2){
            $data = array(
                'header_image_2' => NULL
            );
            
            $this->db->where('id', $id);
            $this->db->update('article', $data);

            unlink(FCPATH . 'assets/images/events/' . $post->header_image_2);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Header 2 Deleted</div>');
            redirect(base_url('cms/update-header-news-events/'.$id));
        }

        if($header == 3){
            $data = array(
                'header_image_3' => NULL
            );
            
            $this->db->where('id', $id);
            $this->db->update('article', $data);

            unlink(FCPATH . 'assets/images/events/' . $post->header_image_3);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Header 3 Deleted</div>');
            redirect(base_url('cms/update-header-news-events/'.$id));
        }
    }
}