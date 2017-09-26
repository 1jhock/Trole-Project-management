
$(document).ready(function(){
	 /* ===========================
		INITIALIZING MATERIALIZE
		===========================
	 */

	/*ENABLE TOOLTIP*/
 	$('.tooltipped').tooltip({delay: 50});

 	/*INPUT ANIMATION*/
    Materialize.updateTextFields();

    /*MODAL*/
	 $('.modal').modal();

	 /*ENABLE SELECT*/
	$('select').material_select();

	/*DATETIME PICKER*/
	  $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    closeOnSelect: false // Close upon selecting a date,
	  });


});	  