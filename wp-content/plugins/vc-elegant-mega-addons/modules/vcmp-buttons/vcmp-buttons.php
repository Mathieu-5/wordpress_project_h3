<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Animated Buttons
 * Description: Awesome animated buttons shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpAnimButtons extends VcmpModule{

	const slug = 'vcmp_animbuttons';
	const base = 'vcmp_animbuttons';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
        add_action( 'init', array( $this, 'load_text_domain' ) );
	}

	
	public function load_text_domain() {
		load_plugin_textdomain("vc_animbuttons", false, '/' . basename(dirname(__FILE__)) . '/languages/'); // load plugin
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Animated Buttons", "VCMP_SLUG"),
            "description" => __("Add animated buttons to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_animbuttons_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_animbuttons.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_animbuttons_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "textfield",
						"heading" => __( "Button Text", "VCMP_SLUG" ),
						"param_name" => "animbuttons_text",
						"description" => __( "Please enter the button text.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Button Link URL", "VCMP_SLUG" ),
						"param_name" => "animbuttons_url",
						"description" => __( "Please enter the button link URL.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Button Animation", "VCMP_SLUG" ),
						"param_name" => "animbuttons_animation",
						"description" => __( "Please choose animation for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
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
						"param_name" => "animbuttons_alignment",
						"description" => __( "Please choose alignment for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Vertical", "VCMP_SLUG" ) => "vertical-button",
								__( "Horizontal", "VCMP_SLUG" ) => "horizontal-button"
							)
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Button Font Size", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_font_size",
					  	"description" => __( "Please enter icon font size for button. Ex: 14px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Button Font Color", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_font_color",
					  	"description" => __( "Please choose icon color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Button Background Color", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_background_color",
					  	"description" => __( "Please choose background color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Button Hover Font Color", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_hover_font_color",
					  	"description" => __( "Please choose icon color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Button Hover Background Color", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_hover_background_color",
					  	"description" => __( "Please choose background color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Button Border Radius", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_border_radius",
					  	"description" => __( "Please choose border radius for button. Ex:10px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Button Border Size", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_border_size",
					  	"description" => __( "Please choose border size for button. Ex:2px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Button Border Style", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_border_style",
					  	"description" => __( "Please choose border style for button. Ex:solid ,dotted, dashed, double, groove, ridge, inset, outset, initial, inherit, none", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Button Border Color", "VCMP_SLUG" ),
					  	"param_name" => "animbuttons_border_color",
					  	"description" => __( "Please choose border color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
					'group' => __( 'Custom fonts', 'VCMP_SLUG' ),
					'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
				),
				
				array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => '',
				'group' => __( 'Custom fonts', 'VCMP_SLUG' ),
				
						"dependency" => Array( 
								'element' => "use_theme_fonts",
								'value_not_equal_to' => array( 'yes' ),
							),
					
						'settings' => array(
							'fields' => array(
								'font_family_description' => __( 'Select font family.', 'VCMP_SLUG' ),
								'font_style_description' => __( 'Select font styling.', 'VCMP_SLUG' ),
							),
							
							
					),
				),

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					'admin_label' => true,
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
				),
				
				array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),

            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $animbuttons_text = $animbuttons_url = $animbuttons_animation = $animbuttons_alignment = $animbuttons_font_size = $animbuttons_font_color = $animbuttons_background_color = $animbuttons_hover_font_color = $animbuttons_hover_background_color = $animbuttons_border_radius = $animbuttons_border_size = $animbuttons_border_style = $animbuttons_border_color = $use_theme_fonts = $google_fonts = $google_fonts_family = $google_fonts_styles = $css = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'animbuttons_text' => '',
			'animbuttons_url' => '',
			'animbuttons_animation' => '',
			'animbuttons_alignment' => '',
			'animbuttons_font_size' => '',
			'animbuttons_font_color' => '',
			'animbuttons_background_color' => '',
			'animbuttons_hover_font_color' => '',
			'animbuttons_hover_background_color' => '',
			'animbuttons_border_radius' => '',
			'animbuttons_border_size' => '',
			'animbuttons_border_style' => '',
			'animbuttons_border_color' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_animbuttonsstyle', VCMP_URL . 'modules/vcmp-buttons/assets/vc_animbuttonsstyle.css');
		wp_enqueue_style( 'vc_hover', VCMP_URL . 'modules/vcmp-buttons/assets/vc_hover.css');
		
		/*GOOGLE FONTS*/
		$google_fonts_obj = new Vc_Google_Fonts();
		$google_fonts_data = $google_fonts_obj->_vc_google_fonts_parse_attributes( 
			array(
		        'font_family',
		        'font_style'
			), 
			$google_fonts
		);

		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		
		if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
			
			if ( $google_fonts_data['values']['font_family'] ) {
				$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
				
				$styles[] = 'font-family:' . $google_fonts_family[0];
				$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
				
				$styles[] = 'font-weight:' . $google_fonts_styles[1];
				$styles[] = 'font-style:' . $google_fonts_styles[2];
			
			}
		}
		
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
		} else {
			$style = '';
		}
		
		if ( ! empty( $google_fonts ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
		}
		/*GOOGLE FONTS*/
	  

		$output .= '<a href="' . $atts['animbuttons_url'] . '" target="_blank" class="animbutton '.$animbuttons_animation.' '.$animbuttons_alignment.' '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" style="font-size: '.$animbuttons_font_size.'; color: '.$animbuttons_font_color.'; background-color: '.$animbuttons_background_color.'; border: '.$animbuttons_border_size.' '.$animbuttons_border_style.' '.$animbuttons_border_color.'; border-radius: '.$animbuttons_border_radius.'; padding: 10px; " '.$style.'>'.$animbuttons_text.'</a>';
		
		$output .= '<style>
						.animbutton:hover {color: '.$animbuttons_hover_font_color.'; background-color: '.$animbuttons_hover_background_color.';}
						
						.animbutton.hvr-sweep-to-right:before, .animbutton.hvr-fade, .animbutton.hvr-back-pulse, .animbutton.hvr-sweep-to-left:before, .animbutton.hvr-sweep-to-bottom:before, .animbutton.hvr-sweep-to-top:before, .animbutton.hvr-bounce-to-right:before, .animbutton.hvr-bounce-to-left:before, .animbutton.hvr-bounce-to-bottom:before, .animbutton.hvr-bounce-to-top:before, .animbutton.hvr-radial-out:before, .animbutton.hvr-radial-in:before, .animbutton.hvr-rectangle-in:before, .animbutton.hvr-rectangle-out:before, .animbutton.hvr-shutter-in-horizontal:before, .animbutton.hvr-shutter-out-horizontal:before, .animbutton.hvr-shutter-in-vertical:before, .animbutton.hvr-shutter-out-vertical:before {border-radius: '.$animbuttons_border_radius.';}
						
						.animbutton.hvr-sweep-to-right:before, .animbutton.hvr-fade, .animbutton.hvr-back-pulse, .animbutton.hvr-sweep-to-left:before, .animbutton.hvr-sweep-to-bottom:before, .animbutton.hvr-sweep-to-top:before, .animbutton.hvr-bounce-to-right:before, .animbutton.hvr-bounce-to-left:before, .animbutton.hvr-bounce-to-bottom:before, .animbutton.hvr-bounce-to-top:before, .animbutton.hvr-radial-out:before, .animbutton.hvr-radial-in:before, .animbutton.hvr-rectangle-in:before, .animbutton.hvr-rectangle-out:before, .animbutton.hvr-shutter-in-horizontal:before, .animbutton.hvr-shutter-out-horizontal:before, .animbutton.hvr-shutter-in-vertical:before, .animbutton.hvr-shutter-out-vertical:before {border-radius: '.$animbuttons_border_radius.'; background-color: '.$animbuttons_hover_background_color.';}
						
					</style>
					';

	

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpAnimButtons();