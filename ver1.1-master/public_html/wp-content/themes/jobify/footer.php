
<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package Jobify
 * @since Jobify 1.0
 */
?>

		</div><!-- #main -->

		<?php if ( jobify_theme_mod( 'jobify_cta', 'jobify_cta_display' ) ) : ?>
		<div class="footer-cta">
			<div class="container">
				
<h1>Have A Question For Us?</h1><br/>

We're here to help! Drop us an email at info@scoot.my OR call 03-7732 7732 to speak to one of our representatives.

			</div>
		</div>
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( is_active_sidebar( 'widget-area-footer' ) ) : ?>
			<div class="footer-widgets">
				<div class="container">
					<div class="row">

						<?php wp_nav_menu( array('menu' => 'footer' )); ?>
					</div>
					<div class='social_footer'>
						<a target="_blank" href='https://www.facebook.com/scootmalaysia?ref=aymt_homepage_panel'><img src='http://scoot.my/wp-content/uploads/2015/02/social_fb.png' /></a>
						<a target="_blank" href='https://mobile.twitter.com/ScootMY?p=s'><img src='http://scoot.my/wp-content/uploads/2015/02/social_tw.png' /></a>
						<!-- <img src='http://scoot.my/wp-content/uploads/2015/02/social_ig.png' /> -->
					</div>
					<div class='bottom_links'>
						<a href='http://scoot.my/privacy-policy'>Privacy Policy</a>|
						<a href='http://scoot.my/terms-and-conditions'>Terms & Conditions</a>|
						<a href='#'>Copyright</a>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="copyright">
				<div class="container">
					<div class="site-info">
						<?php echo apply_filters( 'jobify_footer_copyright', sprintf( __( '&copy; %1$s %2$s &mdash; All Rights Reserved', 'jobify' ), date( 'Y' ), get_bloginfo( 'name' ) ) ); ?>
					</div><!-- .site-info -->

					<a href="#top" class="btt"><i class="icon-up-circled"></i></a>

					<?php
						if ( has_nav_menu( 'footer' ) ) :
							$social = wp_nav_menu( array(
								'theme_location'  => 'footer',
								'container_class' => 'footer-social',
								'items_wrap'      => '%3$s',
								'depth'           => 1,
								'echo'            => false,
								'link_before'     => '<span class="screen-reader-text">',
								'link_after'      => '</span>',
							) );

							echo strip_tags( $social, '<a><div><span>' );
						endif;
					?>
				</div>
			</div>
			<?php if (is_single()): ?>
<?php endif; ?>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	<?php if($_POST['front_page_search']): ?>
		<script>


			jQuery(window).load(function($){
				jQuery('.search_submit input').click();
			});

			//window.location.replace("<?php echo get_home_url() ?>/cart");

			jQuery(document).ready(function($){
				$('.menu-item-2582 a').html('Welcome <?php echo $current_user->user_login; ?>');

				$('.bxslider').bxSlider({
							 auto: true,
						});
				$('.button-secondary').parent().addClass('center_button');
				$('.search_submit input').val('Search!');

			})

			jQuery(window).scroll(function(){
			    var scroll = jQuery(window).scrollTop();
			    var height = jQuery('.soliloquy-wrapper').height();
			    
			    if (scroll > height){
			    	jQuery('.home_top_fixed').slideDown();
			    }
			    else{
			    	jQuery('.home_top_fixed').slideUp();
			    }
			});

			jQuery(document).ready(function($){
					$('.button-secondary').parent().addClass('center_button');
					$('.search_submit input').val('Search!');
				})

			jQuery(document).ready(function($){
				jQuery('.bxslider').bxSlider({
							 auto: true,
						});
			})


		</script>	
	<?php endif;

				if($_GET['login'] == 'failed'){
	?>
					<script>
						jQuery(document).ready(function($){
							$('#login-modal a').click();
						});
						console.log('failed');
					</script>
		<?php
			}
		?>
					<script>
						jQuery(document).ready(function($){
							$('#hidden_job_manager #candidate_form').show();
						});
					</script>
<div style='display:none' id='hidden_job_manager'>
	<h1>This is the sign up form:</h1>
	<div class='jobify_signup_form'><?php echo do_shortcode('[jobify_register_form]'); ?></div>
	<h1>This is the submit form:</h1>
	<div class='submit_resume_temp'><?php echo do_shortcode('[submit_resume_form]'); ?></div>
</div>
</body>
</html>