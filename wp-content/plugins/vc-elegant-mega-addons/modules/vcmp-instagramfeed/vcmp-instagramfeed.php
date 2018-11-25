<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Instagram Feed
 * Description: Instagram Feed shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpInstagramFeed extends VcmpModule{

	const slug = 'vcmp_instagramfeed';
	const base = 'vcmp_instagramfeed';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Instagram Feed", "VCMP_SLUG"),
            "description" => __("Add Instagram Feed to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_instagramfeed.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_instagramfeed_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
			
				array(
					"type" => "textfield",
					"heading" => __( "Instagram clientID", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_clientid",
					"description" => __( "Enter your instagram clientID", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Instagram Username", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_username",
					"description" => __( "Enter your instagram Username", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Instagram Post Limit", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_limit",
					"description" => __( "Enter your instagram post limit per load.", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display URL(s)", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_urls",
					"description" => __( "Do you want to display post urls?", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Video(s)", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_videos",
					"description" => __( "Do you want to display post videos?", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Captions(s)", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_captions",
					"description" => __( "Do you want to display post captions?", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display like(s)", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_likes",
					"description" => __( "Do you want to display post likes?", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display comment(s) count", "VCMP_SLUG" ),
					"param_name" => "instagramfeed_comments_count",
					"description" => __( "Do you want to display post comments count?", "VCMP_SLUG" ),
					'admin_label' => true,
					'value' => ""
				),
			
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
				),

            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'instagramfeed_clientid' => '',
			'instagramfeed_username' => '',
			'instagramfeed_limit' => '',
			'instagramfeed_urls' => '',
			'instagramfeed_videos' => '',
			'instagramfeed_captions' => '',
			'instagramfeed_likes' => '',
			'instagramfeed_comments_count' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_instagramfeed_css', VCMP_URL . 'modules/vcmp-instagramfeed/assets/css/vc-instagramfeed.css');
		wp_enqueue_script( 'vc_instagramfeed_js', VCMP_URL.'modules/vcmp-instagramfeed/assets/js/vc-instagramfeed.js', array('jquery'), '1.0', TRUE);
		
		$output .= '<ul class="vcmp-instagramfeed '.esc_attr( $el_class ).'"></ul><div class="clearfix vcmp-center"> <button class="vcmp-load-more-btn"><span>load more</span></button></div>';
		
		$output .= '
					<script>
					
						jQuery(document).ready(function($){
						
							$(".vcmp-instagramfeed").instagramLite({
								clientID: "'.$instagramfeed_clientid.'",
								username: "'.$instagramfeed_username.'",
								limit: '.$instagramfeed_limit.',
								urls: '.$instagramfeed_urls.',
								videos: '.$instagramfeed_videos.', 
								captions: '.$instagramfeed_captions.',
								likes: '.$instagramfeed_likes.',
								comments_count: '.$instagramfeed_comments_count.',
								load_more: ".vcmp-load-more-btn"
							});
						
						});
						
					</script>

					';

      return $output;

    }
	

}
// Finally initialize code
new VcmpInstagramFeed();