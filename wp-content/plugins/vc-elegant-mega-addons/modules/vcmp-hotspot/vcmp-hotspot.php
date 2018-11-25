<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: HotSpot
 * Description: HotSpot shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpHotSpot extends VcmpModule{

	const slug = 'image_hotspot';
	const base = 'image_hotspot';

	public function __construct(){
	
		add_action( 'vc_before_init', array( $this, 'image_hotspot_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'image_hotspot_content_shortcode_vc' ) );

		add_shortcode( 'image_hotspot', array( $this, 'vc_image_hotspot_shortcode' ));
		add_shortcode( 'image_hotspot_content', array( $this, 'vc_image_hotspot_content_shortcode' ));
	}
	
	
	// Parent Element
	public function image_hotspot_shortcode_vc() {
		vc_map( 
			array(
				"icon"            		  => 'icon-vc-elegant-mega',
				'name'                    => __( 'HotSpot' , 'VCMP_SLUG' ),
				'base'                    => 'image_hotspot',
				'description'             => __( 'Add hotspot to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'image_hotspot_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array( 
						"type" => "attach_image",
						"heading" => __( "Main HotSpot Background Image", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_bg",
						'admin_label' => true,
						'group' => "Image",
						"description" => __( "Please choose main background image.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Background Color", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_grid_bg",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please choose the background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Text Color", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_text_color",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please choose the text color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Popup Type", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_popup_type",
						"description" => __( "Please choose popup type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Popup/Tooltip",
						"value" => array(
								__( "Choose popup type", "VCMP_SLUG" ) => "",
								__( "Tooltip", "VCMP_SLUG" ) => "tooltip",
								__( "LightBox", "VCMP_SLUG" ) => "lightbox"
							)
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Tooltip Style", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_style",
						"description" => __( "Please choose tooltip style.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Popup/Tooltip",
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => array(
								__( "Choose style type", "VCMP_SLUG" ) => "",
								__( "Default", "VCMP_SLUG" ) => "default",
								__( "Light", "VCMP_SLUG" ) => "light",
								__( "Borderless", "VCMP_SLUG" ) => "borderless",
								__( "Punk", "VCMP_SLUG" ) => "punk",
								__( "Noir", "VCMP_SLUG" ) => "noir",
								__( "Shadow", "VCMP_SLUG" ) => "shadow"
							)
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Tooltip Animation", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_animation",
						"description" => __( "Please choose tooltip animation.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Popup/Tooltip",
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => array(
								__( "Choose animation type", "VCMP_SLUG" ) => "",
								__( "Fade", "VCMP_SLUG" ) => "fade",
								__( "Grow", "VCMP_SLUG" ) => "grow",
								__( "Swing", "VCMP_SLUG" ) => "swing",
								__( "Slide", "VCMP_SLUG" ) => "slide",
								__( "Fall", "VCMP_SLUG" ) => "fall"
							)
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Tooltip Trigger", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_trigger",
						"description" => __( "Please choose tooltip trigger.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Popup/Tooltip",
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => array(
								__( "Choose trigger type", "VCMP_SLUG" ) => "",
								__( "Click", "VCMP_SLUG" ) => "click",
								__( "Hover", "VCMP_SLUG" ) => "hover"
							)
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Tooltip Delay", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_delay",
						'group' => "Popup/Tooltip",
						'admin_label' => true,
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => "",
						"description" => __( "Enter the value for the delay. Ex: 300 / use only numeric value. This is the delay before the tooltip starts its opening and closing animations when the 'hover' trigger is used", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Tooltip Timer", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_timer",
						'group' => "Popup/Tooltip",
						'admin_label' => true,
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => "",
						"description" => __( "Enter the value for the timer. Ex: 10 / use only numeric value. How long (in ms) the tooltip should live before closing. Default: 0.", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Tooltip Width", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_tooltip_width",
						'group' => "Popup/Tooltip",
						'admin_label' => true,
						"dependency" => Array( 
											'element' => "image_hotspot_popup_type",
											'value' => array( 'tooltip' ),
						),
						"value" => "",
						"description" => __( "Enter the width for the tooltip. Ex: 300 / use only numeric value.", "VCMP_SLUG" )
					),
					
					array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
					'group' => __( 'Custom fonts', 'js_composer' ),
					'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
					),
					
					array(
					'type' => 'google_fonts',
					'param_name' => 'google_fonts',
					'value' => '',
					'admin_label' => true,
					'group' => __( 'Custom fonts', 'js_composer' ),
						
							"dependency" => Array( 
									'element' => "use_theme_fonts",
									'value_not_equal_to' => array( 'yes' ),
								),
							
							'settings' => array(
								'fields' => array(
									'font_family_description' => __( 'Select font family.', 'VCMP_SLUG' ),
									'font_style_description' => __( 'Select font styling.', 'VCMP_SLUG' ),
								),
						),
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						'admin_label' => true,
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
					
					array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'admin_label' => true,
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),
				),
			) 
		);
	}
	

	// Nested Element
	public function image_hotspot_content_shortcode_vc() {
		vc_map( 
			array(
				"icon"            => 'icon-vc-elegant-mega',
				'name'            => __('HotSpot Item', 'VCMP_SLUG'),
				'base'            => 'image_hotspot_content',
				'description'     => __( 'Add hotspot items to your gallery.', 'VCMP_SLUG' ),
				'content_element' => true,
				"category"		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'as_child'        => array('only' => 'image_hotspot'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array(
						"type" => "dropdown",
						"heading" => __( "Pointer Type", "VCMP_SLUG" ),
						"param_name" => "image_hotspot_pointer_type",
						"description" => __( "Please choose pointer type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Pointer",
						"value" => array(
								__( "Choose pointer type", "VCMP_SLUG" ) => "",
								__( "Pulse One Letter", "VCMP_SLUG" ) => "animletter",
								__( "Pulse Icon", "VCMP_SLUG" ) => "animicon",
								__( "Long Text", "VCMP_SLUG" ) => "longtext",
							)
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Letter", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer one letter. Ex:1 or A", "VCMP_SLUG" ),
							"dependency" => Array( 
											'element' => "image_hotspot_pointer_type",
											'value' => array( 'animletter' ),
							),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Long Text", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_longtext",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer text. Ex:Pointer Name #1", "VCMP_SLUG" ),
							"dependency" => Array( 
											'element' => "image_hotspot_pointer_type",
											'value' => array( 'longtext' ),
							),
							"value" => ""
					),
					
					array(
					'type' => 'dropdown',
					'heading' => __( 'Icon library', 'js_composer' ),
					'value' => array(
						__( 'Choose icon type', 'js_composer' ) => '',
						__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
						__( 'Open Iconic', 'js_composer' ) => 'openiconic',
						__( 'Typicons', 'js_composer' ) => 'typicons',
						__( 'Entypo', 'js_composer' ) => 'entypo',
						__( 'Linecons', 'js_composer' ) => 'linecons',
						__( 'Mono Social', 'js_composer' ) => 'monosocial',
					),
					'param_name' => 'icon_type',
					'group' => __( 'Pointer', 'VCMP_SLUG' ),
					"dependency" => Array( 
											'element' => "image_hotspot_pointer_type",
											'value' => array( 'animicon' ),
					),
					'description' => __( 'Select icon library.', 'js_composer' ),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-info-circle',
						'group' => __( 'Pointer', 'VCMP_SLUG' ),
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'fontawesome',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_openiconic',
						'group' => __( 'Pointer', 'VCMP_SLUG' ),
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'openiconic',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'openiconic',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_typicons',
						'group' => __( 'Pointer', 'VCMP_SLUG' ),
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'typicons',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'typicons',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_entypo',
						'group' => __( 'Pointer', 'VCMP_SLUG' ),
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'entypo',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'entypo',
						),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_linecons',
						'group' => __( 'Pointer', 'VCMP_SLUG' ),
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'linecons',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'linecons',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Pointer', 'js_composer' ),
						'param_name' => 'icon_monosocial',
						'group' => __( 'Icon', 'VCMP_SLUG' ),
						'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'monosocial',
							'iconsPerPage' => 4000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'monosocial',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Icon Font Size", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_icon_fontsize",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer icon font size. Ex:110%", "VCMP_SLUG" ),
							"dependency" => Array( 
											'element' => "image_hotspot_pointer_type",
											'value' => array( 'animicon' ),
							),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Border Radius", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_border_radius",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer border radius. Ex:100%", "VCMP_SLUG" ),
							"dependency" => Array( 
											'element' => "image_hotspot_pointer_type",
											'value' => array( 'animicon', 'animletter' ),
							),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Title", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_title",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer name title. Ex:Awesome Eyes", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Left Position", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_position_left",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer left position. Ex: 40%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Pointer Top Position", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_position_top",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please enter the pointer top position. Ex: 20%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Pointer Text Color", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_color",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please choose the pointer color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Pointer Background Color", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_bg_color",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please choose the pointer background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Pointer Pulse Effect Background Color", "VCMP_SLUG" ),
							"param_name" => "image_hotspot_pointer_pulse_bg_color",
							'admin_label' => true,
							'group' => "Pointer",
							"description" => __( "Please choose the pointer pulse effect background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => false,
							'group' => "Content",
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
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
	 * HotSpot Shortcode
	 */
	public function vc_image_hotspot_shortcode( $atts, $content = null ) {
	
		$GLOBALS['expo_count'] = 0;
		$GLOBALS['expo_items'] ='';
		$GLOBALS['expo_details'] ='';
		
		$output = $el_class = $css = $image_hotspot_bg = $image_hotspot_grid_bg = $image_hotspot_popup_type =  $image_hotspot_tooltip_style = $image_hotspot_tooltip_width = $image_hotspot_tooltip_animation = $image_hotspot_tooltip_delay = $image_hotspot_tooltip_timer = $image_hotspot_tooltip_trigger = $image_hotspot_tooltip_trigger = $image_hotspot_pointer_border_radius = $google_fonts = $use_theme_fonts = $image_hotspot_pointer_type = $image_hotspot_pointer = $image_hotspot_pointer_longtext = $icon_type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_monosocial = $google_fonts = $use_theme_fonts = $image_hotspot_pointer_type = '';
		
		extract(shortcode_atts( array(
			'el_class' => '',
			'css' => '',
			'image_hotspot_bg' => '',
			'image_hotspot_grid_bg' => '',
			'image_hotspot_popup_type' => '',
			'image_hotspot_tooltip_style' => '',
			'image_hotspot_tooltip_width' => '',
			'image_hotspot_tooltip_animation' => '',
			'image_hotspot_tooltip_delay' => '',
			'image_hotspot_tooltip_timer' => '',
			'image_hotspot_tooltip_trigger' => '',
			'image_hotspot_text_color' => '',
			'image_hotspot_pointer_border_radius' => '',
			'image_hotspot_pointer' => '',
			'image_hotspot_pointer_longtext' => '',
			'image_hotspot_pointer_type' => '',
			'image_hotspot_pointer_icon_fontsize' => '',
			'icon_type' => '',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypo' => '',
			'icon_linecons' => '',
			'icon_monosocial' => '',
			'google_fonts' => '',
			'use_theme_fonts' => '',

		), $atts ) );

		wp_enqueue_style( 'vc_image_hotspot_style', VCMP_URL . 'modules/vcmp-hotspot/assets/css/vc_image_hotspot.css');
		
		/*GOOGLE FONTS*/
		$google_fonts_obj = new Vc_Google_Fonts();
		$google_fonts_data = $google_fonts_obj->_vc_google_fonts_parse_attributes(
			array(
		        'font_family',
		        'font_style'
			),
			$google_fonts
		);
		
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		
		if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
		
			if ( $google_fonts_data['values']['font_family'] ) {
				$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
				
				$styles[] = 'font-family:' . $google_fonts_family[0];
				$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
				
				$styles[] = 'font-weight:' . $google_fonts_styles[1];
				$styles[] = 'font-style:' . $google_fonts_styles[2];
				
			}
		}
		
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
		} else {
			$style = '';
		}
		
		if ( ! empty( $google_fonts ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
		}
		/*GOOGLE FONTS*/
		
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		
		if( ( $image_hotspot_popup_type == 'tooltip') ) {
			wp_enqueue_style( 'vc_image_hotspot_tooltipster', VCMP_URL . 'modules/vcmp-hotspot/assets/css/tooltipster.bundle.min.css');
			
			if( ( $image_hotspot_tooltip_style == 'borderless') ) {
				wp_enqueue_style( 'vc_image_hotspot_tooltipster_noir', VCMP_URL . 'modules/vcmp-hotspot/assets/css/themes/tooltipster-sideTip-borderless.min.css');
			}	
			
			if( ( $image_hotspot_tooltip_style == 'light') ) {
				wp_enqueue_style( 'vc_image_hotspot_tooltipster_noir', VCMP_URL . 'modules/vcmp-hotspot/assets/css/themes/tooltipster-sideTip-light.min.css');
			}
			
			if( ( $image_hotspot_tooltip_style == 'noir') ) {
				wp_enqueue_style( 'vc_image_hotspot_tooltipster_noir', VCMP_URL . 'modules/vcmp-hotspot/assets/css/themes/tooltipster-sideTip-noir.min.css');
			}
			
			if( ( $image_hotspot_tooltip_style == 'punk') ) {
				wp_enqueue_style( 'vc_image_hotspot_tooltipster_noir', VCMP_URL . 'modules/vcmp-hotspot/assets/css/themes/tooltipster-sideTip-punk.min.css');
			}
			
			if( ( $image_hotspot_tooltip_style == 'shadow') ) {
				wp_enqueue_style( 'vc_image_hotspot_tooltipster_noir', VCMP_URL . 'modules/vcmp-hotspot/assets/css/themes/tooltipster-sideTip-shadow.min.css');
			}
			
			wp_enqueue_script( 'vc_image_hotspot_tooltipster', VCMP_URL.'modules/vcmp-hotspot/assets/js/tooltipster.bundle.min.js', array('jquery'), '1.0', TRUE);
			
			
			$tooltipster= '<script>
							jQuery(document).ready(function($) {
								$(\'.hotspotooltip\').tooltipster({
									contentAsHTML: true,
									maxWidth: '.$image_hotspot_tooltip_width.',
									interactive: true,
									trackOrigin: true,
									delay: '.$image_hotspot_tooltip_delay.',
									delay: '.$image_hotspot_tooltip_timer.',
									repositionOnScroll: true,
									trackTooltip: true,
									animation: \''.$image_hotspot_tooltip_animation.'\',
									trigger: \''.$image_hotspot_tooltip_trigger.'\',
									theme: \'tooltipster-'.$image_hotspot_tooltip_style.'\'
								});
							});
						</script>
					'; 
		}
		
		$image_hotspot_bg = wp_get_attachment_image_src(intval($image_hotspot_bg), 'full');
		$image_hotspot_bg = $image_hotspot_bg[0];	
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		static $ic = 0;
		static $id = 0;
		static $ie = 0;
		static $if = 0;
		static $ig = 0;
		static $ih = 0;
		static $ij = 0;
		static $ik = 0;
		static $il = 0;
		static $im = 0;
		static $in = 0;
		static $io = 0;
		static $ip = 0;
		
		do_shortcode( $content );
		
		//if popup type is tooltip
		if( ( $image_hotspot_popup_type == 'tooltip') ) {
		
			if( is_array( $GLOBALS['expo_items'] ) ){
			
				foreach( $GLOBALS['expo_items'] as $expo_item ){
				
					$pointertype ='';
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'animletter') ) {	
						$pointertype =''.$expo_item['image_hotspot_pointer'].'';
					}
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'longtext') ) {	
						$pointertype =''.$expo_item['image_hotspot_pointer_longtext'].'';
					}
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'animicon') ) {	
						$pointertype ='<i class="'.$expo_item['icon_fontawesome'].''.$expo_item['icon_openiconic'].''.$expo_item['icon_typicons'].''.$expo_item['icon_entypo'].''.$expo_item['icon_linecons'].''.$expo_item['icon_monosocial'].' vcmp_hotspot_icon" style="font-size:'.$expo_item['image_hotspot_pointer_icon_fontsize'].'; display: block;"> </i>';
					}
					
					
					$expo_items[] .= '<a id="hotspot'.$i++.'" class="hotspotooltip '.esc_attr( $el_class ).'  '.esc_attr( $css_class ).' vcmp_'.$expo_item['image_hotspot_pointer_type'].'" data-tooltip-content="#hotspot-content-'.$ig++.'" href="#hotspot-content-'.$ia++.'" title="'.$expo_item['image_hotspot_pointer_title'].'">
									  <div ' . $style . ' class="vcmp_'.$expo_item['image_hotspot_pointer_type'].'">
										'.$pointertype.'
									  </div>
									</a>
									<style>
										.hotspots-inner-wrap > a#hotspot'.$ic++.' > div { background: '.$expo_item['image_hotspot_pointer_bg_color'].' }
										.hotspots-inner-wrap > a#hotspot'.$id++.':before, .hotspots-inner-wrap > ahotspot'.$ie++.':after { background: '.$expo_item['image_hotspot_pointer_pulse_bg_color'].'; }
										.hotspots-inner-wrap > a#hotspot'.$il++.' > div, .hotspots-inner-wrap > a#hotspot'.$im++.':before, .hotspots-inner-wrap > a#hotspot'.$in++.':after { border-radius: '.$expo_item['image_hotspot_pointer_border_radius'].'; }
										#hotspot'.$if++.'{ top: '.$expo_item['image_hotspot_pointer_position_top'].'%; left: '.$expo_item['image_hotspot_pointer_position_left'].'%; }
										.hotspots-inner-wrap > a#hotspot'.$io++.'.vcmp_longtext:after, .hotspots-inner-wrap > a#hotspot'.$ip++.'.vcmp_longtext:before {animation:none; display:none}
										#hotspot-content-'.$ih++.' > p{ color: '.$image_hotspot_text_color.'}
										.tooltipster-box {background: '.$image_hotspot_grid_bg.' !important}
										.tooltipster-right .tooltipster-arrow-border, .tooltipster-right .tooltipster-arrow-background { border-right-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-left .tooltipster-arrow-border, .tooltipster-left .tooltipster-arrow-background { border-left-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-top .tooltipster-arrow-border, .tooltipster-top .tooltipster-arrow-background { border-top-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-bottom .tooltipster-arrow-border, .tooltipster-bottom .tooltipster-arrow-background { border-bottom-color: '.$image_hotspot_grid_bg.' !important; }
										#hotspot-content-'.$ij++.', #hotspot-content-'.$ik++.' p { font-family: '.$google_fonts_family[0].' !important; font-weight: '.$google_fonts_styles[1].'; font-style: '.$google_fonts_styles[2].'; }
									</style>
									';
									
									
										
					$expo_details[] = '
									<div class="tooltip_templates">
										<span id="hotspot-content-'.$ib++.'">
											'.do_shortcode($expo_item['content']).'
										</span>
									</div>
									';
					
				}
				
					
					$output = "\n".'
								<div id="hotspots-wrap" class="'.esc_attr( $el_class ).' '.esc_attr( $css_class ).'">
									<section id="hotspots">
										 
										 <div class="hotspots-inner-wrap" style="background: url('.$image_hotspot_bg.') no-repeat scroll 0 0 / cover;">
											'.implode( "\n", $expo_items ).'
										 </div>
										 
										 <div id="hotspots-contents">
											'.implode( "\n", $expo_details ).'
										 </div>
									
									</section>
								</div>
									'.$tooltipster.'
								'."\n";
								
			}
			
		}
		
		//if popup type is lightbox
		if( ( $image_hotspot_popup_type == 'lightbox') ) {
		
			wp_enqueue_style( 'vc_venobox', VCMP_URL . 'modules/vcmp-hotspot/assets/css/venobox.css');
			wp_enqueue_script( 'vc_venobox', VCMP_URL.'modules/vcmp-hotspot/assets/js/venobox.js', array('jquery'), '1.0', TRUE);
			wp_enqueue_script( 'vc_image_hotspot_js', VCMP_URL.'modules/vcmp-hotspot/assets/js/vc_image_hotspot.js', array('jquery'), '1.0', TRUE);
			
			if( is_array( $GLOBALS['expo_items'] ) ){
			
				foreach( $GLOBALS['expo_items'] as $expo_item ){
				
					$pointertype ='';
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'animletter') ) {	
						$pointertype =''.$expo_item['image_hotspot_pointer'].'';
					}
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'longtext') ) {	
						$pointertype =''.$expo_item['image_hotspot_pointer_longtext'].'';
					}
					
					if( ( $expo_item['image_hotspot_pointer_type'] == 'animicon') ) {	
						$pointertype ='<i class="'.$expo_item['icon_fontawesome'].''.$expo_item['icon_openiconic'].''.$expo_item['icon_typicons'].''.$expo_item['icon_entypo'].''.$expo_item['icon_linecons'].''.$expo_item['icon_monosocial'].' vcmp_hotspot_icon" style="font-size:'.$expo_item['image_hotspot_pointer_icon_fontsize'].'; display: block;"> </i>';
					}
					
					
					$expo_items[] = '<a id="hotspot'.$i++.'" class="venobox '.esc_attr( $el_class ).'  '.esc_attr( $css_class ).' vcmp_'.$expo_item['image_hotspot_pointer_type'].'" data-type="inline" href="#hotspot-content-'.$ia++.'" title="'.$expo_item['image_hotspot_pointer_title'].'">
									  <div ' . $style . ' class="vcmp_'.$expo_item['image_hotspot_pointer_type'].'">
										'.$pointertype.'
									  </div>
									</a>
									<style>
										.hotspots-inner-wrap > a#hotspot'.$ic++.' > div { background: '.$expo_item['image_hotspot_pointer_bg_color'].' }
										.hotspots-inner-wrap > a#hotspot'.$id++.':before, .hotspots-inner-wrap > ahotspot'.$ie++.':after { background: '.$expo_item['image_hotspot_pointer_pulse_bg_color'].'; }
										.hotspots-inner-wrap > a#hotspot'.$il++.' > div, .hotspots-inner-wrap > a#hotspot'.$im++.':before, .hotspots-inner-wrap > a#hotspot'.$in++.':after { border-radius: '.$expo_item['image_hotspot_pointer_border_radius'].'; }
										#hotspot'.$if++.'{ top: '.$expo_item['image_hotspot_pointer_position_top'].'%; left: '.$expo_item['image_hotspot_pointer_position_left'].'%; }
										.hotspots-inner-wrap > a#hotspot'.$io++.'.vcmp_longtext:after, .hotspots-inner-wrap > a#hotspot'.$ip++.'.vcmp_longtext:before {animation:none; display:none}
										#hotspot-content-'.$ih++.' > p{ color: '.$image_hotspot_text_color.'}
										.tooltipster-box {background: '.$image_hotspot_grid_bg.' !important}
										.tooltipster-right .tooltipster-arrow-border, .tooltipster-right .tooltipster-arrow-background { border-right-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-left .tooltipster-arrow-border, .tooltipster-left .tooltipster-arrow-background { border-left-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-top .tooltipster-arrow-border, .tooltipster-top .tooltipster-arrow-background { border-top-color: '.$image_hotspot_grid_bg.' !important; }
										.tooltipster-bottom .tooltipster-arrow-border, .tooltipster-bottom .tooltipster-arrow-background { border-bottom-color: '.$image_hotspot_grid_bg.' !important; }
										#hotspot-content-'.$ij++.', #hotspot-content-'.$ik++.' p { font-family: '.$google_fonts_family[0].' !important; font-weight: '.$google_fonts_styles[1].'; font-style: '.$google_fonts_styles[2].'; }
									</style>
									';
									
									
										
					$expo_details[] = '<article id="hotspot-content-'.$ib++.'"><p>'.do_shortcode($expo_item['content']).'</p></article>';
					
				}
				
					
					$output = "\n".'
								<div id="hotspots-wrap" class="'.esc_attr( $el_class ).' '.esc_attr( $css_class ).'">
									<section id="hotspots">
										 
										 <div class="hotspots-inner-wrap" style="background: url('.$image_hotspot_bg.') no-repeat scroll 0 0 / cover;">
											'.implode( "\n", $expo_items ).'
										 </div>
										 
										 <div id="hotspots-contents">
											'.implode( "\n", $expo_details ).'
										 </div>
									
									</section>
								</div>
									<style>
										.vbox-inline { background: '.$image_hotspot_grid_bg.' !important; color: '.$image_hotspot_text_color.' }
									</style>
								'."\n";
								
			}
			
		}
		
		return $output;
	}
	
	

	/**
	 * HotSpot Content Items Shortcode
	 */
	public function vc_image_hotspot_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $css = $image_hotspot_img = $image_hotspot_bg = $image_hotspot_pointer = $image_hotspot_pointer_title = $image_hotspot_pointer_position_top = $image_hotspot_pointer_position_left = $image_hotspot_pointer_color = $image_hotspot_pointer_bg_color = $image_hotspot_pointer_pulse_bg_color = $image_hotspot_grid_bg = $image_hotspot_popup_type = $image_hotspot_tooltip_style = $image_hotspot_tooltip_width = $image_hotspot_tooltip_animation = $image_hotspot_tooltip_delay = $image_hotspot_tooltip_timer = $image_hotspot_tooltip_trigger = $image_hotspot_text_color = $image_hotspot_pointer_border_radius = $icon_type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_monosocial = $google_fonts = $use_theme_fonts = $image_hotspot_pointer_type = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'image_hotspot_img' => '',
					'image_hotspot_bg' => '',
					'image_hotspot_pointer' => '',
					'image_hotspot_pointer_title' => '',
					'image_hotspot_pointer_position_top' => '',
					'image_hotspot_pointer_position_left' => '',
					'image_hotspot_pointer_color' => '',
					'image_hotspot_pointer_bg_color' => '',
					'image_hotspot_pointer_pulse_bg_color' => '',
					'image_hotspot_grid_bg' => '',
					'image_hotspot_popup_type' => '',
					'image_hotspot_tooltip_style' => '',
					'image_hotspot_tooltip_width' => '',
					'image_hotspot_tooltip_animation' => '',
					'image_hotspot_tooltip_delay' => '',
					'image_hotspot_tooltip_timer' => '',
					'image_hotspot_tooltip_trigger' => '',
					'image_hotspot_text_color' => '',
					'image_hotspot_pointer_border_radius' => '',
					'image_hotspot_pointer_type' => '',
					'image_hotspot_pointer_longtext' => '',
					'image_hotspot_pointer_icon_fontsize' => '',
					'icon_type' => '',
					'icon_fontawesome' => '',
					'icon_openiconic' => '',
					'icon_typicons' => '',
					'icon_entypo' => '',
					'icon_linecons' => '',
					'icon_monosocial' => '',
					'google_fonts' => '',
					'use_theme_fonts' => '',
				), $atts 
			) 
		);
		
		$image_hotspot_bg = wp_get_attachment_image_src(intval($image_hotspot_bg), 'full');
		$image_hotspot_bg = $image_hotspot_bg[0];
		
		vc_icon_element_fonts_enqueue( $icon_type );	
		
		$x = $GLOBALS['expo_count'];
		$GLOBALS['expo_items'][$x] = 
			array( 
			'image_hotspot_pointer'					=> sprintf( $image_hotspot_pointer, $GLOBALS['expo_count'] ), 
			'image_hotspot_pointer_title'			=> $image_hotspot_pointer_title,
			'image_hotspot_pointer_position_top'	=> $image_hotspot_pointer_position_top,
			'image_hotspot_pointer_position_left'	=> $image_hotspot_pointer_position_left,
			'image_hotspot_pointer_color'			=> $image_hotspot_pointer_color,
			'image_hotspot_pointer_bg_color'		=> $image_hotspot_pointer_bg_color,
			'image_hotspot_pointer_pulse_bg_color'	=> $image_hotspot_pointer_pulse_bg_color,
			'image_hotspot_bg'						=> $image_hotspot_bg,
			'image_hotspot_grid_bg'					=> $image_hotspot_grid_bg,
			'image_hotspot_popup_type'				=> $image_hotspot_popup_type,
			'image_hotspot_tooltip_style'			=> $image_hotspot_tooltip_style,
			'image_hotspot_tooltip_width'			=> $image_hotspot_tooltip_width,
			'image_hotspot_tooltip_animation'		=> $image_hotspot_tooltip_animation,
			'image_hotspot_tooltip_delay'			=> $image_hotspot_tooltip_delay,
			'image_hotspot_tooltip_timer'			=> $image_hotspot_tooltip_timer,
			'image_hotspot_tooltip_trigger'			=> $image_hotspot_tooltip_trigger,
			'image_hotspot_text_color'				=> $image_hotspot_text_color,
			'icon_type'								=> $icon_type,
			'icon_fontawesome'						=> $icon_fontawesome,
			'icon_openiconic'						=> $icon_openiconic,
			'icon_typicons'							=> $icon_typicons,
			'icon_entypo'							=> $icon_entypo,
			'icon_linecons'							=> $icon_linecons,
			'icon_monosocial'						=> $icon_monosocial,
			'google_fonts'							=> $google_fonts,
			'use_theme_fonts'						=> $use_theme_fonts,
			'image_hotspot_pointer_type'			=> $image_hotspot_pointer_type,
			'image_hotspot_pointer_longtext'		=> $image_hotspot_pointer_longtext,
			'image_hotspot_pointer_icon_fontsize'	=> $image_hotspot_pointer_icon_fontsize,
			'image_hotspot_pointer_border_radius'	=> $image_hotspot_pointer_border_radius,
			'content' 								=>  $content,
			'el_class' 								=>  $el_class 
			);
			
		$GLOBALS['expo_count']++;
		
		if( ( $icon_type == 'fontawesome') ) {
			wp_enqueue_style( 'font-awesome' );
		}
		
		if( ( $icon_type == 'openiconic') ) {
			wp_enqueue_style( 'vc_openiconic' );
		}
		
		if( ( $icon_type == 'typicons') ) {
			wp_enqueue_style( 'vc_typicons' );
		}
		
		if( ( $icon_type == 'entypo') ) {
			wp_enqueue_style( 'vc_entypo' );
		}
		
		if( ( $icon_type == 'linecons') ) {
			wp_enqueue_style( 'vc_linecons' );
		}
		
		if( ( $icon_type == 'monosocial') ) {
			wp_enqueue_style( 'vc_monosocialiconsfont' );
		}
		
		return $output;
		
	}

}

	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_image_hotspot extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_image_hotspot_content extends WPBakeryShortCode {

		}
	}
	
// Finally initialize code
new VcmpHotSpot();