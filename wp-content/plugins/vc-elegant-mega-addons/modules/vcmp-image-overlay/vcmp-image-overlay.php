<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Overlay With Hover Effects
 * Description: Image overlay with effects shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageOverlay extends VcmpModule{

	const slug = 'vcmp_imageoverlay';
	const base = 'vcmp_imageoverlay';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Overlay Effect", "VCMP_SLUG"),
            "description" => __("Add image overlay to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_imageoverlay_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imageoverlay.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imageoverlay_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imageoverlay_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Link URL", "VCMP_SLUG" ),
						"param_name" => "imageoverlay_url",
						"description" => __( "Please enter the image link URL.", "VCMP_SLUG" ),
						"value" => ""
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Image Effect", "VCMP_SLUG" ),
						"param_name" => "imageoverlay_effect",
						"description" => __( "Please choose a effect for image.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Effect 1", "VCMP_SLUG" ) => "ioeffect-1",
								__( "Effect 2", "VCMP_SLUG" ) => "ioeffect-2",
								__( "Effect 3", "VCMP_SLUG" ) => "ioeffect-3",
								__( "Effect 4", "VCMP_SLUG" ) => "ioeffect-4",
								__( "Effect 5", "VCMP_SLUG" ) => "ioeffect-5",
								__( "Effect 6", "VCMP_SLUG" ) => "ioeffect-6",
							)
				),
			
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Overlay Background Color", "VCMP_SLUG" ),
					  	"param_name" => "imageoverlay_background_color",
					  	"description" => __( "Please choose background color for the caption.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Overlay Icon Color", "VCMP_SLUG" ),
					  	"param_name" => "imageoverlay_icon_color",
					  	"description" => __( "Please choose border color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
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
			'imageoverlay_img' => '',
			'imageoverlay_url' => '',
			'imageoverlay_title' => '',
			'imageoverlay_subtitle' => '',
			'imageoverlay_effect' => '',
			'imageoverlay_background_color' => '',
			'imageoverlay_icon_color' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_image_overlay', VCMP_URL . 'modules/vcmp-image-overlay/assets/css/vc_image_overlay.css');
		wp_enqueue_script( 'vc_image_overlay', VCMP_URL . 'modules/vcmp-image-overlay/assets/js/vc_image_overlay.js', array('jquery'), '1.0', FALSE);
		
		$output .= '<div id="'.$imageoverlay_effect.'" class="ioeffects clearfix '.esc_attr( $el_class ).'">';
		
		$imageoverlay_img = wp_get_attachment_image_src(intval($imageoverlay_img), 'full');
		$imageoverlay_img = $imageoverlay_img[0];
		$alt = get_post_meta(intval($imageoverlay_img), '_wp_attachment_image_alt', true);
			
        $output .= '<div class="ioimg">
						<img src="'.$imageoverlay_img.'" alt="'.$alt.'">
						<div class="iooverlay" style="background: '.$imageoverlay_background_color.'">
							<a href="' . $atts['imageoverlay_url'] . '" class="ioexpand" style="color: '.$imageoverlay_icon_color.'; border-color:'.$imageoverlay_icon_color.'; ">+</a>
							<a class="ioclose-overlay iohidden">x</a>
						</div>
					</div>
					';

		$output .= '</div>';

	

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpImageOverlay();