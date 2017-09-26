$(document).ready(function(){

var FileHandling = {
	baseURL: $('#base-url').val(),
	

	init: function() {
		this.loadFiles();
		this.uploadFile();
		this.uploadBtnAnimationHandler();
		this.projectAddingConditional();
		this.loadTotalFileByExtention();
	},


	loadFiles: function() {
		$.ajax({
			type: 'GET',
			url: this.baseURL+'files/load_files',
			dataType: 'json',
			success: function(data) {
				var body = '';
				$.each(data, function(index, val){
					body += `
						<tr>
							<td>`+val.file_name.substring(0,30)+`</td>
							<td>`+val.authority+`</td>
							<td>`+val.create_by_id+`</td>
							<td>`+val.date_created+`</td>
						</tr>
					`;
				});

			$('#files-body').html(body);
			}
		});
	},

	uploadFile: function() {
		$('#upload-file').on('submit', function(e){
			 $.ajax({
			      url: baseURL+'files/upload_new_file',
			      type: 'POST',
			      data: new FormData( this ),
			      processData: false,
			      contentType: false,
			      dataType: 'json',
		      	  success: function(data) {
		      	  	if(data.success === true) {
		      	  		Materialize.toast('<div style="color: #2ecc71">Your new file has been added.</div>', 2000);
		      	  	} else {
		      	  		Materialize.toast('<div style="color: #e74c3c">'+data.success+'</div>', 2000);
		      	  	}

		      	  
		      	  	$('#the_file').val('');
					$('#selected-file').text('');
		      	  }
   			 });
			
			e.preventDefault();
		});

	},

	uploadBtnAnimationHandler: function() {
		var submitBtn = $('#upload_file_btn')

		$('#the_file').on('change', function() {
			$('#selected-file').text($('#the_file').val().replace( /C:\\fakepath\\/i, "" ));

			submitBtn.removeClass('scale-out').addClass('scale-in').addClass('pulse');

		});
	},

	projectAddingConditional: function() {
		var selectBox = $('#select-project');
		var checkBox = $('#add-proj-conditional');

		selectBox.detach();
		
		var selectHandler
		checkBox.click(function(){
			if(selectHandler) {
				selectHandler = true;
				selectBox.detach();
				selectHandler = null;
			} else {
				selectHandler = true;
				$('#checkbox-parent').append(selectBox);
			}

		});
	},

	loadTotalFileByExtention: function() {
		$.ajax({
			type: 'GET',
			url: this.baseURL+'files/total_documents',
			dataType: 'json',
			success: function(data) {
				$('#pdf-badge').text(data.pdf);
				$('#compress-badge').text(data.compress);
				$('#photo-badge').text(data.photo);
				$('#excel-badge').text(data.excel);
				$('#ppt-badge').text(data.powerpoint);
				$('#word-badge').text(data.word);
			}
		});	
	}
}

FileHandling.init();




});


// // pulse
// <a class="btn btn-floating pulse"><i class="material-icons">menu</i></a>
// <a class="btn btn-floating btn-large pulse"><i class="material-icons">cloud</i></a>
// <a class="btn btn-floating btn-large cyan pulse"><i class="material-icons">edit</i></a>


 // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered

    //  $('#modal1').modal('open/close');