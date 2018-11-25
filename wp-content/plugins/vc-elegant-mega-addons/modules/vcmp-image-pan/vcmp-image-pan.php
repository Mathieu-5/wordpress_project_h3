<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Pan
 * Description: Awesome image pan shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImagePan extends VcmpModule{

	const slug = 'vcmp_imagepan';
	const base = 'vcmp_imagepan';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );		
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Pan", "VCMP_SLUG"),
            "description" => __("Add image with pan effect to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imagepan.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imagepan_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imagepan_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Height", "VCMP_SLUG" ),
					"param_name" => "imagepan_height",
					"description" => __( "Enter the height for the pan item. Default is 300px", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Padding", "VCMP_SLUG" ),
					"param_name" => "imagepan_padding",
					"description" => __( "Enter the padding for the pan item. Default is 10px", "VCMP_SLUG" )
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Background Color", "VCMP_SLUG" ),
					"param_name" => "imagepan_background",
					"description" => __( "Choose the background for the pan item. Default is black", "VCMP_SLUG" )
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
			'imagepan_img' => '',
			'imagepan_height' => '',
			'imagepan_padding' => '',
			'imagepan_background' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imagepan_css', VCMP_URL . 'modules/vcmp-image-pan/assets/css/vc-imagepan.css');
		wp_enqueue_script( 'vc_pantrigger_js', VCMP_URL.'modules/vcmp-image-pan/assets/js/vc-pantrigger.js', array('jquery'), '1.0', TRUE);
		
		$imagepan_img = wp_get_attachment_image_src(intval($imagepan_img), 'full');
		$imagepan_img = $imagepan_img[0];
		$alt = get_post_meta(intval($imagepan_img), '_wp_attachment_image_alt', true);
		
		$output .= '<div class="pancontent '.esc_attr( $el_class ).'" style="height:'.$imagepan_height.'; padding:'.$imagepan_padding.'; background:'.$imagepan_background.';">';

		$output .= '<img src="'.$imagepan_img.'" alt="'.$alt.'">';

		$output .='</div>';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpImagePan();