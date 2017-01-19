jQuery(document).ready(function($){
	$('.matiere').hide();
	$('.chapitre').hide();
	$('.chap_question').hide();
	$('.type').hide();
	$('#form_question input[name="mat_question"]').on('change', function() {
		$('.chap_question').hide(100);
		$('.chap_single_question').prop( "checked", false);
		$('#chap'+$('input[name="mat_question"]:checked', '#form_question').val()).show(100); 
	});
	$('#form_question input[name="type_question"]').on('change', function() {
		$('.type').hide(100);
		$('#type'+$('input[name="type_question"]:checked', '#form_question').val()).show(100);
	});

	$('.lien_matiere').click(function(){
		$('#matiere'+$(this).attr('num')).toggle(100);
	});
	$('.lien_chapitre').click(function(){
		$('#chapitre'+$(this).attr('num')).toggle(100);
	});
	
	$('.c_question').click(function(){
		if( $('#id_reponse'+$(this).attr('num')).is(':checked')){
			$('#id_reponse'+$(this).attr('num')).attr( "checked", false );
			$(this).css('background-color','white');
		}
		else{
			$('#id_reponse'+$(this).attr('num')).attr( "checked", true );
			$(this).css('background-color','green');

		}
	});

	
	var countChecked = function() {
		var n = $( "input:checked" ).length;
		$( "#nb_check" ).text( n + (n <= 1 ? " selectionnée" : " selectionnées") 	);
	};
	countChecked();
 
	$( "input[type=checkbox]" ).on( "click", countChecked );
	
});
