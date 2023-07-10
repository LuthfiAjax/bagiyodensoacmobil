<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');


class Cms_update extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url(''));
          }
    }

    public function publish()
    {
        $_id  = $this->session->userdata('id_user');
        $id = $this->input->post('id');
        $url = $this->input->post('url');
        $date = strtotime($this->input->post('date'));

        $data = array(
            'tampil' => 1,
            'publish_date' => $date
        );
        
        $this->db->where('id', $id);
        $this->db->update('article', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post Published</div>');
        redirect(base_url($url));
    }

    public function pending($id, $url)
    {
        if($url == 'menages-news-events'){
            $data = array(
                'tampil' => 0,
                'publish_date' => ''
            );

            $primary = 'id';
            $table = 'article';
            $message = 'Post Move to Pending';
        }
        if($url == 'career'){
            $data = array(
                'status_jobs' => 0,
                'expired_jobs' => ''
            );

            $primary = 'id_career';
            $table = 'career';
            $message = 'Career Move to Pending';
        }
        
        $this->db->where($primary, $id);
        $this->db->update($table, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$message.'</div>');
        redirect(base_url('cms/'.$url));
    }

    public function save_update_news_event()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $slug = $this->input->post('slug');
        $tag = $this->input->post('tag');
        $body = $this->input->post('body');
        $type = $this->input->post('type');
        $meta_desc = $this->input->post('meta_desc');
        $meta_key = $this->input->post('meta_key');
        $description = word_limiter(strip_tags($body), 22, '') . '...';

        $data = array(
            'type' => $type,
            'title_id' => $title,
            'title_en' => $title,
            'slug_id' => $slug,
            'slug_en' => $slug,
            'tag' => $tag,
            'deskripsi' => $description,
            'deskripsi_en' => $description,
            'body_text' => $body,
            'body_text_en' => $body,
            'meta_des_id' => $meta_desc,
            'meta_des_en' => $meta_desc,
            'meta_key_id' => $meta_key,
            'meta_key_en' => $meta_key,
            'tampil' => 0,
            'publish_date' => ''

        );

        $this->db->where('id', $id);
        $this->db->update('article', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post Updated</div>');
        redirect(base_url('cms/menages-news-events'));
    }

    public function save_update_header_news_event()
    {
        $id = $this->input->post('id');
        $old = $this->db->get_where('article', ['id' => $id])->row();

        $header1 = $_FILES['header1']['name'];
        $header2 = $_FILES['header2']['name'];
        $header3 = $_FILES['header3']['name'];

        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|heif|hevc|webp';
        $config['max_size']      = '5120';
        $config['upload_path'] = './assets/images/events/';
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

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

            unlink(FCPATH . 'assets/images/events/' . $old->header_image);
            unlink(FCPATH . 'assets/images/events/small/' . $old->header_image);
        } else {
            $header1 = null;
        }

        // upload slider 2
        if ($header2 != null) {
            $this->upload->do_upload('header2');
            $img2 = $this->upload->data('');
            $header2 = $img2['file_name'];

            unlink(FCPATH . 'assets/images/events/' . $old->header_image_2);
        } else {
            $header2 = null;
        }
        // upload slider 3
        if ($header3 != null) {
            $this->upload->do_upload('header3');
            $img3 = $this->upload->data('');
            $header3 = $img3['file_name'];

            unlink(FCPATH . 'assets/images/events/' . $old->header_image_3);
        } else {
            $header3 = null;
        }

        $data = array(
            'header_image' => $header1,
            'header_image_2' => $header2,
            'header_image_3' => $header3,
            'small_image' => $header1
          );

        $this->db->where('id', $id);
        $this->db->update('article', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Headers Updated</div>');
        redirect(base_url('cms/menages-news-events'));
    }

    public function publish_career()
    {
        $id = $this->input->post('id');
        $date = strtotime($this->input->post('date'));

        $data = array(
            'status_jobs' => 1,
            'expired_jobs' => $date
        );

        $this->db->where('id_career', $id);
        $this->db->update('career', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Career Published</div>');
        redirect(base_url('cms/career'));
    }

    public function save_update_career()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $slug = $this->input->post('slug');
        $body = $this->input->post('body');
  
        $data = array(
          'type_jobs' => $type,
          'title_jobs' => $title,
          'slug_jobs' => $slug,
          'body_jobs' => $body,
          'status_jobs' => 0,
          'created_jobs' => time()
        );

        $this->db->where('id_career', $id);
        $this->db->update('career', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Career Updated</div>');
        redirect(base_url('cms/career'));
    }

    public function sortir($fungsi, $id)
    {
        $data = $this->db->get_where('direksi', array('id_direksi' => $id))->row();   

        if($fungsi == 'naik'){
            $higher = $this->db->where('sortir <', $data->sortir)->order_by('sortir', 'DESC')->limit(1)->get('direksi')->row();
            if($higher == NULL || $higher == ''){
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">The data is at the very top</div>');
                redirect(base_url('cms/menages-direksi'));
            }else{
                $this->db->where('id_direksi', $higher->id_direksi)->update('direksi', array('sortir' => $higher->sortir + 1 ));
                $this->db->where('id_direksi', $data->id_direksi)->update('direksi', array('sortir' => $data->sortir - 1 ));

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Successfully increased by 1 level</div>');
                redirect(base_url('cms/menages-direksi'));
            }
        }elseif ($fungsi == 'turun') {
            $lower = $this->db->where('sortir >', $data->sortir)->order_by('sortir', 'DESC')->limit(1)->get('direksi')->row();
            if($lower == NULL || $lower == ''){
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">The data is at the bottom</div>');
                redirect(base_url('cms/menages-direksi'));
            }else{
                $this->db->where('id_direksi', $lower->id_direksi)->update('direksi', array('sortir' => $lower->sortir - 1 ));
                $this->db->where('id_direksi', $data->id_direksi)->update('direksi', array('sortir' => $data->sortir + 1 ));

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Successfully lowered 1 level</div>');
                redirect(base_url('cms/menages-direksi'));
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fungsi Tidak Ditemukan</div>');
            redirect(base_url('cms/menages-direksi'));
        }
    }

    public function move_candidate($url, $id)
    {
        $candidate = $this->db->get_where('candidate', array('id_candidate' => $id))->row();

        $this->db->where('id_candidate', $id)->update('candidate', array('status' => $candidate->status + 1 ));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Candidate Updated</div>');
        redirect(base_url('cms/candidate/'. $url));
    }

    public function direksi()
    {
        $id = $this->input->post('id');

        $old = $this->db->get_where('direksi', ['id_direksi' => $id])->row();
        
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
            unlink(FCPATH . 'assets/images/direksi/' . $old->foto_direksi);
        } else {
            $header1 = $old->foto_direksi;
        }

        $data = array(
            'nama_direksi' => $nama,
            'jabatan_direksi' => $jabatan,
            'perusahaan' => $perusahaan,
            'foto_direksi' => $header1
        );

        $this->db->where('id_direksi', $id);
        $this->db->update('direksi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direksi Updated</div>');
        redirect(base_url('cms/menages-direksi'));
    }

    public function save_update_company()
    {
      $id = $this->input->post('id');
      
      $type = $this->input->post('type');
      $status = $this->input->post('status');
      $name_company = $this->input->post('name_company');
      $tagline_company = $this->input->post('tagline_company');
      $url = $this->input->post('website');
      $body = $this->input->post('body');
      $button = (filter_var($url, FILTER_VALIDATE_URL)) ? 1 : 0;

      $data = array(
        'nama_company' => $name_company,
        'tagline' => $tagline_company,
        'type' => $type,
        'status' => $status,
        'des_company' => $body,
        'button' => $button,
        'url' => $url
      );
      
      $this->db->where('id_company', $id);
      $this->db->update('company', $data);
    
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Company Updated</div>');
      redirect(base_url('cms/company'));
    }

}