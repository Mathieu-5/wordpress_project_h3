<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Fullscreen Spy Sections
 * Description: Fullscreen Spy Sections shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpSpySections extends VcmpModule{

	const slug = 'spy_section';
	const base = 'spy_section';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'spy_section_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'spy_section_content_shortcode_vc' ) );
		add_shortcode( 'spy_section', array( $this, 'vc_spy_section_shortcode' ));
		add_shortcode( 'spy_section_content', array( $this, 'vc_spy_section_content_shortcode' ));
	}


	// Parent Element
	public function spy_section_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Fullscreen Spy Section' , 'VCMP_SLUG' ),
				'base'                    => 'spy_section',
				'description'             => __( 'Add scroll animated section to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'spy_section_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
					array(
						"type" => "dropdown",
						"heading" => __( "Section Style", "VCMP_SLUG" ),
						"param_name" => "vc_fullscreen_spysections_style",
						"description" => __( "Please choose a style for the section slide.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Fixed Header", "VCMP_SLUG" ) => "vcmp-spy-fixed-header",
								__( "Slide Menu", "VCMP_SLUG" ) => "vcmp-spy-side-menu",
								__( "Lavalamp Menu", "VCMP_SLUG" ) => "vcmp-spy-lavalamp-menu"
							)
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
	

	// Nested Element
	public function spy_section_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Section Item', 'VCMP_SLUG'),
				'base'            => 'spy_section_content',
				'description'     => __( 'Add spy section item to your page.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'spy_section'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Background Color", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_grid_bg",
							'admin_label' => true,
							'group' => 'Background',
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Background Image", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_img",
							'admin_label' => true,
							'group' => 'Background',
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_title",
							'admin_label' => true,
							'group' => 'Title',
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_title_color",
							'admin_label' => true,
							'group' => 'Title',
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_title_fontsize",
							'admin_label' => true,
							'group' => 'Title',
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Title Alignment", "VCMP_SLUG" ),
						"param_name" => "vc_fullscreen_spysections_title_align",
						"description" => __( "Please choose alignment for the title.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => 'Title',
						"value" => array(
								__( "Please select", "VCMP_SLUG" ) => "",
								__( "Left", "VCMP_SLUG" ) => "left",
								__( "Right", "VCMP_SLUG" ) => "right",
								__( "Center", "VCMP_SLUG" ) => "center"
							)
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Menu Item Font Size", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_active_item_fontsize",
							'admin_label' => true,
							'group' => 'Menu Item',
							"description" => __( "Please enter the menu item font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Menu Item Color", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_active_item_color",
							'admin_label' => true,
							'group' => 'Menu Item',
							"description" => __( "Please choose the active menu item color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Menu Item Background Color", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_active_item_bg_color",
							'admin_label' => true,
							'group' => 'Menu Item',
							"description" => __( "Please choose the active menu item background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							'group' => 'Content',
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Color", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_content_color",
							'admin_label' => true,
							'group' => 'Content',
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Font Size", "VCMP_SLUG" ),
							"param_name" => "vc_fullscreen_spysections_content_fontsize",
							'admin_label' => true,
							'group' => 'Content',
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
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
	public function vc_spy_section_shortcode( $atts, $content = null ) {
		$GLOBALS['spysec_count'] = 0;
		$GLOBALS['spysec_items'] ='';
		$GLOBALS['spysec_details'] ='';
		
		$first='0';
		
		$output = $el_class = '';
		
		extract(shortcode_atts( array(
			'el_class' => '',
			'vc_fullscreen_spysections_style' => '',

		), $atts ) );

		wp_enqueue_style( 'vc_spy_section', VCMP_URL . 'modules/vcmp-spy-sections/assets/css/vc_fullscreen_spysections.css');
		wp_enqueue_script( 'vc_spy_section_js', VCMP_URL.'modules/vcmp-spy-sections/assets/js/vc_fullscreen_spysections.js', array('jquery'), '1.0', FALSE);
		
		do_shortcode( $content );

		$vc_fullscreen_spysections_style = $vc_fullscreen_spysections_style;
		
		if( is_array( $GLOBALS['spysec_items'] ) ){
		
			foreach( $GLOBALS['spysec_items'] as $spysec_item ){
				
				$first++;
				$active_class ='';
				
				if($first == 1){ $active_class='active';}
				
				if ($vc_fullscreen_spysections_style == 'vcmp-spy-fixed-header') {
				$output .= '<style>
								.vcmp-spy-fixed-header li.active a.'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' {background: '.$spysec_item["vc_fullscreen_spysections_active_item_bg_color"].' !important; color: '.$spysec_item["vc_fullscreen_spysections_active_item_color"].' !important} 
								.vcmp-spy-fixed-header .'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' {font-size: '.$spysec_item["vc_fullscreen_spysections_active_item_fontsize"].' !important;}
							</style>';
				}
				
				if ($vc_fullscreen_spysections_style == 'vcmp-spy-side-menu') {
				$output .= '<style>
								.vcmp-spy-side-menu .active a.'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).':after {background: '.$spysec_item["vc_fullscreen_spysections_active_item_bg_color"].' !important; } 
								.vcmp-spy-side-menu .active a.'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' {color: '.$spysec_item["vc_fullscreen_spysections_active_item_color"].' !important} .'.$vc_fullscreen_spysections_style.' .'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' {font-size: '.$spysec_item["vc_fullscreen_spysections_active_item_fontsize"].' !important;}
							</style>';
				}
				
				if ($vc_fullscreen_spysections_style == 'vcmp-spy-lavalamp-menu') {
				$output .= '<style>
								.vcmp-spy-lavalamp-menu .vcmp-lavalamp {background: '.$spysec_item["vc_fullscreen_spysections_active_item_bg_color"].' !important; color: '.$spysec_item["vc_fullscreen_spysections_active_item_color"].' !important} 
								.'.$vc_fullscreen_spysections_style.' .'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' {font-size: '.$spysec_item["vc_fullscreen_spysections_active_item_fontsize"].' !important;}
							</style>';
				}
				
				
				$spysec_items[] = '<li class="'.$active_class.'"><a href="#'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).'" class="'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).'"><span>'.$spysec_item['vc_fullscreen_spysections_title'].'</span></a></li>';
			
				
				$spysec_details[] = '<section id="'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).'" style="background: '.$spysec_item['vc_fullscreen_spysections_grid_bg'].' url('.$spysec_item['vc_fullscreen_spysections_img'].') no-repeat 0 0 /cover">
									  <div class="inner">
										<h1 style="color:'.$spysec_item['vc_fullscreen_spysections_title_color'].'; font-size: '.$spysec_item['vc_fullscreen_spysections_title_fontsize'].'; text-align:'.$spysec_item['vc_fullscreen_spysections_title_align'].'">'.$spysec_item['vc_fullscreen_spysections_title'].'</h1>
										<p>'.do_shortcode($spysec_item['content']).'</p>
									  </div>
									</section>
									<style>
										section#'.strtolower(str_replace(' ', '_', $spysec_item['vc_fullscreen_spysections_title'])).' p {
											font-size: '.$spysec_item['vc_fullscreen_spysections_content_fontsize'].';
											color: '.$spysec_item['vc_fullscreen_spysections_content_color'].';
										}
									</style>
									';
			}
				
				
				$output .= "\n".'<div id="vcmp_fullscreen_spysections_wrapper"><header id="vcmp-main-header" class="'.$vc_fullscreen_spysections_style.' '.esc_attr( $el_class ).'"><nav><ul>'.implode( "\n", $spysec_items ).'</ul>'."\n";
				
				if ($vc_fullscreen_spysections_style== 'vcmp-spy-lavalamp-menu') {
					$output .= "\n".'<div class="vcmp-lavalamp"></div>'."\n";
				}
				
				$output .= "\n".'</nav></header>'."\n".'<main class="'.esc_attr( $el_class ).'">'.implode( "\n", $spysec_details ).'</main></div>'."\n";
				
		
		}
		
		if ($vc_fullscreen_spysections_style== 'vcmp-spy-side-menu' || $vc_fullscreen_spysections_style== 'vcmp-spy-fixed-header') {
			wp_enqueue_script( 'vcmp_sidemenu_js', VCMP_URL.'modules/vcmp-spy-sections/assets/js/vcmp_sidemenu.js', array('jquery'), '1.0', TRUE);
		}
		
		if ($vc_fullscreen_spysections_style== 'vcmp-spy-lavalamp-menu') {
			wp_enqueue_script( 'vcmp_lavalamp_js', VCMP_URL.'modules/vcmp-spy-sections/assets/js/vcmp_lavalamp.js', array('jquery'), '1.0', TRUE);
		}
		
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
	public function vc_spy_section_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vc_fullscreen_spysections_img' => '',
					'vc_fullscreen_spysections_title' => '',
					'vc_fullscreen_spysections_title_color' => '',
					'vc_fullscreen_spysections_title_fontsize' => '',
					'vc_fullscreen_spysections_active_item_color' => '',
					'vc_fullscreen_spysections_active_item_bg_color' => '',
					'vc_fullscreen_spysections_active_item_fontsize' => '',
					'vc_fullscreen_spysections_content_fontsize' => '',
					'vc_fullscreen_spysections_content_color' => '',
					'vc_fullscreen_spysections_grid_bg' => '',
					'vc_fullscreen_spysections_style' => '',
					'vc_fullscreen_spysections_title_align' => '',
				), $atts
			) 
		);
		
		$vc_fullscreen_spysections_img = wp_get_attachment_image_src(intval($vc_fullscreen_spysections_img), 'full');
		$vc_fullscreen_spysections_img = $vc_fullscreen_spysections_img[0];		
		$content = $this->nl2p($content);
		
		$x = $GLOBALS['spysec_count'];
		$GLOBALS['spysec_items'][$x] = 
			array( 
			'vc_fullscreen_spysections_title'				=> sprintf( $vc_fullscreen_spysections_title, $GLOBALS['spysec_count'] ), 
			'vc_fullscreen_spysections_img'					=> $vc_fullscreen_spysections_img,
			'vc_fullscreen_spysections_title_color' 		=> $vc_fullscreen_spysections_title_color, 
			'vc_fullscreen_spysections_title_fontsize'		=> $vc_fullscreen_spysections_title_fontsize,
			'vc_fullscreen_spysections_active_item_color'	=> $vc_fullscreen_spysections_active_item_color,
			'vc_fullscreen_spysections_active_item_bg_color'=> $vc_fullscreen_spysections_active_item_bg_color,
			'vc_fullscreen_spysections_active_item_fontsize'=> $vc_fullscreen_spysections_active_item_fontsize,
			'vc_fullscreen_spysections_content_fontsize'	=> $vc_fullscreen_spysections_content_fontsize,
			'vc_fullscreen_spysections_content_color'		=> $vc_fullscreen_spysections_content_color,
			'vc_fullscreen_spysections_grid_bg'				=> $vc_fullscreen_spysections_grid_bg,
			'vc_fullscreen_spysections_title_align'			=> $vc_fullscreen_spysections_title_align,
			'content' 										=>  $content,
			'el_class' 										=>  $el_class 
			);
			
		$GLOBALS['spysec_count']++;
		
		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_spy_section extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_spy_section_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpSpySections();

	