
<div class="panel title-container">
	<h5 class="title">Projects</h5>
	<h5>
		<button class="btn-flat btn-flat-icon waves-effect waves tooltipped" data-position="bottom" data-delay="50" data-tooltip="Sort"><i class="fa fa-sort"></i></button>
	</h5>
</div>


<div id="projects-list">
	 <div class="loader">
	 	<div class="preloader-wrapper active">
	    <div class="spinner-layer spinner-blue-only">
	      <div class="circle-clipper left">
	        <div class="circle"></div>
	      </div><div class="gap-patch">
	        <div class="circle"></div>
	      </div><div class="circle-clipper right">
	        <div class="circle"></div>
	      </div>
	    </div>
	  </div>
	 </div>
</div>


 <!-- Modal Trigger -->
<div class="fixed-action-btn">
	<a class="waves-effect waves btn-floating btn-large modal-trigger " id="project-btn" href="#new-project-modal"><i class="material-icons small">add</i></a>
</div>
  <!-- Modal Structure -->
  <div id="new-project-modal" class="modal modal" style="height: 80vh; width: 80vw;">
   <h4 class="modal-header"><i class="fa fa-folder-open-o"></i>&nbsp;&nbsp;New Project <i class="material-icons right modal-action modal-close" id="close-modal">close</i></h4><br><br>
    	<div class="modal-content">
	     	<div class="container">
	     		
			      <form action="" method="post" id="new-project">
			      	<div class="input-field">
			          <input  id="project-name" name="project-name" type="text" class="validate">
			          <label for="project-name">Project name</label>
			       </div>
			       <div class="input-field">
			          <input  id="description" name="description" type="text" class="validate">
			          <label for="description">Description</label>
			       </div>
			       <div class="input-field">
						<input type="date" class="datepicker"  id="deadline" name="deadline">
						<label for="deadline">Select Deadline</label>
			       </div>

			         <button class="waves-effect right waves btn-flat" type="submit">Add project</button>
			      </form>
	     	</div>
	    </div>
  </div>

    <!-- Modal Project -->
  <div id="select-project-modal" class="modal"  style="min-height: 80vh; width: 60vw;">
   <h4 class="modal-header"><span id="project-title"></span><i class="material-icons right modal-action modal-close" id="close-modal">close</i></h4>
    	<div class="modal-content">
	     	<div class="panel-o">
	     		<form action="<?=base_url()?>projects/new_members" method="post" autocomplete="off" id="new-members">
	 
		  			  <div class="row">
		  			  	<div class="col l11">
								<input type="hidden" name="project-id" id="project-id">
		  			  			<input  id="new-project-member" placeholder="Add new member here" name="new-project-member" type="text" class="new-project-member">
		  			  			<label for="new-project-member"></label>
		  			 
		  			  		<div id="search-container"></div>
		  			  		<div id="members-container"></div>
		  			  	</div>
		  			  	<div class="col l1">
		  			  		<button class="btn-flat btn-flat-icon waves-effect waves tooltipped" id="add-member" data-position="top" data-delay="50" data-tooltip="Add" style="background-color: #f1f1f1 !important"><i class="fa fa-plus"></i></button>
		  			  	</div>
		  			  </div>
			      <button class="waves-effect right waves btn-flat" id="submit-member" type="submit">Add members</button>
			      <br><br>
	     		</form>
	     	</div>
	     	<div id="current-project-container">
	     		<div class="loader">
				 	<div class="preloader-wrapper active">
				    <div class="spinner-layer spinner-blue-only">
				      <div class="circle-clipper left">
				        <div class="circle"></div>
				      </div><div class="gap-patch">
				        <div class="circle"></div>
				      </div><div class="circle-clipper right">
				        <div class="circle"></div>
				      </div>
				    </div>
				  </div>
				 </div>
	     	</div>
	    </div>
  </div>

