<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Price Table Modern
 * Description: Price Table Modern shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPriceTableModern extends VcmpModule{

	const slug = 'pricetable_modern';
	const base = 'pricetable_modern';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'pricetable_modern_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'pricetable_modern_content_shortcode_vc' ) );

		add_shortcode( 'pricetable_modern', array( $this, 'vc_pricetable_modern_shortcode' ));
		add_shortcode( 'pricetable_modern_content', array( $this, 'pricetable_modern_content_shortcode' ));
	}
	
	
	// Parent Element
	public function pricetable_modern_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Price Table Modern' , 'VCMP_SLUG' ),
				'base'                    => 'pricetable_modern',
				'description'             => __( 'Add price table modern to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'pricetable_modern_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          => array(
					array( 
							"type" => "textfield",
							"heading" => __( "Package Name", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_name",
							'admin_label' => true,
							"description" => __( "Please enter the package name.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price Symbol", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_price_symbol",
							'admin_label' => true,
							"description" => __( "Please enter the price symbol. Ex: $, £, ¥, €", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_price",
							'admin_label' => true,
							"description" => __( "Please enter the price. Ex: 20", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Billing Cycle", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_billing_cycle",
							'admin_label' => true,
							"description" => __( "Please enter the billing cycle. Ex: /mo, /yr, /onetime", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_bg_color",
							'admin_label' => true,
							"description" => __( "Please choose bg color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Title Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_title_color",
							'admin_label' => true,
							"description" => __( "Please choose title text color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_button_title",
							'admin_label' => true,
							"description" => __( "Please enter button title for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_button_textcolor",
							'admin_label' => true,
							"description" => __( "Please choose button text color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_button_color",
							'admin_label' => true,
							"description" => __( "Please choose button background color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Link URL", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_button_url",
							'admin_label' => true,
							"description" => __( "Please enter the button link url color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" ),
					),
				),
			) 
		);
	}
	

	// Nested Element
	public function pricetable_modern_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Price Table Modern Item', 'VCMP_SLUG'),
				'base'            => 'pricetable_modern_content',
				'description'     => __( 'Add price table modern items to grid gallery.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'pricetable_modern'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Item Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_item",
							'admin_label' => true,
							"description" => __( "Please enter the package item title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Item Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_item_text_color",
							'admin_label' => true,
							"description" => __( "Please choose item text color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Item Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_modern_package_item_bg_color",
							'admin_label' => true,
							"description" => __( "Please choose item background color for the price table.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" ),
					),
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Grid Gallery Shortcode
	 */
	public function vc_pricetable_modern_shortcode( $atts, $content = null ) {
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'pricetable_modern_package_name' => '',
					'pricetable_modern_price_symbol' => '',
					'pricetable_modern_package_price' => '',
					'pricetable_modern_package_billing_cycle' => '',
					'pricetable_modern_package_bg_color' => '',
					'pricetable_modern_package_title_color' => '',
					'pricetable_modern_package_title_color' => '',
					'pricetable_modern_package_button_textcolor' => '',
					'pricetable_modern_package_button_color' => '',
					'pricetable_modern_package_button_title' => '',
					'pricetable_modern_package_button_url' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_pricetable_modern', VCMP_URL . 'modules/vcmp-pricetable-modern/assets/css/vc_pricetable_modern.css');
		
		$output = '<style>.'. $pricetable_modern_package_name .'.vcmp_pricetable_modern_titlle:after {border-color: '.$pricetable_modern_package_bg_color.' transparent transparent;}</style>

				<div class="vcmp_pricetable_modern_wrapper '.esc_attr( $el_class ).'">
					<div class="vcmp_pricetable_modern">
						
						<div class="'. $pricetable_modern_package_name .' vcmp_pricetable_modern_titlle" style="background: '.$pricetable_modern_package_bg_color.'; color: '.$pricetable_modern_package_title_color.'">
							'. $pricetable_modern_package_name .'
						</div>
						
						<div class="vcmp_pricetable_modern_price">
							<sup>'. $pricetable_modern_price_symbol .'</sup><span class="num">'. $pricetable_modern_package_price .'</span><sub>'. $pricetable_modern_package_billing_cycle .'</sub>
						</div>
						
						'. do_shortcode($content) .'
						
						<div class="vcmp_pricetable_modern_button_wrapper">
							<a class="vcmp_pricetable_modern_button" style="background: '. $pricetable_modern_package_button_color .'; color '.$pricetable_modern_package_button_textcolor.'" href="'. $pricetable_modern_package_button_url .'">'. $pricetable_modern_package_button_title .'</a>
						</div>
						
					</div>
				</div>

				
				';
			
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function pricetable_modern_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'pricetable_modern_package_item' => '',
					'pricetable_modern_package_item_bg_color' => '',
					'pricetable_modern_package_item_text_color' => '',
				), $atts 
			) 
		);
		
		
		$output = '<div class="vcmp_pricetable_modern_vcmp_ptm_row '.esc_attr( $el_class ).'" style="background: '.$pricetable_modern_package_item_bg_color.'">
						<i class="icon ion-checkmark" style="color: '.$pricetable_modern_package_item_text_color.'"></i><span style="color: '.$pricetable_modern_package_item_text_color.'">'.$pricetable_modern_package_item.'</span>
					</div>
				   ';
		
		return $output;
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_pricetable_modern extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_pricetable_modern_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpPriceTableModern();

	