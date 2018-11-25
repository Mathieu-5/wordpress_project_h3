<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Floating Contact Bar
 * Description: Floating contact bar shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFloatingContact extends VcmpModule{

	const slug = 'vcmp_floatingcontact';
	const base = 'vcmp_floatingcontact';

	public function __construct(){
		
		
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
		

		// Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
		//add_action('wp_enqueue_scripts', 'add_floating_contact_options');
		add_action('wp_footer', 'add_floating_contact_options', 99);
		
		
		// This will be add menu icon to ourside of the main wrapper.
		function add_floating_contact_options() {
		
		$floatingz_index = get_option( 'vcmp_floatingz_index' );
		$fcb_facebook = get_option( 'vcmp_facebook_url' );
		$fcb_twitter = get_option( 'vcmp_twitter_url' );
		$fcb_linkedin = get_option( 'vcmp_linkedin_url' );
		$fcb_google = get_option( 'vcmp_google_url' );
		$fcb_instagram = get_option( 'vcmp_instagram_url' );
		$fcb_phone = get_option( 'vcmp_phone_number' );
		$fcb_email = get_option( 'vcmp_email_address' );
			
echo '
<script type="text/javascript">
jQuery(document).ready(function($) {
	// Initialize Share-Buttons
	$.contactButtons({
	  effect  : \'slide-on-scroll\',
	  buttons : { ';
	  
	if ( '' !== $fcb_facebook ) {
		echo'\'facebook\':   { class: \'facebook\', use: true, link: \''.$fcb_facebook.'\', extras: \'target="_blank"\' },';
	}
	if ( '' !== $fcb_twitter ) {
		echo'\'twitter\':    { class: \'twitter\', use: true, link: \''.$fcb_twitter.'\', extras: \'target="_blank"\' },';
	}
	if ( '' !== $fcb_linkedin ) {
		echo'\'linkedin\':   { class: \'linkedin\', use: true, link: \''.$fcb_linkedin.'\', extras: \'target="_blank"\'  },';
	}
	if ( '' !== $fcb_google ) {
		echo'\'google\':     { class: \'gplus\',    use: true, link: \''.$fcb_google.'\', extras: \'target="_blank"\'  },';
	}
	if ( '' !== $fcb_instagram ) {
		echo'\'instagram\':  { class: \'instagram\',    use: true, link: \''.$fcb_instagram.'\', extras: \'target="_blank"\'  },';
	}
	if ( '' !== $fcb_phone ) {
		echo'\'phone\':      { class: \'phone separated\',    use: true, link: \''.$fcb_phone.'\' },';
	}
	if ( '' !== $fcb_email ) {
		echo'\'email\':      { class: \'email\',    use: true, link: \''.$fcb_email.'\' }';
	}
	echo '}
	});
});
</script>
<style>#contact-buttons-bar { z-index: '.$floatingz_index.'; }</style>
';
		}
	}
	
	

	/*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function loadCssAndJs() {
		global $post;
			wp_enqueue_style( 'vc_floatingcontact', VCMP_URL . 'modules/vcmp-floatingcontact/assets/css/vc_floatingcontact.css');
			
			// If you need any javascript files on front end, here is how you can load them.
			wp_enqueue_script( 'vc_jquery.contact-buttons', VCMP_URL.'modules/vcmp-floatingcontact/assets/js/jquery.contact-buttons.js', array('jquery'), '1.0', TRUE);
    }
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Floating Contact Bar", "VCMP_SLUG"),
            "description" => __("Add floating contact bar to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_floatingcontact.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_floatingcontact_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
				),

            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = '';

		extract(shortcode_atts( array(
			'el_class' => '',
		), $atts ) );
		
    return $output;
	  
    }
	
	
	
	

}
// Finally initialize code
new VcmpFloatingContact();


// Settings
add_action('admin_menu', 'vcmp_floating_contact_bar', 11 );
add_action( 'admin_init', 'register_vcmp_floating_contactsettings' ); //call register settings function

function register_vcmp_floating_contactsettings() {
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_floatingz_index' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_facebook_url' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_twitter_url' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_linkedin_url' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_googleplus_url' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_instagram_url' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_phone_number' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_phone_number' );
	register_setting( 'vcmp_floating_contact_bar_group', 'vcmp_email_address' );
 } 

function vcmp_floating_contact_bar() 
{
    add_submenu_page(
        'vcmp', // Third party plugin Slug 
        'Floating Contact', 
        'Floating Contact', 
        'delete_plugins', 
        'vcmp_floating_contact', 
        'vcmp_floating_contact_bar_settings'
    );
}

function vcmp_floating_contact_bar_settings() 
{ 
   ?>
<div class="wrap">
<h2>Floating Contact Bar Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'vcmp_floating_contact_bar_group' ); ?>
    <?php do_settings_sections( 'vcmp_floating_contact_bar_group' ); ?>
	
    <table class="form-table">
	
		<tr valign="top">
			<th scope="row"><?php echo __( 'Floating Bar z-index', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_floatingz_index" value="<?php echo esc_attr( get_option('vcmp_floatingz_index') ); ?>" /></td>
        </tr>
        
		<tr valign="top">
			<th scope="row"><?php echo __( 'Facebook URL', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_facebook_url" value="<?php echo esc_attr( get_option('vcmp_facebook_url') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
			<th scope="row"><?php echo __( 'Twitter URL', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_twitter_url" value="<?php echo esc_attr( get_option('vcmp_twitter_url') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
			<th scope="row"><?php echo __( 'LinkedIN URL', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_linkedin_url" value="<?php echo esc_attr( get_option('vcmp_linkedin_url') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php echo __( 'Google+ URL', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_googleplus_url" value="<?php echo esc_attr( get_option('vcmp_googleplus_url') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php echo __( 'Instagram URL', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_instagram_url" value="<?php echo esc_attr( get_option('vcmp_instagram_url') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php echo __( 'Phone Number', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_phone_number" value="<?php echo esc_attr( get_option('vcmp_phone_number') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php echo __( 'Email Address', 'VCMP_SLUG' ) ?></th>
			<td><input type="text" name="vcmp_email_address" value="<?php echo esc_attr( get_option('vcmp_email_address') ); ?>" /></td>
        </tr>
    
		
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>