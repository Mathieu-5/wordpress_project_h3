<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Fullpage Parallax Scroll
 * Description: Fullpage Parallax Scroll shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFullpageParallax extends VcmpModule{

	const slug = 'vcmpfullpage_parallax';
	const base = 'vcmpfullpage_parallax';

	public function __construct(){
		
		add_action( 'vc_before_init', array( $this, 'vcmpfullpage_parallax_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'vcmpfullpage_parallax_content_shortcode_vc' ) );
		
		add_shortcode( 'vcmpfullpage_parallax', array( $this, 'vc_vcmpfullpage_parallax_shortcode' ));
		add_shortcode( 'vcmpfullpage_parallax_content', array( $this, 'vcmpfullpage_parallax_content_shortcode' ));
		
	}


	
	// Parent Element
	public function vcmpfullpage_parallax_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Fullpage Parallax Scroll' , 'VCMP_SLUG' ),
				'base'                    => 'vcmpfullpage_parallax',
				'description'             => __( 'Add fullpage parallax scroll to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmpfullpage_parallax_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
				
					array( 
							"type" => "textfield",
							"heading" => __( "Z-Index", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_zindex",
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
	public function vcmpfullpage_parallax_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-vcmpfullpage_parallax-page',
				'name'            => __('Parallax Item', 'VCMP_SLUG'),
				'base'            => 'vcmpfullpage_parallax_content',
				'description'     => __( 'Add parallax items to your page.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'vcmpfullpage_parallax'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Background Color", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_grid_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Background Image", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_title_fontsize",
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
							"heading" => __( "Content Color", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_content_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_content_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Facebook", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_facebook",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Facebook share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Twitter", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_twitter",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Twitter share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Instagram", "VCMP_SLUG" ),
						"param_name" => "vcmpfullpage_parallax_showinstagram",
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
							"param_name" => "vcmpfullpage_parallax_instagram",
							"group" => "Social Share",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "vcmpfullpage_parallax_showinstagram",
											'value' => array( 'instagram' ),
											),
							"description" => __( "Please enter the content url on Instagram. Ex:https://www.instagram.com/p/BEPQ4Cptvfm/?taken-by=themeofwp", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "LinkedIn", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_linkedin",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use LinkedIn share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Pinterest", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_pinterest",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Pinterest share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Google+", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_google",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Google+ share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Digg", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_digg",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Digg share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Reddit", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_reddit",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Reddit share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Stumbleupon", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_stumbleupon",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Stumbleupon share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Tumblr", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_tumblr",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Tumblr share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "E-mail", "VCMP_SLUG" ),
							"param_name" => "vcmpfullpage_parallax_email",
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
	public function vc_vcmpfullpage_parallax_shortcode( $atts, $content = null ) {
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmpfullpage_parallax_zindex' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_vcmpfullpage_parallax', VCMP_URL . 'modules/vcmp-fullpageparallax/assets/css/vc_fullpageparallax.css');
			
		wp_enqueue_script( 'vc_lodash_js', VCMP_URL.'modules/vcmp-fullpageparallax/assets/js/lodash.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_vcmpfullpage_parallax_js', VCMP_URL.'modules/vcmp-fullpageparallax/assets/js/vc_fullpageparallax.js', array('jquery'), '1.0', TRUE);
		
		$output = '<div id="vcmp_fullpage_parallax_wrapper" class="'.esc_attr( $el_class ).'" style="z-index:'.$vcmpfullpage_parallax_zindex.'">'. do_shortcode($content).'</div>';
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
	public function vcmpfullpage_parallax_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmpfullpage_parallax_img' => '',
					'vcmpfullpage_parallax_title' => '',
					'vcmpfullpage_parallax_title_color' => '',
					'vcmpfullpage_parallax_title_fontsize' => '',
					'vcmpfullpage_parallax_content_fontsize' => '',
					'vcmpfullpage_parallax_content_color' => '',
					
					'vcmpfullpage_parallax_facebook' => '',
					'vcmpfullpage_parallax_twitter' => '',
					'vcmpfullpage_parallax_instagram' => '',
					'vcmpfullpage_parallax_linkedin' => '',
					'vcmpfullpage_parallax_pinterest' => '',
					'vcmpfullpage_parallax_google' => '',
					'vcmpfullpage_parallax_digg' => '',
					'vcmpfullpage_parallax_reddit' => '',
					'vcmpfullpage_parallax_stumbleupon' => '',
					'vcmpfullpage_parallax_tumblr' => '',
					'vcmpfullpage_parallax_email' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;

		
		$vcmpfullpage_parallax_img = wp_get_attachment_image_src(intval($vcmpfullpage_parallax_img), 'full');
		$vcmpfullpage_parallax_img = $vcmpfullpage_parallax_img[0];
		
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$output .=	' <section class="vcmp_fullpage_parallax '.esc_attr( $el_class ).'" style="background: url('.$vcmpfullpage_parallax_img.') no-repeat scroll 0 50% / cover;">
						<div class="content-wrapper">
						  <h1 class="content-title" style="color:'.$vcmpfullpage_parallax_title_color.'; font-size:'.$vcmpfullpage_parallax_title_fontsize.'">'.$vcmpfullpage_parallax_title.'</h1>
						  <p class="content-subtitle" style="color:'.$vcmpfullpage_parallax_content_color.'; font-size:'.$vcmpfullpage_parallax_content_fontsize.'">'. do_shortcode($content) .'</p>
					';
		$output .= '
						<span class="griddershare">';
								
		if ( !$vcmpfullpage_parallax_facebook == '' ) {			
		$output .= '<a title="'.__( "Share on Facebook", "VCMP_SLUG" ).'" href="https://www.facebook.com/sharer.php?display=popup&amp;u='. $vcmpfullpage_parallax_img .'&amp;t='.$vcmpfullpage_parallax_title.'" class="share-btn fa fa-facebook" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';								  
		};
		
		if ( !$vcmpfullpage_parallax_twitter == '' ) {									  
		$output .= '<a title="'.__( "Share on Twitter", "VCMP_SLUG" ).'" href="https://twitter.com/share?url='.$post_link.'&amp;text='.$vcmpfullpage_parallax_title.'+'. $vcmpfullpage_parallax_img .'" class="share-btn fa fa-twitter" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_instagram == '' ) {									  
		$output .= '<a title="'.__( "View on Instagram", "VCMP_SLUG" ).'" href="'.$vcmpfullpage_parallax_instagram.'" class="share-btn fa fa-instagram" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_linkedin == '' ) { 
		$output .= '<a title="'.__( "Share on LinkedIn", "VCMP_SLUG" ).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_pinterest == '' ) { 
		$output .= '<a title="'.__( "Share on Pinterest", "VCMP_SLUG" ).'" href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;media='.$vcmpfullpage_parallax_img.'&amp;description='.$vcmpfullpage_parallax_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_google == '' ) {						
		$output .= '<a title="'.__( "Share on Google", "VCMP_SLUG" ).'" href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
					
		if ( !$vcmpfullpage_parallax_digg == '' ) {
		$output .= '<a title="'.__( "Share on Digg", "VCMP_SLUG" ).'" href="http://www.digg.com/submit?url='.$post_link.'" class="share-btn fa fa-digg" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
						
		if ( !$vcmpfullpage_parallax_reddit == '' ) {
		$output .= '<a title="'.__( "Share on Reddit", "VCMP_SLUG" ).'" href="http://reddit.com/submit?url='.$post_link.'" class="share-btn fa fa-reddit" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_stumbleupon == '' ) { 
		$output .= '<a title="'.__( "Share on Stumbleupon", "VCMP_SLUG" ).'" href="http://www.stumbleupon.com/submit?url='.$post_link.'&amp;title='.$vcmpfullpage_parallax_title.'" class="share-btn fa fa-stumbleupon" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_tumblr == '' ) { 
		$output .= '<a title="'.__( "Share on Tumblr", "VCMP_SLUG" ).'" href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$vcmpfullpage_parallax_title.'" class="share-btn fa fa-tumblr" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmpfullpage_parallax_email == '' ) { 
		$output .= '<a title="'.__( "Sent by E-mail", "VCMP_SLUG" ).'" href="mailto:?subject='.$vcmpfullpage_parallax_title.'&amp;body='.$content.' '.$vcmpfullpage_parallax_img.''. $vcmpfullpage_parallax_youtube_video .''. $vcmpfullpage_parallax_vimeo_video .''. $vcmpfullpage_parallax_text_only .' '.$post_link.'" class="share-btn fa fa-envelope" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		$output .= '		</span>
					</div>
			</section>
					';
		
		
		return $output;
		
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmpfullpage_parallax extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmpfullpage_parallax_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpFullpageParallax();

	