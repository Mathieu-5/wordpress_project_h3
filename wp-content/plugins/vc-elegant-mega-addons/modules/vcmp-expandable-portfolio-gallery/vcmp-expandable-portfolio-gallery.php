<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Expandable Portfolio Gallery
 * Description: Expandable Portfolio Gallery shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpExpandablePortfolioGallery extends VcmpModule{

	const slug = 'expandable_portfolio_gallery';
	const base = 'expandable_portfolio_gallery';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'expandable_portfolio_gallery_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'expandable_portfolio_gallery_content_shortcode_vc' ) );
		add_shortcode( 'expandable_portfolio_gallery', array( $this, 'vc_expandable_portfolio_gallery_shortcode' ));
		add_shortcode( 'expandable_portfolio_gallery_content', array( $this, 'expandable_portfolio_gallery_content_shortcode' ));	
	}
	
	
	// Parent Element
	public function expandable_portfolio_gallery_shortcode_vc() {
		vc_map( 
			array(
				"icon"            		  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Expandable Portfolio Gallery' , 'VCMP_SLUG' ),
				'base'                    => 'expandable_portfolio_gallery',
				'description'             => __( 'Add expandable portfolio gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'expandable_portfolio_gallery_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
	public function expandable_portfolio_gallery_content_shortcode_vc() {
		vc_map( 
			array(
				"icon"            => 'icon-vc-expandable_portfolio-page',
				'name'            => __('Portfolio Item', 'VCMP_SLUG'),
				'base'            => 'expandable_portfolio_gallery_content',
				'description'     => __( 'Add expandable portfolio items to your gallery.', 'VCMP_SLUG' ),
				'content_element' => true,
				"category"		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'as_child'        => array('only' => 'expandable_portfolio_gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "attach_image",
							"heading" => __( "Image", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_img",
							'admin_label' => true,
							'group' => "Image",
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_title",
							'admin_label' => true,
							'group' => "Title",
							"description" => __( "Please enter the title. IT SHOULD BE UNIQUE!", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_title_color",
							'admin_label' => true,
							'group' => "Title",
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_title_fontsize",
							'admin_label' => true,
							'group' => "Title",
							"description" => __( "Please enter the title font size. Ex:2vmin or 14px or 100%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Description", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_description",
							'admin_label' => true,
							'group' => "Description",
							"description" => __( "Please enter the small description.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Description Color", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_description_color",
							'admin_label' => true,
							'group' => "Description",
							"description" => __( "Please choose the description color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Description Font Size", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_description_fontsize",
							'admin_label' => true,
							'group' => "Description",
							"description" => __( "Please enter the description font size. Ex:2vmin or 14px or 100%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Background Color", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_grid_bg",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please choose the background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Text Color", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_content_color",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Font Size", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_content_fontsize",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please enter the title font size. Ex:2vmin or 14px or 100%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Title", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_content_title",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please enter the content title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Title Color", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_content_title_color",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please choose the content title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Title Font Size", "VCMP_SLUG" ),
							"param_name" => "expandable_portfolio_content_title_fontsize",
							'admin_label' => true,
							'group' => "Content",
							"description" => __( "Please enter the content title font size. Ex:2vmin or 14px or 100%", "VCMP_SLUG" ),
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
	public function vc_expandable_portfolio_gallery_shortcode( $atts, $content = null ) {
	
		$GLOBALS['expo_count'] = 0;
		$GLOBALS['expo_items'] ='';
		$GLOBALS['expo_details'] ='';
		
		$output = $el_class = '';
		
		extract(shortcode_atts( array(
			'el_class' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_expandable_portfolio_style', VCMP_URL . 'modules/vcmp-expandable-portfolio-gallery/assets/css/vc_expandable_portfolio.css');
		wp_enqueue_style( 'vc_ep_responsive', VCMP_URL . 'modules/vcmp-expandable-portfolio-gallery/assets/css/vc_ep_responsive.css');
		wp_enqueue_script( 'vc_expandable_portfolio_js', VCMP_URL.'modules/vcmp-expandable-portfolio-gallery/assets/js/vc_expandable_portfolio.js', array('jquery'), '1.0', TRUE);
		
		do_shortcode( $content );
		
		if( is_array( $GLOBALS['expo_items'] ) ){
		
			foreach( $GLOBALS['expo_items'] as $expo_item ){
				
				
				$expo_items[] = '<div class="expandable_portfolio__item '.esc_attr( $el_class ).'" data-expandablePortfolioGallery-item="'.strtolower(str_replace(' ', '_', $expo_item['expandable_portfolio_title'])).'">
									<div class="expandable_portfolio__itemImage" style="background-image:url('.$expo_item['expandable_portfolio_img'].');"></div>
									<div class="expandable_portfolio__itemWraper">
										<div class="expandable_portfolio__itemWraperContainer">
											<div class="expandable_portfolio__itemWraperTitle" style="font-size:'.$expo_item['expandable_portfolio_title_fontsize'].'; color:'.$expo_item['expandable_portfolio_title_color'].'">
												'.$expo_item['expandable_portfolio_title'].'
											</div>
											<div class="expandable_portfolio__itemWraperDescription" style="font-size:'.$expo_item['expandable_portfolio_description_fontsize'].'; color:'.$expo_item['expandable_portfolio_description_color'].'">
												'.$expo_item['expandable_portfolio_description'].'
											</div>
										</div>
									</div>
								</div>
								';
			
				
				$expo_details[] = '<style>.'.strtolower(str_replace(' ', '_', $expo_item['expandable_portfolio_title'])).'_class p {font-size:'.$expo_item['expandable_portfolio_content_fontsize'].'; color:'.$expo_item['expandable_portfolio_content_color'].'}</style><div class="expandable_portfolio__content '.esc_attr( $el_class ).'" style="background:'.$expo_item['expandable_portfolio_grid_bg'].'" data-expandablePortfolioGallery-content="'.strtolower(str_replace(' ', '_', $expo_item['expandable_portfolio_title'])).'" style="background:'.$expo_item['expandable_portfolio_grid_bg'].'">
										<div class="expandable_portfolio__contentContainer '.strtolower(str_replace(' ', '_', $expo_item['expandable_portfolio_title'])).'_class">
											<a class="expandable_portfolio__contentClose" data-expandablePortfolioGallery-close="">&times;</a>
											<img src="'.$expo_item['expandable_portfolio_img'].'" alt=""/>
											<h1 style="font-size:'.$expo_item['expandable_portfolio_content_title_fontsize'].'; color:'.$expo_item['expandable_portfolio_content_title_color'].'">'.$expo_item['expandable_portfolio_content_title'].'</h1>
											<p>'.do_shortcode($expo_item['content']).'</p>
										</div>
									</div>
									';
			}
			
				$output = "\n".'<div class="expandable_portfolio '.esc_attr( $el_class ).'" data-expandablePortfolioGallery=""><div class="expandable_portfolio__list" data-expandablePortfolioGallery-list="" data-masonry-options=\'{ "columnWidth": 0, "itemSelector": ".expandable_portfolio__item" }\'>'.implode( "\n", $expo_items ).'</div></div>'."\n".'<div class="expandable_portfolio__contentList" data-expandablePortfolioGallery-contentList="">'.implode( "\n", $expo_details ).'</div>'."\n";
		
		}
		
		return $output;
	}
	
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function expandable_portfolio_gallery_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'expandable_portfolio_img' => '',
					'expandable_portfolio_title' => '',
					'expandable_portfolio_title_color' => '',
					'expandable_portfolio_title_fontsize' => '',
					'expandable_portfolio_description' => '',
					'expandable_portfolio_description_fontsize' => '',
					'expandable_portfolio_description_color' => '',
					'expandable_portfolio_content_fontsize' => '',
					'expandable_portfolio_content_color' => '',
					'expandable_portfolio_content_title' => '',
					'expandable_portfolio_content_title_fontsize' => '',
					'expandable_portfolio_content_title_color' => '',
					'expandable_portfolio_grid_bg' => '',
				), $atts 
			) 
		);

		
		$expandable_portfolio_img = wp_get_attachment_image_src(intval($expandable_portfolio_img), 'full');
		$expandable_portfolio_img = $expandable_portfolio_img[0];		
		
		$x = $GLOBALS['expo_count'];
		$GLOBALS['expo_items'][$x] = 
			array( 
			'expandable_portfolio_title'					=> sprintf( $expandable_portfolio_title, $GLOBALS['expo_count'] ), 
			'expandable_portfolio_img'						=> $expandable_portfolio_img,
			'expandable_portfolio_description' 				=> $expandable_portfolio_description, 
			'expandable_portfolio_description_fontsize' 	=> $expandable_portfolio_description_fontsize,
			'expandable_portfolio_description_color' 		=> $expandable_portfolio_description_color,
			'expandable_portfolio_title_color'				=> $expandable_portfolio_title_color,
			'expandable_portfolio_title_fontsize'			=> $expandable_portfolio_title_fontsize,
			'expandable_portfolio_content_fontsize' 		=> $expandable_portfolio_content_fontsize,
			'expandable_portfolio_content_color'			=> $expandable_portfolio_content_color,
			'expandable_portfolio_grid_bg'					=> $expandable_portfolio_grid_bg,
			'expandable_portfolio_content_title'			=> $expandable_portfolio_content_title,
			'expandable_portfolio_content_title_fontsize'	=> $expandable_portfolio_content_title_fontsize,
			'expandable_portfolio_content_title_color'		=> $expandable_portfolio_content_title_color,
			'content' 										=>  $content,
			'el_class' 										=>  $el_class 
			);
			
		$GLOBALS['expo_count']++;
		
		return $output;
		
	}

}

	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_expandable_portfolio_gallery extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_expandable_portfolio_gallery_content extends WPBakeryShortCode {

		}
	}
	
// Finally initialize code
new VcmpExpandablePortfolioGallery();