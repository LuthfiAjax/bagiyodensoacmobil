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
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
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
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$firstNumber = $this->input->post('firstNumber');
		$secondNumber = $this->input->post('secondNumber');
		$answer = $this->input->post('answer');

		$key = $firstNumber + $secondNumber;

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// jika chaptcha benar
		if ($answer == $key) {
			// jika usernya ada
			if ($user) {
				// jika usernya aktif
				if ($user['is_active'] == 1) {
					// cek password
					if (password_verify($password, $user['password'])) {
						$data = [
							'username' => $user['username'],
							'role_id' => $user['role_id'],
							'id_user' => $user['id_user']
						];
						$this->session->set_userdata($data);
						if ($user['role_id'] == 1) {
							redirect(base_url('cms/dashboard'));
						} elseif ($user['role_id'] == 2) {
							redirect(base_url('hcd/dashboard'));
						} else {
							redirect(base_url(''));
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
						redirect(base_url(''));
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
					redirect(base_url(''));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
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

		redirect(base_url('cms-group'));
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
			'is_unique' => 'This username has already registered!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login/templates/header');
			$this->load->view('login/registration');
			$this->load->view('login/templates/footer');
		} else {
			$nama = $this->input->post('nama', true);
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			$data = [
				'role_id' => 1,
				'is_active' => 1,
				'nama_user' => htmlspecialchars($nama),
				'username' => htmlspecialchars($username),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'picture' => 'default.webp'
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created.</div>');
			redirect(base_url('cms-group'));
		}
	}
}