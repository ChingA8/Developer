<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Jobify
 * @since Jobify 1.0
 */

global $post;
if(is_user_logged_in()){
	$current_user = get_current_user_id();
	if($current_user == '234'){
		//add_user_meta( $current_user, 'v_code', 'dKenhPLI3k');
	}
	$user_meta = get_user_meta(get_current_user_id(), 'v_code' , 'true');

}
?>
<script>
	jQuery(document).ready(function($){
		var job_id = <?php echo get_the_ID(); ?>;
		var current_user = '<?php echo $current_user ?>';
		$('.apply_wrap a').click(function(){
		$.ajax({
            url: '<?php echo get_permalink("2373"); ?>', //This is the current doc
            type: "POST",
            data: {job_id: job_id, user:current_user},
            success: function(data){
            	//alert(data);
            }
        }); 
		});

		$('.apply_wrap a').click(function(){
			$('#apply_hidden_overlay').show();
			$('.apply_hidden_wrap').show();

		});

		$('.mfp-close').click(function(){
			$('#apply_hidden_overlay').hide();
			$('.apply_hidden_wrap').hide();
		});

		$(".apply_hidden_wrap").appendTo("#apply_hidden_overlay");

	})
</script>

<?php if (is_single()): ?>	
								<?php
									if(is_user_logged_in()){
										?>
										<div class='apply_hidden_wrap'>
											<button title="Close (Esc)" type="button" class="mfp-close">×</button> 
												<div class='apply_hidden' style="display:block;">
	<?php
$jobPost = get_post_meta($post->ID,'_application', true);											
if(isset($_POST['_ninja_forms_field_5']))
	{

/************************ EMAIL PART **********************************/

	$to = $jobPost;

	$message = '<div style="width: 100%; margin: 0 auto; overflow: hidden; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
	<div style="display: table; margin: 0 auto; width: 88%; background: #fff;">
	<div style="width: 100%; float: left; margin: 0; padding: 19px 0; text-align: center; background: #B90504;">
	<h1 style="font-weight: 500; color: #fff; font-size: 19px; margin: 0; padding: 9px 11px; text-transform: capitalize;">Application.</h1>
	</div>
	<div style="width: 98.8%; float: left; margin: 0; padding: 0; border-left: 4px double #b90504; border-right: 4px double #b90504; border-bottom: 4px double #b90504;">
	<h4 style="font-size: 13px; font-weight: 100; text-align: center; width: 100%;">Meet '.$_POST['ninja_forms_field_1'].'.who has applied for<b style="font-weight: 800;"></b> for <b style="font-weight: 800;">'.$_POST['ninja_forms_field_10'].'.</b></h4>
	<p style="font-size: 13px; font-weight: 100; text-align: center; width: 100%;"><span style="color: #b90504; font-weight: 600;">'.$_POST['ninja_forms_field_3'].'</span></p>

	<h1 style="color: #484848; text-align: center; margin: 54px 0 8px; width: 100%;">'.$_POST['ninja_forms_field_1'].'.</h1>
	<p style="font-size: 13px; margin: 0; text-align: center; width: 100%;">'.$_POST['ninja_forms_field_2'].'</p>
	<p style="margin: 48px 0 45px 0; text-align: center; width: 100%;"><a style="background: none repeat scroll 0 0 #b90504; color: #fff; padding: 13px 40px; text-decoration: none;" href="'.$_POST['ninja_forms_field_11'].'">View this application</a></p>

	</div>
	</div>
	</div>';
	$headers .= "From: Scoot My <noreply@scoot.my> \r\n";
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$subject  = 'Thank you for contacting us!';
	$mail= mail($to, $subject, $message,$headers);
/*********************** END OF EMAIL PART *****************************/
	}														if(!$user_meta):
																echo do_shortcode('[ninja_forms_display_form id=1] ');
															else:
																echo "Please verify your account!";
															endif;
															?>
												
												</div>
										</div>
										<?php
									}
									else{
										include 'modal-register.php';?>
											<script>
											jQuery(document).ready(function($){
												$('.apply_wrap .login_apply').click(function(){
													$('#login-modal a').click();

													$('.mfp-close').click(function(){
														$('#apply_hidden_overlay').hide();
													});

													$('.mfp-bg, .mfp-wrap, .mfp-content, .mfp-container').click(function(){
														$('#apply_hidden_overlay').hide();
													})

												});

												$('.apply_wrap .signup_apply').click(function(){
													$('#register-modal a').click();

													$('.mfp-close').click(function(){
														$('#apply_hidden_overlay').hide();
													});

													$('.mfp-bg, .mfp-wrap, .mfp-content, .mfp-container').click(function(){
														$('#apply_hidden_overlay').hide();
													})

												});

											});
											</script>
										<?php
									}
								?>	
<?php endif; ?>

<div class="page-header">
	<div>
		<?php $tax = get_the_terms( $post->ID, 'job_listing_category' ); ?>  
		<?php 
			foreach($tax as $t){
				$term_id = $t->term_id;
				$tax_name = $t->taxonomy;
			}
			$img = get_field("background_image", $tax_name . '_' . $term_id); 
		?>
		<img class='bgImg' src='<?php echo $img; ?>' />
	</div>
	<div class='job_h_wrap'>		
		<h1 class="page-title"><?php the_title(); ?></h1>
		<h2 class="page-subtitle">
			<?php do_action( 'single_job_listing_meta_before' ); ?>

			<ul>
				<?php do_action( 'single_job_listing_meta_start' ); ?>

				<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php the_job_type(); ?></li>
				<li class="job-company">
					<?php
					if ( class_exists( 'Astoundify_Job_Manager_Companies' ) && '' != get_the_company_name() ) :
						$companies   = Astoundify_Job_Manager_Companies::instance();
						$company_url = esc_url( $companies->company_url( get_the_company_name() ) );
					?>
					<a href="<?php echo $company_url; ?>" target="_blank"><?php the_company_name(); ?></a>
					<?php else : ?>
						<?php the_company_name(); ?>
					<?php endif; ?>
				</li>
				<li class="job-location"><i class="icon-location"></i> <?php the_job_location(); ?></li>
				<li class="job-date-posted"><i class="icon-calendar"></i> <?php printf( __( 'Posted <date>%s</date> ago', 'jobify' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></li>

			</ul>

			<?php do_action( 'single_job_listing_meta_after' ); ?>
		</h2>
	</div>
</div>
<div id='job_content_wrap'>
	<div id="content" class="container" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">

				<?php if ( 'preview' == $post->post_status ) : ?>
					<?php //get_job_manager_template_part( 'content-single', 'job_listing' ); ?>
					











					<?php //the_content(); 
					
					$meta = get_post_meta($post->ID);?>
					<div id='single_job_logo_section'>
						<?php 
							the_company_logo( $size = 'medium');
						?>
						<div class='single_address'>
							
							<h2>Address</h2>
							<?php
							echo $meta['addr_details'][0];
							?>
							
							<br/> <br/>
							
							<h2>Job Category</h2>
							<?php 
								$terms = wp_get_post_terms( $post->ID , 'job_listing_category');
								foreach($terms as $t){
									echo $t->name;
								}
							?>
						</div>
					</div>
					
					<div id='single_job_map'>
						<?php do_action( 'single_job_listing_meta_end' ); ?>
					</div><br/>

					<?php 
						for($x=0;$x<10;$x++){

							if($x != 0){
								$sufix = $x;
							}
							else{
								$sufix='';
							}

							if($meta['_gallery_image' . $sufix][0]):
								$collection[]= $meta['_gallery_image' . $sufix];
							endif;
						}

					if($collection):
					?>
						<ul class="bxslider">

							<?php
								foreach($collection as $c):
							?>
									<li><img src="<?php echo $c[0]; ?>" /></li>
							<?php
								endforeach;
							?>
						  
						</ul>
						<script>
							jQuery('.bxslider').bxSlider();
						</script>
						<?php endif; ?>

						<br/>
						<h1>Overview</h1>
						<span><?php echo get_the_content(); ?></span>

						<br/>
						<h1>Requirements</h1>
						<span><?php echo $meta['_requirements'][0]; ?></span>

						<br/>
						<?php if($meta['_job_salary'][0]): ?>
							<h1>Salary and benefits</h1>
							<span><?php echo $meta['_job_salary'][0]; ?></span>
						<?php endif; ?>

				
					<?php 
					else : ?>
					<?php //the_content(); 
					
					$meta = get_post_meta($post->ID);?>
					<div id='single_job_logo_section'>
						<?php 
							the_company_logo( $size = 'medium');
						?>
						<div class='single_address'>
							
							<h2>Address</h2>
							<?php
							echo $meta['addr_details'][0];
							?>
							
							<br/> <br/>
							
							<h2>Job Category</h2>
							<?php 
								$terms = wp_get_post_terms( $post->ID , 'job_listing_category');
								foreach($terms as $t){
									echo $t->name;
								}
							?>
						</div>
					</div>
					
					<div id='single_job_map'>
						<?php do_action( 'single_job_listing_meta_end' ); ?>
					</div><br/>

					<?php 
						for($x=0;$x<10;$x++){

							if($x != 0){
								$sufix = $x;
							}
							else{
								$sufix='';
							}

							if($meta['_gallery_image' . $sufix][0]):
								$collection[]= $meta['_gallery_image' . $sufix];
							endif;
						}

					?>

					<?php 
						if ( is_user_logged_in() ):
					?>
							<div class='apply_wrap' style='text-align:right;'><a class="button" href="javascript:void(0);">Apply to job</a></div>
							<div style='display:none'>
									<?php if ( candidates_can_apply() ) : ?>
										<?php get_job_manager_template( 'job-application.php' ); ?>
									<?php endif; ?>
							</div>
					<?php
						else:
					?>
							<div class='apply_wrap' style='text-align:right;'>
								<a style='text-transform:none !important' class="button login_apply" href="javascript:void(0);">Login to apply</a><br/>
								<a style='text-transform:none !important' class="button signup_apply" href="javascript:void(0);">Sign up to apply</a>
							</div><br/>
							
					<?php
						endif;
					?>

					<?php
						if($collection):
					?>
						<ul class="bxslider">

							<?php
								foreach($collection as $c):
							?>
									<li><img src="<?php echo $c[0]; ?>" /></li>
							<?php
								endforeach;
							?>
						  
						</ul>
						<script>
							jQuery('.bxslider').bxSlider();
						</script>
						<?php endif; ?>

					<br/>
					<h1>Overview</h1>
					<span><?php echo get_the_content(); ?></span>

					<br/>
					<h1>Requirements</h1>
					<span><?php echo $meta['_requirements'][0]; ?></span>

					<br/>
					<?php if($meta['_job_salary'][0]): ?>

						<?php 
							$post_date = get_the_date('Y/m/d'); 
							$limit_date = '2015/04/21';
							if($post_date < $limit_date):

									if (preg_match('#[0-9]#',$meta['_job_salary'][0])):
										?>
											<h1>Salary and benefits</h1>
											<span><?php echo $meta['_job_salary'][0]; ?></span>
										<?php
									endif;

							else:
									?>
										<h1>Salary and benefits</h1>
										<span><?php echo $meta['_job_salary'][0]; ?></span>
									<?php

							endif;
						?>
						
					<?php endif; ?>

					<div style='float:right'><?php echo do_shortcode('[post_view]'); ?></div>
				<?php endif; ?>

				<?php get_template_part( 'content-single-job', 'related' ); ?>
			</div>
		</article><!-- #post -->
	</div>
</div>
