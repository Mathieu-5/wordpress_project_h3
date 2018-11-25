<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: FAQ
 * Description: Frequently asked questions shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFAQ extends VcmpModule{

	const slug = 'vcmp_afaq';
	const base = 'vcmp_afaq';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'faq_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'faq_content_shortcode_vc' ) );
		add_shortcode( 'vcmp_afaq', array( $this, 'vc_faq_shortcode' ));
		add_shortcode( 'vcmp_afaq_content', array( $this, 'vc_faq_content_shortcode' ));
	}
	
	// Parent Element
	public function faq_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'FAQ' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_afaq',
				'description'             => __( 'Add faq to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_afaq_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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

	
 
    public function faq_content_shortcode_vc(){
        vc_map( array(
            "name" => __("FAQ Item", "VCMP_SLUG"),
            "description" => __("Add faq to your page.", "VCMP_SLUG"),
            'base'            => 'vcmp_afaq_content',
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
			'content_element' => true,
			'as_child'        => array('only' => 'vcmp_afaq'),
            "params" => array(
			
				
				array( 
						"type" => "textfield",
						"heading" => __( "FAQ Title", "VCMP_SLUG" ),
						"param_name" => "vcmp_faq_title",
						"description" => __( "Please enter the faq main title (Question Title).", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Title",
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "FAQ Title Font Size", "VCMP_SLUG" ),
					"param_name" => "vcmp_faq_title_size",
					"description" => __( "Enter the faq title font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Title",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "FAQ Title Color", "VCMP_SLUG" ),
					"param_name" => "vcmp_faq_title_color",
					"description" => __( "Enter the faq title color.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Title",
					"value" => ""
				),
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "FAQ Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter the faq content (Answer Content).", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Content",
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "FAQ Content Font Size", "VCMP_SLUG" ),
					"param_name" => "vcmp_faq_content_size",
					"description" => __( "Enter the faq content font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Content",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "FAQ Content Color", "VCMP_SLUG" ),
					"param_name" => "vcmp_faq_content_color",
					"description" => __( "Enter the faq content color.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Content",
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "FAQ Content Bg Color", "VCMP_SLUG" ),
					"param_name" => "vcmp_faq_content_bg",
					"description" => __( "Enter the faq content bg color.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => "Content",
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
        ) 
		);
    }
	
	/**
	 * Grid Grid Shortcode
	 */
	public function vc_faq_shortcode( $atts, $content = null ) {
	
		$output = $el_class =  $css =  $css_class ='';
		
		static $ib = 0;
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
				), $atts 
			) 
		);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vcmp_faq', VCMP_URL . 'modules/vcmp-faq/assets/css/vc_faq.css');	
		wp_enqueue_script( 'vcmp_faq_js', VCMP_URL.'modules/vcmp-faq/assets/js/vc_faq.js', array('jquery'), '1.0', TRUE);
		
		$output = '	<div id="vcmp_faq_'.$ib++.'" class="vcmp_faq '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">
						<input type="text" class="vcmp-live-search-box" placeholder="'.__( 'Enter your keyword here', 'VCMP_SLUG' ).'" />
						'. do_shortcode($content).'
					</div>
					';
					
		return $output;
	}
    
    /*
    Shortcode logic how it should be rendered
    */
    public function vc_faq_content_shortcode( $atts, $content = null ) {
      
		$output = $el_class = $vcmp_faq_title = $css = '';
	  
		extract(shortcode_atts( array(
			'el_class' => '',
			'vcmp_faq_title' => '',
			'vcmp_faq_title_color' => '',
			'vcmp_faq_title_size' => '',
			'vcmp_faq_content_bg' => '',
			'vcmp_faq_content_color' => '',
			'vcmp_faq_content_size' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		static $ix = 0;
		static $iy = 0;
		
		
		$output .= '
					<div class="vcmp_topic '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" id="vcmp_topic_'.$ix++.'">
						<div class="vcmp_open">
						  <h2 class="vcmp_question" style="color:'.$vcmp_faq_title_color.'; font-size: '.$vcmp_faq_title_size.'; ">'.$vcmp_faq_title.'</h2>
						  <span class="vcmp_faq-t"></span>
						</div>
						<div class="vcmp_answer" style="color:'.$vcmp_faq_content_color.'; font-size: '.$vcmp_faq_content_size.';">'. do_shortcode($content).'</div>
					</div>
					';
					
		$output .= '<style> #vcmp_topic_'.$iy++.'.vcmp_expanded { background: '.$vcmp_faq_content_bg.'; } </style>';
					
		return $output;
		
    }
	
}

	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_afaq extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_afaq_content extends WPBakeryShortCode {

		}
	}
	
// Finally initialize code
new VcmpFAQ();