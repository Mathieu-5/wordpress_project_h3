<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Scroll Animated Sections
 * Description: Scroll Animated Sections shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpScrollAnimatedSections extends VcmpModule{

	const slug = 'scroll_animsection';
	const base = 'scroll_animsection';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'scroll_animsection_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'scroll_animsection_content_shortcode_vc' ) );
		add_shortcode( 'scroll_animsection', array( $this, 'vc_scroll_animsection_shortcode' ));
		add_shortcode( 'scroll_animsection_content', array( $this, 'scroll_animsection_content_shortcode' ));
	}

	
	// Parent Element
	public function scroll_animsection_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Scroll Animated Section' , 'VCMP_SLUG' ),
				'base'                    => 'scroll_animsection',
				'description'             => __( 'Add scroll animated section to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'scroll_animsection_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name"	=> "el_class",
						"description"	=> __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
				),
			) 
		);
	}
	

	// Nested Element
	public function scroll_animsection_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Section Item', 'VCMP_SLUG'),
				'base'            => 'scroll_animsection_content',
				'description'     => __( 'Add scroll animated section items to your page.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'scroll_animsection'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array(
						"type" => "textfield",
						"heading" => __( "Width", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_width",
						"description" => __( "Enter the section width. Ex:33%", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Height", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_height",
						"description" => __( "Enter the section width. Ex:300px", "VCMP_SLUG" )
					),
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Background Color", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_grid_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Background Image", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Link URL", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_url",
							'admin_label' => true,
							"description" => __( "Please enter the link URL.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
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
							"type" => "colorpicker",
							"heading" => __( "Content Text Color", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_content_color",
							'admin_label' => true,
							"description" => __( "Please choose the content color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Text Font Size", "VCMP_SLUG" ),
							"param_name" => "scroll_animsection_content_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the content font size.", "VCMP_SLUG" ),
							"value" => ""
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Effect", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_effect",
						"group" => "Effects",
						"value" => array(
										__( "fade-up", "VCMP_SLUG" ) => "fade-up", 
										__( "fade-down", "VCMP_SLUG" ) => "fade-down", 
										__( "fade-right", "VCMP_SLUG" ) => "fade-right", 
										__( "fade-left", "VCMP_SLUG" ) => "fade-left", 
										__( "fade-up-right", "VCMP_SLUG" ) => "fade-up-right",  
										__( "fade-up-left", "VCMP_SLUG" ) => "fade-up-left",  
										__( "fade-down-right", "VCMP_SLUG" ) => "fade-down-right",  
										__( "fade-down-left", "VCMP_SLUG" ) => "fade-down-left",  
										__( "flip-left", "VCMP_SLUG" ) => "flip-left",  
										__( "flip-right", "VCMP_SLUG" ) => "flip-right",  
										__( "flip-up", "VCMP_SLUG" ) => "flip-up",  
										__( "flip-down", "VCMP_SLUG" ) => "flip-down",  
										__( "zoom-in", "VCMP_SLUG" ) => "zoom-in",  
										__( "zoom-in-up", "VCMP_SLUG" ) => "zoom-in-up",  
										__( "zoom-in-down", "VCMP_SLUG" ) => "zoom-in-down",  
										__( "zoom-in-left", "VCMP_SLUG" ) => "zoom-in-left",  
										__( "zoom-in-right", "VCMP_SLUG" ) => "zoom-in-right",  
										__( "zoom-out", "VCMP_SLUG" ) => "zoom-out",  
										__( "zoom-out-up", "VCMP_SLUG" ) => "zoom-out-up",  
										__( "zoom-out-down", "VCMP_SLUG" ) => "zoom-out-down",  
										__( "zoom-out-right", "VCMP_SLUG" ) => "zoom-out-right",  
										__( "zoom-out-left", "VCMP_SLUG" ) => "zoom-out-left", 
									),
						"description" => __( "Please choose the effect for the scroll section.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Easing", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_easing",
						"group" => "Effects",
						"value" => array(
										__( "linear", "VCMP_SLUG" ) => "linear",  
										__( "ease-in-sine", "VCMP_SLUG" ) => "ease-in-sine",  
										__( "ease-in-back", "VCMP_SLUG" ) => "ease-in-back",  
										__( "ease-out-cubic", "VCMP_SLUG" ) => "ease-out-cubic",  
										__( "fade", "VCMP_SLUG" ) => "fade",  
									),
						"description" => __( "Please choose the easing for the scroll section.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Duration", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_duration",
						"group" => "Effects",
						"description" => __( "Enter the effect duration. Ex:1000", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Delay", "VCMP_SLUG" ),
						"param_name" => "scroll_animsection_delay",
						"group" => "Effects",
						"description" => __( "Enter the effect delay. Ex:100", "VCMP_SLUG" )
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
	public function vc_scroll_animsection_shortcode( $atts, $content = null ) {
		$output = $el_class = '';
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_scroll_animsection', VCMP_URL . 'modules/vcmp-scroll-animated-section/assets/css/vc_scroll_animsection.css');
		wp_enqueue_style( 'vc_sas_animations', VCMP_URL . 'modules/vcmp-scroll-animated-section/assets/css/vc_sas_animations.css');
		wp_enqueue_script( 'vc_scroll_animsection', VCMP_URL.'modules/vcmp-scroll-animated-section/assets/js/vc_scroll_animsection.js', array('jquery'), '1.0', FALSE);
		
		$output = '<div id="transcroller-body" class="aos-all vcmp_scroll_animsection '.esc_attr( $el_class ).'">'. do_shortcode($content).'</div> 
					<script>
						AOS.init({ 
						easing: \'ease-in-out-sine\'
						}); 
					</script>';
		return $output;
	}
	
	
	public function nl2p($str) {
		$arr=explode("\n",$str);
		$out='';

		for($i=0;$i<count($arr);$i++) {
			if(strlen(trim($arr[$i]))>0)
				$out.=''.trim($arr[$i]).'';
		}
		return $out;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function scroll_animsection_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'scroll_animsection_width' => '33%',
					'scroll_animsection_height' => '',
					'scroll_animsection_img' => '',
					'scroll_animsection_title' => '',
					'scroll_animsection_title_color' => '',
					'scroll_animsection_title_fontsize' => '',
					'scroll_animsection_url' => '',
					'scroll_animsection_content_fontsize' => '',
					'scroll_animsection_content_color' => '',
					'scroll_animsection_grid_bg' => '',
					
					'scroll_animsection_effect' => '',
					'scroll_animsection_duration' => '',
					'scroll_animsection_easing' => '',
					'scroll_animsection_delay' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;

		
		$scroll_animsection_img = wp_get_attachment_image_src(intval($scroll_animsection_img), 'full');
		$scroll_animsection_img = $scroll_animsection_img[0];
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$output .= 
				' 
				<div class="aos-item '.esc_attr( $el_class ).'" data-aos="'.$scroll_animsection_effect.'" data-aos-easing="'.$scroll_animsection_easing.'" data-aos-delay="'.$scroll_animsection_delay.'" data-aos-duration="'.$scroll_animsection_duration.'" style="width:'.$scroll_animsection_width.'; height:'.$scroll_animsection_height.'">
					<div class="aos-item__inner" style="background: '.$scroll_animsection_grid_bg.' url('.$scroll_animsection_img.') no-repeat scroll 0 50% / cover;">
						<h3 style="color:'.$scroll_animsection_title_color.'; font-size:'.$scroll_animsection_title_fontsize.'; padding-top: 10px; margin: 0;">
							<a href="'.$scroll_animsection_url.'" style="color:'.$scroll_animsection_title_color.'; font-size:'.$scroll_animsection_title_fontsize.'">'.$scroll_animsection_title.'</a>
						</h3> 
						<p style="color:'.$scroll_animsection_content_color.'; font-size:'.$scroll_animsection_content_fontsize.'">'. do_shortcode($content) .'</p>
					</div>
				</div>
				';
		
		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_scroll_animsection extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_scroll_animsection_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpScrollAnimatedSections();

	