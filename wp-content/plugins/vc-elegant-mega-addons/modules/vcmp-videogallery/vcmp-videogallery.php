<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Video Gallery
 * Description: Vimeo Gallery shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.3
 */

class VcmpVideoGallery extends VcmpModule{

	const slug = 'video_gallery';
	const base = 'video_gallery';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'video_gallery_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'video_gallery_content_shortcode_vc' ) );
		add_shortcode( 'video_gallery', array( $this, 'vc_video_gallery_shortcode' ));
		add_shortcode( 'video_gallery_content', array( $this, 'video_gallery_content_shortcode' ));
	}
	
	
	// Parent Element
	public function video_gallery_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Video Gallery' , 'VCMP_SLUG' ),
				'base'                    => 'video_gallery',
				'description'             => __( 'Add video gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'video_gallery_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
				
					array(
						"type" => "dropdown",
						"heading" => __( "Main Video Source", "VCMP_SLUG" ),
						"param_name" => "videogallery_mainvideo",
						"value" => array(
										__( "Please Select Video Source", "VCMP_SLUG" ) => "none", 
										__( "From Youtube", "VCMP_SLUG" ) => "youtube", 
										__( "From Vimeo", "VCMP_SLUG" ) => "vimeo", 
										__( "From Media Gallery", "VCMP_SLUG" ) => "mediagallery", 
										__( "From Facebook", "VCMP_SLUG" ) => "facebook", 
									),
						"description" => __( "Select the type of the main video source.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Youtube Video ID", "VCMP_SLUG" ),
							"param_name" => "videogallery_main_youtube_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_mainvideo",
											'value' => array( 'youtube' ),
											),
							"description" => __( "Please enter the main youtube video url. Ex:r-neGA1blsE", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Vimeo Video ID", "VCMP_SLUG" ),
							"param_name" => "videogallery_main_vimeo_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_mainvideo",
											'value' => array( 'vimeo' ),
											),
							"description" => __( "Please enter the main vimeo video id. Ex:163662857", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Video URL", "VCMP_SLUG" ),
							"param_name" => "videogallery_main_media_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_mainvideo",
											'value' => array( 'mediagallery' ),
											),
							"description" => __( "Please enter the main mp4 video url. Ex:http://yoursite.com/example.mp4", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Facebook Video URL", "VCMP_SLUG" ),
							"param_name" => "videogallery_main_facebook_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_mainvideo",
											'value' => array( 'facebook' ),
											),
							"description" => __( "Please enter the main facebook video id. Ex:10153231379946729", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Main Video Width", "VCMP_SLUG" ),
						"param_name" => "videogallery_main_width",
						"description" => __( "Please enter the main video width. Ex 400px", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Main Video Height", "VCMP_SLUG" ),
						"param_name" => "videogallery_main_height",
						"description" => __( "Please enter the main video height. Ex 100%", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
					
					array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'videogallery_css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
					),
				),
			) 
		);
	}
	

	// Nested Element
	public function video_gallery_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Video Item', 'VCMP_SLUG'),
				'base'            => 'video_gallery_content',
				'description'     => __( 'Add video item to your gallery.', 'VCMP_SLUG' ),
				"category" 		  => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'video_gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array(
						"type" => "dropdown",
						"heading" => __( "Video Source", "VCMP_SLUG" ),
						"param_name" => "videogallery_video_source",
						"value" => array(
										__( "Please Select Video Source", "VCMP_SLUG" ) => "none", 
										__( "From Youtube", "VCMP_SLUG" ) => "youtube", 
										__( "From Vimeo", "VCMP_SLUG" ) => "vimeo", 
										__( "From Media Gallery", "VCMP_SLUG" ) => "mediagallery", 
										__( "From Facebook", "VCMP_SLUG" ) => "facebook", 
									),
						"description" => __( "Select the type of the child video source.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Youtube Video ID", "VCMP_SLUG" ),
							"param_name" => "videogallery_youtube_video_id",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_video_source",
											'value' => array( 'youtube' ),
											),
							"description" => __( "Please enter the youtube video url. Ex:r-neGA1blsE", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Main Vimeo Video ID", "VCMP_SLUG" ),
							"param_name" => "videogallery_vimeo_video_id",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_video_source",
											'value' => array( 'vimeo' ),
											),
							"description" => __( "Please enter the vimeo video id. Ex:163662857", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Video URL", "VCMP_SLUG" ),
							"param_name" => "videogallery_media_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_video_source",
											'value' => array( 'mediagallery' ),
											),
							"description" => __( "Please enter the main mp4 video url. Ex:http://yoursite.com/example.mp4", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Facebook Video ID", "VCMP_SLUG" ),
							"param_name" => "videogallery_facebook_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "videogallery_video_source",
											'value' => array( 'facebook' ),
											),
							"description" => __( "Please enter the main facebook video id. Ex:10153231379946729", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Video Thumbnail Image", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_img",
							'admin_label' => true,
							"description" => __( "Please choose your video thumbnail image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Title", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_title",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail title.", "VCMP_SLUG" ),
							"value" => ""
					),
					array( 
							"type" => "colorpicker",
							"heading" => __( "Video Thumbnail Title Color", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the video thumbnail title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Title Font Size", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail title font size. Ex:14px", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Sub Title", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_desc",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail sub title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Video Thumbnail Sub Title Color", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_desc_color",
							'admin_label' => true,
							"description" => __( "Please choose the video thumbnail sub title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Video Thumbnail Sub Title Font Size", "VCMP_SLUG" ),
							"param_name" => "videogallery_thumb_desc_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the video thumbnail sub title font size. Ex:11px", "VCMP_SLUG" ),
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
	public function vc_video_gallery_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $videogallery_mainvideo = $videogallery_main_youtube_video = $videogallery_main_vimeo_video = $videogallery_main_media_video = $videogallery_main_facebook_video = $videogallery_main_width = $videogallery_main_height= $videogallery_css= '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'videogallery_mainvideo' => '',
					'videogallery_main_youtube_video' => '',
					'videogallery_main_vimeo_video' => '',
					'videogallery_main_media_video' => '',
					'videogallery_main_facebook_video' => '',
					'videogallery_main_width' => '',
					'videogallery_main_height' => '',
					'videogallery_css' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_videogallery', VCMP_URL . 'modules/vcmp-videogallery/assets/css/vc_videogallery.css');
		wp_enqueue_script( 'vc_fitvids', VCMP_URL.'modules/vcmp-videogallery/assets/js/jquery.fitvids.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_scrollTo', VCMP_URL.'modules/vcmp-videogallery/assets/js/jquery.scrollTo.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_videogallery', VCMP_URL.'modules/vcmp-videogallery/assets/js/vc_videogallery.js', array('jquery'), '1.0', TRUE);
		
		
		$videogallery_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $videogallery_css, '' ), self::slug, $atts );
		
		$output = '<div class="vcmp-video-wrapper '.esc_attr( $videogallery_css ).' '.esc_attr( $el_class ).'" id="vcmp-video-wrapper">
					<div class="vcmp-video-selected">';
		
			if ( $videogallery_mainvideo == 'youtube' ) {

				$output .= '<div class="vcmp-video-iframe">
								<iframe width="'. $videogallery_main_width .'" height="'. $videogallery_main_height .'" src="https://www.youtube.com/embed/'. $videogallery_main_youtube_video .'?rel=0" frameborder="0" allowfullscreen></iframe>
							</div>';
			};
			
			
			if ( $videogallery_mainvideo == 'vimeo' ) {

				$output .= '<div class="vcmp-video-iframe">
								<iframe width="'. $videogallery_main_width .'" height="'. $videogallery_main_height .'" src="https://player.vimeo.com/video/'. $videogallery_main_vimeo_video .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>';
			};
			
			if ( $videogallery_mainvideo == 'mediagallery' ) {

				$output .= '<div class="vcmp-video-iframe">
								<iframe width="'. $videogallery_main_width .'" height="'. $videogallery_main_height .'" src="'. $videogallery_main_media_video .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>';
			};
			
			if ( $videogallery_mainvideo == 'facebook' ) {

				$output .= '<div class="vcmp-video-iframe">
								<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook%2Fvideos%2F'. $videogallery_main_facebook_video .'%2F&show_text=0&width='. $videogallery_main_width .'" width="'. $videogallery_main_width .'" height="'. $videogallery_main_height .'" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
							</div>';
			};
			
		$output .= '</div>
					
					<div class="vcmp-video-thumbnails">
						'. do_shortcode($content).'
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
				$out.=''.trim($arr[$i]).'';
		}
		return $out;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function video_gallery_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'videogallery_video_source' => '',
					'videogallery_youtube_video_id' => '',
					'videogallery_vimeo_video_id' => '',
					'videogallery_media_video' => '',
					'videogallery_facebook_video' => '',
					'videogallery_thumb_img' => '',
					'videogallery_thumb_title' => '',
					'videogallery_thumb_title_color' => '',
					'videogallery_thumb_title_fontsize' => '',
					'videogallery_thumb_desc' => '',
					'videogallery_thumb_desc_color' => '',
					'videogallery_thumb_desc_fontsize' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		$videogallery_thumb_img = wp_get_attachment_image_src(intval($videogallery_thumb_img), 'full');
		$videogallery_thumb_img = $videogallery_thumb_img[0];
		
		$output .=	'
					<div class="vcmp-video-thumb '.esc_attr( $el_class ).'">
						<img src="'.$videogallery_thumb_img.'" alt="'.$videogallery_thumb_title.'">
						<div class="vcmp-video-desc">
							<h1 class="name" style="font-size:'.$videogallery_thumb_title_fontsize.'; color: '.$videogallery_thumb_title_color.'; ">'.$videogallery_thumb_title.'</h1>
							<h5 class="description" style="font-size:'.$videogallery_thumb_desc_fontsize.'; color: '.$videogallery_thumb_desc_color.'; ">'.$videogallery_thumb_desc.'</h5>
						</div>
					';
						
			if ( $videogallery_video_source == 'vimeo' ) {	
				$output .= '<iframe width="100%" height="352" src="https://player.vimeo.com/video/'. $videogallery_vimeo_video_id .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			};
			
			if ( $videogallery_video_source == 'youtube' ) {	
				$output .= '<iframe width="100%" height="352" src="https://www.youtube.com/embed/'. $videogallery_youtube_video_id .'?rel=0" frameborder="0" allowfullscreen></iframe>';
			};
			
			if ( $videogallery_video_source == 'mediagallery' ) {
				$output .= '<iframe width="100%" height="352" src="'. $videogallery_media_video .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			};
			
			if ( $videogallery_video_source == 'facebook' ) {
				$output .= '<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook%2Fvideos%2F'. $videogallery_facebook_video .'%2F&show_text=0&width=1024" width="1024" height="352" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>';
			};
						
		$output .= '</div>';

		return $output;
		
	}

}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_video_gallery extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_video_gallery_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpVideoGallery();

	