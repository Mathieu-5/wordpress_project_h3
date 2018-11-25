<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Typed Text
 * Description: Typed Text shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpTyped extends VcmpModule{

	const slug = 'vcmp_typed';
	const base = 'vcmp_typed';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}


    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Typed Text", "VCMP_SLUG"),
            "description" 	=> __("Add Typed Text to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmptyped.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmptyped_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Typed Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter and make sure typed content text perline.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Font Size", "VCMP_SLUG" ),
					"param_name" => "vcmptyped_typed_fontsize",
					"description" => __( "Enter the font size for the text. Ex: 16px", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Color", "VCMP_SLUG" ),
					"param_name" => "vcmptyped_typed_color",
					"description" => __( "Choose the color for the text.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
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
      
	  $output = $el_class = $vcmptyped_typed_fontsize = $vcmptyped_typed_color = $css = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'vcmptyped_typed_fontsize' => '',
			'vcmptyped_typed_color' => '',
			'css' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_typed', VCMP_URL . 'modules/vcmp-typed/assets/css/vc_typed.css');
		wp_enqueue_script( 'vc_typed', VCMP_URL.'modules/vcmp-typed/assets/js/vc_typed.js', array('jquery'), '1.0', TRUE);

		$output .= '					
					<div class="vcmp-type-wrap '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">
						<div id="vcmp-typed-strings">'.wpautop( $content ).'</div>
						<span id="vcmp-typed" style="font-size: '.$vcmptyped_typed_fontsize.'; color: '.$vcmptyped_typed_color.'"></span>
					</div>					

					';

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpTyped();