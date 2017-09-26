<?php 

Class Membership extends CI_Model {


	function add($data) {
		return $this->db->insert('memberships', $data);
	}

	function check_existing_members($data) {
		$this->db->select('memberships.user_id, users.name as name')->from('memberships');
		$this->db->join('users','memberships.user_id = users.user_id');
		$this->db->where(['memberships.proj_id' => $data['proj_id'], 'memberships.user_id' => $data['user_id']]);
		$result = $this->db->get();
		return ($result->first_row()) ? $result->first_row() : false;
	}

}


?>


