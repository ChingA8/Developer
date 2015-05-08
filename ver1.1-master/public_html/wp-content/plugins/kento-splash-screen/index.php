<?php
/*
Plugin Name: Kento Splash Screen
Plugin URI: http://kentothemes.com
Description: splash screen for first visitors to display html content
Version: 1.3
Author: KentoThemes
Author URI: http://kentothemes.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


define('KENTO_SPLASH_SCREEN_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
function kento_splash_screen_script()
	{
	wp_enqueue_script('jquery');
	wp_enqueue_style('kento-splash-screen-style', KENTO_SPLASH_SCREEN_PLUGIN_PATH.'css/style.css');
	wp_enqueue_script('kento-splash-screen_ajax_js', plugins_url( '/js/kento-splash-screen-ajax.js' , __FILE__ ) , array( 'jquery' ));
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'kento-splash-screen-color-picker', plugins_url('/js/kento-splash-screen-ajax.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
add_action('init', 'kento_splash_screen_script');






function kento_splash_screen_cookie()
	{
		if (!isset($_COOKIE['kento_splash_screen']))
			{
				setcookie('kento_splash_screen', 1, time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
			}
	}
	
	
$kento_splash_screen_demo = get_option( 'kento_splash_screen_demo' );
	
if (!empty($kento_splash_screen_demo))
	{
		unset($_COOKIE['kento_splash_screen']);
	}
	
	
	
	
	
add_action( 'init', 'kento_splash_screen_cookie');
add_action('admin_init', 'kento_splash_screen_init' );
add_action('admin_menu', 'kento_splash_screen_menu');


function kento_splash_screen_settings(){
	include('kento-splash-screen-admin.php');	
}

function kento_splash_screen_menu() {
	add_menu_page(__('Kento Splash Screen','kentosplashscreen'), __('Kento Splash Screen','kentosplashscreen'), 'manage_options', 'kento_splash_screen_settings', 'kento_splash_screen_settings');
}


 function kento_splash_screen_init(){
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_bg_color');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_bg_img');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_border_size');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_border_color');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_content');	
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_demo');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_width');			
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_height');
	register_setting( 'kento_splash_screen_plugin_options', 'kento_splash_screen_left');	
		
    }




add_shortcode('kento-splash-screen', 'display_splash');

function display_splash()
	{
	?>
    
	<?php 
	
	 if (isset($_COOKIE['kento_splash_screen']))
		{
			 echo '';
		}
		else {
   
	 
	 $kento_splash_screen_bg_color = get_option( 'kento_splash_screen_bg_color' );
		 if(!empty($kento_splash_screen_bg_color))
			{
				$kento_splash_screen_bg_color = "background-color:".$kento_splash_screen_bg_color.";";
			}

	 $kento_splash_screen_bg_img = get_option( 'kento_splash_screen_bg_img' );
		 if(!empty($kento_splash_screen_bg_img))
			{
				$kento_splash_screen_bg_img = "background-image: url(".$kento_splash_screen_bg_img.");background-repeat:repeat;";
			}
		else
			{
			$kento_splash_screen_bg_img = "background-image: url('".KENTO_SPLASH_SCREEN_PLUGIN_PATH."css/screen.png');";
			}



	 $kento_splash_screen_border_color = get_option( 'kento_splash_screen_border_color' );
		 if(empty($kento_splash_screen_border_color))
			{
				$kento_splash_screen_border_color = "#fff";
			}

 
	 $kento_splash_screen_border_size = get_option( 'kento_splash_screen_border_size' );
		 if(!empty($kento_splash_screen_border_size))
			{
				$kento_splash_screen_border_size = "border:".$kento_splash_screen_border_size."px solid ".$kento_splash_screen_border_color.";";
			}
	 
	 
	 $kento_splash_screen_content = get_option( 'kento_splash_screen_content' );
	 $kento_splash_screen_width = get_option( 'kento_splash_screen_width' );	 
	 $kento_splash_screen_height = get_option( 'kento_splash_screen_height' );
	 $kento_splash_screen_left = get_option( 'kento_splash_screen_left' );	 	 
	 
    ?>
    
    
    <div id="kento-splash-screen-black" style="display:none;">
    </div>
    <div class="kento-splash-screen" style=" <?php  echo $kento_splash_screen_bg_color; echo $kento_splash_screen_border_size; echo $kento_splash_screen_bg_img; ?>display:none; width:<?php echo $kento_splash_screen_width; ?>px; height:<?php echo $kento_splash_screen_height; ?>px; left: <?php echo $kento_splash_screen_left; ?>%;"><?php echo  stripslashes($kento_splash_screen_content); ?></div>
    
    <script>
		jQuery('#kento-splash-screen-black').fadeIn("slow");
		jQuery('.kento-splash-screen').fadeIn("slow");
	
	</script>
    <?php
		 } 
	}


?>