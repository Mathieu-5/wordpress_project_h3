<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Process Timeline
 * Description: Process Timeline shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpProcessTimeline extends VcmpModule{

	const slug = 'process_timeline';
	const base = 'process_timeline';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'process_timeline_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'process_timeline_content_shortcode_vc' ) );
		add_shortcode( 'process_timeline', array( $this, 'vc_process_timeline_shortcode' ));
		add_shortcode( 'process_timeline_content', array( $this, 'process_timeline_content_shortcode' ));		
	}

	
	// Parent Element
	public function process_timeline_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Process Timeline' , 'VCMP_SLUG' ),
				'base'                    => 'process_timeline',
				'description'             => __( 'Add process timeline to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'process_timeline_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG')
		) 
	);
}
	

	// Nested Element
	public function process_timeline_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Process Timeline Item', 'VCMP_SLUG'),
				'base'            => 'process_timeline_content',
				'description'     => __( 'Add process timeline items to grid gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'process_timeline'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "processtimeline_img",
						'admin_label' => true,
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "processtimeline_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Sub Title", "VCMP_SLUG" ),
							"param_name" => "processtimeline_subtitle",
							'admin_label' => true,
							"description" => __( "Please enter the subtitle.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Image Link URL", "VCMP_SLUG" ),
							"param_name" => "processtimeline_url",
							'admin_label' => true,
							"description" => __( "Please enter the link URL.", "VCMP_SLUG" ),
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
	 * Grid Gallery Shortcode
	 */
	public function vc_process_timeline_shortcode( $atts, $content = null ) {
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_process_timeline', VCMP_URL . 'modules/vcmp-process-timeline/assets/css/vc_process_timeline.css');
		wp_enqueue_script( 'vc_process_timeline_js', VCMP_URL.'modules/vcmp-process-timeline/assets/js/vc_process_timeline.js', array('jquery'), '1.0', TRUE);

		$output = ' <div class="vcmp_process_timeline '.esc_attr( $el_class ).'"><ol class="vcmp_process_timeline-items">'. do_shortcode($content) .'</ol><canvas id="ptcanvas" width="800" height="55"></canvas></div>';
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function process_timeline_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'processtimeline_img' => '',
					'processtimeline_title' => '',
					'processtimeline_subtitle' => '',
					'processtimeline_url' => ''
				), $atts 
			) 
		);
		
		$processtimeline_img = wp_get_attachment_image_src(intval($processtimeline_img), 'medium');
		$processtimeline_img = $processtimeline_img[0];
		
		$output = '<li class=" '.esc_attr( $el_class ).'"><a class="vcmp_process_timeline_link" href="'.$processtimeline_url.'"><img src="'.$processtimeline_img.'" alt="" /> '.$processtimeline_title.'</a><em>'.$processtimeline_subtitle.'</em></li>';
		
		return $output;
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_process_timeline extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_process_timeline_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpProcessTimeline();

	