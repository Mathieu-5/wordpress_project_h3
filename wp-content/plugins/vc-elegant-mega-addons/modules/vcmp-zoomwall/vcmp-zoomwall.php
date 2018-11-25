<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Zoom Wall
 * Description: Zoom Wall shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpZoomWall extends VcmpModule{

	const slug = 'vcmp_zoomwall';
	const base = 'vcmp_zoomwall';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Zoom Wall", "VCMP_SLUG"),
            "description" 	=> __("Add image galleries with zoom effect to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_zoomwall.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_zoomwall_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "zoomwall_img",
						"description" => __( "Please choose your gallery images.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
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
			'zoomwall_img' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_zoomwall', VCMP_URL . 'modules/vcmp-zoomwall/assets/css/vc_zoomwall.css');
		wp_enqueue_script( 'vc_zoomwall', VCMP_URL.'modules/vcmp-zoomwall/assets/js/vc_zoomwall.js', array('jquery'), '1.0', TRUE);
		
		$zoomwall_imgthmb= array();
		$images = explode(',', $zoomwall_img);
		
		$output .= '<div id="zoomwall" class="zoomwall '.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $zoomwall_imgthmb[$key] = $bigimage_array[0];
		
		$output .= '<img src="'.$bigimage_array[0].'" data-highres="'.$bigimage_array[0].'" />';
		
		}

		$output .='</div>';

      return $output;
	    
    }
	

}
// Finally initialize code
new VcmpZoomWall();