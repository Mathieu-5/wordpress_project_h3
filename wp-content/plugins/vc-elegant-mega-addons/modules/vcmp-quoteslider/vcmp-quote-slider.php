<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Quote Slider
 * Description: Quote slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpQuoteSlider extends VcmpModule{

	const slug = 'quote_slider';
	const base = 'quote_slider';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'quote_slider_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'quote_slider_content_shortcode_vc' ) );
		add_shortcode( 'quote_slider', array( $this, 'vc_quote_slider_shortcode' ));
		add_shortcode( 'quote_slider_content', array( $this, 'quote_slider_content_shortcode' ));
	}

	
	// Parent Element
	public function quote_slider_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Quote Slider' , 'VCMP_SLUG' ),
				'base'                    => 'quote_slider',
				'description'             => __( 'Add quote slider to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'quote_slider_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
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
	public function quote_slider_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Quote Slider Item', 'VCMP_SLUG'),
				'base'            => 'quote_slider_content',
				'description'     => __( 'Add quote slider items to quote slider.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'quote_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
						"type" => "attach_image",
						"heading" => __( "Quote Owner Photo", "VCMP_SLUG" ),
						"param_name" => "quoteslider_img",
						"description" => __( "Please choose image for the quote owner.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( 'Photo', 'VCMP_SLUG' ),
						"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Quote Slider Photo Border Radius", "VCMP_SLUG" ),
						"param_name" => "quoteslider_img_border_radius",
						'admin_label' => true,
						"description" => __( "Please enter owner photo border radius for quote. Ex:100% ", "VCMP_SLUG" ),
						'group' => __( 'Photo', 'VCMP_SLUG' ),
						"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Quote Slider Photo Width", "VCMP_SLUG" ),
						"param_name" => "quoteslider_img_width",
						'admin_label' => true,
						"description" => __( "Please enter owner photo width for quote. Ex:50% ", "VCMP_SLUG" ),
						'group' => __( 'Photo', 'VCMP_SLUG' ),
						"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Quote Slider Owner", "VCMP_SLUG" ),
						"param_name" => "quoteslider_owner",
						"description" => __( "Please enter owner for quote.", "VCMP_SLUG" ),
						'group' => __( 'Title', 'VCMP_SLUG' ),
						"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Quote Slider Owner URL", "VCMP_SLUG" ),
						"param_name" => "quoteslider_owner_url",
						"description" => __( "Please enter owner url for quote title.", "VCMP_SLUG" ),
						'group' => __( 'Title', 'VCMP_SLUG' ),
						"value" => ""
					),
					
					array( 
						"type" => "textarea_html",
						"heading" => __( "Quote Slider Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter short description for quote.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( 'Content', 'VCMP_SLUG' ),
						"value" => ""
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
						'type' => 'checkbox',
						'heading' => __( 'Custom font for the content?', 'VCMP_SLUG' ),
						'param_name' => 'use_custom_for_content',
						'value' => "",
						'admin_label' => true,
						'group' => __( 'Custom fonts', 'js_composer' ),
						"dependency" => Array( 
									'element' => "use_theme_fonts",
									'value_not_equal_to' => array( 'yes' ),
								),
						'description' => __( 'Use this custom font family for the content.', 'VCMP_SLUG' ),
					),
						
					array(
					'type' => 'font_container',
					'param_name' => 'font_container',
					'value' => 'tag:h2',
					'group' => __( 'Title', 'VCMP_SLUG' ),
						
						'settings' => array(
							
							'fields' => array(
								'tag' => 'h2', // default value h2
								'text_align',
								'font_size',
								'line_height',
								'color',
								'font_style',
								'tag_description' => __( 'Select element tag.', 'VCMP_SLUG' ),
								'text_align_description' => __( 'Select text alignment.', 'VCMP_SLUG' ),
								'font_size_description' => __( 'Enter font size.', 'VCMP_SLUG' ),
								'line_height_description' => __( 'Enter line height.', 'VCMP_SLUG' ),
								'color_description' => __( 'Select heading color.', 'VCMP_SLUG' ),
								'font_style_description' => __('Select letter style.', 'VCMP_SLUG'),
							),
						),
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
	 * Quote Slider Shortcode
	 */
	public function vc_quote_slider_shortcode( $atts, $content = null ) {
		$output = $el_class = $css = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_flexslider', VCMP_URL . 'modules/vcmp-quoteslider/assets/css/flexslider.css');
		wp_enqueue_style( 'vc_quote_slider', VCMP_URL . 'modules/vcmp-quoteslider/assets/css/vc_quote_slider.css');
		wp_enqueue_script( 'vc_flexslider', VCMP_URL.'modules/vcmp-quoteslider/assets/js/jquery.flexslider.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_quote_slider', VCMP_URL.'modules/vcmp-quoteslider/assets/js/vc_quote_slider.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$output = '<section class="gallery-quote '.esc_attr( $el_class ).'"> <div class="flexslider"> <ul class="slides">'. do_shortcode($content) .'</ul></div></section>';
		return $output;
	}
	

	/**
	 * Quote Slider Content Items Shortcode
	 */
	public function quote_slider_content_shortcode( $atts, $content = null ) {
		
		$output = $el_class = $css = $quoteslider_img = $quoteslider_img_width = $use_custom_for_content = $quoteslider_img_border_radius = $quoteslider_owner = $quoteslider_owner_url = $use_theme_fonts = $google_fonts = $font_container = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'quoteslider_img' => '',
					'quoteslider_img_width' => '',
					'quoteslider_img_border_radius' => '',
					'quoteslider_owner' => '',
					'quoteslider_owner_url' => '',
					'use_theme_fonts' => '',
					'google_fonts' => '',
					'use_custom_for_content' => '',
					'font_container' => '',
				), $atts 
			) 
		);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$quoteslider_img = wp_get_attachment_image_src(intval($quoteslider_img), 'large');
		$quoteslider_img = $quoteslider_img[0];
		
		$font_container_obj = new Vc_Font_Container();
		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( 
			array(
		        'tag',
		        'text_align',
		        'font_size',
		        'line_height',
		        'color',
		        'font_style',
		        'font_style_italic',
		        'font_style_bold'
			), 
			$font_container 
		);
		
		if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
			foreach ( $font_container_data['values'] as $key => $value ) {
				if ( $key != 'tag' && strlen( $value ) > 0 ) {
					if ( preg_match( '/description/', $key ) ) {
						continue;
					}
					if ( $key == 'font_size' || $key == 'line_height' ) {
						$value = preg_replace( '/\s+/', '', $value );
					}
					if ( $key == 'font_size' ) {
						$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
						// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
						$regexr = preg_match( $pattern, $value, $matches );
						$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
						$unit = isset( $matches[2] ) ? $matches[2] : 'px';
						$value = $value . $unit;
					}
					if ( strlen( $value ) > 0 ) {
						if(array_key_exists($key, $font_container_data['fields'])){
							switch ($key) {
								case 'font_style_italic':
										if($value == 1){
											$styles[$key] = 'font-style: italic';
										}
									break;

								case 'font_style_bold':
										if($value == 1){
											$styles[$key] = 'font-weight: bold';
										}
									break;
								
								default:
										$styles[$key] = str_replace( '_', '-', $key ) . ': ' . $value;
									break;
							}
						}
					}
				}
			}
		}
		
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
		
		$output .= '<li class="'.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">';
							
			if ( ! empty( $quoteslider_owner_url ) ) {
		$output .= '<a href="'.$quoteslider_owner_url.'">';
			}
		$output .= '<img src="'.$quoteslider_img.'" style=" border-radius: '.$quoteslider_img_border_radius.'; max-width: '.$quoteslider_img_width.'; ">';
			
			if ( ! empty( $quoteslider_owner_url ) ) {
		$output .= '</a>';
			}
			
			
		$output .= '<blockquote';
		
		if ( $use_custom_for_content== 'true' ) {
					$output .= ' style="font-family:'.$google_fonts_family[0].'; font-weight:'.$google_fonts_styles[1].'; font-style:'.$google_fonts_styles[2].'; "';
		}
		
		$output .= '>"'.do_shortcode( strip_tags( $content ) ).'"';
		
		$output .= '<' . $font_container_data['values']['tag'] . ' class="quote-title" ' . $style . '>';
								
			if ( ! empty( $quoteslider_owner_url ) ) {
		$output .= '<a href="'.$quoteslider_owner_url.'" ' . $style . '>';
			}
		$output .= ''.$quoteslider_owner.'';
			if ( ! empty( $quoteslider_owner_url ) ) {
		$output .= '</a>';
			}
		$output .= '</' . $font_container_data['values']['tag'] . '>
							</blockquote>
					</li>
					';
		
		return $output;
	}
	

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_quote_slider extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_quote_slider_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpQuoteSlider();