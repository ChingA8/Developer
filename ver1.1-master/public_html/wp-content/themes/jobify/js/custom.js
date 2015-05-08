	function mainmenu(){
	jQuery("#menu-main-menu-1 li").hover(function(){
	jQuery(this).find('ul:first').stop();
	jQuery(this).find('ul:first').slideDown("slow");
	},function(){
	jQuery(this).find('ul:first').stop();
	jQuery(this).find('ul:first').slideUp("slow");
	});
	}

jQuery(document).ready(function($){

	$("a[href='#top']").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
	
	mainmenu();
	$('.checkbox_label').click(function(){
		$(this).parent().find('.slide_check').stop(true).slideDown();
	});

	$('#search_checkbox, #custom_job_type').click(function(e){
		if( e.target == this ){ 
			$(this).find('.slide_check').stop(true).slideDown();
		}
		else{
			var the_class = $(e.target).attr('class').split(/\s+/);
			//console.log(the_class[0]);
			if (the_class[0] == 'active_checkbox'){
				//console.log($('.checkbox_wrap .' + the_class[1]));
				//console.log($('.checkbox_wrap .' + the_class[1]).parent().parent().find('.categ_span'));
				$('.checkbox_wrap .' + the_class[1]).parent().parent().find('.categ_span').trigger("click");
			}
		}
	});
	


	$('#search_checkbox, #custom_job_type').mouseleave(function(){
		$(this).find('.slide_check').stop(true).slideUp();
	});

	$('.categ_span').click(function(){

		var c_container = $(this).parent().parent().parent();
		$(this).parent().find('span input').click();
		var txt = $(this).html();
		var cls = $(this).parent().find('span input').attr('class');
		cls = cls.replace('search_checkbox ','');


		if($(c_container).find('.active_checkbox.' + cls).length){
			$(c_container).find('.active_checkbox.' + cls).remove();
			console.log('test1');

		}
		else{
			$(c_container).append('<div class="active_checkbox ' + cls +'">' + txt + '</div>');
			console.log('test2');
			
		}

		if($(c_container).find('.active_checkbox').length){
			$(c_container).find('.checkbox_label').hide();
		}
		else{
			$(c_container).find('.checkbox_label').show();
		}
		});


	

	$('.prod_row').click(function(){
		$('.prod_row').removeClass('package_selected');
		$(this).addClass('package_selected');
		var prod_id = $(this).find('input').val();
		//$('.pack_add .button-secondary').attr('href','/?add-to-cart=' + prod_id);
		
	});

	    //----------Hover poza 1 begins--------------

    $('.left_side').hover(
    	function(){
    	$('#poza-overlay1').addClass('overlay-transition1');
    	$("#poza1").addClass('poza-transition1');
    	console.log('in');

    }, function(){
    	$('#poza-overlay1').removeClass('overlay-transition1');
    	$("#poza1").removeClass('poza-transition1');

    });
    //----------Hover poza 1 ends----------------

     //----------Hover poza 2 begins--------------
    $('.right_side').hover(
    	function(){
    	$('#poza-overlay2').addClass('overlay-transition2');
    	$("#poza2").addClass('poza-transition2');

    }, function(){
    	$('#poza-overlay2').removeClass('overlay-transition2');
    	$("#poza2").removeClass('poza-transition2');

    });
    //----------Hover poza 2 ends----------------



		//$(window).load(function() {
		//	console.log('hi');
		//$('#soliloquy-image-5476').css('display', 'block');

});



