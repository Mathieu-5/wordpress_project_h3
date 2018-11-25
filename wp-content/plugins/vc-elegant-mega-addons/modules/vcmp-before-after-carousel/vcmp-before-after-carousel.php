<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Before After Carousel Carousel
 * Description: Before After Carousel Carousel shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpBeforeAfterCarousel extends VcmpModule{

	const slug = 'vcmp_beforeafter_carousel';
	const base = 'vcmp_beforeafter_carousel';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'before_after_carousel_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'before_after_carousel_content_shortcode_vc' ) );
		
		add_shortcode( 'beforeafter_carousel', array( $this, 'vc_before_after_carousel_shortcode' ));
		add_shortcode( 'beforeafter_carousel_content', array( $this, 'vc_before_after_carousel_content_shortcode' ));	
	}
	
	// Parent Element
	public function before_after_carousel_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Before After Carousel' , 'VCMP_SLUG' ),
				'base'                    => 'beforeafter_carousel',
				'description'             => __( 'Add before after carousel to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'beforeafter_carousel_content'), 
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
					
					vc_map_add_css_animation( true ),
					
					array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),
				),
			) 
		);
	}

	
 
    public function before_after_carousel_content_shortcode_vc(){
        vc_map( array(
            "name" => __("Before After Carousel", "VCMP_SLUG"),
            "description" => __("Add before after carousel to your page.", "VCMP_SLUG"),
            'base'            => 'beforeafter_carousel_content',
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-beforeaftercarousel-page",
            "category" => "Elegant Mega Addons",
			'content_element' => true,
			'as_child'        => array('only' => 'beforeafter_carousel'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_beforeimg",
						"description" => __( "Please choose your before image.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Before",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Label", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_before_label",
						"description" => __( "Please enter the before label.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Before",
						"value" => ""
				),
				
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_afterimg",
						"description" => __( "Please choose your after image.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "After",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Label", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_after_label",
						"description" => __( "Please enter the after label.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "After",
						"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Orientation", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_orientation",
						"description" => __( "Please choose orientation.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose orientation", "vc_themeofwp_addon" ) => "",
								__( "Horizontal", "vc_themeofwp_addon" ) => "horizontal",
								__( "Vertical", "vc_themeofwp_addon" ) => "vertical"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Ofset", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeaftercarousel_ofset",
						"description" => __( "Please choose ofset.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose ofset", "vc_themeofwp_addon" ) => "0.1",
								__( "0.1", "vc_themeofwp_addon" ) => "0.1",
								__( "0.2", "vc_themeofwp_addon" ) => "0.2",
								__( "0.3", "vc_themeofwp_addon" ) => "0.3",
								__( "0.4", "vc_themeofwp_addon" ) => "0.4",
								__( "0.5", "vc_themeofwp_addon" ) => "0.5",
								__( "0.6", "vc_themeofwp_addon" ) => "0.6",
								__( "0.7", "vc_themeofwp_addon" ) => "0.7",
								__( "0.8", "vc_themeofwp_addon" ) => "0.8",
								__( "0.9", "vc_themeofwp_addon" ) => "0.9"
							)
				),

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "vc_themeofwp_addon" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "vc_themeofwp_addon" )
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
	
	/**
	 * Grid Grid Shortcode
	 */
	public function vc_before_after_carousel_shortcode( $atts, $content = null ) {
	
		$output = $el_class =  $css =  $css_animation ='';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'css_animation' => '',
				), $atts 
			) 
		);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_beforeafter_carousel', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/css/vc_beforeafter_carousel.css');
		wp_enqueue_style( 'vc_owl.carousel', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/css/owl.carousel.css');
		wp_enqueue_style( 'vc_owl.theme', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/css/owl.theme.css');
		wp_enqueue_style( 'vc_owl.transitions', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/css/owl.transitions.css');
		wp_enqueue_script( 'vc_event_move', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/js/jquery.event.move.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_twentytwenty', VCMP_URL . 'modules/vcmp-before-after-carousel/assets/js/jquery.twentytwenty.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_owl.carousel', VCMP_URL.'modules/vcmp-before-after-carousel/assets/js/owl.carousel.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_beforeafter_carousel', VCMP_URL.'modules/vcmp-before-after-carousel/assets/js/vc_beforeafter_carousel.js', array('jquery'), '1.0', TRUE);
		
		/*CSS ANIMATIONS*/
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		/*CSS ANIMATIONS*/
		
		$output = '	<div id="vcmp_before_after_carousel" class="owl-carousel '.esc_attr( $css_class ).' '.esc_attr( $el_class ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'">
						'. do_shortcode($content).'
					</div>
					';
					
		return $output;
	}
    
    /*
    Shortcode logic how it should be rendered
    */
    public function vc_before_after_carousel_content_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $dataorientation = $vcmpbeforeaftercarousel_beforeimg = $vcmpbeforeaftercarousel_before_label = $vcmpbeforeaftercarousel_afterimg = $vcmpbeforeaftercarousel_after_label = $vcmpbeforeaftercarousel_orientation = $vcmpbeforeaftercarousel_ofset = $css_class = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'vcmpbeforeaftercarousel_beforeimg' => '',
			'vcmpbeforeaftercarousel_before_label' => '',
			'vcmpbeforeaftercarousel_afterimg' => '',
			'vcmpbeforeaftercarousel_after_label' => '',
			'vcmpbeforeaftercarousel_orientation' => '',
			'vcmpbeforeaftercarousel_ofset' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$vcmpbeforeaftercarousel_beforeimg = wp_get_attachment_image_src(intval($vcmpbeforeaftercarousel_beforeimg), 'full');
		$vcmpbeforeaftercarousel_beforeimg = $vcmpbeforeaftercarousel_beforeimg[0];
		
		$vcmpbeforeaftercarousel_afterimg = wp_get_attachment_image_src(intval($vcmpbeforeaftercarousel_afterimg), 'full');
		$vcmpbeforeaftercarousel_afterimg = $vcmpbeforeaftercarousel_afterimg[0];
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		static $ic = 0;
		static $id = 0;
		
		if( ( $vcmpbeforeaftercarousel_orientation == 'vertical') ) {
			$dataorientation = 'data-orientation="vertical"';
		}
			
        $output .= '<div id="vcmpbeforeafter-'.$i++.'" class=" twentytwenty-container '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" '.$dataorientation.' data-merge="6">
						<img src="'.$vcmpbeforeaftercarousel_beforeimg.'">
						<img src="'.$vcmpbeforeaftercarousel_afterimg.'">
					</div>
					';
		
		$output .= '
					<style> #vcmpbeforeafter-'.$ia++.' .twentytwenty-before-label:before { content: "'.$vcmpbeforeaftercarousel_before_label.'"; } #vcmpbeforeafter-'.$ib++.' .twentytwenty-after-label:before { content: "'.$vcmpbeforeaftercarousel_after_label.'"; } </style>
					<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(window).load(function() {
							$("#vcmpbeforeafter-'.$ic++.'.twentytwenty-container[data-orientation!=\'vertical\']").twentytwenty({default_offset_pct: '.$vcmpbeforeaftercarousel_ofset.'});
							$("#vcmpbeforeafter-'.$id++.'.twentytwenty-container[data-orientation=\'vertical\']").twentytwenty({default_offset_pct: '.$vcmpbeforeaftercarousel_ofset.', orientation: \'vertical\'});
						});
					});
					</script>
					';
					
		return $output;
		
    }
	
}

	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_beforeafter_carousel extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_beforeafter_carousel_content extends WPBakeryShortCode {

		}
	}
	
// Finally initialize code
new VcmpBeforeAfterCarousel();