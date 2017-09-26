var baseURL = $('#base-url').val();


/* ======================== SIGNUP =========================== */
$('#signup').on('submit', function(e) {
	var creds = $(this).serialize();
	
	$.ajax({
		type: 'POST',
		url: baseURL+'manage/add_user',
		data: creds,
		dataType: 'json',
		success: function(data) {
			if(data.success) {
				Materialize.toast('<div style="color: #2ecc71">Congratulations! Your account has been registered.</div>', 2000);
			} else {
				Materialize.toast('<div style="color: #e74c3c">Something went wrong. Please provide informations correctly.</div>', 2000);
			}

			$(':input').val('');

		}
	});
		
	e.preventDefault();

});

/*========================== LOGIN ==============================*/
$('#login').on('submit', function(e) {
	var creds = $(this).serialize();
	$.ajax({
		type: 'POST',
		url: baseURL+'manage/login',
		data: creds,
		dataType: 'json',
		success: function(data) {
			if(data.success) {
				window.location.href = baseURL+'manage/home';
			} else {
				Materialize.toast('<div style="color: #e74c3c">Wrong username or password.</div>', 2000);
			}
		}
	});

	e.preventDefault();
});

