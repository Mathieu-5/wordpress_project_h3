<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Zoom
 * Description: Awesome image zoom shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageViewer extends VcmpModule{

	const slug = 'vcmp_imageviewer';
	const base = 'vcmp_imageviewer';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );	
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Zoom", "VCMP_SLUG"),
            "description" => __("Add image with zoom effect to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_imageviewer_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imageviewer.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imageviewer_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imageviewer_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Link URL", "VCMP_SLUG" ),
						"param_name" => "imageviewer_url",
						"description" => __( "Please enter the button link URL.", "VCMP_SLUG" ),
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
			'imageviewer_img' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imageviewercss', VCMP_URL . 'modules/vcmp-image-zoom/assets/css/vc-image-viewer-style.css');
		wp_enqueue_style( 'vc_imageviewer', VCMP_URL . 'modules/vcmp-image-zoom/assets/css/vc-imageviewer.css');
		wp_enqueue_script( 'vc_imageviewer_js', VCMP_URL.'modules/vcmp-image-zoom/assets/js/vc-imageviewer.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_ivtrigger_js', VCMP_URL.'modules/vcmp-image-zoom/assets/js/vc-ivtrigger.js', array('jquery'), '1.0', TRUE);
		
		$imageviewer_img = wp_get_attachment_image_src(intval($imageviewer_img), 'full');
		$imageviewer_img = $imageviewer_img[0];
		
		echo'<div id="image-gallery-3" class="cf '.esc_attr( $el_class ).'">';
	  
    $output .= '
				';

		$output .= '<img src="'.$imageviewer_img.'" data-high-res-src="'.$imageviewer_img.'" class="pannable-image">';

	echo'</div>';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpImageViewer();