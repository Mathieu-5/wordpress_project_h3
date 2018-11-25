<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Kenburn Slider
 * Description: Kenburn slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpKenburnSlider extends VcmpModule{

	const slug = 'vcmp_kenburns_slider';
	const base = 'vcmp_kenburns_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Kenburn Slider", "VCMP_SLUG"),
            "description" => __("Add kenburn slider to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_kenburnslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_kenburnslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Slider Images", "VCMP_SLUG" ),
						"param_name" => "kenburnslider_img",
						"description" => __( "Please choose images for the slider.", "VCMP_SLUG" ),
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
			'kenburnslider_img' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_kenburnsy', VCMP_URL . 'modules/vcmp-kenburnslider/assets/css/jquery.kenburnsy.css');
		wp_enqueue_script( 'vc_kenburnsy', VCMP_URL.'modules/vcmp-kenburnslider/assets/js/jquery.kenburnsy.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_velocity', VCMP_URL.'modules/vcmp-kenburnslider/assets/js/jquery.velocity.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_kenburnsy_trigger', VCMP_URL.'modules/vcmp-kenburnslider/assets/js/vc_kenburntrigger.js', array('jquery'), '1.0', TRUE);
		
		$vc_kenburns_bigthumbnails= array();
		$images = explode(',', $kenburnslider_img);
		
		$output .= '<div id="vcmp-kenburnslider" class="'.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_kenburns_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<img src="'.$bigimage_array[0].'" alt="'.$alt.'">';
		
		}

		$output .= '</div>';

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpKenburnSlider();