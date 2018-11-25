<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Canvas Smoke
 * Description: Animated Canvas Smoke shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpCanvasAnime extends VcmpModule{

	const slug = 'vcmp_canvasanime';
	const base = 'vcmp_canvasanime';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Animated Canvas", "VCMP_SLUG"),
            "description" => __("Add animated canvas to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_canvasanime.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_canvasanime_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				
				array(
					"type" => "textfield",
					"heading" => __( "Canvas Title", "VCMP_SLUG" ),
					"param_name" => "vc_canvasanime_title",
					"description" => __( "Enter the canvas title text.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Content",
					"value" => ""
				),
				
				array(
					"type" => "textarea_html",
					"heading" => __( "Canvas Content", "VCMP_SLUG" ),
					"param_name" => "content",
					"description" => __( "Enter the canvas content.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Content",
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Canvas Title Font Size", "VCMP_SLUG" ),
					"param_name" => "vc_canvasanime_title_font_size",
					"description" => __( "Enter the canvas title font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Typography",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Canvas Title Color", "VCMP_SLUG" ),
					"param_name" => "vc_canvasanime_title_color",
					"description" => __( "Enter the canvas title color.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Typography",
					"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Canvas Title Weight", "vc_themeofwp_addon" ),
						"param_name" => "vc_canvasanime_title_weight",
						"description" => __( "Please choose a weight for the title.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Typography",
						"value" => array(
								__( "Light", "vc_themeofwp_addon" ) => "100",
								__( "Regular", "vc_themeofwp_addon" ) => "300",
								__( "Semi Bold", "vc_themeofwp_addon" ) => "400",
								__( "Bold", "vc_themeofwp_addon" ) => "600",
								__( "Extra Bold", "vc_themeofwp_addon" ) => "800"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Canvas Title Style", "vc_themeofwp_addon" ),
						"param_name" => "vc_canvasanime_title_style",
						"description" => __( "Please choose a style for the title.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Typography",
						"value" => array(
								__( "Normal", "vc_themeofwp_addon" ) => "normal",
								__( "Italic", "vc_themeofwp_addon" ) => "italic"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Canvas Title Alignment", "vc_themeofwp_addon" ),
						"param_name" => "vc_canvasanime_title_align",
						"description" => __( "Please choose a alignment for the title.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Typography",
						"value" => array(
								__( "Left", "vc_themeofwp_addon" ) => "left",
								__( "Right", "vc_themeofwp_addon" ) => "right",
								__( "Center", "vc_themeofwp_addon" ) => "center"
							)
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS.", "VCMP_SLUG" )
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
      
	  $output = $el_class = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'vc_canvasanime_title' => '',
			'vc_canvasanime_title_font_size' => '',
			'vc_canvasanime_title_color' => '',
			'vc_canvasanime_title_weight' => '',
			'vc_canvasanime_title_style' => '',
			'vc_canvasanime_title_align' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_canvasanime', VCMP_URL . 'modules/vcmp-canvasanime/assets/css/vc_canvasanime.css');
		wp_enqueue_script( 'vc_canvasanime', VCMP_URL.'modules/vcmp-canvasanime/assets/js/vc_canvasanime.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_prefixfree', VCMP_URL.'modules/vcmp-canvasanime/assets/js/prefixfree.min.js', array('jquery'), '1.0', TRUE);
		
		$output .= '
					<canvas id="vcmpc" class="vcmpccanvas '.esc_attr( $el_class ).' '.esc_attr( $css_class ).'"></canvas>
						<div class="vcmpccanvaswrapper"><h1 style="font-size:'.$vc_canvasanime_title_font_size.'; color:'.$vc_canvasanime_title_color.'; font-weight: '.$vc_canvasanime_title_weight.'; font-style: '.$vc_canvasanime_title_style.'; text-align: '.$vc_canvasanime_title_align.'; ">'.$vc_canvasanime_title.'</h1>
							'.wpautop(do_shortcode( $content )).'
						</div>
				';
		
      return $output;
	  
    }
	

}
// Finally initialize code
new VcmpCanvasAnime();