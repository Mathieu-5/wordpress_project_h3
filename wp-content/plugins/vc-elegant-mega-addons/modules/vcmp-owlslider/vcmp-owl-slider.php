<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Owl Slider
 * Description: Owl slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.1
 */

class VcmpOwlSlider extends VcmpModule{

	const slug = 'vcmp_owl_slider';
	const base = 'vcmp_owl_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Owl Slider", "VCMP_SLUG"),
            "description" => __("Add owl slider to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_owlslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_owlslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Slider Images", "VCMP_SLUG" ),
						"param_name" => "owlslider_img",
						"description" => __( "Please choose images for the slider.", "VCMP_SLUG" ),
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
			'owlslider_img' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_owl.slider', VCMP_URL . 'modules/vcmp-owlslider/assets/css/owl.carousel.css');
		wp_enqueue_style( 'vc_owl.slider.theme', VCMP_URL . 'modules/vcmp-owlslider/assets/css/owl.theme.css');
		wp_enqueue_style( 'vc_owl.slider.transitions', VCMP_URL . 'modules/vcmp-owlslider/assets/css/owl.transitions.css');
		wp_enqueue_style( 'vc_owl.slider.css', VCMP_URL . 'modules/vcmp-owlslider/assets/css/vc_owl.css');
		wp_enqueue_script( 'vc_owl.slider', VCMP_URL.'modules/vcmp-owlslider/assets/js/owl.carousel.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_owl.slider.trigger', VCMP_URL.'modules/vcmp-owlslider/assets/js/vc_owltrigger.js', array('jquery'), '1.0', TRUE);
		
		$vc_owl_bigthumbnails= array();
		$images = explode(',', $owlslider_img);
		
		$output .= '<div id="vcmp-owl-slider" class="owl-carousel owl-theme '.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_owl_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<div class="item"><img src="'.$bigimage_array[0].'" alt="'.$alt.'"></div>';
		
		}

		$output .= '</div>';

		return $output;
    }
}
// Finally initialize code
new VcmpOwlSlider();