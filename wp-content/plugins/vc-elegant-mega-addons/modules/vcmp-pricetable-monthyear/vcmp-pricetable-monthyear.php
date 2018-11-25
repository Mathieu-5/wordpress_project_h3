<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Price Table Monthly & Yearly
 * Description: Monthly & Yearly Price Table shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPriceTableMonthYear extends VcmpModule{

	const slug = 'pricetable_monthyear';
	const base = 'pricetable_monthyear';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'pricetable_monthyear_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'pricetable_monthyear_content_shortcode_vc' ) );
		add_shortcode( 'pricetable_monthyear', array( $this, 'vc_pricetable_monthyear_shortcode' ));
		add_shortcode( 'pricetable_monthyear_content', array( $this, 'pricetable_monthyear_content_shortcode' ));	
	}

	
	// Parent Element
	public function pricetable_monthyear_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Price Table Monthly & Yearly' , 'VCMP_SLUG' ),
				'base'                    => 'pricetable_monthyear',
				'description'             => __( 'Add price table monthly/yearly to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'pricetable_monthyear_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          => array(
				
					array( 
							"type" => "textfield",
							"heading" => __( "Package Monthly Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_package_m_name",
							'admin_label' => true,
							"description" => __( "Please enter the package monthly title. Ex: Monthly", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Yearly Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_package_y_name",
							'admin_label' => true,
							"description" => __( "Please enter the package yearly title. Ex: Yearly", "VCMP_SLUG" ),
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
	public function pricetable_monthyear_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Price Table Monthly & Yearly', 'VCMP_SLUG'),
				'base'            => 'pricetable_monthyear_content',
				'description'     => __( 'Add price table monthly/yearly items to grid gallery.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'pricetable_monthyear'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					//Monthly Package
					
					array(
						"type" => "textfield",
						"heading" => __( "Price Table Width", "vc_themeofwp_addon" ),
						"param_name" => "pricetable_monthyear_item_width",
						"description" => __( "Please define price table column width. Default is 33.333%", "vc_themeofwp_addon" ),
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Item Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_title",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the package item title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Item Title Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_title_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose item text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price Currency Symbol", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_currency",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the price symbol. Ex: $, £, ¥, €", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_price",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the price. Ex: 20", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Billing Cycle", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_duration",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the billing cycle. Ex: /mo, /yr, /onetime", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea",
							"heading" => __( "Package Billing Cycle", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_content",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the pricing features per line without formatting. This will be automatically wraps.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_bg_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose package background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Border Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_border_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose package border color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Items Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_text_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose item text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					

					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_button_label",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter button title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Link URL", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_button_link",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please enter the button link url.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_button_text_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose button text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_m_button_bg_color",
							'admin_label' => true,
							"group" => __( "Monthly", "VCMP_SLUG" ),
							"description" => __( "Please choose button background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					
					//Yearly Package
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Item Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_title",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the package item title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Item Title Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_title_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose item text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price Currency Symbol", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_currency",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the price symbol. Ex: $, £, ¥, €", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Price", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_price",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the price. Ex: 20", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Billing Cycle", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_duration",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the billing cycle. Ex: /mo, /yr, /onetime", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea",
							"heading" => __( "Package Billing Cycle", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_content",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the pricing features per line without formatting. This will be automatically wraps.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_bg_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose package background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Border Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_border_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose package border color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Items Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_text_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose item text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					

					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Title", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_button_label",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter button title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Package Button Link URL", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_button_link",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please enter the button link url.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Text Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_button_text_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose button text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Package Button Background Color", "VCMP_SLUG" ),
							"param_name" => "pricetable_monthyear_item_y_button_bg_color",
							'admin_label' => true,
							"group" => __( "Yearly", "VCMP_SLUG" ),
							"description" => __( "Please choose button background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Package Type", "VCMP_SLUG" ),
						"param_name" => "pricetable_monthyear_item_package_type",
						"description" => __( "Please choose a type for the package.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default Normal Package", "VCMP_SLUG" ) => "",
								__( "Featured Package", "VCMP_SLUG" ) => "exclusive",
							)
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
	public function vc_pricetable_monthyear_shortcode( $atts, $content = null ) {
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'pricetable_monthyear_package_m_name' => '',
					'pricetable_monthyear_package_y_name' => '',
				), $atts 
			) 
		);
		
		wp_enqueue_style( 'vc_pricetable_monthyear', VCMP_URL . 'modules/vcmp-pricetable-monthyear/assets/css/vc_pricetable_monthyear.css');
		wp_enqueue_script( 'vc_pricetable_monthyear', VCMP_URL.'modules/vcmp-pricetable-monthyear/assets/js/vc_pricetable_monthyear.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_pricetable_modernizr', VCMP_URL.'modules/vcmp-pricetable-monthyear/assets/js/modernizr.js', array('jquery'), '1.0', TRUE);
			
		$output = '	<div class="vcmp_my_pricing-container '.esc_attr( $el_class ).'">
		
						<div class="vcmp_my_pricing-switcher">
							<p class="vcmp_my_pricing_fieldset">
								<input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
								<label for="monthly-1">'.$pricetable_monthyear_package_m_name.'</label>
								
								<input type="radio" name="duration-1" value="yearly" id="yearly-1">
								<label for="yearly-1">'.$pricetable_monthyear_package_y_name.'</label>
								
								<span class="vcmp_my_pricing_switch"></span>
							</p>
						</div>
						
						<ul class="vcmp_my_pricing-list bounce-invert">
							'. do_shortcode($content) .'
						</ul>
						
					</div>
						
				';
			
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function pricetable_monthyear_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $pricetable_monthyear_item_width = $pricetable_monthyear_item_package_type = $pricetable_monthyear_item_m_title = $pricetable_monthyear_item_m_currency = $pricetable_monthyear_item_m_price = $pricetable_monthyear_item_m_duration = $pricetable_monthyear_item_m_content = $pricetable_monthyear_item_m_button_label = $pricetable_monthyear_item_m_button_link = $pricetable_monthyear_item_m_title_color = $pricetable_monthyear_item_m_bg_color = $pricetable_monthyear_item_m_border_color = $pricetable_monthyear_item_m_text_color = $pricetable_monthyear_item_m_button_text_color = $pricetable_monthyear_item_m_button_bg_color = $pricetable_monthyear_item_y_title = $pricetable_monthyear_item_y_currency = $pricetable_monthyear_item_y_price = $pricetable_monthyear_item_y_duration = $pricetable_monthyear_item_y_content = $pricetable_monthyear_item_y_button_label = $pricetable_monthyear_item_y_button_link = $pricetable_monthyear_item_y_title_color = $pricetable_monthyear_item_y_bg_color = $pricetable_monthyear_item_y_border_color = $pricetable_monthyear_item_y_text_color = $pricetable_monthyear_item_y_button_text_color = $pricetable_monthyear_item_y_button_bg_color = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'pricetable_monthyear_item_width' => '',
					'pricetable_monthyear_item_package_type' => '',
					'pricetable_monthyear_item_m_title' => '',
					'pricetable_monthyear_item_m_currency' => '',
					'pricetable_monthyear_item_m_price' => '',
					'pricetable_monthyear_item_m_duration' => '',
					'pricetable_monthyear_item_m_content' => '',
					'pricetable_monthyear_item_m_button_label' => '',
					'pricetable_monthyear_item_m_button_link' => '',
					
					'pricetable_monthyear_item_m_title_color' => '',
					'pricetable_monthyear_item_m_bg_color' => '',
					'pricetable_monthyear_item_m_border_color' => '',
					'pricetable_monthyear_item_m_text_color' => '',
					'pricetable_monthyear_item_m_button_text_color' => '',
					'pricetable_monthyear_item_m_button_bg_color' => '',
					
					'pricetable_monthyear_item_y_title' => '',
					'pricetable_monthyear_item_y_currency' => '',
					'pricetable_monthyear_item_y_price' => '',
					'pricetable_monthyear_item_y_duration' => '',
					'pricetable_monthyear_item_y_content' => '',
					'pricetable_monthyear_item_y_button_label' => '',
					'pricetable_monthyear_item_y_button_link' => '',
					
					'pricetable_monthyear_item_y_title_color' => '',
					'pricetable_monthyear_item_y_bg_color' => '',
					'pricetable_monthyear_item_y_border_color' => '',
					'pricetable_monthyear_item_y_text_color' => '',
					'pricetable_monthyear_item_y_button_text_color' => '',
					'pricetable_monthyear_item_y_button_bg_color' => '',
					
				), $atts 
			) 
		);
		
		$textareaDataM = '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($pricetable_monthyear_item_m_content,"\n\r")).'</li>';
		$textareaDataY = '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($pricetable_monthyear_item_y_content,"\n\r")).'</li>';
		
		
		
		$output = '		<li class="'.$pricetable_monthyear_item_package_type.' '.esc_attr( $el_class ).'" style="width:'.$pricetable_monthyear_item_width.'">
							<ul class="vcmp_my_pricing-wrapper">
								<li data-type="monthly" class="is-visible" style="background: '.$pricetable_monthyear_item_m_bg_color.'; color: '.$pricetable_monthyear_item_m_text_color.'; box-shadow: 0 0 0 3px '.$pricetable_monthyear_item_m_border_color.' inset;">
									<header class="vcmp_my_pricing-header" style="color: '.$pricetable_monthyear_item_m_title_color.'">
										<h2>'.$pricetable_monthyear_item_m_title.'</h2>
										<div class="vcmp_my_pricing_price">
											<span class="vcmp_my_pricing_currency">'.$pricetable_monthyear_item_m_currency.'</span>
											<span class="vcmp_my_pricing_value">'.$pricetable_monthyear_item_m_price.'</span>
											<span class="vcmp_my_pricing_duration">'.$pricetable_monthyear_item_m_duration.'</span>
										</div>
									</header>
									<div class="vcmp_my_pricing-body">
										<ul class="vcmp_my_pricing-features">
											'.preg_replace("/<br\W*?\/>/","\n", $textareaDataM).'
										</ul>
									</div>
									<footer class="vcmp_my_pricing-footer">
										<a class="vcmp_my_pricing_select" href="'.$pricetable_monthyear_item_m_button_link.'" style="background: '.$pricetable_monthyear_item_m_button_bg_color.'; color: '.$pricetable_monthyear_item_m_button_text_color.'; box-shadow: 0 0 0 3px '.$pricetable_monthyear_item_m_border_color.' inset;">'.$pricetable_monthyear_item_m_button_label.'</a>
									</footer>
								</li>
								<li data-type="yearly" class="is-hidden" style="background: '.$pricetable_monthyear_item_y_bg_color.'; color: '.$pricetable_monthyear_item_y_text_color.'; box-shadow: 0 0 0 3px '.$pricetable_monthyear_item_m_border_color.' inset;">
									<header class="vcmp_my_pricing-header" style="color: '.$pricetable_monthyear_item_y_title_color.'">
										<h2>'.$pricetable_monthyear_item_y_title.'</h2>
										<div class="vcmp_my_pricing_price">
											<span class="vcmp_my_pricing_currency">'.$pricetable_monthyear_item_y_currency.'</span>
											<span class="vcmp_my_pricing_value">'.$pricetable_monthyear_item_y_price.'</span>
											<span class="vcmp_my_pricing_duration">'.$pricetable_monthyear_item_y_duration.'</span>
										</div>
									</header>
									<div class="vcmp_my_pricing-body">
										<ul class="vcmp_my_pricing-features">
											'.preg_replace("/<br\W*?\/>/","\n", $textareaDataY).'
										</ul>
									</div>
									<footer class="vcmp_my_pricing-footer">
										<a class="vcmp_my_pricing_select" href="'.$pricetable_monthyear_item_y_button_link.'" style="background: '.$pricetable_monthyear_item_y_button_bg_color.'; color: '.$pricetable_monthyear_item_y_button_text_color.'; box-shadow: 0 0 0 3px '.$pricetable_monthyear_item_y_border_color.' inset;">'.$pricetable_monthyear_item_y_button_label.'</a>
									</footer>
								</li>
							</ul>
						</li>
					';
		
		return $output;
	}
	
}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_pricetable_monthyear extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_pricetable_monthyear_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpPriceTableMonthYear();

	