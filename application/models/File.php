<?php 

Class File extends CI_Model {

	function insert_file($data) {
		return $this->db->insert('files', $data);
	}

	function get_files() {
		$this->db->select()->from('files');
		$files = $this->db->get();
		return $files->result();
	}

	function get_total_per_file($file_extention) {
		$this->db->select('file_id')->from('files');
		$this->db->where(['SUBSTRING_INDEX(file_name,".",-1)' => $file_extention]);
		$files = $this->db->get();
		return $files->num_rows();
	}


}

?>