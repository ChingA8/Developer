<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Jobify
 * @since Jobify 1.0
 */
if(is_page('1671')){
	if(is_user_logged_in()){
		header('Location: ' . home_url());
	}
}
$referrer = $_SERVER['HTTP_REFERER'];
$url = parse_url($referrer);
FB::log($url);
$get = $_GET["add-to-cart"];
$user_meta = get_user_meta(get_current_user_id(), 'v_code' , 'true');
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta name="description" content="Scoot focuses   
	on part-time, entry level, fresh graduate jobs
	and internships in Malaysia." />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/source/vendor/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head();	?>

	<?php
		if ( is_user_logged_in() ): 
			$current_user = wp_get_current_user();
	?>
		
		<script>
			jQuery(document).ready(function($){
				$('.menu-item-2582 a').html('Welcome <?php echo $current_user->user_login; ?>');
			})
		</script>

	<?php 
		endif;
	?>

</head>

<body <?php body_class(); ?>>


<?php if (is_single()): ?>
	<div id='apply_hidden_overlay'>
		

	</div>
<?php endif; ?>
	<div id="page" class="hfeed site">
<?php if(get_the_id() != '2181'): ?>
<div id='register_resume'><?php echo do_shortcode('[submit_resume_form]'); ?></div>
			<script>
				jQuery(document).ready(function($){
					$('#register_resume').appendTo('#register-modal-wrap');
					console.log('testy');
					$('#role').on('change', function(){
						var form_option = this.value;
						if(form_option == 'employer'){
							$('#candidate_form').show();
							$('#register_resume').hide();
						}
						else if(form_option == 'candidate'){
							$('#register_resume').show();
							$('#candidate_form').hide();
						}
						else{
							$('#register_resume').hide();
							$('#candidate_form').hide();
						}

					});
				});
			</script>
<?php else: ?>
			<script>
				jQuery(document).ready(function($){
					$('#register-modal').click(function(){
						window.location.href = "<?php echo get_home_url(); ?>?signup=true";
					});
				});
			</script>
<?php endif; ?>
		<?php 
	if(is_user_logged_in()){

		if($user_meta): 
		?>
			<?php if($user_meta == 'verified'): 

        		delete_user_meta( get_current_user_id(), 'v_code' );
			?>
				<div id='activation_back'></div>
				<div id='user_activation'>

					<span style="display:inline-block;color:#35B137">Your account has been verified. Thank you!</span>

				</div>
				<script>
				jQuery(document).ready(function($){
					setTimeout(
					  function() 
					  {
					    $('#activation_back, #user_activation').slideUp();
					  }, 3000);
					})

			
				</script>
			<?php else: ?>
			<div id='activation_back'></div>
			<div id='user_activation'>
				<span style='display:none;'><?php echo $user_meta; ?></span>
				<span class='wrong_code'>Code doesn't match</span>
				<span style="display:inline-block;color:#B90504">Please verify your email  </span>
				<form id='activation_form' style="display:inline-block;">
					<div style='white-space:nowrap;'>
						<span style='color:white'>Activation Code:</span>
						<input class='v-code-field' style='display:inline-block;' type='text' name='v_code'/>
						<input type='hidden' name='user' value='<?php echo get_current_user_id(); ?>'>
						<input class='v_code_submit' type='submit' value='Check'/>
					</div>
					
				</form>
			</div>
		<?php endif; ?>
		<?php 
		endif;	
		
	}
?>
		<header id="masthead" class="site-header" role="banner">
<?php if(is_front_page()): ?>
<script>
	jQuery(function ($) {
	//$(document).ready(function(){

	//$('#soliloquy-image-5476').css('display', 'none');

	//});//end document ready

	/* NOTE (window).load fires when images have been fully loaded */

	$(window).load(function() {

	$('#jobify_widget_slider_hero-1').fadeIn();
	console.log('tessssst');

});
});
</script>
<?php /*<form class="job_filters_custom home_top_fixed" action='/dev/find-a-job' method="post">
	<?php if (is_front_page()): ?>
	<div class='top_bar_wrapper'>	
	<input type='hidden' name='front_page_search' value='true' />
	<?php endif; ?>
	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>

	<div class="search_jobs">
	<img class='secondary_logo' src='<?php echo get_template_directory_uri() . '/images/logo.png'; ?>' />
		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>
	

					
					<div class="custom_job_types">
						
						<div id='custom_job_type'>
							<span class='checkbox_label'>Job Type</span> 
							<div class='slide_check'>
						<?php
						foreach($job_types as $term):
							$term = $term->name; 
							?>
							<div class='check_wrap'><span><input class='job_type_checkbox' type="checkbox" name="filter_job_type[]" value="<?php echo $term ?>"/></span><span class='categ_span'><?php echo $term ?></span></div>
							<?php 
						endforeach;?>

							</div>
						</div>		
					</div>
		<div class="search_keywords">
			<label for="search_keywords"><?php _e( 'Keywords', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_keywords" id="search_keywords" placeholder="Type Keywords" value="<?php echo esc_attr( $keywords ); ?>" />
		</div>

		<div class="search_location fixed_home_bar">
			<label for="search_location"><?php _e( 'Location', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_location" id="search_location" placeholder="Type Location" value="<?php echo esc_attr( $location ); ?>" />
		</div>
					<div class="job_category fixed_home_bar">
						
						<?php $taxonomies = array( 
						    'job_listing_category',
						    'job_listing_type'
						);
						
						$args = array(
						    'orderby'           => 'name',
						    'hierarchical'      => true,
						    'hide_empty'   => 0,
						); 
						
						$job_categories = get_terms($taxonomies[0], $args);
						$job_types = get_terms($taxonomies[1], $args); ?>
						<div id='search_checkbox'> 
							<span class='checkbox_label'>Category</span>
							<div class='slide_check'>
						<?php
						foreach($job_categories as $term):
							$term = $term->name; 
							?>
							<div class='check_wrap'><span><input class='search_checkbox' type="checkbox" name="search_categ[]" value="<?php echo $term ?>"/></span><span class='categ_span'><?php echo $term ?></span></div>
							<?php 
						endforeach;?>

							</div>
						</div>			
					</div>



		<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
	</div>

	<?php do_action( 'job_manager_job_filters_end', $atts ); ?>
	</div>
</form>
*/?>
<div class="home_top_fixed">
	<div class='top_bar_wrapper'>
			<img class='secondary_logo' src='http://scoot.my/wp-content/themes/jobify/images/logo_scoot2.png' />
			<nav id="site-navigation" class="site-primary-navigation slide-left">
				<a href="#" class="primary-menu-toggle"><i class="icon-cancel-circled"></i> <span><?php _e( 'Close', 'jobify' ); ?></span></a>
				<?php get_search_form(); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu-primary' ) ); ?>
			</nav>
	</div>
</div>
<?php endif; ?>
			<div class="container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="site-branding">
					<?php $header_image = get_header_image(); ?>
					<h1 class="site-title">
						<?php if ( ! empty( $header_image ) ) : ?>
							<img src="<?php echo $header_image ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
						<?php endif; ?>

						<span><?php bloginfo( 'name' ); ?></span>
					</h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>

				<nav id="site-navigation" class="site-primary-navigation slide-left main-nav">
					<a href="#" class="primary-menu-toggle"><i class="icon-cancel-circled"></i> <span><?php _e( 'Close', 'jobify' ); ?></span></a>
					<?php get_search_form(); ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu-primary' ) ); ?>
				</nav>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<a href="#" class="primary-menu-toggle in-header"><i class="icon-menu"></i></a>
				<?php endif; ?>
			</div>

		</header><!-- #masthead -->

		<div id="main" class="site-main">
	<?php
		if ( is_front_page() ): 
	?>
		


	<?php 
		endif;
	?>