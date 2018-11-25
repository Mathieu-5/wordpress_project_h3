<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Price Table Softy
 * Description: Price Table Softy shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPriceTableSofty extends VcmpModule{

	const slug = 'pricetable_softy';
	const base = 'pricetable_softy';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'pricetable_softy_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'pricetable_softy_content_shortcode_vc' ) );
		add_shortcode( 'pricetable_softy', array( $this, 'vc_pricetable_softy_shortcode' ));
		add_shortcode( 'pricetable_softy_content', array( $this, 'pricetable_softy_content_shortcode' ));
	}
	
	
	// Parent Element
	public function pricetable_softy_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Price Table Softy' , 'VCMP_SLUG' ),
				'base'                    => 'pricetable_softy',
				'description'             => __( 'Add price table softy to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'pricetable_softy_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          => array(
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
				),
			) 
		);
	}
	

	// Nested Element
	public function pricetable_softy_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Price Table Softy Item', 'VCMP_SLUG'),
				'base'            => 'pricetable_softy_content',
				'description'     => __( 'Add price table softy items to price table softy.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'pricetable_softy'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "pricetablesofty_img",
						'admin_label' => true,
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					vc_map_add_css_animation( true ),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "pricetablesofty_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Sub Title", "VCMP_SLUG" ),
							"param_name" => "pricetablesofty_subtitle",
							'admin_label' => true,
							"description" => __( "Please enter the subtitle.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Bacground Color", "VCMP_SLUG" ),
						"param_name" => "pricetablesofty_bgcolor",
						"description" => __( "Please choose a bg color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "textfield",
						"heading" => __( "Font Size", "VCMP_SLUG" ),
						"param_name" => "pricetablesofty_fontsize",
						'admin_label' => true,
						"description" => __( "Please enter the font size.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Text Color", "VCMP_SLUG" ),
						"param_name" => "pricetablesofty_color",
						"description" => __( "Please choose a text color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Border Color", "VCMP_SLUG" ),
						"param_name" => "pricetablesofty_bordercolor",
						"description" => __( "Please choose a border color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Button Name", "VCMP_SLUG" ),
							"param_name" => "pricetablesofty_buttonname",
							'admin_label' => true,
							"description" => __( "Please enter the button name.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Button Link URL", "VCMP_SLUG" ),
							"param_name" => "pricetablesofty_url",
							'admin_label' => true,
							"description" => __( "Please enter the button link URL.", "VCMP_SLUG" ),
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
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Parent Shortcode
	 */
	public function vc_pricetable_softy_shortcode( $atts, $content = null ) {
	
		$output = $el_class =  $css = $css_animation ='';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_pricetable_softy', VCMP_URL . 'modules/vcmp-pricetable-softy/assets/css/vc_pricetable_softy.css');
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$output = '<div class="pricingsofty pricingsofty-palden '.esc_attr( $el_class ).' '.esc_attr( $css ).'">'. do_shortcode($content) .'</div>';
		return $output;
	}
	

	/**
	 * Nexted Content Items Shortcode
	 */
	public function pricetable_softy_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $css_animation = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'css_animation' => '',
					'pricetablesofty_img' => '',
					'pricetablesofty_title' => '',
					'pricetablesofty_subtitle' => '',
					'pricetablesofty_bgcolor' => '',
					'pricetablesofty_color' => '',
					'pricetablesofty_fontsize' => '',
					'pricetablesofty_bordercolor' => '',
					'pricetablesofty_buttonname' => '',
					'pricetablesofty_url' => ''
				), $atts 
			) 
		);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$pricetablesofty_img = wp_get_attachment_image_src(intval($pricetablesofty_img), 'full');
		$pricetablesofty_img = $pricetablesofty_img[0];
		
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		
		$output = '
				<div class="pricingsofty-item '.esc_attr( $el_class ).' '.esc_attr( $css ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'">
				  <div class="pricingsofty-deco" style="background: '.$pricetablesofty_bgcolor.'; color: '.$pricetablesofty_color.'; font-size: '.$pricetablesofty_fontsize.';">
					<svg class="pricingsofty-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 50" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
					  <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
					  <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
					  <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
					  <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
					</svg>
					<div class="pricingsofty-price">'.$pricetablesofty_subtitle.'</div>
					<h3 class="pricingsofty-title">'.$pricetablesofty_title.'</h3>
				  </div>
				  <div class="pricingsofty-img"><img class="img-responsive" src="'.$pricetablesofty_img.'" alt="'.$alt.'"></div>
				  '.$content.'
				  <a href="'.$pricetablesofty_url.'" class="pricingsofty-action">'.$pricetablesofty_buttonname.'</a>
				</div>
				 ';
		
		return $output;
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_pricetable_softy extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_pricetable_softy_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpPriceTableSofty();

	