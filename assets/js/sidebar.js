$(function(){
	
	window.onload = function() {
		 $('ul#list').find('a').filter(function() {
			return $(this).attr('href') == window.location;
		}).addClass('active');
	}


	// function stickySidebar() {
	// 	if($(window).scrollTop() > 100) {
	// 		$('#side').css({
	// 			'position':'fixed',
	// 			'width':'200px',
	// 			'top':'0px'
	// 		});

	// 	} else {
	// 		$('#side').css({
	// 			'position':'relative',
	// 			'top':'auto'
	// 		});


	// 	}
	// }

	// $(window).scroll(stickySidebar);
	// stickySidebar();

}());