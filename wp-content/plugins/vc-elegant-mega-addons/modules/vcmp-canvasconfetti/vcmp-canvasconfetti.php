<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module:	Canvas Confetti
 * Description: Animated Canvas Confetti shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpCanvasConfetti extends VcmpModule{

	const slug = 'vcmp_canvasconfetti';
	const base = 'vcmp_canvasconfetti';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Animated Canvas Confetti", "VCMP_SLUG"),
            "description" => __("Add animated canvas confetti to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_canvasconfetti.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_canvasconfetti_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
					"type" => "colorpicker",
					"heading" => __( "Canvas Background Color", "VCMP_SLUG" ),
					"param_name" => "canvasconfetti_bg_color",
					"description" => __( "Choose the canvas background color.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array( 
						"type" => "attach_image",
						"heading" => __( "Canvas Background Image", "VCMP_SLUG" ),
						"param_name" => "canvasconfetti_bgimg",
						"description" => __( "Please choose a image for the canvas.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
							
				array(
					"type" => "textfield",
					"heading" => __( "Canvas Title", "VCMP_SLUG" ),
					"param_name" => "canvasconfetti_title",
					"description" => __( "Enter the canvas title text", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Canvas Title Font_Size", "VCMP_SLUG" ),
					"param_name" => "canvasconfetti_title_font_size",
					"description" => __( "Choose the canvas title font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Canvas Title Color", "VCMP_SLUG" ),
					"param_name" => "canvasconfetti_title_color",
					"description" => __( "Choose the canvas title color.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textarea_html",
					"heading" => __( "Canvas Content", "VCMP_SLUG" ),
					"param_name" => "content",
					"description" => __( "Enter the canvas content", "VCMP_SLUG" ),
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
			'canvasconfetti_bg_color' => '',
			'canvasconfetti_bgimg' => '',
			'canvasconfetti_title' => '',
			'canvasconfetti_title_font_size' => '',
			'canvasconfetti_title_color' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_canvasconfetti', VCMP_URL . 'modules/vcmp-canvasconfetti/assets/css/vc_canvasconfetti.css');
		wp_enqueue_script( 'vc_canvasconfetti', VCMP_URL.'modules/vcmp-canvasconfetti/assets/js/vc_canvasconfetti.js', array('jquery'), '1.0', TRUE);
		
		$canvasconfetti_bgimg = wp_get_attachment_image_src(intval($canvasconfetti_bgimg), 'full');
		$canvasconfetti_bgimg = $canvasconfetti_bgimg[0];
		
		$output .= '<canvas id="canvasconfetti" class="vcmpccanvasconfetti '.esc_attr( $el_class ).'" style="background: '.$canvasconfetti_bg_color.' url('.$canvasconfetti_bgimg.') no-repeat fixed center"></canvas><div class="vcmpccanvasconfettiwrapper"><h1 style="font-size:'.$canvasconfetti_title_font_size.'; color: '.$canvasconfetti_title_color.'">'.$canvasconfetti_title.'<h1><p>'.do_shortcode( $content ).'</p></div>';
		
		
      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpCanvasConfetti();