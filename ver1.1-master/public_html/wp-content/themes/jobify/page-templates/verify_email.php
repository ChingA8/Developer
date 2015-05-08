<?php
/**
 * Template Name: Verify Email
 *
 * @package Jobify
 * @since Jobify 1.0
 */
get_header();
	$v_code = $_GET['vcode'];
	if ( $v_code ) {
        
        $user = $_GET['user'];
        $page = $_GET['thepage'];
        $code = get_user_meta($user, 'v_code' , 'true');
        $perma = get_permalink($page);
 
        if($v_code == $code){


        	update_user_meta( $user, 'v_code', 'verified');

        	//$user_id = $user;
			//$user = get_user_by( 'id', $user_id ); 
			if( $user ) {
				wp_clear_auth_cookie();
    			wp_set_current_user ( $user );
    			wp_set_auth_cookie  ( $user);
			}
			?>
        	<script>
        	window.location.replace("<?php echo $perma;?>");
        	</script>
        	<?php
        }
        else{

        	echo'Code does not match';

        }

    }



get_footer();
?>

