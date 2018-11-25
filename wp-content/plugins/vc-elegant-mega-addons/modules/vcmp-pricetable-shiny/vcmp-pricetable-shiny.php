<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Price Table Shiny
 * Description: Price Table Shiny shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPriceTableShiny extends VcmpModule{

	const slug = 'pricetable_shiny';
	const base = 'pricetable_shiny';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'pricetable_shiny_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'pricetable_shiny_content_shortcode_vc' ) );
		add_shortcode( 'pricetable_shiny', array( $this, 'vc_pricetable_shiny_shortcode' ));
		add_shortcode( 'pricetable_shiny_content', array( $this, 'pricetable_shiny_content_shortcode' ));
	}
	
	// Parent Element
	public function pricetable_shiny_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Price Table Shiny' , 'VCMP_SLUG' ),
				'base'                    => 'pricetable_shiny',
				'description'             => __( 'Add price table shiny to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'pricetable_shiny_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
			) 
		);
	}
	

	// Nested Element
	public function pricetable_shiny_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Price Table Shiny Item', 'VCMP_SLUG'),
				'base'            => 'pricetable_shiny_content',
				'description'     => __( 'Add price table shiny items to price table shiny.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'pricetable_shiny'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "pricetableshiny_img",
						'admin_label' => true,
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "pricetableshiny_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Sub Title", "VCMP_SLUG" ),
							"param_name" => "pricetableshiny_subtitle",
							'admin_label' => true,
							"description" => __( "Please enter the subtitle.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Bacground Color", "VCMP_SLUG" ),
						"param_name" => "pricetableshiny_bgcolor",
						"description" => __( "Please choose a bg color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "textfield",
						"heading" => __( "Font Size", "VCMP_SLUG" ),
						"param_name" => "pricetableshiny_fontsize",
						'admin_label' => true,
						"description" => __( "Please enter the font size.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Text Color", "VCMP_SLUG" ),
						"param_name" => "pricetableshiny_color",
						"description" => __( "Please choose a text color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "colorpicker",
						"heading" => __( "Border Color", "VCMP_SLUG" ),
						"param_name" => "pricetableshiny_bordercolor",
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
							"heading" => __( "Image Link URL", "VCMP_SLUG" ),
							"param_name" => "pricetableshiny_url",
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
	public function vc_pricetable_shiny_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_pricetable_shiny', VCMP_URL . 'modules/vcmp-pricetable-shiny/assets/css/vc_pricetable_shiny.css');
		
		$output = '<div class="vcmp_pricetableshiny '.esc_attr( $el_class ).'">'. do_shortcode($content) .'</div>';
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function pricetable_shiny_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'pricetableshiny_img' => '',
					'pricetableshiny_title' => '',
					'pricetableshiny_subtitle' => '',
					'pricetableshiny_bgcolor' => '',
					'pricetableshiny_color' => '',
					'pricetableshiny_fontsize' => '',
					'pricetableshiny_bordercolor' => '',
					'pricetableshiny_url' => ''
				), $atts 
			) 
		);
		
		$pricetableshiny_img = wp_get_attachment_image_src(intval($pricetableshiny_img), 'large');
		$pricetableshiny_img = $pricetableshiny_img[0];
		
		$output = '
				<div class="vcmp_pricetableshiny_grid '.esc_attr( $el_class ).'" style="background: '.$pricetableshiny_bgcolor.'; color: '.$pricetableshiny_color.'; font-size: '.$pricetableshiny_fontsize.'; border: 2px solid '.$pricetableshiny_bordercolor.'; ">
					<h2>'.$pricetableshiny_title.'</h2>
					<h3><span>'.$pricetableshiny_subtitle.'</span></h3>
					'.$content.'
					<a href="'.$pricetableshiny_url.'" class="button">Sign Up</a>
				</div>
				 ';
		
		return $output;
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_pricetable_shiny extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_pricetable_shiny_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpPriceTableShiny();

	