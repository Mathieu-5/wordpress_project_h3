<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Flip Grid
 * Description: Flip Grid shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFlipGrid extends VcmpModule{

	const slug = 'vcmp_flipgrid';
	const base = 'vcmp_flipgrid';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vcmp_flipgrid_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'vcmp_flipgrid_content_shortcode_vc' ) );
		add_shortcode( 'vcmp_flipgrid', array( $this, 'vc_vcmp_flipgrid_shortcode' ));
		add_shortcode( 'vcmp_flipgrid_content', array( $this, 'vcmp_flipgrid_content_shortcode' ));
	}

	
	// Parent Element
	public function vcmp_flipgrid_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Flip Grid' , 'VCMP_SLUG' ),
				'base'                    => 'vcmp_flipgrid',
				'description'             => __( 'Add flip grid to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'vcmp_flipgrid_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
				
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Use Fullscreen", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_fullscreen",
							'admin_label' => true,
							"description" => __( "Do you want to use fullscreen?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Fullscreen Background Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_fulscreenbg",
							'admin_label' => true,
							"description" => __( "Please choose the bg color for the fullscreen grid.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Z-Index", "VCMP_SLUG" ),
						"param_name" => "vcmp_flipgrid_zindex",
						'admin_label' => true,
						"description" => __( "Enter the z-index for the fullscreen grid. Ex:99999", "VCMP_SLUG" ),
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
	public function vcmp_flipgrid_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-vcmp_flipgrid-page',
				'name'            => __('Flip Grid Item', 'VCMP_SLUG'),
				'base'            => 'vcmp_flipgrid_content',
				'description'     => __( 'Add flip grid item to your page.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'vcmp_flipgrid'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Flip Background Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_grid_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Background Image", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Flip Button Title", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_flip_text",
							'admin_label' => true,
							"description" => __( "Please enter the flip button title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Title", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Title Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_title_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_title_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea",
							"heading" => __( "Grid Excerpt", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_excerpt",
							'admin_label' => true,
							"description" => __( "Please enter the excerpt.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Excerpt Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_excerpt_color",
							'admin_label' => true,
							"description" => __( "Please choose the excerpt color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Excerpt Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_excerpt_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the excerpt font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Detail Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Detail Content Color", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_content_color",
							'admin_label' => true,
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Detail Content Font Size", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_content_fontsize",
							'admin_label' => true,
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Facebook", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_facebook",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Facebook share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Twitter", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_twitter",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Twitter share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Instagram", "VCMP_SLUG" ),
						"param_name" => "vcmp_flipgrid_showinstagram",
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
							"param_name" => "vcmp_flipgrid_instagram",
							"group" => "Social Share",
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "vcmp_flipgrid_showinstagram",
											'value' => array( 'instagram' ),
											),
							"description" => __( "Please enter the content url on Instagram. Ex:https://www.instagram.com/p/BEPQ4Cptvfm/?taken-by=themeofwp", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "LinkedIn", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_linkedin",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use LinkedIn share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Pinterest", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_pinterest",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Pinterest share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Google+", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_google",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Google+ share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Digg", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_digg",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Digg share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Reddit", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_reddit",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Reddit share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Stumbleupon", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_stumbleupon",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Stumbleupon share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Tumblr", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_tumblr",
							"group" => "Social Share",
							'admin_label' => true,
							"description" => __( "Do you want to use Tumblr share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "E-mail", "VCMP_SLUG" ),
							"param_name" => "vcmp_flipgrid_email",
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
	public function vc_vcmp_flipgrid_shortcode( $atts, $content = null ) {
		
		$output = $el_class = '';
		
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmp_flipgrid_fullscreen' => '',
					'vcmp_flipgrid_zindex' => '',
					'vcmp_flipgrid_fulscreenbg' => '',
				), $atts 
			) 
		);
		
		wp_enqueue_style( 'vc_vcmp_flipgrid', VCMP_URL . 'modules/vcmp-flipgrid/assets/css/vc_flipgrid.css');
		wp_enqueue_script( 'vc_vcmp_flipgrid_js', VCMP_URL.'modules/vcmp-flipgrid/assets/js/vc_flipgrid.js', array('jquery'), '1.0', TRUE);
		
		if ( $vcmp_flipgrid_fullscreen == 'true' ) {	
		
		$output = '<div class="vcmp_flipgrid '.esc_attr( $el_class ).'" style="z-index:'. $vcmp_flipgrid_zindex.'; position:fixed; top:0; left:0; background:'. $vcmp_flipgrid_fulscreenbg.'"><ul class="vc_flipgrid_content">'. do_shortcode($content).'</ul></div>';
		
		};
		
		if ( $vcmp_flipgrid_fullscreen == '' ) {	
		
		$output = '<div class="vcmp_flipgrid '.esc_attr( $el_class ).'"><ul class="vc_flipgrid_content">'. do_shortcode($content).'</ul></div>';
		
		};

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
	public function vcmp_flipgrid_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'vcmp_flipgrid_img' => '',
					'vcmp_flipgrid_grid_bg' => '',
					'vcmp_flipgrid_flip_text' => '',
					'vcmp_flipgrid_title' => '',
					'vcmp_flipgrid_title_color' => '',
					'vcmp_flipgrid_title_fontsize' => '',
					'vcmp_flipgrid_excerpt' => '',
					'vcmp_flipgrid_excerpt_fontsize' => '',
					'vcmp_flipgrid_excerpt_color' => '',
					'vcmp_flipgrid_content_fontsize' => '',
					'vcmp_flipgrid_content_color' => '',
					
					'vcmp_flipgrid_facebook' => '',
					'vcmp_flipgrid_twitter' => '',
					'vcmp_flipgrid_instagram' => '',
					'vcmp_flipgrid_linkedin' => '',
					'vcmp_flipgrid_pinterest' => '',
					'vcmp_flipgrid_google' => '',
					'vcmp_flipgrid_digg' => '',
					'vcmp_flipgrid_reddit' => '',
					'vcmp_flipgrid_stumbleupon' => '',
					'vcmp_flipgrid_tumblr' => '',
					'vcmp_flipgrid_email' => '',
				), $atts 
			) 
		);
		
		$content = wpautop($content);
		
		static $i = 0;
		static $it = 0;

		
		$vcmp_flipgrid_img = wp_get_attachment_image_src(intval($vcmp_flipgrid_img), 'full');
		$vcmp_flipgrid_img = $vcmp_flipgrid_img[0];
		
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$output .=	'<li>
						<div class="vc_flipgrid_cardfront '.esc_attr( $el_class ).'" style="background: url('.$vcmp_flipgrid_img.') no-repeat scroll 0 50% / cover;">
						</div>
						<div class="vc_flipgrid_cardback" style="background: '.$vcmp_flipgrid_grid_bg.';">
							<h2><b>'.$vcmp_flipgrid_flip_text.'</b></h2>
							<h2 style="color:'.$vcmp_flipgrid_title_color.'; font-size:'.$vcmp_flipgrid_title_fontsize.'"><b>'.$vcmp_flipgrid_title.'</b></h2>
							<p style="color:'.$vcmp_flipgrid_excerpt_color.'; font-size:'.$vcmp_flipgrid_excerpt_fontsize.'">'. $vcmp_flipgrid_excerpt .'</p>
						</div>

						<!-- Content -->
						<style>.vc_flipgrid_innercontent p {color:'.$vcmp_flipgrid_content_color.' !important;}</style>
						<div class="vc_flipgrid_all_content">
							<h1 style="color:'.$vcmp_flipgrid_title_color.'; font-size:'.$vcmp_flipgrid_title_fontsize.'">'.$vcmp_flipgrid_title.'</h1>
							<div class="vc_flipgrid_innercontent" style="color:'.$vcmp_flipgrid_content_color.'; font-size:'.$vcmp_flipgrid_content_fontsize.'">'. do_shortcode($content) .'</div>
					';
		
		$output .= '
						<span class="griddershare">';
								
		if ( !$vcmp_flipgrid_facebook == '' ) {			
		$output .= '<a title="'.__( "Share on Facebook", "VCMP_SLUG" ).'" href="https://www.facebook.com/sharer.php?display=popup&amp;u='. $vcmp_flipgrid_img .'&amp;t='.$vcmp_flipgrid_title.'" class="share-btn fa fa-facebook" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';								  
		};
		
		if ( !$vcmp_flipgrid_twitter == '' ) {									  
		$output .= '<a title="'.__( "Share on Twitter", "VCMP_SLUG" ).'" href="https://twitter.com/share?url='.$post_link.'&amp;text='.$vcmp_flipgrid_title.'+'. $vcmp_flipgrid_img .'" class="share-btn fa fa-twitter" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_instagram == '' ) {									  
		$output .= '<a title="'.__( "View on Instagram", "VCMP_SLUG" ).'" href="'.$vcmp_flipgrid_instagram.'" class="share-btn fa fa-instagram" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_linkedin == '' ) { 
		$output .= '<a title="'.__( "Share on LinkedIn", "VCMP_SLUG" ).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_pinterest == '' ) { 
		$output .= '<a title="'.__( "Share on Pinterest", "VCMP_SLUG" ).'" href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;media='.$vcmp_flipgrid_img.'&amp;description='.$vcmp_flipgrid_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_google == '' ) {						
		$output .= '<a title="'.__( "Share on Google", "VCMP_SLUG" ).'" href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
					
		if ( !$vcmp_flipgrid_digg == '' ) {
		$output .= '<a title="'.__( "Share on Digg", "VCMP_SLUG" ).'" href="http://www.digg.com/submit?url='.$post_link.'" class="share-btn fa fa-digg" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
						
		if ( !$vcmp_flipgrid_reddit == '' ) {
		$output .= '<a title="'.__( "Share on Reddit", "VCMP_SLUG" ).'" href="http://reddit.com/submit?url='.$post_link.'" class="share-btn fa fa-reddit" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_stumbleupon == '' ) { 
		$output .= '<a title="'.__( "Share on Stumbleupon", "VCMP_SLUG" ).'" href="http://www.stumbleupon.com/submit?url='.$post_link.'&amp;title='.$vcmp_flipgrid_title.'" class="share-btn fa fa-stumbleupon" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_tumblr == '' ) { 
		$output .= '<a title="'.__( "Share on Tumblr", "VCMP_SLUG" ).'" href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$vcmp_flipgrid_title.'" class="share-btn fa fa-tumblr" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$vcmp_flipgrid_email == '' ) { 
		$output .= '<a title="'.__( "Sent by E-mail", "VCMP_SLUG" ).'" href="mailto:?subject='.$vcmp_flipgrid_title.'&amp;body='.$content.' '.$vcmp_flipgrid_img.''. $vcmp_flipgrid_youtube_video .''. $vcmp_flipgrid_vimeo_video .''. $vcmp_flipgrid_text_only .' '.$post_link.'" class="share-btn fa fa-envelope" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		$output .= '</div>
					</li>
					';
		
		
		return $output;
		
	}
	
}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_vcmp_flipgrid extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_vcmp_flipgrid_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpFlipGrid();

	