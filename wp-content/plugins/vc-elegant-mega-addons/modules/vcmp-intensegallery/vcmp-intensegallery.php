<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Intense Gallery
 * Description: Awesome intense gallery shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpIntensegallery extends VcmpModule{

	const slug = 'vcmp_intensegallery';
	const base = 'vcmp_intensegallery';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Intense Gallery", "VCMP_SLUG"),
            "description" => __("Add intense gallery to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_intensegallery.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_intensegallery_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "intensegallery_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Image Title", "VCMP_SLUG" ),
					"param_name" => "intensegallery_title",
					"description" => __( "Enter the title for the image.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textarea_html",
					"heading" => __( "Image Description", "VCMP_SLUG" ),
					"param_name" => "content",
					"description" => __( "Enter the description for the image.", "VCMP_SLUG" )
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
			'intensegallery_img' => '',
			'intensegallery_title' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_intensegallery', VCMP_URL . 'modules/vcmp-intensegallery/assets/css/vc-intensegallery.css');
		wp_enqueue_script( 'vc_intensegallery', VCMP_URL.'modules/vcmp-intensegallery/assets/js/vc-intensegallery.js', array('jquery'), '1.0', TRUE);
		
		$intensegallery_img = wp_get_attachment_image_src(intval($intensegallery_img), 'full');
		$intensegallery_img = $intensegallery_img[0];
		
		
		$output .= '<div style="background: url('.$intensegallery_img.') no-repeat scroll center/cover;" class="intensegallery-image '.esc_attr( $el_class ).'" data-image="'.$intensegallery_img.'" data-title="'.$intensegallery_title.'" data-caption="'.$content.'"></div>
		';


      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpIntensegallery();