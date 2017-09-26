<?php 

Class FIles extends CI_Controller {

	function upload_new_file() {

		$config['upload_path']          = './assets/files/';
        $config['allowed_types']        = 'zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|pdf|txt|psd|exe|avi|mpeg|mp3|mp4|3gp|gif|jpg|jpeg|png';
        $config['max_size']             = 3072;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;	
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $success = false;

        if(!$this->upload->do_upload('the_file')) {
            $success = strip_tags($this->upload->display_errors());
	     } else {

	     	 $upload_data = $this->upload->data(); 
			 $file_name = $upload_data['file_name'];

		 	$data = [
		 		'file_name' => $file_name,
	        	'authority' => 'both',
	        	'project_id' => $this->input->post('project'),
	        	'create_by_id' => $this->session->userdata('user_id'),
		 	];
				
    	    $this->file->insert_file($data);
    	   
    	    $success = true;
	     }


	     echo json_encode(['success' => $success]);
	}

	function load_files() {
		header('Content-Type: application/json'); 
		$files = $this->file->get_files();

		echo json_encode($files);
	}

	function total_documents() {
		header('Content-Type: application/json');
		$documents = [
			'pdf'       => $this->file->get_total_per_file('pdf'),
			'word'      => $this->file->get_total_per_file('docx'),
			'excel'		=> $this->file->get_total_per_file('.xls'),
			'powerpoint' => $this->file->get_total_per_file('.ppt'),
			'compress'  => $this->file->get_total_per_file('.zip') + $this->file->get_total_per_file('.rar'),
			'photo'		=> $this->file->get_total_per_file('.png') + $this->file->get_total_per_file('.jpg') + $this->file->get_total_per_file('.gif') + $this->file->get_total_per_file('.jpeg')
		];

		echo json_encode($documents);
	}

	function get_project() { //use for selectbox
		
		$projects = $this->project->get_projects_for_select();
		echo json_encode($projects);
	}


}

?>