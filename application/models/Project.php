<?php 

Class Project extends CI_Model {
	function add_project($data) {
		return $this->db->insert('projects', $data);
	}

	function get_available_project($user_id) {
		$this->db->select('proj_id, project_name, description')->from('projects')->where(['create_by_id' => $user_id]);
		$projects = $this->db->get();
		return $projects->result();
	}

	function get_project_by_id($proj_id) {
		$this->db->select()->from('projects')->where(['proj_id' => $proj_id]);
		$project = $this->db->get();
		return $project->first_row();
	}

	function get_projects_for_select() {
		$this->db->select('proj_id, project_name')->from('projects');
		$project = $this->db->get();
		return $project->result();
	}



	function get_search($string) {
		$this->db->select('user_id, name')->from('users')->limit(3);
		$this->db->like('name', $string);
		$this->db->or_like('username', $string);
		$search_result = $this->db->get();
		return $search_result->result();
	}
}


?>