<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Slab Text
 * Description: Slab Text shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpSlabtext extends VcmpModule{

	const slug = 'vcmp_slabtext';
	const base = 'vcmp_slabtext';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vcmp_slabtext_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'vcmp_slabtext_content_shortcode_vc' ) );
		add_shortcode( 'vcmp_slabtext', array( $this, 'vc_vcmp_slabtext_shortcode' ));
		add_shortcode( 'vcmp_slabtext_content', array( $this, 'vcmp_slabtext_content_shortcode' ));
	}
	
	
	// Parent Element
	public function vcmp_slabtext_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Slab Text' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_slabtext',
				'description'             => __( 'Add slab text to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_slabtext_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
	public function vcmp_slabtext_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Slab Text Item', 'VCMP_SLUG'),
				'base'            => 'vcmp_slabtext_content',
				'description'     => __( 'Add slab text item to your gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'vcmp_slabtext'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "textfield",
							"heading" => __( "Slab Text Title", "VCMP_SLUG" ),
							"param_name" => "slabtext_item_title",
							'admin_label' => true,
							"description" => __( "Please enter the slab text item title.", "VCMP_SLUG" ),
							"value" => ""
					),
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Slab Text Color", "VCMP_SLUG" ),
							"param_name" => "slabtext_item_color",
							'admin_label' => true,
							"description" => __( "Please choose the slab text item color.", "VCMP_SLUG" ),
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
	 * Slab Text Shortcode
	 */
	public function vc_vcmp_slabtext_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_slabtext', VCMP_URL . 'modules/vcmp-slabtext/assets/css/vc_slabtext.css');
		wp_enqueue_script( 'vc_slabtext', VCMP_URL.'modules/vcmp-slabtext/assets/js/jquery.slabtext.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_slabtext_js', VCMP_URL.'modules/vcmp-slabtext/assets/js/vc_slabtext.js', array('jquery'), '1.0', TRUE);
		
		$output = '	<h1 id="vcmp-slab-text '.esc_attr( $el_class ).'" class="slabtextdone">
						'. do_shortcode($content).'
					</h1>';
					
		return $output;
	}
	


	/**
	 * Text Items Shortcode
	 */
	public function vcmp_slabtext_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'slabtext_item_title' => '',
					'slabtext_item_color' => '',
				), $atts 
			) 
		);
		
	
		$output .=	'<span class="slabtext '.esc_attr( $el_class ).'" style="color: '.$slabtext_item_color.'; ">'.$slabtext_item_title.'</span>';
		

		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_slabtext extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_slabtext_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpSlabtext();

	