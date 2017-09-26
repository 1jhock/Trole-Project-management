<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Manage extends CI_Controller {
	function index() {

		$this->load->view('templates/header');
		$this->load->view('login');
		$this->load->view('templates/footer');
	}

	function signup() {
		$this->load->view('templates/header');
		$this->load->view('signup');
		$this->load->view('templates/footer');
	}

	function home() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	/*AJAX REQUEST*/
	function add_user() {
		$success = false;
		
		// creds
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');

		// check if no error
		// check pass
		if(!empty($name) && !empty($email) && !empty($username) && !empty($password)) {
			if($this->user->verify_pass($password, $repassword)) {
					$data = [
						'name' => $name,
						'email' => $email,
						'username' => $username,
						'password'=> md5($password)
					];

					$new = $this->user->add($data);

					if($new) {
						$success = true;
					}
				} 
			} 

		echo json_encode(["success" => $success]);
	}

	/* AJAX REQUEST */
	function login() {

		$success = false;
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if(!empty($username) && !empty($password)) {
			$user = $this->user->check_user($username, md5($password));
			if($user) {
				$data = [
					'user_id' => $user->user_id,
					'name' => $user->name,
					'username' => $user->username,
					'email' => $user->email,
					'img' => $user->img
				];

				$this->session->set_userdata($data);
				$success = true;
			}
		}

		echo json_encode(['success' => $success]);
	}

	function files() {
		// load available project in the selectbox
		$data['projects'] = $this->project->get_projects_for_select();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('files', $data);
		$this->load->view('templates/footer');
	}

	function projects() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('projects');
		$this->load->view('templates/footer');
	} 

	function logout() {

		$new_data = ['user_id' => ''];

		$this->session->unset_userdata($new_data);
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}

}	

?>