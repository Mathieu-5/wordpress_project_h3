<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Gallery Timeline
 * Description: Gallery Timeline shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGalleryTimeline extends VcmpModule{

	const slug = 'vcmp_gallerytimeline';
	const base = 'vcmp_gallerytimeline';

	public function __construct(){		
		add_action( 'vc_before_init', array( $this, 'vcmp_gallerytimeline_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'vcmp_gallerytimeline_content_shortcode_vc' ) );
		
		add_shortcode( 'vcmp_gallerytimeline', array( $this, 'vc_vcmp_gallerytimeline_shortcode' ));
		add_shortcode( 'vcmp_gallerytimeline_content', array( $this, 'vcmp_gallerytimeline_content_shortcode' ));	
	}

	
	// Parent Element
	public function vcmp_gallerytimeline_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Gallery Timeline' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_gallerytimeline',
				'description'             => __( 'Add gallery timeline to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_gallerytimeline_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
				
					
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
	

	// Nested Element
	public function vcmp_gallerytimeline_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-elegant-mega',
				'name'            => __('Gallery Timeline Item', 'VCMP_SLUG'),
				'base'            => 'vcmp_gallerytimeline_content',
				'description'     => __( 'Add gallery timeline item to your gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'vcmp_gallerytimeline'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "attach_image",
							"heading" => __( "Timeline Item Image", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_img",
							'admin_label' => true,
							"description" => __( "Please choose your image for the timeline item.", "VCMP_SLUG" ),
							"value" => ""
					),
				
					array( 
							"type" => "textfield",
							"heading" => __( "Timeline Item Title", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_title",
							'admin_label' => true,
							"description" => __( "Please enter the item title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Timeline Item Font Size", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the item title font size. Ex: 16px", "VCMP_SLUG" ),
							"value" => ""
					),
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Timeline Item Color", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the item title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					
					array( 
							"type" => "textfield",
							"heading" => __( "Timeline Item Year", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_year",
							'admin_label' => true,
							"description" => __( "Please enter the item year.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Timeline Item Year Font Size", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_year_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the item year font size. Ex: 12px", "VCMP_SLUG" ),
							"value" => ""
					),
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Timeline Item Year Color", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_year_color",
							'admin_label' => true,
							"description" => __( "Please choose the item year color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Timeline Item Content Font Size", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_content_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the item content font size. Ex: 12px", "VCMP_SLUG" ),
							"value" => ""
					),
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Timeline Item Content Color", "VCMP_SLUG" ),
							"param_name" => "gallerytimeline_item_content_color",
							'admin_label' => true,
							"description" => __( "Please choose the item content color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Timeline Item Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							"description" => __( "Please enter the content for the timeline item.", "VCMP_SLUG" ),
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
	 * Slab Text Shortcode
	 */
	public function vc_vcmp_gallerytimeline_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_gallerytimeline', VCMP_URL . 'modules/vcmp-gallerytimeline/assets/css/vc_gallerytimeline.css');
		wp_enqueue_style( 'vc_flexslider', VCMP_URL . 'modules/vcmp-gallerytimeline/assets/css/flexslider.css');
		wp_enqueue_script( 'vc_flexslider', VCMP_URL.'modules/vcmp-gallerytimeline/assets/js/jquery.flexslider-min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_gallerytimeline_js', VCMP_URL.'modules/vcmp-gallerytimeline/assets/js/vc_gallerytimeline.js', array('jquery'), '1.0', TRUE);

		$output =	'<div class="vcmp-gallery-timeline '.esc_attr( $el_class ).'">
						<div class="flexslider">
							<ul class="slides">
								'. do_shortcode($content).'
							</ul>
						</div>
					</div>
					';
					
		return $output;
	}
	
	public function nl2p($str) {
		$arr=explode("\n",$str);
		$out='';

		for($i=0;$i<count($arr);$i++) {
			if(strlen(trim($arr[$i]))>0)
				$out.='<p>'.trim($arr[$i]).'</p>';
		}
		return $out;
	}
	


	/**
	 * Text Items Shortcode
	 */
	public function vcmp_gallerytimeline_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'gallerytimeline_item_img' => '',
					'gallerytimeline_item_title' => '',
					'gallerytimeline_item_title_fontsize' => '',
					'gallerytimeline_item_title_color' => '',
					'gallerytimeline_item_year' => '',
					'gallerytimeline_item_year_fontsize' => '',
					'gallerytimeline_item_year_color' => '',
					'gallerytimeline_item_content_fontsize' => '',
					'gallerytimeline_item_content_color' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;
		
		$gallerytimeline_item_img = wp_get_attachment_image_src(intval($gallerytimeline_item_img), 'full');
		$gallerytimeline_item_img = $gallerytimeline_item_img[0];
		
	
		$output .=	'
					<li data-thumb="'.$gallerytimeline_item_img.'">
							<div class="vc_col-sm-8">
								<img src="'.$gallerytimeline_item_img.'" />
							</div>
							<div class="vc_col-sm-4">
								<h3 style="color:'.$gallerytimeline_item_title_color.'; font-size:'.$gallerytimeline_item_title_fontsize.'">'.$gallerytimeline_item_title.'</h3>
								<div style="color:'.$gallerytimeline_item_year_color.'; font-size:'.$gallerytimeline_item_year_fontsize.'" class="label-text">'.$gallerytimeline_item_year.'</div>
								<div class="vcmp_timeline_content-'.$i++.'">
									'.$content.'
								</div>
							</div>
                    </li>
					<style>.vcmp_timeline_content-'.$it++.' p {color:'.$gallerytimeline_item_content_color.'; font-size:'.$gallerytimeline_item_content_fontsize.'}</style>
					';

		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_gallerytimeline extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_gallerytimeline_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpGalleryTimeline();

	