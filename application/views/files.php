<div class="panel title-container">
	<h5 class="title">Files and Documents</h5>
	<h5>
		<button class="btn-flat btn-flat-icon waves-effect waves tooltipped" data-position="bottom" data-delay="50" data-tooltip="Sort"><i class="fa fa-sort"></i></button>
	</h5>
</div>


<!-- List of files and Documents -->
<div class="row">
	<div class="col l8">
		<div class="panel">
			<div class="panel-body">
				<table class="striped bordered highlight">
					<thead>
						<tr>
							<th>Filename</th>
							<th>Project</th>
							<th>Authority</th>
							<th>Date Created</th>
						</tr>
					</thead>
					<tbody id="files-body">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col l4">
		<div class="panel">
			<div class="panel-heading">
				List of Files and Documents
			</div>
			<div class="panel-body">
				<ul>
					<li><i class="fa fa-file-pdf-o" style="color: #E53935"></i>&nbsp;&nbsp;PDF <span class="badge" id="pdf-badge"></span></li>
					<li><i class="fa fa-file-zip-o" style="color: #8E24AA"></i>&nbsp;&nbsp;ZIP/RAR <span class="badge" id="compress-badge"></span></li>
					<li><i class="fa fa-file-word-o" style="color: #01579B"></i>&nbsp;&nbsp;WORD <span class="badge" id="word-badge"></span></li>
					<li><i class="fa fa-file-excel-o" style="color: #009688"></i>&nbsp;&nbsp;EXCEL <span class="badge" id="excel-badge"></span></li>
					<li><i class="fa fa-file-powerpoint-o" style="color: #F44336"></i>&nbsp;&nbsp;POWERPOINT <span class="badge" id="ppt-badge"></span></li>
					<li> <i class="fa fa-file-photo-o" style="color: #6D4C41"></i>&nbsp;&nbsp;PHOTO <span class="badge" id="photo-badge">s</span></li>
				</ul>
			</div>
		</div>
		<div style="background-color: white; border-radius: 3px; padding: 10px; margin: 20px;">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non ipsam quibusdam at placeat et, mollitia qui minus obcaecati beatae molestias consequuntur distinctio laboriosam deleniti unde facere dolorum consequatur, incidunt error excepturi, quas praesentium ducimus. Molestiae soluta molestias delectus, quidem impedit!
		</div>
	</div>
</div>

 <!-- Modal Trigger -->
<div class="fixed-action-btn">
	<a class="waves-effect waves btn-floating btn-large modal-trigger" id="project-btn" href="#new-file-modal"><i class="material-icons small">add</i></a>
</div>
  <!-- Modal Structure -->
  <div id="new-file-modal" class="modal modal" style="min-height: 80vh;">
   <h4 class="modal-header"><i class="fa fa-file-o"></i>&nbsp;&nbsp;New File <i class="material-icons right modal-action modal-close" id="close-modal">close</i></h4><br><br>
    	<div class="modal-content">
	     		  <form action="" method="post" enctype="multipart/form-data" id="upload-file" class="center">
					<div class="row">
						<div class="col l6">
							<div class="file-field input-field">
							  <div id="upload-placeholder" class=" waves-effect waves">
							    <span style="font-weight: bold;">Upload new file</span> <br> <br>
							    <span>
								    <i class="fa fa-file-pdf-o" style="color: #E53935"></i>&nbsp;&nbsp;
								    <i class="fa fa-file-zip-o" style="color: #8E24AA"></i>&nbsp;&nbsp;
								    <i class="fa fa-file-word-o" style="color: #01579B"></i>&nbsp;&nbsp;
								    <i class="fa fa-file-excel-o" style="color: #009688"></i>&nbsp;&nbsp;
								    <i class="fa fa-file-powerpoint-o" style="color: #F44336"></i>&nbsp;&nbsp;
								    <i class="fa fa-file-photo-o" style="color: #6D4C41"></i>&nbsp;&nbsp;
								</span>
								<br> <br>
								<span id="selected-file"></span>
								<!-- the file -->
							    <input type="file" name="the_file" id="the_file" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click here to upload new file">
							    <!-- the project -->
							    <input type="hidden" id="project" name="project-id">
							  </div>
							</div>
						</div>
						<div class="col l6">
							<p id="checkbox-parent">
						      <input type="checkbox" class="filled-in" id="add-proj-conditional" />
						      <label for="add-proj-conditional">Add file under a project</label>
						     	 <div class="input-field" id="select-project">
								    <select name="project-select" id="project-select-box">
										<option value="" disabled selected>Select Project</option>
										<?php foreach($projects as $project) : ?>
											<option value="<?=$project->proj_id?>"><?=$project->project_name?></option>
										<?php endforeach; ?>
								    </select>
								  </div>
						    </p>
						</div>
						<br><br>
						 <button class="waves-effect waves btn-flat left" type="submit"><i class="material-icons left">add</i>Add file</button>
					</div> 
			</form>
	    </div>
	    <!-- <div class="modal-footer">
	     	<button class="waves-effect right modal-action modal-close waves btn-flat red" type="submit"><i class="material-icons left">close</i>Close</button>
	    </div> -->
  </div>