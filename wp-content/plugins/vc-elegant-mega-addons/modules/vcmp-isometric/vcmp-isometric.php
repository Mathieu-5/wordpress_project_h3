<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Isometric Image Element
 * Description: Isometric Image shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpIsometric extends VcmpModule{

	const slug = 'vcmp_isometric';
	const base = 'vcmp_isometric';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Isometric Image", "VCMP_SLUG"),
            "description" => __("Add Isometric image to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmpisometric.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmpisometric_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "vcmpisometric_img",
						"description" => __( "Please choose your before image.", "VCMP_SLUG" ),
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
			'vcmpisometric_img' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_isometric', VCMP_URL . 'modules/vcmp-isometric/assets/css/vc_isometric.css');
		
		$vcmpisometric_img = wp_get_attachment_image_src(intval($vcmpisometric_img), 'full');
		$vcmpisometric_img = $vcmpisometric_img[0];
		
			
        $output .= '<div class="vcmpisometricbox '.esc_attr( $el_class ).'">
						<div class="vcmpisometricface"><img src="'.$vcmpisometric_img.'"></div>
						<div class="vcmpisometricshadow"></div>
					</div>
					';

	

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpIsometric();