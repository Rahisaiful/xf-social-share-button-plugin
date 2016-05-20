<?php
// create custom plugin settings menu
add_action('admin_menu', 'xf_social_create_menu');

function xf_social_create_menu() {

	//create new top-level menu
	add_menu_page('Social Media Plugin Settings', 'xf Share Button', 'administrator', __FILE__, 'xf_social_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'xf_register_mysettings' );
}


function xf_register_mysettings() {
	//register our settings
	register_setting( 'xf-social-settings-group', 'wrapper_class' );
	register_setting( 'xf-social-settings-group', 'a_tag_class' );
	register_setting( 'xf-social-settings-group', 'title_class' );
	register_setting( 'xf-social-settings-group', 'xf_share_title' );
}

function xf_social_settings_page() {
?>
<div class="wrap">
<h2>Xfactor Social Media</h2>
<p>For call share button any where use xf_social_sharing_buttons(); </p>
<form method="post" action="options.php">
    <?php settings_fields( 'xf-social-settings-group' ); ?>
    <?php do_settings_sections( 'xf-social-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Wrapper class</th>
		
        <td><input type="text" name="wrapper_class" value="<?php echo esc_attr( get_option('wrapper_class') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">A tag class</th>
        <td><input type="text" name="a_tag_class" value="<?php echo esc_attr( get_option('a_tag_class') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Title Class</th>
        <td><input type="text" name="title_class" value="<?php echo esc_attr( get_option('title_class') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Title</th>
        <td><input type="text" name="xf_share_title" value="<?php echo esc_attr( get_option('xf_share_title') ); ?>" /></td>
        </tr>
		
		</table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>