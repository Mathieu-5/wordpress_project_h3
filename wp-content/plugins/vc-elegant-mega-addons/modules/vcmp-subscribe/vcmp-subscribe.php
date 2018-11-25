<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Subscribe Form
 * Description: Subscribe Form shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpSubscribe extends VcmpModule{

	const slug = 'vcmp_subscribe';
	const base = 'vcmp_subscribe';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 				=> __("Subscribe Form", "VCMP_SLUG"),
            "description" 		=> __("Add Subscribe form to your page.", "VCMP_SLUG"),
            "base" 				=> self::base,
            "class" 			=> "",
            "controls" 			=> "full",
            "icon" 				=> "icon-vc-elegant-mega",
            "category" 			=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmpsubscribe.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmpsubscribe_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				
				array( 
						"type" => "textfield",
						"heading" => __( "Title", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_title",
						"description" => __( "Please enter a name for the form title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Title Font Size", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_title_font_size",
						"description" => __( "Please enter font size for the form title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Title Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_titlecolor",
						"description" => __( "Please choose a color for the title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Height", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_height",
						"description" => __( "Please enter height. Ex:200px", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
			
				array( 
						"type" => "colorpicker",
						"heading" => __( "Background Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_bgcolor",
						"description" => __( "Please choose a color for the form.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Text Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_textcolor",
						"description" => __( "Please choose a color for the text color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter short description for form.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Content Font Size", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_text_font_size",
						"description" => __( "Please enter font size for the form content.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Button Title", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_buttontitle",
						"description" => __( "Please enter a title for the button.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Button Background Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_buttonbgcolor",
						"description" => __( "Please choose a color for the button.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
						
				array( 
						"type" => "colorpicker",
						"heading" => __( "Button Text Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_buttontextcolor",
						"description" => __( "Please choose a color for the button text.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Form Background Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_form_bg",
						"description" => __( "Please choose a color for the form.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Form Title", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_form_title",
						"description" => __( "Please enter a name for the form title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Form Title Font Size", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_form_title_font_size",
						"description" => __( "Please enter font size for the form title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Form Title Color", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_form_titlecolor",
						"description" => __( "Please choose a color for the title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textfield",
						"heading" => __( "Form Action URL", "VCMP_SLUG" ),
						"param_name" => "vcmpsubscribe_actionurl",
						"description" => __( "Please choose a color for the button link url.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),

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
			'vcmpsubscribe_title' => '',
			'vcmpsubscribe_title_font_size' => '',
			'vcmpsubscribe_titlecolor' => '',
			'vcmpsubscribe_height' => '',
			'vcmpsubscribe_bgcolor' => '',
			'vcmpsubscribe_textcolor' => '',
			'vcmpsubscribe_text_font_size' => '',
			'vcmpsubscribe_buttontitle' => '',
			'vcmpsubscribe_buttonbgcolor' => '',
			'vcmpsubscribe_buttontextcolor' => '',
			'vcmpsubscribe_form_title' => '',
			'vcmpsubscribe_form_bg' => '',
			'vcmpsubscribe_form_title_font_size' => '',
			'vcmpsubscribe_form_titlecolor' => '',
			'vcmpsubscribe_actionurl' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_subscribe', VCMP_URL . 'modules/vcmp-subscribe/assets/css/vc_subscribe.css');
		wp_enqueue_script( 'vc_subscribe', VCMP_URL.'modules/vcmp-subscribe/assets/js/vc_subscribe.js', array('jquery'), '1.0', TRUE);

		$output =	'
					<div class="vcmp_subscribe_form '.esc_attr( $el_class ).'" style="background: '.$vcmpsubscribe_bgcolor.'; color: '.$vcmpsubscribe_textcolor.'; height: '.$vcmpsubscribe_height.';">
						<h1 class="vcmp_subscribe_fade" style="font-size: '.$vcmpsubscribe_title_font_size.'; color: '.$vcmpsubscribe_titlecolor.';">'.$vcmpsubscribe_title.'</h1>
						<p style="font-size: '.$vcmpsubscribe_text_font_size.'; color: '.$vcmpsubscribe_textcolor.'">'.do_shortcode( strip_tags( $content ) ) .'</p>
						<button type="button" class="vcmp_subscribe_fade vcmp_subscribe_show vcmp_subscribe_btn" style="background: '.$vcmpsubscribe_buttonbgcolor.'; color: '.$vcmpsubscribe_buttontextcolor.';">'.$vcmpsubscribe_buttontitle.'</button>
					  </div>
					  

					<div id="vcmp_subscribe_form" style="background: '.$vcmpsubscribe_form_bg.'; height: '.$vcmpsubscribe_height.';">
					  <h2 style="font-size: '.$vcmpsubscribe_form_title_font_size.'; color: '.$vcmpsubscribe_form_titlecolor.';">'.$vcmpsubscribe_form_title.'</h2>
						<form action="'.$vcmpsubscribe_actionurl.'" target="_blank">
						 <input type="text" placeholder="'.__( "Enter Your Email", "VCMP_SLUG" ).'">
						 <input type="submit">
					   </form>
					  <button class="vcmp_subscribe_btn vcmp_subscribe_close">'.__( "Close x", "VCMP_SLUG" ).'</button>
					</div>
					';

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpSubscribe();