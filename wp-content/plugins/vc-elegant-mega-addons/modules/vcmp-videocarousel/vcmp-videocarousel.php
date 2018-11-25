<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Video Carousel
 * Description: Vimeo Carousel shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpVideoCarousel extends VcmpModule{

	const slug = 'video_carousel';
	const base = 'video_carousel';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'video_carousel_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'video_carousel_content_shortcode_vc' ) );
		add_shortcode( 'video_carousel', array( $this, 'vc_video_carousel_shortcode' ));
		add_shortcode( 'video_carousel_content', array( $this, 'video_carousel_content_shortcode' ));
	}

	
	// Parent Element
	public function video_carousel_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Video Carousel' , 'VCMP_SLUG' ),
				'base'                    => 'video_carousel',
				'description'             => __( 'Add video carousel to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'video_carousel_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
				),
			) 
		);
	}
	

	// Nested Element
	public function video_carousel_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Video Item', 'VCMP_SLUG'),
				'base'            => 'video_carousel_content',
				'description'     => __( 'Add video item to your carousel.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'video_carousel'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array(
						"type" => "dropdown",
						"heading" => __( "Video Source", "VCMP_SLUG" ),
						"param_name" => "videocarousel_video_source",
						"value" => array(
										__( "None", "VCMP_SLUG" ) => "none", 
										__( "Youtube", "VCMP_SLUG" ) => "youtube", 
										__( "Vimeo", "VCMP_SLUG" ) => "vimeo", 
									),
						"description" => __( "Select the type of the child video source.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Youtube Video ID", "VCMP_SLUG" ),
							"param_name" => "videocarousel_youtube_video_id",
							'admin_label' => true,
							"dependency" => Array( 
											'element' => "videocarousel_video_source",
											'value' => array( 'youtube' ),
											),
							"description" => __( "Please enter the youtube video url. Ex:r-neGA1blsE", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Vimeo Video ID", "VCMP_SLUG" ),
							"param_name" => "videocarousel_vimeo_video_id",
							'admin_label' => true,
							"dependency" => Array( 
											'element' => "videocarousel_video_source",
											'value' => array( 'vimeo' ),
											),
							"description" => __( "Please enter the vimeo video id. Ex:163662857", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					 ),
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Grid Grid Shortcode
	 */
	public function vc_video_carousel_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_owl.carousel', VCMP_URL . 'modules/vcmp-videocarousel/assets/css/owl.carousel.css');
		wp_enqueue_style( 'vc_owl.theme', VCMP_URL . 'modules/vcmp-videocarousel/assets/css/owl.theme.default.css');
		wp_enqueue_style( 'vc_videocarousel', VCMP_URL . 'modules/vcmp-videocarousel/assets/css/vc_videocarousel.css');
		wp_enqueue_script( 'vc_owl.carousel', VCMP_URL.'modules/vcmp-videocarousel/assets/js/owl.carousel.js', array('jquery'), '1.0', TRUE);
		
		$output = '	<div id="vcmp_videocarousel" class="owl-carousel owl-theme '.esc_attr( $el_class ).'">
						'. do_shortcode($content).'
					</div>

					<script>
					 jQuery(document).ready(function ($) {
						 $(\'.owl-carousel\').owlCarousel({
					        items:1,
					        merge:false,
					        mouseDrag:true,
					        touchDrag:true,
					        loop:true,
					        nav:false,
					        margin:10,
					        autoplay: true,
					        autoplayHoverPause: true,
					        margin:10,
					        video:true,
					        lazyLoad:false,
					        center:true,
					        responsive:{
					            480:{
					                items:2
					            },
					            600:{
					                items:4
					            }
					        }
					    });
					});
					</script>

					';
					
		return $output;
	}
	
	
	public function nl2p($str) {
		$arr=explode("\n",$str);
		$out='';

		for($i=0;$i<count($arr);$i++) {
			if(strlen(trim($arr[$i]))>0)
				$out.=''.trim($arr[$i]).'';
		}
		return $out;
	}
	

	/**
	 * Grid Grid Content Items Shortcode
	 */
	public function video_carousel_content_shortcode( $atts, $content = null ) {
	
		$output = 
		$el_class = 
		$videocarousel_video_source = 
		$videocarousel_youtube_video_id = 
		$videocarousel_vimeo_video_id = 

		'';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'videocarousel_video_source' => '',
					'videocarousel_youtube_video_id' => '',
					'videocarousel_vimeo_video_id' => '',
				), $atts 
			) 
		);
		
		
		$output .=	'<div class="item-video '.esc_attr( $el_class ).'" data-merge="2">';
		
			if ( $videocarousel_video_source == 'vimeo' ) {	
			
				$output .=	'<a class="owl-video" href="//vimeo.com/'. $videocarousel_vimeo_video_id .'"></a>';
			
			};
			
			if ( $videocarousel_video_source == 'youtube' ) {	
			
				$output .=	'<a class="owl-video" href="//www.youtube.com/watch?v='. $videocarousel_youtube_video_id .'"></a>';
			
			};
					
		$output .=	'</div>';
					

		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_video_carousel extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_video_carousel_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpVideoCarousel();