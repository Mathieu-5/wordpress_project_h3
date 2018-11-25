<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Counter
 * Description: Counter shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpCounter extends VcmpModule{

	const slug = 'vcmp_counter';
	const base = 'vcmp_counter';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Counter", "VCMP_SLUG"),
            "description" => __("Add counter to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_counter.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_counter_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "textfield",
						"heading" => __( "Count", "VCMP_SLUG" ),
						"param_name" => "counter_count",
						"description" => __( "Enter the count number ex: 50.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Color", "VCMP_SLUG" ),
						"param_name" => "counter_color",
						"description" => __( "Please choose the counter color.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
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
			'counter_count' => '',
			'counter_color' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_counter_css', VCMP_URL . 'modules/vcmp-counter/assets/css/vc-counter.css');
		wp_enqueue_script( 'vc_easypiechart', VCMP_URL.'modules/vcmp-counter/assets/js/jquery.easypiechart.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_counter', VCMP_URL.'modules/vcmp-counter/assets/js/vc-counter.js', array('jquery'), '1.0', TRUE);
		
		$output .= '<section class="vcmpcounter '.esc_attr( $el_class ).'">
						<div class="box-counter">
						  <div class="pie" data-percent="25">
							<span class="count" style="color:'.$counter_color.'">
							  '.$counter_count.'
							</span>
						  </div>
						</div>
					</section>
					';

      return $output;
	  
    }
	

}
// Finally initialize code
new VcmpCounter();