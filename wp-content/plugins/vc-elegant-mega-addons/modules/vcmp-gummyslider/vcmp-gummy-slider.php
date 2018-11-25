<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Gummy Slider
 * Description: Gummy slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGummySlider extends VcmpModule{

	const slug = 'vcmp_gummy_slider';
	const base = 'vcmp_gummy_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Gummy Slider", "VCMP_SLUG"),
            "description" => __("Add gummy slider to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_gummyslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_gummyslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Slider Images", "VCMP_SLUG" ),
						"param_name" => "gummyslider_img",
						"description" => __( "Please choose all images for the slider.", "VCMP_SLUG" ),
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
			'gummyslider_img' => '',
			'gummyslider_effect' => '',
		), 

		$atts ) );

		wp_enqueue_script( 'vc_gummy_slider', VCMP_URL.'modules/vcmp-gummyslider/assets/js/vc_gummy_slider.js', array('jquery'), '1.0', TRUE);
		
		$vc_gummy_bigthumbnails= array();
		$images = explode(',', $gummyslider_img);
		
		$output .= '<div class="gummy_slider '.esc_attr( $el_class ).'"><div class="gummy_slider_inner">
					
					';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(1200, 0));
        $vc_gummy_bigthumbnails[$key] = $bigimage_array[0];
		
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		
		$output .= '<div class="gummyslide" style="background: url('.$bigimage_array[0].') no-repeat; background-size: cover; background-position: center center; background-origin: initial;"></div>';
		
			}

		$output .= '</div>
						<nav class="gummy_slider_nav">
							<div class="active"></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</nav>
					</div>
	';
      return $output;
    }
	

}
// Finally initialize code
new VcmpGummySlider();