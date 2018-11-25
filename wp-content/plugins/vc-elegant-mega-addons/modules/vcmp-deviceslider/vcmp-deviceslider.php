<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Device Slider
 * Description: Awesome device slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpDeviceSlider extends VcmpModule{

	const slug = 'vcmp_deviceslider';
	const base = 'vcmp_deviceslider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Device Slider", "VCMP_SLUG"),
            "description" => __("Add device slider to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_deviceslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_deviceslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "deviceslider_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
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
			'deviceslider_img' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_deviceslider', VCMP_URL . 'modules/vcmp-deviceslider/assets/css/vc-deviceslider.css');
		wp_enqueue_script( 'vc_deviceslider', VCMP_URL.'modules/vcmp-deviceslider/assets/js/vc-deviceslider.js', array('jquery'), '1.0', TRUE);
		
		$deviceslider_img = wp_get_attachment_image_src(intval($deviceslider_img), 'full');
		$deviceslider_img = $deviceslider_img[0];
		
		$output .= '<div class="vcmp_device_device '.esc_attr( $el_class ).'">
		  <div class="vcmp_device_phone">
			<div class="vcmp_device_camera"></div>
			<div class="vcmp_device_close"></div>
			<div class="vcmp_device_minimise"></div>
			<div class="vcmp_device_maximise"></div>
			<div class="vcmp_device_speaker"></div>
			<div class="vcmp_device_screen">
			  <div class="vcmp_device_scrollbar"></div>
			  <header>
				<div class="vcmp_device_menu">
				  <div class="vcmp_device_menu-bar"></div>
				  <div class="vcmp_device_menu-bar"></div>
				  <div class="vcmp_device_menu-bar"></div>
				</div>
			  </header>
			  <div class="vcmp_device_image" style="background: url('.$deviceslider_img.') no-repeat 50% 0 /cover"></div>
			  
			<div class="vcmp_device_button">
			  <div class="vcmp_device_inner-button"></div>
			</div>
		  </div>
		</div>';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpDeviceSlider();