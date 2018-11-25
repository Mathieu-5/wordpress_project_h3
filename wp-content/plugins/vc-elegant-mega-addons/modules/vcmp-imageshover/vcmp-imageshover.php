<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Hover Effects
 * Description: Image Hover Effects shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageHoverEffects extends VcmpModule{

	const slug = 'vcmp_imagehovereffects';
	const base = 'vcmp_imagehovereffects';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Hover Effects", VCMP_SLUG),
            "description" => __("Add Image hover effects to your page.", VCMP_SLUG),
            "base" => self::base,
            "class" => "vc_imagehovereffects_class",
            "controls" => "full",
			'html_template'           => dirname( __FILE__ ) . '/lib/vc_templates/test_element.php',
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
			//'admin_enqueue_js'        => preg_replace( '/\s/', '%20', plugins_url( 'jquery.dd.min.js', __FILE__ ) ), // This will load extra js file in backend (when you edit page with VC) use preg replace to be sure that "space" will not break logic
			//'admin_enqueue_css'       => preg_replace( '/\s/', '%20', plugins_url( 'dd.css', __FILE__ ) ),// This will load extra css file in backend (when you edit page with VC)
            "params" => array(
			
				array(
						"type" => "vcmp_presets",
						"param_name" => "ImageHover",
						"admin_label" => false,
						"value" => "vcmp-imageshover"
				),
			
				array(
						"type" => "attach_image",
						"heading" => __( "Image", VCMP_SLUG ),
						"param_name" => "imagehovereffects_img",
						'group' => __( 'Image', VCMP_SLUG ),
						"description" => __( "Please choose your image.", VCMP_SLUG ),
						"value" => ""
				),
				
				array(
						"type" => "textfield",
						"heading" => __( "Image Hover Title", VCMP_SLUG ),
						"param_name" => "imagehovereffects_title",
						'group' => __( 'Title', VCMP_SLUG ),
						"description" => __( "Please enter the image hover title.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
						"type" => "textfield",
						"heading" => __( "Image Hover Title Font Size", VCMP_SLUG ),
						"param_name" => "imagehovereffects_title_font_size",
						'group' => __( 'Title', VCMP_SLUG ),
						"description" => __( "Please enter the image hover title font size.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Title Color", VCMP_SLUG ),
					  	"param_name" => "imagehovereffects_hover_title_color",
						'group' => __( 'Title', VCMP_SLUG ),
					  	"description" => __( "Please choose title color.", VCMP_SLUG ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array(
						"type" => "textfield",
						"heading" => __( "Image Hover Sub Title", VCMP_SLUG ),
						"param_name" => "imagehovereffects_subtitle",
						'group' => __( 'Title', VCMP_SLUG ),
						"description" => __( "Please enter the image hover sub title.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
						"type" => "textfield",
						"heading" => __( "Image Hover Sub Title Font Size", VCMP_SLUG ),
						"param_name" => "imagehovereffects_subtitle_font_size",
						'group' => __( 'Title', VCMP_SLUG ),
						"description" => __( "Please enter the image hover sub title font size.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Sub Title Color", VCMP_SLUG ),
					  	"param_name" => "imagehovereffects_hover_subtitle_color",
						'group' => __( 'Title', VCMP_SLUG ),
					  	"description" => __( "Please choose sub title color.", VCMP_SLUG ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array(
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Background Color", VCMP_SLUG ),
					  	"param_name" => "imagehovereffects_hover_background_color",
						'group' => __( 'Image', VCMP_SLUG ),
					  	"description" => __( "Please choose background color.", VCMP_SLUG ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Image Effect", VCMP_SLUG ),
						"param_name" => "imagehovereffects_effect",
						"description" => __( "Please choose a hover effect for the image.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", VCMP_SLUG ) => "",
								__( "1- imghvr-fade", VCMP_SLUG ) => "imghvr-fade",
								__( "2- imghvr-push-up", VCMP_SLUG ) => "imghvr-push-up",
								__( "3- imghvr-push-down", VCMP_SLUG ) => "imghvr-push-down",
								__( "4- imghvr-push-left", VCMP_SLUG ) => "imghvr-push-left",
								__( "5- imghvr-push-right", VCMP_SLUG ) => "imghvr-push-right",
								__( "6- imghvr-slide-up", VCMP_SLUG ) => "imghvr-slide-up",
								__( "7- imghvr-slide-down", VCMP_SLUG ) => "imghvr-slide-down",
								__( "8- imghvr-slide-left", VCMP_SLUG ) => "imghvr-slide-left",
								__( "9- imghvr-slide-right", VCMP_SLUG ) => "imghvr-slide-right",
								__( "10- imghvr-reveal-up", VCMP_SLUG ) => "imghvr-reveal-down",
								__( "11- imghvr-reveal-left", VCMP_SLUG ) => "imghvr-reveal-left",
								__( "12- imghvr-reveal-right", VCMP_SLUG ) => "imghvr-reveal-right",
								__( "13- imghvr-hinge-up", VCMP_SLUG ) => "imghvr-hinge-up",
								__( "14- imghvr-hinge-down", VCMP_SLUG ) => "imghvr-hinge-down",
								__( "15- imghvr-hinge-left", VCMP_SLUG ) => "imghvr-hinge-left",
								__( "16- imghvr-hinge-right", VCMP_SLUG ) => "imghvr-hinge-right",
								__( "17- imghvr-flip-horiz", VCMP_SLUG ) => "imghvr-flip-horiz",
								__( "18- imghvr-flip-vert", VCMP_SLUG ) => "imghvr-flip-vert",
								__( "19- imghvr-flip-diag-1", VCMP_SLUG ) => "imghvr-flip-diag-1",
								__( "20- imghvr-flip-diag-2", VCMP_SLUG ) => "imghvr-flip-diag-2",
								__( "21- imghvr-shutter-out-horiz", VCMP_SLUG ) => "imghvr-shutter-out-horiz",
								__( "22- imghvr-shutter-out-vert", VCMP_SLUG ) => "imghvr-shutter-out-vert",
								__( "23- imghvr-shutter-out-diag-1", VCMP_SLUG ) => "imghvr-shutter-out-diag-1",
								__( "24- imghvr-shutter-out-diag-2", VCMP_SLUG ) => "imghvr-shutter-out-diag-2",
								__( "25- imghvr-shutter-in-horiz", VCMP_SLUG ) => "imghvr-shutter-in-horiz",
								__( "26- imghvr-shutter-in-vert", VCMP_SLUG ) => "imghvr-shutter-in-vert",
								__( "27- imghvr-shutter-in-out-horiz", VCMP_SLUG ) => "imghvr-shutter-in-out-horiz",
								__( "28- imghvr-shutter-in-out-vert", VCMP_SLUG ) => "imghvr-shutter-in-out-vert",
								__( "29- imghvr-shutter-in-out-diag-1", VCMP_SLUG ) => "imghvr-shutter-in-out-diag-1",
								__( "30- imghvr-shutter-in-out-diag-2", VCMP_SLUG ) => "imghvr-shutter-in-out-diag-2",
								__( "31- imghvr-fold-up", VCMP_SLUG ) => "imghvr-fold-up",
								__( "32- imghvr-fold-down", VCMP_SLUG ) => "imghvr-fold-down",
								__( "33- imghvr-fold-left", VCMP_SLUG ) => "imghvr-fold-left",
								__( "34- imghvr-fold-right", VCMP_SLUG ) => "imghvr-fold-right",
								__( "35- imghvr-zoom-in", VCMP_SLUG ) => "imghvr-zoom-in",
								__( "36- imghvr-zoom-out", VCMP_SLUG ) => "imghvr-zoom-out",
								__( "37- imghvr-zoom-out-up", VCMP_SLUG ) => "imghvr-zoom-out-up",
								__( "38- imghvr-zoom-out-down", VCMP_SLUG ) => "imghvr-zoom-out-down",
								__( "39- imghvr-zoom-out-left", VCMP_SLUG ) => "imghvr-zoom-out-left",
								__( "40- imghvr-zoom-out-right", VCMP_SLUG ) => "imghvr-zoom-out-right",
								__( "41- imghvr-zoom-out-flip-horiz", VCMP_SLUG ) => "imghvr-zoom-out-flip-horiz",
								__( "42- imghvr-zoom-out-flip-vert", VCMP_SLUG ) => "imghvr-zoom-out-flip-vert",
								__( "43- imghvr-blur", VCMP_SLUG ) => "imghvr-blur"
							)
				),
				
				array(
						"type" => "textfield",
						"heading" => __( "Image Link URL", VCMP_SLUG ),
						"param_name" => "imagehovereffects_url",
						'group' => __( 'Image', VCMP_SLUG ),
						"description" => __( "Please enter the link URL.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', VCMP_SLUG ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
					'group' => __( 'Custom fonts', 'js_composer' ),
					'description' => __( 'Use font family from the theme.', VCMP_SLUG ),
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
								'font_family_description' => __( 'Select font family.', VCMP_SLUG ),
								'font_style_description' => __( 'Select font styling.', VCMP_SLUG ),
							),
					),
				),
				
				array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', VCMP_SLUG ),
						'param_name' => 'css',
						'group' => __( 'Design options', VCMP_SLUG ),
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", VCMP_SLUG ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", VCMP_SLUG )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra ID Name", VCMP_SLUG ),
					"param_name" => "el_id",
					"description" => __( "Extra ID to be customized via CSS", VCMP_SLUG )
				),

            )
        ) );
    }

    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {

	$output = $el_id = $el_class = $css = $use_theme_fonts = $google_fonts = $imagehovereffects_img = $imagehovereffects_title = $imagehovereffects_title_font_size = $imagehovereffects_subtitle = $imagehovereffects_subtitle_font_size = $imagehovereffects_url = $imagehovereffects_effect = $imagehovereffects_hover_background_color = $imagehovereffects_hover_title_color = $imagehovereffects_hover_subtitle_color = '';
	  
		extract(shortcode_atts( array(
			'el_class' => '',
			'el_id' => '',
			'css' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			'imagehovereffects_img' => '',
			'imagehovereffects_title' => '',
			'imagehovereffects_title_font_size' => '',
			'imagehovereffects_subtitle' => '',
			'imagehovereffects_subtitle_font_size' => '',
			'imagehovereffects_url' => '',
			'imagehovereffects_effect' => '',
			'imagehovereffects_hover_background_color' => '',
			'imagehovereffects_hover_title_color' => '',
			'imagehovereffects_hover_subtitle_color' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imageshover', VCMP_URL . 'modules/vcmp-imageshover/assets/vc_imageshover.css');
		
		$imagehovereffects_img = wp_get_attachment_image_src(intval($imagehovereffects_img), 'full');
		$imagehovereffects_img = $imagehovereffects_img[0];
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		/*GOOGLE FONTS*/
		
		$google_fonts_family[0] ='';
		$google_fonts_styles[1] ='';
		$google_fonts_styles[2] ='';
		
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
			
			if ( $imagehovereffects_hover_title_color  ) {
				$styles[] = 'color:' . $imagehovereffects_hover_title_color;
			}
			
			if ( $imagehovereffects_title_font_size  ) {
				$styles[] = 'font-size:' . $imagehovereffects_title_font_size;
			}
		}
		
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . ';"';
		} else {
			$style = '';
		}
		
		if ( ! empty( $google_fonts ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
		}
		/*GOOGLE FONTS*/
		
		$output .= '<figure class="'.$imagehovereffects_effect.' vcmgihover '.esc_attr( $el_class ).' '.esc_attr( $css_class ).'" id="'.esc_attr( $el_id ).'">';
				
				if( $imagehovereffects_img)  {
					$output .= '<img src="'.$imagehovereffects_img.'" alt="'.$imagehovereffects_title.'"/>';
				} else {
					$output .= '<img src="//lorempixel.com/1280/800/technics/" alt="Mega Gallery Sample Image"/>';
				}

		$output .= '<figcaption style="background: '.$imagehovereffects_hover_background_color.'">
						<h3 ' . $style . '>'.$imagehovereffects_title.'</h3>
						<p style="color: '.$imagehovereffects_hover_subtitle_color.'; font-size:'.$imagehovereffects_subtitle_font_size.'; font-family:'.$google_fonts_family[0].'; font-weight:'.$google_fonts_styles[1].'; font-style:'.$google_fonts_styles[2].'">'.strip_tags( $imagehovereffects_subtitle ).'</p>
					</figcaption>
						<a href="'.$imagehovereffects_url.'"></a>
				</figure>';
				
      return $output;
	  
    }

}
// Finally initialize code
new VcmpImageHoverEffects();