<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_delete extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url(''));
          }
    }

    public function delete_post($id)
    {
        $post = $this->db->get_where('tb_articles', ['id_article' => $id])->row();
        $query = $this->db->delete('tb_articles', ['id_article' => $id]);

        if($query){
            unlink(FCPATH . 'assets/img/events/' . $post->thumbnail);
            unlink(FCPATH . 'assets/img/events/small/' . $post->small_image);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted Postingan Berhasil</div>');
        redirect(base_url('cms/menages-news-events'));
    }
}