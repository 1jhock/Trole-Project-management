$(document).ready(function() {
	var baseURL = $('#base-url').val()
	var Project = {
		init: function() {
			this.loadProjects();
			this.newProject();
			this.currentProject();
			this.autoCompleteSelectionOfNames();
			this.newMembers();
			this.modalClose();
		},

		loadProjects: function() {
			var content = '';
			$.ajax({
				type: 'GET',
				url: baseURL+'projects/get_projects_lists',
				dataType: 'json',
				success: function(data) {
			
					if(data != 0) {
						var columns = 3;
						var rowCount = 0;
						content += '<div class="row">';

						$.each(data, function(index, val) {
							content += `
								<div class="col l4">
									<div class="panel">
										<div class="panel-heading">
										 	<h6><i class="fa fa-circle left alert-status"></i>`+val.project_name+`<a href="#select-project-modal" class="modal-trigger current-project" data-id="`+val.proj_id+`"><i class="fa fa-ellipsis-v right"></i></a></h6>
										</div>
										<div class="panel-body">
											<p class="center">`+val.description+`</p>
										</div>
									</div>
								</div>
							`;

							rowCount++;

							content += (rowCount % columns == 0) ? '</div><div class="row">' : '';
						});	

						content += '</div>';	
					} else {
						content = '<h5 class="center panel">You haven\'t added some projects.</h5>';
					}


					$('#projects-list').html(content);
				}
			});
		},

		currentProject: function() {
			$(document).on('click','.current-project',function(e) {
				$.ajax({
					type: 'GET',
					url: baseURL+'projects/get_by_id/'+$(this).data('id'),
					dataType: 'json', 
					success: function(data) {
						var contents = '';
						
						$('#project-title').text(data.project_name);
						
						// set project id to the input
						$('#project-id').val(data.proj_id);



						contents += `
							<table class="bordered">
								<tbody>
									<tr>
										<td><b>Description</b></td>
										<td>`+data.description+`</td>
									</tr>
									<tr>
										<td><b>Deadline</b></td>
										<td>`+data.deadline+`</td>
									</tr>
									<tr>
										<td><b>Member/s</b></td>
										<td>Jack Owen Bula <br /> Lailanie Enriquez</td>
									</tr>
								</tbody>
							</table>
						`;


						$('#current-project-container').html(contents);
					}
				});
				
				e.preventDefault();
			});

		},

		autoCompleteSelectionOfNames: function() {
			
			var searchItemContainer = $('#search-container');
			var input = $("#new-project-member");
			var membersContainer = $('#members-container');

			 $(document).on('keyup','#new-project-member',function(){
			 	var value = $.trim(input.val());
				 if(value.length > 2) {
				 	
					 /*AUTOMPLETE OF AVAILABLE MEMBERS @ DB*/
					 var container = '';
					 $.ajax({
						type: 'GET',
						url: baseURL+'projects/get_search_results/'+input.val(),
						dataType: 'json', 
						success: function(data) {
							container += '<ul>';
							$.each(data, function(index, val) {
								container += `<li class="name-item"><p class="name" data-id="`+val.user_id+`">`+val.name+`</p></li>`;
							});
							container += '</ul>';
							
							searchItemContainer.html(container);
						}
					 });
				 } else {
				 	searchItemContainer.html('');
				 }
			 });

			 $(document).on('click', '.name' , function() {
				input.val($(this).text());
				input.attr('data-id', $(this).attr('data-id'));
				searchItemContainer.html('');
			 });


			 $(document).on('click', '#add-member', function(e) {
				var theValue = $.trim(input.val());
				if(membersContainer.find('span').text().indexOf(theValue) > -1) {
					input.val('').focus();
					input.addClass('invalid');
					setTimeout(function() {
						input.removeClass('invalid');
					}, 2000);
				} else {
					membersContainer.append('<span class="member-item">'+theValue+'&nbsp;&nbsp;<i class="fa fa-close remove-member"></i><input type="hidden" class="members" name="members[]" value="'+input.attr('data-id')+'" /></span>');
					input.val('').focus();
				}
				e.preventDefault();
			 });

			 $(document).on('click', '.remove-member', function(){
				$(this).parent().detach();
				input.focus();	
			 });
		},

		newMembers: function() {
			$(document).on('submit', '#new-members', function(e){
				var creds = $(this).serializeArray();
				$.ajax({
					type: 'POST',
					url: baseURL+'projects/new_members',
					dataType: 'json',
					data: creds ,
					success: function(data) {
						if(data.status == 'success') {
							Materialize.toast('<div>New member/s have been added to the project</div>', 2000, 'success');
						} else if(data.status == 'error') {
							Materialize.toast('<div>The field is empty</div>', 2000, 'error');
						} else {
							var list = '';
							$.each(data.success, function(index, val) {
								list += '<li>'+val+'</li>';
							});
	
							Materialize.toast('<div><ul><li>THE FOLLOWING USER/S ALREADY EXIST:</li>'+list+'</ul></div>', 2000, 'error');
						}

						$(':input').val('');
					}
				});

				e.preventDefault();
			});
		},

		newProject: function() {
			$('#new-project').on('submit', function(e) {
				var creds = $(this).serialize();

				$.ajax({
					type: 'POST',
					url: baseURL+'projects/new_project',
					data: creds,
					dataType: 'json',
					success: function(data) {
						if(data.success) {
			      	  		Materialize.toast('<div style="color: #2ecc71">Your new project in now available.</div>', 2000);
			      	  		$('form').find('input').val('');
			      	  	} else {
			      	  		Materialize.toast('<div style="color: #e74c3c">Please complete the form.</div>', 2000);
			      	  	}
					}
				});
			
				e.preventDefault();
			});
		}, 

		modalClose: function() { 
			  $('#select-project-modal').modal({
			      complete: function() {
			      	$(':input').val('');
			       } 
			    }
			  );
		} 
	}


	Project.init();

});