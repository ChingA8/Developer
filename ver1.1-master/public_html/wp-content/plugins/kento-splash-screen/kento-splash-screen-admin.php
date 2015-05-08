<?php

	if(empty($_POST['kento_splash_screen_hidden']))
		{
			$kento_splash_screen_bg_color = get_option( 'kento_splash_screen_bg_color' );
			$kento_splash_screen_bg_img = get_option( 'kento_splash_screen_bg_img' );			
			$kento_splash_screen_border_size = get_option( 'kento_splash_screen_border_size' );
			$kento_splash_screen_border_color = get_option( 'kento_splash_screen_border_color' );
			$kento_splash_screen_content = get_option( 'kento_splash_screen_content' );			
			$kento_splash_screen_demo = get_option( 'kento_splash_screen_demo' );
			$kento_splash_screen_width = get_option( 'kento_splash_screen_width' );			
			$kento_splash_screen_height = get_option( 'kento_splash_screen_height' );
			$kento_splash_screen_left = get_option( 'kento_splash_screen_left' );					
		}
	else{
		if($_POST['kento_splash_screen_hidden'] == 'Y') {
		
		
		
		
			if(empty($_POST['kento_splash_screen_demo']))
				{
				$kento_splash_screen_demo ="";
				}
			else
				{
					$kento_splash_screen_demo = $_POST['kento_splash_screen_demo'];
				}
			update_option('kento_splash_screen_demo', $kento_splash_screen_demo);
		
		
		
		
		
		
		
		
		
		
		
			$kento_splash_screen_bg_color = $_POST['kento_splash_screen_bg_color'];
			update_option('kento_splash_screen_bg_color', $kento_splash_screen_bg_color);

			$kento_splash_screen_bg_img = $_POST['kento_splash_screen_bg_img'];
			update_option('kento_splash_screen_bg_img', $kento_splash_screen_bg_img);

			$kento_splash_screen_border_size = $_POST['kento_splash_screen_border_size'];
			update_option('kento_splash_screen_border_size', $kento_splash_screen_border_size);

			$kento_splash_screen_border_color = $_POST['kento_splash_screen_border_color'];
			update_option('kento_splash_screen_border_color', $kento_splash_screen_border_color);
			
			$kento_splash_screen_content = $_POST['kento_splash_screen_content'];
			update_option('kento_splash_screen_content', $kento_splash_screen_content);	

			$kento_splash_screen_width = $_POST['kento_splash_screen_width'];
			update_option('kento_splash_screen_width', $kento_splash_screen_width);				
			
			$kento_splash_screen_height = $_POST['kento_splash_screen_height'];
			update_option('kento_splash_screen_height', $kento_splash_screen_height);
			
			$kento_splash_screen_left = $_POST['kento_splash_screen_left'];
			update_option('kento_splash_screen_left', $kento_splash_screen_left);
			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p>
            </div>
            
            
            
            
			<?php
		} 
	}
?>


<div class="wrap skill-bars">
	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__('Kento Splash Screen Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="kento_splash_screen_hidden" value="Y">
        <?php settings_fields( 'kento_splash_screen_plugin_options' );
				do_settings_sections( 'kento_splash_screen_plugin_options' );
			
		?>

<table class="form-table">
               
<?php
	if(empty($_POST['kento_splash_screen_hidden']))
		{}
else{
?>

	<tr valign="top">
		<th scope="row">Use this Shortcode:
		</th>
		<td style="vertical-align:middle;">
			<input  type="text" name="kento_splash_screen_shortcode" onClick="this.select();" size="auto" id="kento-splash-screen-shortcode"  value ="[kento-splash-screen]"  > ** Use this shortcode to display splash screen.

		</td>
	</tr>   


<?php } ?>




	<tr valign="top">
		<th scope="row">Test Mode:
		</th>
		<td style="vertical-align:middle;">
			<input type="checkbox" name="kento_splash_screen_demo" size="7" id="kento-splash-screen-demo"  value ="1" <?php if ( $kento_splash_screen_demo == 1 ) echo "checked"; ?> >** Will popup for every refresh.

            
		</td>
	</tr>   


<tr valign="top">
		<th scope="row">Box Width:
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_width" size="7" id="kento-splash-screen-width"  value ="<?php if ( isset( $kento_splash_screen_width ) && !empty($kento_splash_screen_width) ) { echo $kento_splash_screen_width; } else { echo "500"; } ?>"> px

            
		</td>
	</tr>

<tr valign="top">
		<th scope="row">Box Height:
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_height" size="7" id="kento-splash-screen-height"  value ="<?php if ( isset( $kento_splash_screen_height ) && !empty($kento_splash_screen_height) ) { echo $kento_splash_screen_height; } else { echo "300"; } ?>"> px

            
		</td>
	</tr>

<tr valign="top">
		<th scope="row">Position Left(%):
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_left" size="7" id="kento-splash-screen-left"  value ="<?php if ( isset( $kento_splash_screen_left ) && !empty($kento_splash_screen_left) ) { echo $kento_splash_screen_left; } else { echo "30"; } ?>">% (**If you increase/decrease box width then you must adjust position left value.)

            
		</td>
	</tr>

	<tr valign="top">
		<th scope="row">Background Color:
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_bg_color" size="7" id="kento-splash-screen-bg-color"  value ="<?php if ( isset( $kento_splash_screen_bg_color ) ) echo $kento_splash_screen_bg_color; ?>"> 

            
		</td>
	</tr>
    
    
    
    
	<tr valign="top">
		<th scope="row">Background Image URL:
		</th>
		<td style="vertical-align:middle;">
		<input type="text" name="kento_splash_screen_bg_img" size="50"  id="kento-splash-screen-bg-img" value="<?php if ( isset( $kento_splash_screen_bg_img ) ) echo $kento_splash_screen_bg_img; ?>"  /><br />
            <div id="kento-splash-screen-bg-img-preview">
            <?php
            if(!empty($kento_splash_screen_bg_img))
				{
			?>
            <img src="" />
            <?php
            }
			?>
            </div>
     
  
		</td>
	</tr>    
    
    
	<tr valign="top">
		<th scope="row">Border Size:
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_border_size" size="7" id="kento-splash-screen-border-size"  value ="<?php if ( isset( $kento_splash_screen_border_size ) ) echo $kento_splash_screen_border_size; ?>">px
		</td>
	</tr>    
    
	<tr valign="top">
		<th scope="row">Border Color:
		</th>
		<td style="vertical-align:middle;">
			<input type="text" name="kento_splash_screen_border_color" size="7" id="kento-splash-screen-border-color"  value ="<?php if ( isset( $kento_splash_screen_border_color ) ) echo $kento_splash_screen_border_color; ?>">
		</td>
	</tr>    
    
	<tr valign="top">
		<th scope="row">HTML Content:
		</th>
		<td style="vertical-align:middle;">
        
        
        
        <?php

	wp_editor( stripslashes($kento_splash_screen_content), 'kento-splash-screen-content', $settings = array('textarea_name'=>'kento_splash_screen_content') );
		
		
		?>

           
		</td>
	</tr>     
</table>
                <p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


<script>
jQuery(document).ready(function(jQuery)
	{	
	var kento_splash_screen_bg_img = jQuery('#kento-splash-screen-bg-img').val();
	jQuery('#kento-splash-screen-bg-img-preview img').attr("src",kento_splash_screen_bg_img);
	jQuery('#kento-splash-screen-bg-color, #kento-splash-screen-border-color').wpColorPicker();
	});
</script> 
        
        
        
</div>
