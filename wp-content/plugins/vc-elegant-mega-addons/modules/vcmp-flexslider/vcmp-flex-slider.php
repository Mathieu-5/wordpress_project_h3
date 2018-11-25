<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Flex Slider
 * Description: Flex slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFlexSlider extends VcmpModule{

	const slug = 'vcmp_flex_slider';
	const base = 'vcmp_flex_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Flex Slider", "VCMP_SLUG"),
            "description" => __("Add flex slider to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_flexslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_flexslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Slider Images", "VCMP_SLUG" ),
						"param_name" => "flexslider_img",
						"description" => __( "Please choose images for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Slider Effect", "VCMP_SLUG" ),
						"param_name" => "flexslider_effect",
						"description" => __( "Please choose a effect for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Fade", "VCMP_SLUG" ) => "fade",
								__( "Slide", "VCMP_SLUG" ) => "slide",
								__( "Boxed", "VCMP_SLUG" ) => "boxed-soc",
								__( "Boxed outline", "VCMP_SLUG" ) => "boxed-outline-soc"
							)
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
			'flexslider_img' => '',
			'flexslider_effect' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_flexslider', VCMP_URL . 'modules/vcmp-flexslider/assets/css/flexslider.css');
		wp_enqueue_style( 'vc_flex_slider', VCMP_URL . 'modules/vcmp-flexslider/assets/css/vc_flex_slider.css');
		wp_enqueue_script( 'vc_flexslider', VCMP_URL.'modules/vcmp-flexslider/assets/js/jquery.flexslider.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_flex_slider', VCMP_URL.'modules/vcmp-flexslider/assets/js/vc_flex_slider.js', array('jquery'), '1.0', TRUE);
		
		$vc_flex_bigthumbnails= array();
		$images = explode(',', $flexslider_img);
		
		$output .= '<section class="gallery '.esc_attr( $el_class ).'"> <div class="flexslider"> <ul class="slides"> ';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_flex_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<li><img src="'.$bigimage_array[0].'"> <div class="text"><h3>'.$alt.'</h3></div></li>';
		
			}
			
		$output .= '</ul></div></section>';
		
		return $output;
    }
	

}
// Finally initialize code
new VcmpFlexSlider();