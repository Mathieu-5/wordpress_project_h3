<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Magnify
 * Description: Awesome image magnify shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageMagnify extends VcmpModule{

	const slug = 'vcmp_imagemagnify';
	const base = 'vcmp_imagemagnify';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Magnify", "VCMP_SLUG"),
            "description" => __("Add image with magnify effect to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imagemagnify.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imagemagnify_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imagemagnify_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Image Width", "VCMP_SLUG" ),
					"param_name" => "imagemagnify_width",
					"description" => __( "Please enter the image width. Ex:200", "VCMP_SLUG" ),
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
			'imagemagnify_img' => '',
			'imagemagnify_width' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imagemagnify', VCMP_URL . 'modules/vcmp-image-magnify/assets/css/vc-imagemagnify.css');
		wp_enqueue_script( 'vc_imagemagnify', VCMP_URL.'modules/vcmp-image-magnify/assets/js/vc-imagemagnify.js', array('jquery'), '1.0', TRUE);
		
		$imagemagnify_img = wp_get_attachment_image_src(intval($imagemagnify_img), 'full');
		$imagemagnify_img = $imagemagnify_img[0];
		$alt = get_post_meta(intval($imagemagnify_img), '_wp_attachment_image_alt', true);
		
		$output .= '<div class="vcmp_magnify '.esc_attr( $el_class ).'"><div class="vcmp_magnify_large" style="background: url('.$imagemagnify_img.') no-repeat;"></div>';
		
		$output .= '<img class="vcmp_magnify_small" src="'.$imagemagnify_img.'" alt="'.$alt.'" width="'.$imagemagnify_width.'">';
		
		$output .='</div>';
		
      return $output;

    }
	

}
// Finally initialize code
new VcmpImageMagnify();