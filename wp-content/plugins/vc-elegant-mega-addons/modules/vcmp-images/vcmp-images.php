<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Animated Images
 * Description: Awesome animated images shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageEffects extends VcmpModule{

	const slug = 'vcmp_imageeffects';
	const base = 'vcmp_imageeffects';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );

		// Load the plugin text domain.
        add_action( 'init', array( $this, 'load_text_domain' ) );
	}
	
	public function load_text_domain() {
		load_plugin_textdomain("vc_imageeffects", false, '/' . basename(dirname(__FILE__)) . '/languages/'); // load plugin
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Animated Images", "VCMP_SLUG"),
            "description" => __("Add animated image to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_imageeffects_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imageeffects.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imageeffects_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imageeffects_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Link URL", "VCMP_SLUG" ),
						"param_name" => "imageeffects_url",
						"description" => __( "Please enter the image link URL.", "VCMP_SLUG" ),
						"value" => ""
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Image Animation", "VCMP_SLUG" ),
						"param_name" => "imageeffects_animation",
						"description" => __( "Please choose animation color for images.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Grow", "VCMP_SLUG" ) => "hvr-grow",
								__( "Shrink", "VCMP_SLUG" ) => "hvr-shrink",
								__( "Pulse", "VCMP_SLUG" ) => "hvr-pulse",
								__( "Pulse Grow", "VCMP_SLUG" ) => "hvr-pulse-grow",
								__( "Pulse Shrink", "VCMP_SLUG" ) => "hvr-pulse-shrink",
								__( "Push", "VCMP_SLUG" ) => "hvr-push",
								__( "Pop", "VCMP_SLUG" ) => "hvr-pop",
								__( "Bounce In", "VCMP_SLUG" ) => "hvr-bounce-in",
								__( "Bounce Out", "VCMP_SLUG" ) => "hvr-bounce-out",
								__( "Rotate", "VCMP_SLUG" ) => "hvr-rotate",
								__( "Grow Rotate", "VCMP_SLUG" ) => "hvr-grow-rotate",
								__( "Float", "VCMP_SLUG" ) => "hvr-float",
								__( "Sink", "VCMP_SLUG" ) => "hvr-sink",
								__( "Bob", "VCMP_SLUG" ) => "hvr-bob",
								__( "Hang", "VCMP_SLUG" ) => "hvr-hang",
								__( "Skew", "VCMP_SLUG" ) => "hvr-skew",
								__( "Skew Forward", "VCMP_SLUG" ) => "hvr-skew-forward",
								__( "Skew Backward", "VCMP_SLUG" ) => "hvr-skew-backward",
								__( "Wobble Horizontal", "VCMP_SLUG" ) => "hvr-wobble-horizontal",
								__( "Wobble Vertical", "VCMP_SLUG" ) => "hvr-wobble-vertical",
								__( "Wobble To Bottom Right", "VCMP_SLUG" ) => "hvr-wobble-to-bottom-right",
								__( "Wobble To Top Right", "VCMP_SLUG" ) => "hvr-wobble-to-top-right",
								__( "Wobble Top", "VCMP_SLUG" ) => "hvr-wobble-top",
								__( "Wobble Bottom", "VCMP_SLUG" ) => "hvr-wobble-bottom",
								__( "Wobble Skew", "VCMP_SLUG" ) => "hvr-wobble-skew",
								__( "Buzz", "VCMP_SLUG" ) => "hvr-buzz",
								__( "Buzz Out", "VCMP_SLUG" ) => "hvr-buzz-out",
								__( "Fade", "VCMP_SLUG" ) => "hvr-fade",
								__( "Back Pulse", "VCMP_SLUG" ) => "hvr-back-pulse",
								__( "Sweep To Right", "VCMP_SLUG" ) => "hvr-sweep-to-right",
								__( "Sweep To Left", "VCMP_SLUG" ) => "hvr-sweep-to-left",
								__( "Sweep To Bottom", "VCMP_SLUG" ) => "hvr-sweep-to-bottom",
								__( "Sweep To Top", "VCMP_SLUG" ) => "hvr-sweep-to-top",
								__( "Bounce To Right", "VCMP_SLUG" ) => "hvr-bounce-to-right",
								__( "Bounce To Left", "VCMP_SLUG" ) => "hvr-bounce-to-left",
								__( "Bounce To Bottom", "VCMP_SLUG" ) => "hvr-bounce-to-bottom",
								__( "Bounce To Top", "VCMP_SLUG" ) => "hvr-bounce-to-top",
								__( "Radial Out", "VCMP_SLUG" ) => "hvr-radial-out",
								__( "Radial In", "VCMP_SLUG" ) => "hvr-radial-in",
								__( "Rectangle In", "VCMP_SLUG" ) => "hvr-rectangle-in",
								__( "Rectangle Out", "VCMP_SLUG" ) => "hvr-rectangle-out",
								__( "Shutter In Horizontal", "VCMP_SLUG" ) => "hvr-shutter-in-horizontal",
								__( "Shutter Out Horizontal", "VCMP_SLUG" ) => "hvr-shutter-out-horizontal",
								__( "Shutter In Vertical", "VCMP_SLUG" ) => "hvr-shutter-in-vertical",
								__( "Shutter Out Vertical", "VCMP_SLUG" ) => "hvr-shutter-out-vertical",
								__( "Border Fade", "VCMP_SLUG" ) => "hvr-border-fade",
								__( "Hollow", "VCMP_SLUG" ) => "hvr-hollow",
								__( "Trim", "VCMP_SLUG" ) => "hvr-trim",
								__( "Ripple Out", "VCMP_SLUG" ) => "hvr-ripple-out",
								__( "Ripple In", "VCMP_SLUG" ) => "hvr-ripple-in",
								__( "Outline Out", "VCMP_SLUG" ) => "hvr-outline-out",
								__( "Outline In", "VCMP_SLUG" ) => "hvr-outline-in",
								__( "Round Corners", "VCMP_SLUG" ) => "hvr-round-corners",
								__( "Underline From Left", "VCMP_SLUG" ) => "hvr-underline-from-left",
								__( "Underline From Right", "VCMP_SLUG" ) => "hvr-underline-from-right",
								__( "Reveal", "VCMP_SLUG" ) => "hvr-reveal",
								__( "Underline Reveal", "VCMP_SLUG" ) => "hvr-underline-from-right",
								__( "Overline Reveal", "VCMP_SLUG" ) => "hvr-overline-reveal",
								__( "Overline From Left", "VCMP_SLUG" ) => "hvr-overline-from-left",
								__( "Overline From Center", "VCMP_SLUG" ) => "hvr-overline-from-center",
								__( "Overline From Right", "VCMP_SLUG" ) => "hvr-overline-from-right",
								__( "Shadow", "VCMP_SLUG" ) => "hvr-shadow",
								__( "Grow Shadow", "VCMP_SLUG" ) => "hvr-grow-shadow",
								__( "Float Shadow", "VCMP_SLUG" ) => "hvr-float-shadow",
								__( "Glow", "VCMP_SLUG" ) => "hvr-glow",
								__( "Grow Shadow", "VCMP_SLUG" ) => "hvr-grow-shadow",
								__( "Float Shadow", "VCMP_SLUG" ) => "hvr-float-shadow",
								__( "Glow", "VCMP_SLUG" ) => "hvr-glow",
								__( "Shadow Radial", "VCMP_SLUG" ) => "hvr-shadow-radial",
								__( "Box Shadow Outset", "VCMP_SLUG" ) => "hvr-box-shadow-outset",
								__( "Box Shadow Inset", "VCMP_SLUG" ) => "hvr-box-shadow-inset",
								__( "Bubble Top", "VCMP_SLUG" ) => "hvr-bubble-top",
								__( "Bubble Right", "VCMP_SLUG" ) => "hvr-bubble-right",
								__( "Bubble Bottom", "VCMP_SLUG" ) => "hvr-bubble-bottom",
								__( "Bubble Left", "VCMP_SLUG" ) => "hvr-bubble-left",
								__( "Bubble Float Top", "VCMP_SLUG" ) => "hvr-bubble-float-top",
								__( "Bubble Float Right", "VCMP_SLUG" ) => "hvr-bubble-float-right",
								__( "Bubble Float Bottom", "VCMP_SLUG" ) => "hvr-bubble-float-bottom",
								__( "Bubble Float Left", "VCMP_SLUG" ) => "hvr-bubble-float-left",
								__( "Curl Top Left", "VCMP_SLUG" ) => "hvr-curl-top-left",
								__( "Curl Top Right", "VCMP_SLUG" ) => "hvr-curl-top-right",
								__( "Curl Bottom Right", "VCMP_SLUG" ) => "hvr-curl-bottom-right",
								__( "Curl Bottom Left", "VCMP_SLUG" ) => "hvr-curl-bottom-left",
							)
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Alignment", "VCMP_SLUG" ),
						"param_name" => "imageeffects_alignment",
						"description" => __( "Please choose alignment for images.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Vertical", "VCMP_SLUG" ) => "vertical-button",
								__( "Horizontal", "VCMP_SLUG" ) => "horizontal-button"
							)
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Background Color", "VCMP_SLUG" ),
					  	"param_name" => "imageeffects_hover_background_color",
					  	"description" => __( "Please choose background color for images.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Image Border Radius", "VCMP_SLUG" ),
					  	"param_name" => "imageeffects_border_radius",
					  	"description" => __( "Please choose border radius for images. Ex:10px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Image Border Size", "VCMP_SLUG" ),
					  	"param_name" => "imageeffects_border_size",
					  	"description" => __( "Please choose border size for images. Ex:2px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Image Border Style", "VCMP_SLUG" ),
					  	"param_name" => "imageeffects_border_style",
					  	"description" => __( "Please choose border style for images. Ex:solid ,dotted, dashed, double, groove, ridge, inset, outset, initial, inherit, none", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Border Color", "VCMP_SLUG" ),
					  	"param_name" => "imageeffects_border_color",
					  	"description" => __( "Please choose border color for images.", "VCMP_SLUG" ),
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
			'imageeffects_img' => '',
			'imageeffects_url' => '',
			'imageeffects_animation' => '',
			'imageeffects_alignment' => '',
			'imageeffects_hover_background_color' => '',
			'imageeffects_border_radius' => '',
			'imageeffects_border_size' => '',
			'imageeffects_border_style' => '',
			'imageeffects_border_color' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imageeffectsstyle', VCMP_URL . 'modules/vcmp-images/assets/vc_imageeffectsstyle.css');
		wp_enqueue_style( 'vc_hover', VCMP_URL . 'modules/vcmp-images/assets/vc_hover.css');
		
		$imageeffects_img = wp_get_attachment_image_src(intval($imageeffects_img), 'full');
		$imageeffects_img = $imageeffects_img[0];
	  
    $output .= '<style>
						.imageeffect { border: '.$imageeffects_border_size.' '.$imageeffects_border_style.' '.$imageeffects_border_color.'; border-radius: '.$imageeffects_border_radius.'; padding: 10px; }
						
						.imageeffect:hover {background-color: '.$imageeffects_hover_background_color.';}
						
						.imageeffect.hvr-sweep-to-right:before, .imageeffect.hvr-fade, .imageeffect.hvr-back-pulse, .imageeffect.hvr-sweep-to-left:before, .imageeffect.hvr-sweep-to-bottom:before, .imageeffect.hvr-sweep-to-top:before, .imageeffect.hvr-bounce-to-right:before, .imageeffect.hvr-bounce-to-left:before, .imageeffect.hvr-bounce-to-bottom:before, .imageeffect.hvr-bounce-to-top:before, .imageeffect.hvr-radial-out:before, .imageeffect.hvr-radial-in:before, .imageeffect.hvr-rectangle-in:before, .imageeffect.hvr-rectangle-out:before, .imageeffect.hvr-shutter-in-horizontal:before, .imageeffect.hvr-shutter-out-horizontal:before, .imageeffect.hvr-shutter-in-vertical:before, .imageeffect.hvr-shutter-out-vertical:before {border-radius: '.$imageeffects_border_radius.';}
						
						.imageeffect.hvr-sweep-to-right:before, .imageeffect.hvr-fade, .imageeffect.hvr-back-pulse, .imageeffect.hvr-sweep-to-left:before, .imageeffect.hvr-sweep-to-bottom:before, .imageeffect.hvr-sweep-to-top:before, .imageeffect.hvr-bounce-to-right:before, .imageeffect.hvr-bounce-to-left:before, .imageeffect.hvr-bounce-to-bottom:before, .imageeffect.hvr-bounce-to-top:before, .imageeffect.hvr-radial-out:before, .imageeffect.hvr-radial-in:before, .imageeffect.hvr-rectangle-in:before, .imageeffect.hvr-rectangle-out:before, .imageeffect.hvr-shutter-in-horizontal:before, .imageeffect.hvr-shutter-out-horizontal:before, .imageeffect.hvr-shutter-in-vertical:before, .imageeffect.hvr-shutter-out-vertical:before {border-radius: '.$imageeffects_border_radius.'; background-color: '.$imageeffects_hover_background_color.';}
						
				</style>
				';

		$output .= '<a href="' . $atts['imageeffects_url'] . '" target="_blank" class="imageeffect '.$imageeffects_animation.' '.$imageeffects_alignment.' '.esc_attr( $el_class ).'"><img src="'.$imageeffects_img.'"></a>';

	

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpImageEffects();