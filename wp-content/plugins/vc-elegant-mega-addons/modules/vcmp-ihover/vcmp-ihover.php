<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: iHover Effects
 * Description: Image Hover Effects shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpIHoverEffects extends VcmpModule{

	const slug = 'vcmp_ihovereffects_gallery';
	const base = 'vcmp_ihovereffects_gallery';

	public function __construct(){
		
		add_action( 'vc_before_init', array( $this, 'ihover_gallery_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'ihover_gallery_content_shortcode_vc' ) );
		
		add_shortcode( 'vcmp_ihovereffects_gallery', array( $this, 'vc_ihover_gallery_shortcode' ));
		add_shortcode( 'vcmp_ihovereffects_gallery_content', array( $this, 'vc_ihover_gallery_content_shortcode' ));
	}
	
	// Parent Element
	public function ihover_gallery_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'iHover Effects' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_ihovereffects_gallery',
				'description'             => __( 'Add video gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_ihovereffects_gallery_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array( 
						"type" => "textfield",
						"heading" => __( "Thumbnail Width", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_width",
						"description" => __( "Please enter the image width. Please enter only numeric value. Default is 220.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "textfield",
						"heading" => __( "Thumbnail Height", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_height",
						"description" => __( "Please enter the image height. Please enter only numeric value. Default is 220.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
						"type" => "textfield",
						"heading" => __( "Spacing Between Thumbnails", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_spacing",
						"description" => __( "Please enter spacing value between the thumbnails . Please enter only numeric value. Default is none.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Alignment", "vc_themeofwp_addon" ),
						"param_name" => "ihovereffects_alignment",
						"description" => __( "Please choose alignment type.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Left", "VCMP_SLUG" ) => "left",
								__( "Right", "VCMP_SLUG" ) => "right",
								__( "Center", "VCMP_SLUG" ) => "center"
							)
					),
					
					array( 
						"type" => "textfield",
						"heading" => __( "Border Size", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_border",
						"description" => __( "Please enter the item border size. Please enter only numeric value. Ex:10", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Border Color", "VCMP_SLUG" ),
							"param_name" => "ihovereffects_bordercolor",
							"description" => __( "Please choose border color for the item.", "VCMP_SLUG" ),
							'admin_label' => true,
							"value" => ""
					),
					
				),
			) 
		);
	}
	
	
	// Nested Element
	public function ihover_gallery_content_shortcode_vc() {
		vc_map( 
			array(
				"icon"				=> 'icon-vc-elegant-mega',
				'name'				=> __('iHover Item', 'VCMP_SLUG'),
				'base'				=> 'vcmp_ihovereffects_gallery_content',
				'description'		=> __( 'Add ihover item to your page.', 'VCMP_SLUG' ),
				"category" 			=> __('Elegant Mega Addons', 'machine'),
				'content_element'	=> true,
				'as_child'			=> array('only' => 'vcmp_ihovereffects_gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'			 => array(
				
					array(
							"type" => "vcmp_presets",
							"param_name" => "iHover_Effects",
							"admin_label" => false,
							"value" => "vcmp-ihover"
					),
					
				array( 
						"type" => "attach_image",
						"heading" => __( "Background Image", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_img",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Background",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Hover Title", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_title",
						"description" => __( "Please enter the image hover title.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Title",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Hover Title Font Size", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_title_font_size",
						"description" => __( "Please enter the image hover title font size.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Title",
						"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Title Color", "VCMP_SLUG" ),
					  	"param_name" => "ihovereffects_hover_title_color",
					  	"description" => __( "Please choose title color.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Title",
					  	"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Hover Sub Title", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_subtitle",
						"description" => __( "Please enter the image hover sub title.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Subtitle",
						//'edit_field_class' => 'vc_col-sm-6',
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Hover Sub Title Font Size", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_subtitle_font_size",
						"description" => __( "Please enter the image hover sub title font size.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Subtitle",
						//'edit_field_class' => 'vc_col-sm-6',
						"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Sub Title Color", "VCMP_SLUG" ),
					  	"param_name" => "ihovereffects_hover_subtitle_color",
					  	"description" => __( "Please choose sub title color.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Subtitle",
					  	"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Image Type", "vc_themeofwp_addon" ),
						"param_name" => "ihovereffects_img_type",
						"description" => __( "Please choose image type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Effect",
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Circle", "VCMP_SLUG" ) => "circle",
								__( "Square", "VCMP_SLUG" ) => "square"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Image Effect", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_effect_circle",
						"description" => __( "Please choose a hover effect for the image.", "VCMP_SLUG" ),
						"dependency" => Array( 
											'element' => "ihovereffects_img_type",
											'value' => array( 'circle' ),
											),
						'admin_label' => true,
						'group' => "Effect",
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Effect 1", "VCMP_SLUG" ) => "effect1",
								__( "Effect 2", "VCMP_SLUG" ) => "effect2",
								__( "Effect 3", "VCMP_SLUG" ) => "effect3",
								__( "Effect 4", "VCMP_SLUG" ) => "effect4",
								__( "Effect 5", "VCMP_SLUG" ) => "effect5",
								__( "Effect 6", "VCMP_SLUG" ) => "effect6",
								__( "Effect 7", "VCMP_SLUG" ) => "effect7",
								__( "Effect 8", "VCMP_SLUG" ) => "effect8",
								__( "Effect 9", "VCMP_SLUG" ) => "effect9",
								__( "Effect 10", "VCMP_SLUG" ) => "effect10",
								__( "Effect 11", "VCMP_SLUG" ) => "effect11",
								__( "Effect 12", "VCMP_SLUG" ) => "effect12",
								__( "Effect 13", "VCMP_SLUG" ) => "effect13",
								__( "Effect 14", "VCMP_SLUG" ) => "effect14",
								__( "Effect 15", "VCMP_SLUG" ) => "effect15",
								__( "Effect 16", "VCMP_SLUG" ) => "effect16",
								__( "Effect 17", "VCMP_SLUG" ) => "effect17",
								__( "Effect 18", "VCMP_SLUG" ) => "effect18",
								__( "Effect 19", "VCMP_SLUG" ) => "effect19",
								__( "Effect 20", "VCMP_SLUG" ) => "effect20",
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Image Effect", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_effect_square",
						"description" => __( "Please choose a hover effect for the image.", "VCMP_SLUG" ),
						"dependency" => Array( 
											'element' => "ihovereffects_img_type",
											'value' => array( 'square' ),
											),
						'admin_label' => true,
						'group' => "Effect",
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Effect 1", "VCMP_SLUG" ) => "effect1",
								__( "Effect 2", "VCMP_SLUG" ) => "effect2",
								__( "Effect 3", "VCMP_SLUG" ) => "effect3",
								__( "Effect 4", "VCMP_SLUG" ) => "effect4",
								__( "Effect 5", "VCMP_SLUG" ) => "effect5",
								__( "Effect 6", "VCMP_SLUG" ) => "effect6",
								__( "Effect 7", "VCMP_SLUG" ) => "effect7",
								__( "Effect 8", "VCMP_SLUG" ) => "effect8",
								__( "Effect 9", "VCMP_SLUG" ) => "effect9",
								__( "Effect 10", "VCMP_SLUG" ) => "effect10",
								__( "Effect 11", "VCMP_SLUG" ) => "effect11",
								__( "Effect 12", "VCMP_SLUG" ) => "effect12",
								__( "Effect 13", "VCMP_SLUG" ) => "effect13",
								__( "Effect 14", "VCMP_SLUG" ) => "effect14",
								__( "Effect 15", "VCMP_SLUG" ) => "effect15"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Colored Effect", "vc_themeofwp_addon" ),
						"param_name" => "ihovereffects_colored",
						"description" => __( "Please choose image type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Effect",
						"value" => array(
								__( "Deafult None", "VCMP_SLUG" ) => "",
								__( "Use Colored Effect", "VCMP_SLUG" ) => "colored"
							)
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Image Hover Background Color", "VCMP_SLUG" ),
					  	"param_name" => "ihovereffects_hover_background_color",
					  	"description" => __( "Please choose background color.", "VCMP_SLUG" ),
						'admin_label' => true,
						"dependency" => Array( 
											'element' => "ihovereffects_colored",
											'value' => array( 'colored' ),
											),
						'group' => "Background",
					  	"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Direction", "vc_themeofwp_addon" ),
						"param_name" => "ihovereffects_direction",
						"description" => __( "Please choose direction type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Effect",
						"value" => array(
								__( "Please select direction type", "VCMP_SLUG" ) => "",
								__( "Left to Right", "VCMP_SLUG" ) => "left_to_right",
								__( "Right to Left", "VCMP_SLUG" ) => "right_to_left",
								__( "Top to Bottom", "VCMP_SLUG" ) => "top_to_bottom",
								__( "Bottom to Top", "VCMP_SLUG" ) => "bottom_to_top",
								__( "Scale Up", "VCMP_SLUG" ) => "scale_up"
							)
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Link URL", "VCMP_SLUG" ),
						"param_name" => "ihovereffects_url",
						"description" => __( "Please enter the item link URL.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" ),
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
	
	
	/**
	 * iHover Gallery Shortcode
	 */
	public function vc_ihover_gallery_shortcode( $atts, $content = null ) {
		
		$output = $el_class = $css = $ihovereffects_height = $ihovereffects_width = $ihovereffects_spacing = $ihovereffects_alignment = $ihovereffects_border = $ihovereffects_bordercolor = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'ihovereffects_height' => '',
					'ihovereffects_width' => '',
					'ihovereffects_spacing' => '',
					'ihovereffects_alignment' => '',
					'ihovereffects_border' => '',
					'ihovereffects_bordercolor' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_ihover', VCMP_URL . 'modules/vcmp-ihover/assets/vc_ihover.css');
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		//$spinnerwith = ''.$ihovereffects_height_width.' '+' 20';
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		static $ic = 0;
		static $id = 0;
		static $ie = 0;
		static $if = 0;
		static $ig = 0;
		
		$output = '<div class="vcmp-ihover-'.$i++.' '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" id="vcmp-ihover-'.$ia++.'">
						'. do_shortcode($content).'
					</div>
					<style>
						#vcmp-ihover-'.$ib++.' .ih-item, #vcmp-ihover-'.$ig++.' .ih-item .img { width: '.$ihovereffects_width.'px; height: '.$ihovereffects_height.'px;}
						#vcmp-ihover-'.$ic++.' .ih-item { margin-right: '.$ihovereffects_spacing.'px; margin-bottom: '.$ihovereffects_spacing.'px;}
						#vcmp-ihover-'.$id++.' .spinner { width: '.$ihovereffects_width.'px; height: '.$ihovereffects_height.'px;}
						.vcmp-ihover-'.$ie++.' { text-align: '.$ihovereffects_alignment.';}
						#vcmp-ihover-'.$if++.' .ih-item .img:before { box-shadow: 0 0 0 '.$ihovereffects_border.'px '.$ihovereffects_bordercolor.' inset;}
					</style>
					';
					
		return $output;
	}
	
    
    /*
    Shortcode logic how it should be rendered
    */
    public function vc_ihover_gallery_content_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $css = $ihovereffects_img = $ihovereffects_hover_background_color = $ihovereffects_title = $ihovereffects_title_font_size = $ihovereffects_hover_title_color = $ihovereffects_subtitle = $ihovereffects_subtitle_font_size = $ihovereffects_hover_subtitle_color = $ihovereffects_url = $ihovereffects_effect = $ihovereffects_img_type = $ihovereffects_effect_circle = $ihovereffects_effect_square = $ihovereffects_colored = $ihovereffects_direction = $coloredyes = $infocontainerend = $infocontainerstart = $imgcontainerend = $imgcontainerstart = $mask = $spinner = $infobackstart = $infobackend = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'css' => '',
			'ihovereffects_img' => '',
			'ihovereffects_hover_background_color' => '',
			
			'ihovereffects_title' => '',
			'ihovereffects_title_font_size' => '',
			'ihovereffects_hover_title_color' => '',
			
			'ihovereffects_subtitle' => '',
			'ihovereffects_subtitle_font_size' => '',
			'ihovereffects_hover_subtitle_color' => '',
			
			'ihovereffects_url' => '',
			'ihovereffects_effect' => '',
			
			
			'ihovereffects_img_type' => '',
			'ihovereffects_effect_circle' => '',
			'ihovereffects_effect_square' => '',
			'ihovereffects_colored' => '',
			'ihovereffects_direction' => '',
		), $atts ) );
		
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
			
			$ihovereffects_img = wp_get_attachment_image_src(intval($ihovereffects_img), 'full');
			$ihovereffects_img = $ihovereffects_img[0];
			$alt = get_post_meta(intval($ihovereffects_img), '_wp_attachment_image_alt', true);
			
			if ( $ihovereffects_colored == 'colored' ) { $coloredyes='style="background: '.$ihovereffects_hover_background_color.'"'; }
			if ( $ihovereffects_effect_circle == 'effect1'  ) { $spinner='<div class="spinner"></div>'; }
			if ( $ihovereffects_effect_circle == 'effect1'  ) { $spinner='<div class="spinner"></div>'; }
			if ( $ihovereffects_effect_circle == 'effect1' || $ihovereffects_effect_circle == 'effect5' || $ihovereffects_effect_circle == 'effect13' || $ihovereffects_effect_circle == 'effect18' || $ihovereffects_effect_circle == 'effect20' || $ihovereffects_effect_square == 'effect9'  ) { $infobackstart='<div class="info-back">'; }
			if ( $ihovereffects_effect_circle == 'effect1' || $ihovereffects_effect_circle == 'effect5' || $ihovereffects_effect_circle == 'effect13' || $ihovereffects_effect_circle == 'effect18' || $ihovereffects_effect_circle == 'effect20' || $ihovereffects_effect_square == 'effect9' ) { $infobackend='</div>'; }
			if ( $ihovereffects_effect_circle == 'effect8' ) { $infocontainerstart='<div class="info-container">'; }
			if ( $ihovereffects_effect_circle == 'effect8' ) { $infocontainerend='</div>'; }
			if ( $ihovereffects_effect_circle == 'effect8' ) { $imgcontainerstart='<div class="img-container">'; }
			if ( $ihovereffects_effect_circle == 'effect8' ) { $imgcontainerend='</div>'; }
			if ( $ihovereffects_effect_square == 'effect4' ) { $mask='<div class="mask1"></div><div class="mask2"></div>'; }
			
			

		
		$output = '
				<div class="ih-item '.$ihovereffects_img_type.' '.$ihovereffects_effect_circle.' '.$ihovereffects_effect_square.' '.$ihovereffects_colored.' '.$ihovereffects_direction.' '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">
					
					<a href="'.$ihovereffects_url.'">
						
						'.$imgcontainerstart.'
						
						'.$spinner.'
						
						<div class="img"><img src="'.$ihovereffects_img.'" alt="'.$alt.'"></div>
						
						'.$mask.'
						
						'.$imgcontainerend.'
						
						'.$infocontainerstart.'
						
							<div class="info" '.$coloredyes.'>
							
								'.$infobackstart.'
									<h3 class="ihovertitle" style="color: '.$ihovereffects_hover_title_color.'; font-size:'.$ihovereffects_title_font_size.'">'.$ihovereffects_title.'</h3>
									<p class="ihoverdesc" style="color: '.$ihovereffects_hover_subtitle_color.'; font-size:'.$ihovereffects_subtitle_font_size.'" >'.$ihovereffects_subtitle.'</p>
								'.$infobackend.'
							  
							</div>
						
						'.$infocontainerend.'
					</a>
					
				</div>
		';
				
      return $output;
	  
    }
	
}

	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_ihovereffects_gallery extends WPBakeryShortCodesContainer {
		
		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_ihovereffects_gallery_content extends WPBakeryShortCode {
		
		}
	}
	
// Finally initialize code
new VcmpIHoverEffects();