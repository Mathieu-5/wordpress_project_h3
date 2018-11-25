<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Fullscreen Slider
 * Description: Fullscreen Slider shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFullscreenSlider extends VcmpModule{

	const slug = 'vcmp_fullscreen_slider';
	const base = 'vcmp_fullscreen_slider';

	public function __construct(){
	
		add_action( 'vc_before_init', array( $this, 'vcmp_fullscreen_slider_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'vcmp_fullscreen_slider_content_shortcode_vc' ) );
		
		add_shortcode( 'vcmp_fullscreen_slider', array( $this, 'vc_vcmp_fullscreen_slider_shortcode' ));
		add_shortcode( 'vcmp_fullscreen_slider_content', array( $this, 'vcmp_fullscreen_slider_content_shortcode' ));
		
	}

	
	// Parent Element
	public function vcmp_fullscreen_slider_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Fullscreen Slider' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_fullscreen_slider',
				'description'             => __( 'Add fullpage parallax scroll to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_fullscreen_slider_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
				
					array( 
							"type" => "textfield",
							"heading" => __( "Z-Index", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_zindex",
							'admin_label' => true,
							"description" => __( "Please enter the z-index. Ex:9999", "VCMP_SLUG" ),
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
	

	// Nested Element
	public function vcmp_fullscreen_slider_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-vcmp_fullscreen_slider-page',
				'name'            => __('Slider Item', 'VCMP_SLUG'),
				'base'            => 'vcmp_fullscreen_slider_content',
				'description'     => __( 'Add slider item to your page.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'vcmp_fullscreen_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Background Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_grid_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Background Image", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Button Title", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_button_title",
							'admin_label' => true,
							"description" => __( "Please enter the button link title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Button URL", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_button_title_url",
							'admin_label' => true,
							"description" => __( "Please enter the button button url.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Button Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_button_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the button button title color.", "VCMP_SLUG" ),
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
							"heading" => __( "Content Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_content_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_content_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Facebook", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_facebook",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Facebook share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Twitter", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_twitter",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Twitter share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Instagram", "VCMP_SLUG" ),
						"param_name" => "vcmp_fullscreen_slider_showinstagram",
						"group" => "Social Share",
						"value" => array(
										__( "No", "VCMP_SLUG" ) => "no", 
										__( "Yes", "VCMP_SLUG" ) => "instagram", 
									),
						"description" => __( "Do you want to use view on Instagram social icon?", "VCMP_SLUG" ),
						"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Instagram Link", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_instagram",
							"group" => "Social Share",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "vcmp_fullscreen_slider_showinstagram",
											'value' => array( 'instagram' ),
											),
							"description" => __( "Please enter the content url on Instagram. Ex:https://www.instagram.com/p/BEPQ4Cptvfm/?taken-by=themeofwp", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "LinkedIn", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_linkedin",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use LinkedIn share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Pinterest", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_pinterest",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Pinterest share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Google+", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_google",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Google+ share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Digg", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_digg",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Digg share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Reddit", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_reddit",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Reddit share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Stumbleupon", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_stumbleupon",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Stumbleupon share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Tumblr", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_tumblr",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Tumblr share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "E-mail", "VCMP_SLUG" ),
							"param_name" => "vcmp_fullscreen_slider_email",
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
	public function vc_vcmp_fullscreen_slider_shortcode( $atts, $content = null ) {
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmp_fullscreen_slider_zindex' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_vcmp_fullscreen_slider', VCMP_URL . 'modules/vcmp-fullscreenslider/assets/css/vc_fullscreenslider.css');
		wp_enqueue_script( 'vc_vcmp_fullscreen_slider_js', VCMP_URL.'modules/vcmp-fullscreenslider/assets/js/vc_fullscreenslider.js', array('jquery'), '1.0', TRUE);
		
		$output = '<div class="vcmp-fulscreen-slider-container '.esc_attr( $el_class ).'" style="z-index:'.$vcmp_fullscreen_slider_zindex.'">
						<div class="vcmp-fulscreen-slider-control left inactive"></div>
							<div class="vcmp-fulscreen-slider-control right"></div>
								<ul class="vcmp-fulscreen-slider-pagi"></ul>
									<div class="vcmp-fulscreen-slider">
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
	public function vcmp_fullscreen_slider_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmp_fullscreen_slider_img' => '',
					'vcmp_fullscreen_slider_grid_bg' => '',
					'vcmp_fullscreen_slider_title' => '',
					'vcmp_fullscreen_slider_button_title' => '',
					'vcmp_fullscreen_slider_button_title_url' => '',
					'vcmp_fullscreen_slider_button_title_color' => '',
					'vcmp_fullscreen_slider_title_color' => '',
					'vcmp_fullscreen_slider_title_fontsize' => '',
					'vcmp_fullscreen_slider_content_fontsize' => '',
					'vcmp_fullscreen_slider_content_color' => '',
					
					'vcmp_fullscreen_slider_facebook' => '',
					'vcmp_fullscreen_slider_twitter' => '',
					'vcmp_fullscreen_slider_instagram' => '',
					'vcmp_fullscreen_slider_linkedin' => '',
					'vcmp_fullscreen_slider_pinterest' => '',
					'vcmp_fullscreen_slider_google' => '',
					'vcmp_fullscreen_slider_digg' => '',
					'vcmp_fullscreen_slider_reddit' => '',
					'vcmp_fullscreen_slider_stumbleupon' => '',
					'vcmp_fullscreen_slider_tumblr' => '',
					'vcmp_fullscreen_slider_email' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;

		
		$vcmp_fullscreen_slider_img = wp_get_attachment_image_src(intval($vcmp_fullscreen_slider_img), 'full');
		$vcmp_fullscreen_slider_img = $vcmp_fullscreen_slider_img[0];
		
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$output .=	'
					<div class="vcmp-fulscreen-slide slide-'.$i++.' active '.esc_attr( $el_class ).'">
					  <div class="vcmp-fulscreen-slide__bg" style="background: url('.$vcmp_fullscreen_slider_img.') no-repeat scroll 0 50% / cover;"></div>
					  <div class="vcmp-fulscreen-slide__content">
						<svg class="vcmp-fulscreen-slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
						  <path class="vcmp-fulscreen-slide__overlay-path" d="M0,0 150,0 500,405 0,405" style="fill:'.$vcmp_fullscreen_slider_grid_bg.';" />
						</svg>
						<div class="vcmp-fulscreen-slide__text">
						  <h2 class="vcmp-fulscreen-slide__text-heading" style="color:'.$vcmp_fullscreen_slider_title_color.'; font-size:'.$vcmp_fullscreen_slider_title_fontsize.'">'.$vcmp_fullscreen_slider_title.'</h2>
						  <p class="vcmp-fulscreen-slide__text-desc" style="color:'.$vcmp_fullscreen_slider_content_color.'; font-size:'.$vcmp_fullscreen_slider_content_fontsize.'">'. do_shortcode($content) .'</p>
						  <a href="'.$vcmp_fullscreen_slider_button_title_url.'" class="vcmp-fulscreen-slide__text-link" style="color:'.$vcmp_fullscreen_slider_button_title_color.';">'.$vcmp_fullscreen_slider_button_title.'</a>

					';
		
		$output .= '
						<span class="griddershare">';
								
		if ( !$vcmp_fullscreen_slider_facebook == '' ) {			
		$output .= '<a title="'.__( "Share on Facebook", "VCMP_SLUG" ).'" href="https://www.facebook.com/sharer.php?display=popup&amp;u='. $vcmp_fullscreen_slider_img .'&amp;t='.$vcmp_fullscreen_slider_title.'" class="share-btn fa fa-facebook" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';								  
		};
		
		if ( !$vcmp_fullscreen_slider_twitter == '' ) {									  
		$output .= '<a title="'.__( "Share on Twitter", "VCMP_SLUG" ).'" href="https://twitter.com/share?url='.$post_link.'&amp;text='.$vcmp_fullscreen_slider_title.'+'. $vcmp_fullscreen_slider_img .'" class="share-btn fa fa-twitter" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_instagram == '' ) {									  
		$output .= '<a title="'.__( "View on Instagram", "VCMP_SLUG" ).'" href="'.$vcmp_fullscreen_slider_instagram.'" class="share-btn fa fa-instagram" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_linkedin == '' ) { 
		$output .= '<a title="'.__( "Share on LinkedIn", "VCMP_SLUG" ).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_pinterest == '' ) { 
		$output .= '<a title="'.__( "Share on Pinterest", "VCMP_SLUG" ).'" href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;media='.$vcmp_fullscreen_slider_img.'&amp;description='.$vcmp_fullscreen_slider_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_google == '' ) {						
		$output .= '<a title="'.__( "Share on Google", "VCMP_SLUG" ).'" href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
					
		if ( !$vcmp_fullscreen_slider_digg == '' ) {
		$output .= '<a title="'.__( "Share on Digg", "VCMP_SLUG" ).'" href="http://www.digg.com/submit?url='.$post_link.'" class="share-btn fa fa-digg" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
						
		if ( !$vcmp_fullscreen_slider_reddit == '' ) {
		$output .= '<a title="'.__( "Share on Reddit", "VCMP_SLUG" ).'" href="http://reddit.com/submit?url='.$post_link.'" class="share-btn fa fa-reddit" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_stumbleupon == '' ) { 
		$output .= '<a title="'.__( "Share on Stumbleupon", "VCMP_SLUG" ).'" href="http://www.stumbleupon.com/submit?url='.$post_link.'&amp;title='.$vcmp_fullscreen_slider_title.'" class="share-btn fa fa-stumbleupon" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_tumblr == '' ) { 
		$output .= '<a title="'.__( "Share on Tumblr", "VCMP_SLUG" ).'" href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$vcmp_fullscreen_slider_title.'" class="share-btn fa fa-tumblr" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_fullscreen_slider_email == '' ) { 
		$output .= '<a title="'.__( "Sent by E-mail", "VCMP_SLUG" ).'" href="mailto:?subject='.$vcmp_fullscreen_slider_title.'&amp;body='.$content.' '.$vcmp_fullscreen_slider_img.''. $vcmp_fullscreen_slider_youtube_video .''. $vcmp_fullscreen_slider_vimeo_video .''. $vcmp_fullscreen_slider_text_only .' '.$post_link.'" class="share-btn fa fa-envelope" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		$output .= '			</span>
							</div>
					  </div>
				</div>
					';
		
		
		return $output;
		
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_fullscreen_slider extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_fullscreen_slider_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpFullscreenSlider();

	