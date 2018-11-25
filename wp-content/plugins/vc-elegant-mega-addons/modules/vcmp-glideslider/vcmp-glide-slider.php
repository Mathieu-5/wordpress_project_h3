<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Glide Slider
 * Description: Glide slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGlideSlider extends VcmpModule{

	const slug = 'vcmp_glide_slider';
	const base = 'vcmp_glide_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Glide Slider", VCMP_SLUG),
            "description" => __("Add glide slider to your page.", VCMP_SLUG),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_glideslider.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_glideslider_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Slider Images", VCMP_SLUG ),
						"param_name" => "glideslider_img",
						"description" => __( "Please choose all images for the slider.", VCMP_SLUG ),
						"value" => ""
				),
				
				array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', VCMP_SLUG ),
						'param_name' => 'css',
						'group' => __( 'Design options', VCMP_SLUG ),
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", VCMP_SLUG ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", VCMP_SLUG )
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
			'css' => '',
			'glideslider_img' => '',
			'glideslider_effect' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_glide_core', VCMP_URL . 'modules/vcmp-glideslider/assets/css/glide.core.css');
		wp_enqueue_style( 'vc_glide_theme', VCMP_URL . 'modules/vcmp-glideslider/assets/css/glide.theme.css');
		wp_enqueue_style( 'vc_glide_slider', VCMP_URL . 'modules/vcmp-glideslider/assets/css/vc_glide_slider.css');
		wp_enqueue_script( 'vc_glide', VCMP_URL.'modules/vcmp-glideslider/assets/js/glide.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_glide_slider', VCMP_URL.'modules/vcmp-glideslider/assets/js/vc_glide_slider.js', array('jquery'), '1.0', TRUE);
		
		$vc_glide_bigthumbnails= array();
		$images = explode(',', $glideslider_img);
		
		$output .= '<div id="Glide" class="slider glide is-loading '.esc_attr( $el_class ).' '.esc_attr( $css_class ).'">

					<div class="slider__arrows glide__arrows">
						<button class="slider__arrow glide__arrow next" data-glide-dir=">">next</button>
						<button class="slider__arrow glide__arrow prev" data-glide-dir="<">prev</button>
					</div>
					
					<div class="slider__wrapper glide__wrapper is-hidden">
						<ul class="slider__track glide__track">
					
					';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(1024, 0));
        $vc_glide_bigthumbnails[$key] = $bigimage_array[0];
		
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<li class="slider__slide glide__slide"><div class="bg i-1" style="background: url('.$bigimage_array[0].') no-repeat center center/cover"></div></li>';
		
			}

		$output .= '</ul>
					</div>
						<div class="slider__bullets glide__bullets"></div>
					</div>
					';


      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpGlideSlider();