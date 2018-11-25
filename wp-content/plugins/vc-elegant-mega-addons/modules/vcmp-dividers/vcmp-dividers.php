<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Dividers
 * Description: Custom Dividers shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpDividers extends VcmpModule{

	const slug = 'vcmp_dividers';
	const base = 'vcmp_dividers';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Custom Dividers", "VCMP_SLUG"),
            "description" => __("Add 3D profile box to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            "params" => array(
			
				array(
						"type" => "vcmp_presets",
						"param_name" => "Dividers",
						"admin_label" => false,
						"value" => "vcmp-dividers"
				),
				
				array( 
						"type" => "attach_image",
						"heading" => __( "Background Image", "VCMP_SLUG" ),
						"param_name" => "vcmpdividers_bgimg",
						"description" => __( "Please choose a image.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Background Color", "VCMP_SLUG" ),
						"param_name" => "vcmpdividers_bgcolor",
						"description" => __( "Please choose a color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Line Color", "VCMP_SLUG" ),
						"param_name" => "vcmpdividers_line_color",
						"description" => __( "Please choose a color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
			
				array( 
						"type" => "textfield",
						"heading" => __( "Title", "VCMP_SLUG" ),
						"param_name" => "vcmpdividers_title",
						"description" => __( "Please enter a name.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Title",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "URL", "VCMP_SLUG" ),
						"param_name" => "vcmpdividers_url",
						"description" => __( "Please enter a url.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Target",
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
					'type' => 'dropdown',
					'heading' => __( 'Icon Alignment', 'js_composer' ),
					'value' => array(
						__( 'Left', 'VCMP_SLUG' ) => 'left',
						__( 'Right', 'VCMP_SLUG' ) => 'right',
						__( 'Center Top', 'VCMP_SLUG' ) => 'centertop',
					),
					'param_name' => 'icon_alignment',
					'group' => __( 'Icon', 'VCMP_SLUG' ),
					'description' => __( 'Select icon alignment.', 'js_composer' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Icon library', 'js_composer' ),
					'value' => array(
						__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
						__( 'Open Iconic', 'js_composer' ) => 'openiconic',
						__( 'Typicons', 'js_composer' ) => 'typicons',
						__( 'Entypo', 'js_composer' ) => 'entypo',
						__( 'Linecons', 'js_composer' ) => 'linecons',
						__( 'Mono Social', 'js_composer' ) => 'monosocial',
					),
					'param_name' => 'icon_type',
					'group' => __( 'Icon', 'VCMP_SLUG' ),
					'description' => __( 'Select icon library.', 'js_composer' ),
				),
				
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-info-circle',
					'group' => __( 'Icon', 'VCMP_SLUG' ),
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
					'group' => __( 'Icon', 'VCMP_SLUG' ),
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
					'group' => __( 'Icon', 'VCMP_SLUG' ),
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
					'group' => __( 'Icon', 'VCMP_SLUG' ),
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
					'group' => __( 'Icon', 'VCMP_SLUG' ),
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
					'heading' => __( 'Icon', 'js_composer' ),
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
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),
				
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
				),

            )
        ) );
    }
	
	
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $vcmpdividers_title = $vcmpdividers_bgimg = $vcmpdividers_line_color = $vcmpdividers_bgcolor = $vcmpdividers_url = $google_fonts = $use_theme_fonts = $font_container = $css = $icon_type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_monosocial = $icon_alignment = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'vcmpdividers_title' => '',
			'vcmpdividers_title_border' => '',
			'vcmpdividers_line_color' => '',
			'vcmpdividers_bgimg' => '',
			'vcmpdividers_bgcolor' => '',
			'vcmpdividers_url' => '',
			'google_fonts' => '',
			'use_theme_fonts' => '',
			'font_container' => '',
			'icon_type' => '',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypo' => '',
			'icon_linecons' => '',
			'icon_monosocial' => '',
			'icon_alignment' => '',
			'css' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_dividers', VCMP_URL . 'modules/vcmp-dividers/assets/css/vc_dividers.css');
		
		$vc_vcmpdividers_bigthumbnails= array();
		$images = explode(',', $vcmpdividers_bgimg);
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_vcmpdividers_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		}
		
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
		
		vc_icon_element_fonts_enqueue( $icon_type );
		
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
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		static $ic = 0;
		static $id = 0;
		static $ie = 0;
		
		$output .= '<div id="vcmp_divider_'.$i++.'" class="vcmp_divider_modern  '.esc_attr( $el_class ).'">
						<' . $font_container_data['values']['tag'] . ' class="vcmp_divider_title '.esc_attr( $css_class ).'" ' . $style . '>';
		
		if ( ! empty( $vcmpdividers_url ) ) {
			$output .= '<a class="vcmp_divider_url" href="'.$vcmpdividers_url.'" ' . $style . '>';
		}
				
		$output .= '<i class="'.$icon_fontawesome.''.$icon_openiconic.''.$icon_typicons.''.$icon_entypo.''.$icon_linecons.''.$icon_monosocial.' vcmp_divider_icon '.$icon_alignment.'"> </i> '.$vcmpdividers_title.' ';
		
		if ( ! empty( $vcmpdividers_url ) ) {
			$output .= '</a>';
		}
				
		$output .= '</' . $font_container_data['values']['tag'] . '>
					</div>
					';
					
		$output .= '<style>';
		$output .= '#vcmp_divider_'.$id++.'.vcmp_divider_modern:before { border-top: 1px solid '.$vcmpdividers_line_color.'; }
					#vcmp_divider_'.$ie++.'.vcmp_divider_modern .vcmp_divider_title { background: '.$vcmpdividers_bgcolor.' url('.$bigimage_array[0].') no-repeat scroll center center /cover;}
					';
		$output .= '</style>';
					
		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpDividers();