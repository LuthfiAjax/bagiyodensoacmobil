<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login/templates/header');
			$this->load->view('login/login');
			$this->load->view('login/templates/footer');
		} else {
			// validasi sukses
			$this->_login();
		}
    }

    private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$firstNumber = $this->input->post('firstNumber');
		$secondNumber = $this->input->post('secondNumber');
		$answer = $this->input->post('answer');

		$key = $firstNumber + $secondNumber;

		$user = $this->db->get_where('user', ['email_user' => $email])->row_array();

		// jika chaptcha benar
		if ($answer == $key) {
			// jika usernya ada
			if ($user) {
				// jika usernya aktif
				if ($user['is_active'] == 1) {
					// cek password
					if (password_verify($password, $user['password'])) {
						$data = [
							'email' => $user['email_user'],
							'role_id' => $user['role_id'],
							'id_user' => $user['id_user']
						];
						$this->session->set_userdata($data);
						if ($user['role_id'] == 1) {
							redirect(base_url('cms/dashboard'));
						} else {
							redirect(base_url(''));
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
						redirect(base_url(''));
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
					redirect(base_url(''));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
				redirect(base_url(''));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Captcha!</div>');
			redirect(base_url(''));
		}
	}

    public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		redirect(base_url(''));
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('login/templates/header', $data);
			$this->load->view('login/registration');
			$this->load->view('login/templates/footer');
		} else {
			$nama = $this->input->post('nama', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
	
			$cekUser = $this->db->get_where('user', ['email_user' => $email])->row();
			if ($cekUser != null) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email already exists.</div>');
				redirect(base_url('bagiyo-admin/registration'));
			}
	
			$domain = substr(strrchr($email, "@"), 1);
			if ($domain != 'bagiyodensoacmobil.com') {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid email domain.</div>');
				redirect(base_url('bagiyo-admin/registration'));
			}
	
			$data = [
				'role_id' => 1,
				'nama_user' => htmlspecialchars($nama),
				'email_user' => htmlspecialchars($email),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'is_active' => 1
			];
	
			$this->db->insert('user', $data);
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created.</div>');
			redirect(base_url('bagiyo-admin'));
		}
	}
	
}