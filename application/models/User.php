<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model {

	function add($data) {
		return $this->db->insert('users', $data);
	}

	function verify_pass($pass, $repass) {
		if($pass === $repass) {
			return true;
		} else {
			return false;
		}
		
	}

	function check_existing_username($username) {
		$this->db->select('user_id')->from('users')->where(['username' => $username]);
		$username = $this->db->get();
		return $username->row('user_id') ? true: false; 
	}

	function check_user($username, $password) {
		$this->db->select('user_id, name, username, email, img')->from('users');
		$this->db->where(['username' => $username, 'password' => $password]);
		$user = $this->db->get();
		return $user->first_row() ? $user->first_row() : false;
	}


 }

?>