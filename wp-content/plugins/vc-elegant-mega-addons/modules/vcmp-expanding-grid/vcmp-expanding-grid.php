<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Expanding Grid
 * Description: Expanding Grid shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpExpandinGrid extends VcmpModule{

	const slug = 'expanding_grid';
	const base = 'expanding_grid';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'expanding_grid_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'expanding_grid_content_shortcode_vc' ) );
		add_shortcode( 'expanding_grid', array( $this, 'vc_expanding_grid_shortcode' ));
		add_shortcode( 'expanding_grid_content', array( $this, 'expanding_grid_content_shortcode' ));
	}
	
	
	// Parent Element
	public function expanding_grid_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Expanding Grid' , 'VCMP_SLUG' ),
				'base'                    => 'expanding_grid',
				'description'             => __( 'Add expanding grid gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'expanding_grid_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
	public function expanding_grid_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-expandingrid-page',
				'name'            => __('Grid Item', 'VCMP_SLUG'),
				'base'            => 'expanding_grid_content',
				'description'     => __( 'Add expanding grid items to your gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'expanding_grid'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Thumbnail Image", "VCMP_SLUG" ),
							"param_name" => "expandingrid_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Image Link URL", "VCMP_SLUG" ),
							"param_name" => "expandingrid_url",
							'admin_label' => true,
							"description" => __( "Please enter the link URL.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "expandingrid_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "expandingrid_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "expandingrid_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Left Content Type", "VCMP_SLUG" ),
						"param_name" => "expandingrid_leftcontent",
						"value" => array(
										__( "None", "VCMP_SLUG" ) => "none", 
										__( "Youtube", "VCMP_SLUG" ) => "youtube", 
										__( "Vimeo", "VCMP_SLUG" ) => "vimeo", 
										__( "Custom Video from URL", "VCMP_SLUG" ) => "customvideo",
										__( "Single Image", "VCMP_SLUG" ) => "singleimage",
										__( "Text", "VCMP_SLUG" ) => "textonly",
									),
						"description" => __( "Select the type of the source.", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Youtube Video Link", "VCMP_SLUG" ),
							"param_name" => "expandingrid_youtube_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "expandingrid_leftcontent",
											'value' => array( 'youtube' ),
											),
							"description" => __( "Please enter the youtube video url. Ex:https://www.youtube.com/embed/r-neGA1blsE", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Vimeo Video Link", "VCMP_SLUG" ),
							"param_name" => "expandingrid_vimeo_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "expandingrid_leftcontent",
											'value' => array( 'vimeo' ),
											),
							"description" => __( "Please enter the vimeo video id. Ex:162052542", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Custom Video From URL", "VCMP_SLUG" ),
							"param_name" => "expandingrid_custom_video",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "expandingrid_leftcontent",
											'value' => array( 'customvideo' ),
											),
							"description" => __( "Please enter the custom video url.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image", 
							"heading" => __( "Single Image", "VCMP_SLUG" ),
							"param_name" => "expandingrid_single_image",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "expandingrid_leftcontent",
											'value' => array( 'singleimage' ),
											),
							"description" => __( "Please upload or choose image from media library.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea", 
							"heading" => __( "Left Content Text", "VCMP_SLUG" ),
							"param_name" => "expandingrid_text_only",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "expandingrid_leftcontent",
											'value' => array( 'textonly' ),
											),
							"description" => __( "Please enter your text.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Right Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Custom Width", "VCMP_SLUG" ),
							"param_name" => "expandingrid_width",
							'admin_label' => true,
							"description" => __( "If you want to use custom grid width please enter your own value. Default is 19.5%", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Custom Height", "VCMP_SLUG" ),
							"param_name" => "expandingrid_height",
							'admin_label' => true,
							"description" => __( "If you want to use custom grid height please enter your own value. Default is 200px", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Facebook", "VCMP_SLUG" ),
							"param_name" => "expandingrid_facebook",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Facebook share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Twitter", "VCMP_SLUG" ),
							"param_name" => "expandingrid_twitter",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Twitter share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "LinkedIn", "VCMP_SLUG" ),
							"param_name" => "expandingrid_linkedin",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use LinkedIn share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Pinterest", "VCMP_SLUG" ),
							"param_name" => "expandingrid_pinterest",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Pinterest share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Google+", "VCMP_SLUG" ),
							"param_name" => "expandingrid_google",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Google+ share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Digg", "VCMP_SLUG" ),
							"param_name" => "expandingrid_digg",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Digg share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Reddit", "VCMP_SLUG" ),
							"param_name" => "expandingrid_reddit",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Reddit share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Stumbleupon", "VCMP_SLUG" ),
							"param_name" => "expandingrid_stumbleupon",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Stumbleupon share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Tumblr", "VCMP_SLUG" ),
							"param_name" => "expandingrid_tumblr",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Tumblr share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "E-mail", "VCMP_SLUG" ),
							"param_name" => "expandingrid_email",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use E-mail share?.", "VCMP_SLUG" ),
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
	public function vc_expanding_grid_shortcode( $atts, $content = null ) {
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
				), $atts 
			) 
		);
		
		wp_enqueue_style( 'vc_expandingrid', VCMP_URL . 'modules/vcmp-expanding-grid/assets/css/vc_expandingrid.css');
		wp_enqueue_script( 'vc_expandingrid', VCMP_URL.'modules/vcmp-expanding-grid/assets/js/vc_expandingrid.js', array('jquery'), '1.0', TRUE);
			
		$output = '<ul class="gridder '.esc_attr( $el_class ).'">'. do_shortcode($content).'</ul>';
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
	 * Grid Gallery Content Items Shortcode
	 */
	public function expanding_grid_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'expandingrid_img' => '',
					'expandingrid_title' => '',
					'expandingrid_title_color' => '',
					'expandingrid_title_fontsize' => '',
					'expandingrid_leftcontent' => '',
					'expandingrid_youtube_video' => '',
					'expandingrid_vimeo_video' => '',
					'expandingrid_custom_video' => '',
					'expandingrid_single_image' => '',
					'expandingrid_text_only' => '',
					'expandingrid_shortcode_only' => '',
					'expandingrid_url' => '',
					'expandingrid_width' => '',
					'expandingrid_height' => '',
					
					'expandingrid_facebook' => '',
					'expandingrid_twitter' => '',
					'expandingrid_linkedin' => '',
					'expandingrid_pinterest' => '',
					'expandingrid_google' => '',
					'expandingrid_digg' => '',
					'expandingrid_reddit' => '',
					'expandingrid_stumbleupon' => '',
					'expandingrid_tumblr' => '',
					'expandingrid_email' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;

		
		$expandingrid_img = wp_get_attachment_image_src(intval($expandingrid_img), 'full');
		$expandingrid_img = $expandingrid_img[0];
		
		$expandingrid_single_image = wp_get_attachment_image_src(intval($expandingrid_single_image), 'full');
		$expandingrid_single_image = $expandingrid_single_image[0];
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$output .= ' <li class="gridder-list" data-griddercontent="#gridder-content-'.$i++.'" style="background: url('.$expandingrid_img.') no-repeat scroll 0 0 / cover; width: '.$expandingrid_width.'; height: '.$expandingrid_height.'"></li>';
					
		$output .= '<div id="gridder-content-'.$it++.'" class="gridder-content">';
		
		if ( $expandingrid_leftcontent == 'youtube' ) {				
		$output .= '<div class="griddercol">
						<iframe width=100% height=400 src='. $expandingrid_youtube_video .' frameborder=0 allowfullscreen></iframe>
					</div>';
		};
		
		if ( $expandingrid_leftcontent == 'vimeo' ) {				
		$output .= '<div class="griddercol">
						<iframe src=https://player.vimeo.com/video/'. $expandingrid_vimeo_video .' width=100% height=400 frameborder=0 webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>';
		};
		
		if ( $expandingrid_leftcontent == 'customvideo' ) {				
		$output .= '<div class="griddercol">
						'. $expandingrid_custom_video .'
					</div>';
		};
		
		if ( $expandingrid_leftcontent == 'singleimage' ) {				
		$output .= '<div class="griddercol">
						<img src="'. $expandingrid_single_image .'">
					</div>';
		};
		
		if ( $expandingrid_leftcontent == 'textonly' ) {				
		$output .= '<div class="griddercol">
						<p>'. $expandingrid_text_only .'</p>
					</div>';
		};
		
		
		$output .= '<div class="griddercol">
								<h2 style="color:'.$expandingrid_title_color.'; font-size:'.$expandingrid_title_fontsize.'">'.$expandingrid_title.'</h2>
								'. do_shortcode($content) .'
								
								<div class="griddershare">';
								
		if ( !$expandingrid_facebook == '' ) {			
		$output .= '<a title="" href="https://www.facebook.com/sharer.php?display=popup&amp;u='.$post_link.'&amp;p[images][0]='.$expandingrid_img.'" class="share-btn fa fa-facebook" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';								  
		};
		
		if ( !$expandingrid_twitter == '' ) {									  
		$output .= '<a title="" href="https://twitter.com/share?url='.$post_link.'&amp;text='.$post_title.'" class="share-btn fa fa-twitter" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_linkedin == '' ) { 
		$output .= '<a title="" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_pinterest == '' ) { 
		$output .= '<a title="" href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;media='.$expandingrid_img.'&amp;description='.$post_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_google == '' ) {						
		$output .= '<a title="" href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
					
		if ( !$expandingrid_digg == '' ) {
		$output .= '<a title="" href="http://www.digg.com/submit?url='.$post_link.'" class="share-btn fa fa-digg" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
						
		if ( !$expandingrid_reddit == '' ) {
		$output .= '<a title="" href="http://reddit.com/submit?url='.$post_link.'" class="share-btn fa fa-reddit" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_stumbleupon == '' ) { 
		$output .= '<a title="" href="http://www.stumbleupon.com/submit?url='.$post_link.'&amp;title='.$post_title.'" class="share-btn fa fa-stumbleupon" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_tumblr == '' ) { 
		$output .= '<a title="" href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$post_title.'" class="share-btn fa fa-tumblr" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$expandingrid_email == '' ) { 
		$output .= '<a title="" href="mailto:?subject='.$post_title.'&amp;body='.$post_excerpt.' '.$post_link.'" class="share-btn fa fa-envelope" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		$output .= '			</div>
							</div>
					</div>';

		
		
		return $output;
		
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_expanding_grid extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_expanding_grid_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpExpandinGrid();

	