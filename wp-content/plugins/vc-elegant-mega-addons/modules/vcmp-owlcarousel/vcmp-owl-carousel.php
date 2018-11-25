<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Carousel
 * Description: Image carousel shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpOwlCarousel extends VcmpModule{

	const slug = 'vcmp_owl_carousel';
	const base = 'vcmp_owl_carousel';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'image_carousel_build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Carousel", "VCMP_SLUG"),
            "description" => __("Add image carousel to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "carousel Images", "VCMP_SLUG" ),
						"param_name" => "owlcarousel_img",
						"description" => __( "Please choose images for the carousel.", "VCMP_SLUG" ),
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
    public function image_carousel_build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $css = $owlcarousel_img ='';

		extract(shortcode_atts( array(
			'el_class' => '',
			'owlcarousel_img' => '',
			'css' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_owl.carousel', VCMP_URL . 'modules/vcmp-owlcarousel/assets/css/owl.carousel.css');
		wp_enqueue_style( 'vc_owl.theme', VCMP_URL . 'modules/vcmp-owlcarousel/assets/css/owl.theme.css');
		wp_enqueue_style( 'vc_owl.transitions', VCMP_URL . 'modules/vcmp-owlcarousel/assets/css/owl.transitions.css');
		wp_enqueue_style( 'vc_owl.css', VCMP_URL . 'modules/vcmp-owlcarousel/assets/css/vc_owl.css');
		wp_enqueue_script( 'vc_owl.carousel', VCMP_URL.'modules/vcmp-owlcarousel/assets/js/owl.carousel.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_owltrigger', VCMP_URL.'modules/vcmp-owlcarousel/assets/js/vc_owltrigger.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$vc_owl_bigthumbnails= array();
		$images = explode(',', $owlcarousel_img);
		
		$output .= '<div id="vcmp-owl-carousel" class="owl-carousel '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_owl_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<div class="item"><img class="owl-lazy" data-src="'.$bigimage_array[0].'" alt="'.$alt.'"></div>';
		
		}

		$output .= '</div>';

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpOwlCarousel();