<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Highlight Card
 * Description: Highlight Card shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpHighlightCard extends VcmpModule{

	const slug = 'vcmp_highlight_card';
	const base = 'vcmp_highlight_card';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Highlight Card", "VCMP_SLUG"),
            "description" => __("Add Highlight card to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmp_highlight_card.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmp_highlight_card_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Highlight Card Background Image", "VCMP_SLUG" ),
						"param_name" => "vcmp_highlight_card_bgimg",
						"description" => __( "Please choose a image for the highlight card.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				vc_map_add_css_animation( true ),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Highlight Color", "VCMP_SLUG" ),
						"param_name" => "vcmp_highlight_card_hcolor",
						"description" => __( "Please choose a color for the highlight.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Highlight Card Content", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter content for the highlight card.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( 'Content', 'VCMP_SLUG' ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Highlight Card Link URL", "VCMP_SLUG" ),
						"param_name" => "vcmp_highlight_card_url",
						"description" => __( "Please enter link url for the highlight card.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( 'Target', 'VCMP_SLUG' ),
						"value" => ""
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
      
	  $output = $el_class = $vcmp_highlight_card_url = $vcmp_highlight_card_bgimg = $vcmp_highlight_card_hcolor = $font_container = $use_theme_fonts = $use_custom_for_content = $google_fonts = $css = $css_animation = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'vcmp_highlight_card_bgimg' => '',
			'vcmp_highlight_card_hcolor' => '',
			'vcmp_highlight_card_url' => '',
			'font_container' => '',
			'use_custom_for_content' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			'css' => '',
			'css_animation' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_highlight_card', VCMP_URL . 'modules/vcmp-animated-highlight/assets/css/vc_highlight_card.css');
		
		$vc_vcmp_highlight_card_bigthumbnails= array();
		$images = explode(',', $vcmp_highlight_card_bgimg);
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_vcmp_highlight_card_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		}
		
		/*CSS ANIMATIONS*/
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		/*CSS ANIMATIONS*/
		
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
		
		static $i = 0;
		static $io = 0;
		static $ioo = 0;
		static $iooo = 0;
		static $ioooo = 0;
		static $ioi = 0;
		
		$output .= '
					<div class="highlightcard '.esc_attr( $css_class ).' '.esc_attr( $el_class ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'" style="background: url('.$bigimage_array[0].') no-repeat scroll 0 0 / cover" id="highlightcard-'.$i++.'">
						<' . $font_container_data['values']['tag'] . ' class="highlightcard-title">
							<a href="'.$vcmp_highlight_card_url.'" ' . $style . '>'.$content .'</a>
						</' . $font_container_data['values']['tag'] . '>
					</div>
					<style>
						#highlightcard-'.$io++.' .highlightcard-title { background: linear-gradient(to right, rgba(255, 255, 255, 0) 50%, '.$vcmp_highlight_card_hcolor.' 50%); background-size: 200%;}
						#highlightcard-'.$ioo++.':hover .highlightcard-title { background-position: -100% 0 !important; }
						#highlightcard-'.$iooo++.':hover { transform: translateY(-10px) scale(1.02) !important; }
						#highlightcard-'.$ioooo++.' { transition: .3s ease; }
					</style>
					';
		if ( $use_custom_for_content== 'true' ) {			
				$output .= '<style>
								#highlightcard-'.$ioi++.' .highlightcard-title * {font-family:'.$google_fonts_family[0].'; font-weight:'.$google_fonts_styles[1].'; font-style:'.$google_fonts_styles[2].' }
							</style>';
		}
					
		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpHighlightCard();