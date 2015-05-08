<?php
/**
 * Register
 *
 * @package Jobify
 * @since Jobify 1.0
 */

$register = jobify_find_page_with_shortcode( array( 'jobify_register_form', 'register_form' ) );
$register = get_post( $register );
?>

<div id="register-modal-wrap" class="modal-register modal">
	<h2 class="modal-title">
		<!--<?php echo esc_attr( get_the_title( $register->ID ) ); ?>-->
		<img src="http://scoot.my/wp-content/uploads/2015/04/logo_scoot.png">
	</h2>

	<?php echo do_shortcode( get_post_field( 'post_content', $register->ID ) ); ?>
</div>

