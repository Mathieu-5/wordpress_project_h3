<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Video Grid
 * Description: Vimeo Grid shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpVideoGrid extends VcmpModule{

	const slug = 'video_grid';
	const base = 'video_grid';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'video_grid_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'video_grid_content_shortcode_vc' ) );
		add_shortcode( 'video_grid', array( $this, 'vc_video_grid_shortcode' ));
		add_shortcode( 'video_grid_content', array( $this, 'video_grid_content_shortcode' ));		
	}

	
	// Parent Element
	public function video_grid_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Video Grid' , 'VCMP_SLUG' ),
				'base'                    => 'video_grid',
				'description'             => __( 'Add video gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'video_grid_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
	public function video_grid_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Video Item', 'VCMP_SLUG'),
				'base'            => 'video_grid_content',
				'description'     => __( 'Add video item to your gallery.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'video_grid'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array(
						"type" => "dropdown",
						"heading" => __( "Video Source", "VCMP_SLUG" ),
						"param_name" => "videogrid_video_source",
						"value" => array(
										__( "None", "VCMP_SLUG" ) => "none", 
										__( "Youtube", "VCMP_SLUG" ) => "youtube", 
										__( "Vimeo", "VCMP_SLUG" ) => "vimeo", 
									),
						"description" => __( "Select the type of the child video source.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Youtube Video ID", "VCMP_SLUG" ),
							"param_name" => "videogrid_youtube_video_id",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogrid_video_source",
											'value' => array( 'youtube' ),
											),
							"description" => __( "Please enter the youtube video url. Ex:r-neGA1blsE", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Vimeo Video ID", "VCMP_SLUG" ),
							"param_name" => "videogrid_vimeo_video_id",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogrid_video_source",
											'value' => array( 'vimeo' ),
											),
							"description" => __( "Please enter the vimeo video id. Ex:163662857", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Video Thumbnail Image", "VCMP_SLUG" ),
							"param_name" => "videogrid_thumb_img",
							'admin_label' => true,
							"description" => __( "Please choose your video thumbnail image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Title", "VCMP_SLUG" ),
							"param_name" => "videogrid_thumb_title",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail title.", "VCMP_SLUG" ),
							"value" => ""
					),
					array( 
							"type" => "colorpicker",
							"heading" => __( "Video Thumbnail Title Color", "VCMP_SLUG" ),
							"param_name" => "videogrid_thumb_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the video thumbnail title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Title Font Size", "VCMP_SLUG" ),
							"param_name" => "videogrid_thumb_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Sub Title", "VCMP_SLUG" ),
							"param_name" => "videogrid_thumb_desc",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail sub title.", "VCMP_SLUG" ),
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
	 * Grid Grid Shortcode
	 */
	public function vc_video_grid_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);
		
		wp_enqueue_style( 'vc_videogrid', VCMP_URL . 'modules/vcmp-videogrid/assets/css/vc_videogrid.css');
		wp_enqueue_style( 'vc_colorbox', VCMP_URL . 'assets/colorbox/colorbox.css');
		wp_enqueue_script( 'vc_colorbox', VCMP_URL.'assets/colorbox/jquery.colorbox-min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_videogrid', VCMP_URL.'modules/vcmp-videogrid/assets/js/vc_videogrid.js', array('jquery'), '1.0', TRUE);
		
		$output = '	<div class="vcmp_videogrid '.esc_attr( $el_class ).'">
						<ul>
							'. do_shortcode($content).'
						</ul>
					</div>
					';
					
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
	 * Grid Grid Content Items Shortcode
	 */
	public function video_grid_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'videogrid_video_source' => '',
					'videogrid_youtube_video_id' => '',
					'videogrid_vimeo_video_id' => '',
					'videogrid_thumb_img' => '',
					'videogrid_thumb_title' => '',
					'videogrid_thumb_title_color' => '',
					'videogrid_thumb_title_fontsize' => '',
					'videogrid_thumb_desc' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		$videogrid_thumb_img = wp_get_attachment_image_src(intval($videogrid_thumb_img), 'full');
		$videogrid_thumb_img = $videogrid_thumb_img[0];
		
	
		$output .=	'
					<li class="vgitem-item-wrapper '.esc_attr( $el_class ).'">
						<div class="vgitem-image" style="background: url('.$videogrid_thumb_img.') no-repeat 0 50% / cover">
					';
				
					if ( $videogrid_video_source == 'vimeo' ) {	
						$output .= '<a class="vgitem-popup-video vimeo cboxElement" href="https://player.vimeo.com/video/'. $videogrid_vimeo_video_id .'">';
					};
					
					if ( $videogrid_video_source == 'youtube' ) {	
						$output .= '<a class="vgitem-popup-video youtube cboxElement" href="https://www.youtube.com/embed/'. $videogrid_youtube_video_id .'">';
					};
					
					
		$output .=	'<span class="vgitemplay">';
		
		if ( $videogrid_video_source == 'youtube' ) {	
			$output .=	'<i class="fa fa-youtube-play"></i>';
		};
		
		if ( $videogrid_video_source == 'vimeo' ) {	
			$output .=	'<i class="fa fa-vimeo-square"></i>';
		};
						
		$output .=	'</span>
					</a>

					</div>
						
						<div class="vgitemtext">
							<span class="vgitemspan-text" style="font-size:'.$videogrid_thumb_title_fontsize.'; color: '.$videogrid_thumb_title_color.'; ">'.$videogrid_thumb_title.'</span>
							<br style="font-size:'.$videogrid_thumb_title_fontsize.'; color: '.$videogrid_thumb_title_color.'; ">'.$videogrid_thumb_desc.'
						</div>
					</li>
					';
					

		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_video_grid extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_video_grid_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpVideoGrid();

	