<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Grid Gallery
 * Description: Grid gallery shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGridGallery extends VcmpModule{

	const slug = 'grid_gallery';
	const base = 'grid_gallery';

	public function __construct(){
	
		
		add_action( 'vc_before_init', array( $this, 'grid_gallery_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'grid_gallery_content_shortcode_vc' ) );
	
		add_shortcode( 'grid_gallery', array( $this, 'vc_grid_gallery_shortcode' ));
		add_shortcode( 'grid_gallery_content', array( $this, 'grid_gallery_content_shortcode' ));

	}
	
	
	// Parent Element
	public function grid_gallery_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-elegant-mega',
				'name'                    => __( 'Grid Gallery' , 'VCMP_SLUG' ),
				'base'                    => 'grid_gallery',
				'description'             => __( 'Add grid gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'grid_gallery_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG')
		) 
	);
}
	

	// Nested Element
	public function grid_gallery_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-elegant-mega',
				'name'            => __('Grid Gallery Item', 'VCMP_SLUG'),
				'base'            => 'grid_gallery_content',
				'description'     => __( 'Add grid gallery items to grid gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'grid_gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					array( 
						"type" => "attach_image",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "gridgallery_img",
						'admin_label' => true,
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "gridgallery_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Sub Title", "VCMP_SLUG" ),
							"param_name" => "gridgallery_subtitle",
							'admin_label' => true,
							"description" => __( "Please enter the subtitle.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Image Link URL", "VCMP_SLUG" ),
							"param_name" => "gridgallery_url",
							'admin_label' => true,
							"description" => __( "Please enter the link URL.", "VCMP_SLUG" ),
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
	 * Grid Gallery Shortcode
	 */
	public function vc_grid_gallery_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_grid_gallery', VCMP_URL . 'modules/vcmp-grid-gallery/assets/css/vc_grid_gallery.css');
		wp_enqueue_script( 'vc_grid_gallery_js', VCMP_URL.'modules/vcmp-grid-gallery/assets/js/vc_grid_gallery.js', array('jquery'), '1.0', TRUE);
		
		$output = '<div class="vcmp_gridgallery '.esc_attr( $el_class ).'">'. do_shortcode($content) .'</div>';
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function grid_gallery_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'gridgallery_img' => '',
					'gridgallery_title' => '',
					'gridgallery_subtitle' => '',
					'gridgallery_url' => ''
				), $atts 
			) 
		);
		
		$gridgallery_img = wp_get_attachment_image_src(intval($gridgallery_img), 'large');
		$gridgallery_img = $gridgallery_img[0];
		
		$output = '<div class="vcmp_griditem '.esc_attr( $el_class ).'">
					 <a class="vcmp_gridlink" href="'.$gridgallery_url.'">
					   <div class="vcmp_hovercontent">
						 <h1>'.$gridgallery_title.'</h1>
						 <h3>'.$gridgallery_subtitle.'</h3>
					   </div>
					   <img src="'.$gridgallery_img.'" />
					 </a>
				   </div>';
		
		return $output;
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_grid_gallery extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_grid_gallery_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpGridGallery();

	