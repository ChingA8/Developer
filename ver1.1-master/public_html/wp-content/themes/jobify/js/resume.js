jQuery(document).ready(function($){
	$('.resume_button.upload').click(function(){
		$('.resume_button_active').removeClass('resume_button_active');
		$(this).addClass('resume_button_active');
		$('#upload_resume').addClass('active_tab');
		$('#upload_resume').removeClass('hidden_tab');
		$('#complete_resume').addClass('hidden_tab');
		$('#complete_resume').removeClass('active_tab');
		$('input[type=text]').not('#candidate_video').val('upload@upload.com');
	});

	$('.resume_button.complete').click(function(){
		$('input[type=text]').not('#candidate_video').val('');
		$('.resume_button_active').removeClass('resume_button_active');
		$(this).addClass('resume_button_active');
		$('#complete_resume').addClass('active_tab');
		$('#complete_resume').removeClass('hidden_tab');
		$('#upload_resume').addClass('hidden_tab');
		$('#upload_resume').removeClass('active_tab');
	});

	jQuery("div.active_checkbox").on('click',function(){
    	jQuery(this).remove();
    });
});