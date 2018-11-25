<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Captions With Hover Effects
 * Description: Awesome image captions with effects shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageCaptions extends VcmpModule{

	const slug = 'vcmp_imagecaptions';
	const base = 'vcmp_imagecaptions';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Caption Effect", "VCMP_SLUG"),
            "description" => __("Add animated image captions to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_imagecaptions_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imagecaptions_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				vc_map_add_css_animation( true ),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Title", "VCMP_SLUG" ),
						"param_name" => "imagecaptions_title",
						"description" => __( "Please enter the image title.", "VCMP_SLUG" ),
						'admin_label' => true,
						"group" => __( "Content", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Sub Title", "VCMP_SLUG" ),
						"param_name" => "imagecaptions_subtitle",
						"description" => __( "Please enter the image subtitle.", "VCMP_SLUG" ),
						'admin_label' => true,
						"group" => __( "Content", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Link URL", "VCMP_SLUG" ),
						"param_name" => "imagecaptions_url",
						"description" => __( "Please enter the image link URL.", "VCMP_SLUG" ),
						'admin_label' => true,
						"group" => __( "Content", "VCMP_SLUG" ),
						"value" => ""
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Image Animation", "VCMP_SLUG" ),
						"param_name" => "imagecaptions_effect",
						"description" => __( "Please choose a effect for image.", "VCMP_SLUG" ),
						'admin_label' => true,
						"group" => __( "Settings", "VCMP_SLUG" ),
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Effect 1", "VCMP_SLUG" ) => "effect-1",
								__( "Effect 2", "VCMP_SLUG" ) => "effect-2",
								__( "Effect 3", "VCMP_SLUG" ) => "effect-3",
								__( "Effect 4", "VCMP_SLUG" ) => "effect-4",
								__( "Effect 5", "VCMP_SLUG" ) => "effect-5",
							)
				),
			
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Caption Background Color", "VCMP_SLUG" ),
					  	"param_name" => "imagecaptions_background_color",
					  	"description" => __( "Please choose background color for the caption.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Caption text Color", "VCMP_SLUG" ),
					  	"param_name" => "imagecaptions_text_color",
					  	"description" => __( "Please choose border color for button.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
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
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),

            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $css = $styles = $use_theme_fonts = $google_fonts = $css_animation = $use_custom_for_content = $imagecaptions_img = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'css' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			'css_animation' => '',
			'use_custom_for_content' => '',
			'imagecaptions_img' => '',
			'imagecaptions_url' => '',
			'imagecaptions_title' => '',
			'imagecaptions_subtitle' => '',
			'imagecaptions_effect' => '',
			'imagecaptions_background_color' => '', 
			'imagecaptions_text_color' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_image_captions', VCMP_URL . 'modules/vcmp-image-captions/assets/css/vc_image_captions.css');
		wp_enqueue_script( 'vc_image_captions', VCMP_URL . 'modules/vcmp-image-captions/assets/js/vc_image_captions.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'modernizr', VCMP_URL . 'assets/modernizr.js', array('jquery'), '1.0', FALSE);
		
		$imagecaptions_img = wp_get_attachment_image_src(intval($imagecaptions_img), 'full');
		$imagecaptions_img = $imagecaptions_img[0];
		$alt = get_post_meta(intval($imagecaptions_img), '_wp_attachment_image_alt', true);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		/*CSS ANIMATIONS*/
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		/*CSS ANIMATIONS*/
		
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
			
        $output .= '<div id="'.$imagecaptions_effect.'" class="vcmpcaption '.esc_attr( $css_class ).' '.esc_attr( $el_class ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'" '.$style.'>
						<figure>
							<img src="'.$imagecaptions_img.'" alt="'.$alt.'">
							<figcaption style="background:'.$imagecaptions_background_color.';" '.$style.'>
								<a href="' . $atts['imagecaptions_url'] . '" style="color:'.$imagecaptions_text_color.'"><h3>'.$imagecaptions_title.'</h3></a>
								<span style="color:'.$imagecaptions_text_color.'">'.$imagecaptions_subtitle.'</span>
							</figcaption>
						</figure>
					</div>
					';
					
		$output .= '';
		
		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpImageCaptions();