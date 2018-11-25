<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Background Perspective
 * Description: Background perspective shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpBgPerspective extends VcmpModule{

	const slug = 'vcmp_bgperspective';
	const base = 'vcmp_bgperspective';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Background Perspective", "VCMP_SLUG"),
            "description" => __("Add background perspective effect to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_bgperspective.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_bgperspective_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Background Image", "VCMP_SLUG" ),
						"param_name" => "bgperspective_img",
						"description" => __( "Please choose your background image.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Background Height", "VCMP_SLUG" ),
						"param_name" => "bgperspective_height",
						"description" => __( "Please choose your background height. Ex: 600px", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Background Title", "VCMP_SLUG" ),
						"param_name" => "bgperspective_title",
						"description" => __( "Please choose your background image title.", "VCMP_SLUG" ),
						"value" => "",
						'group' => __( 'Title', 'VCMP_SLUG' ),
						'admin_label' => true
				),
				
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Background Title Background Color", "VCMP_SLUG" ),
						"param_name" => "bgperspective_title_bgcolor",
						"description" => __( "Please choose your background title bg color.", "VCMP_SLUG" ),
						"value" => "",
						'group' => __( 'Title', 'VCMP_SLUG' ),
						'admin_label' => true
				),

				array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
					'group' => __( 'Custom fonts', 'VCMP_SLUG' ),
					'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
				),
				
				array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => '',
				'group' => __( 'Custom fonts', 'VCMP_SLUG' ),
				
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
				'value' => 'tag:h1',
				'group' => __( 'Typography', 'VCMP_SLUG' ),
					
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
						"type" => "textarea_html",
						"heading" => __( "Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter content.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( 'Content', 'VCMP_SLUG' ),
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
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $bgperspective_img = $bgperspective_title = $bgperspective_height = $bgperspective_title_bgcolor = $font_container = $use_custom_for_content = $use_theme_fonts = $google_fonts = $css = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'bgperspective_img' => '',
			'bgperspective_title' => '',
			'bgperspective_height' => '',
			'bgperspective_title_bgcolor' => '',
			'font_container' => '',
			'use_custom_for_content' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_bgperspective_css', VCMP_URL . 'modules/vcmp-bgperspective/assets/css/vc-bgperspective.css');
		wp_enqueue_script( 'vc_bgperspective_js', VCMP_URL.'modules/vcmp-bgperspective/assets/js/vc-bgperspective.js', array('jquery'), '1.0', TRUE);
		
		$bgperspective_img = wp_get_attachment_image_src(intval($bgperspective_img), 'full');
		$bgperspective_img = $bgperspective_img[0];
		
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
				$styles[] = 'background:' . $bgperspective_title_bgcolor;
				
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
		
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		static $ic = 0;
		static $id = 0;
		
		$output .= '
					<div class="bgperspective '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" style="height: '.$bgperspective_height.';" id="bgperspective-'.$i++.'">
					  <div class="vcmp_bg" style="background: url('.$bgperspective_img.') no-repeat center center / cover;"></div>
					  <' . $font_container_data['values']['tag'] . ' class="bgperspective-title" ' . $style . '>'.$bgperspective_title.'</' . $font_container_data['values']['tag'] . '>
					  '.wpautop ( do_shortcode($content) ) .'
					</div>
				';
				
      return $output;
	  
	  
    }
	

}
// Finally initialize code
new VcmpBgPerspective();