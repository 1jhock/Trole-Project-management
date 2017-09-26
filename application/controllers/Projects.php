<?php 

Class Projects extends CI_Controller {

	/*AJAX REQUEST*/
	function new_project() {
		$success = false;

		$project = $this->input->post('project-name');
		$deadline = date_format(date_create($this->input->post('deadline')),'Y-m-d H:i:s');
		$desc = $this->input->post('description');

		if(!empty($project) && !empty($deadline) && !empty($desc)) {
			
			$data = [
				'project_name' => $project,
				'description' => $desc,
				'deadline' => $deadline,
				'create_by_id' => $this->session->userdata('user_id')
			];

			$new_project = $this->project->add_project($data);

			if($new_project) {

				$success = true;
			}
		}


		echo json_encode(['success' => $success]);

	}

	/*AJAX REQUEST*/
	function get_projects_lists() {
		$projects = $this->project->get_available_project($this->session->userdata('user_id'));

		echo json_encode($projects);
	}

	/*AJAX REQUEST*/
	function get_by_id($proj_id) {
		$project = $this->project->get_project_by_id($proj_id);

		echo json_encode($project);
	}


	function get_search_results($string) {
		$result = $this->project->get_search($string);

		echo json_encode($result);
	}

	function new_members() {
		$names = $this->input->post('members');
		$project_id = $this->input->post('project-id');
		$existings = [];
		$status = '';

		if(!empty($names)) {
			for ($i=0; $i < sizeof($names); $i++) { 
				
				/*CHECK IF USER ALREADY EXIST*/
				$data = [
					'proj_id' => $project_id,
					'user_id' => $names[$i]
				];

				$result = $this->membership->check_existing_members($data);
				
				if($result) {
					$existings[] = $result->name;
				} else {
					$this->membership->add([
						'proj_id' => $project_id,
						'user_id' => $names[$i]
					]);
				}

				if(sizeOf($existings) > 0) {
					$status = $existings;
				} else {
					$status = 'success';
				}
			}	
		} else {
			$status = 'error';
		}

		echo json_encode(['status' => $status]);

	}
}

?>