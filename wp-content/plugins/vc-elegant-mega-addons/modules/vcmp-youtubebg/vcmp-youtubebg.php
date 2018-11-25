<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Youtube Background
 * Description: Youtube background shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpYoutubeBg extends VcmpModule{

	const slug = 'vcmp_youtubebg';
	const base = 'vcmp_youtubebg';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Youtube Background", "VCMP_SLUG"),
            "description" 	=> __("Add Youtube background to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_youtubebg.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_youtubebg_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
					"type" => "textfield",
					"heading" => __( "Youtube Video ID", "VCMP_SLUG" ),
					"param_name" => "youtubebg_id",
					"description" => __( "Enter the youtube video id. Ex:HPph35tdMP8", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
			
				array(
					"type" => "textfield",
					"heading" => __( "Overlay Title", "VCMP_SLUG" ),
					"param_name" => "youtubebg_title",
					"description" => __( "Enter the title text", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Overlay Title Font_Size", "VCMP_SLUG" ),
					"param_name" => "youtubebg_title_font_size",
					"description" => __( "Choose the title font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Overlay Title Color", "VCMP_SLUG" ),
					"param_name" => "youtubebg_title_color",
					"description" => __( "Choose the title color.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textarea_html",
					"heading" => __( "Overlay Content", "VCMP_SLUG" ),
					"param_name" => "content",
					"description" => __( "Enter the content", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Overlay Content Font_Size", "VCMP_SLUG" ),
					"param_name" => "youtubebg_content_font_size",
					"description" => __( "Choose the content font size.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __( "Overlay Content Color", "VCMP_SLUG" ),
					"param_name" => "youtubebg_content_color",
					"description" => __( "Choose the content color.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				/*
				Controls
				*/
				
				array( 
					"type" => "checkbox",
					"heading" => __( "Autoplay", "VCMP_SLUG" ),
					"param_name" => "youtubebg_autoplay",
					"group" => "Controls",
					'admin_label' => true,
					"description" => __( "Autoplay video?", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "checkbox",
					"heading" => __( "Controls", "VCMP_SLUG" ),
					"param_name" => "youtubebg_controls",
					"group" => "Controls",
					'admin_label' => true,
					"description" => __( "Controls for video?", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "checkbox",
					"heading" => __( "HD", "VCMP_SLUG" ),
					"param_name" => "youtubebg_hd",
					"group" => "Controls",
					'admin_label' => true,
					"description" => __( "HD video?", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "checkbox",
					"heading" => __( "Loop", "VCMP_SLUG" ),
					"param_name" => "youtubebg_loop",
					"group" => "Controls",
					'admin_label' => true,
					"description" => __( "Loop video?", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "checkbox",
					"heading" => __( "Show Info", "VCMP_SLUG" ),
					"param_name" => "youtubebg_showinfo",
					"group" => "Controls",
					'admin_label' => true,
					"description" => __( "Show video info?", "VCMP_SLUG" ),
					"value" => ""
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
			'youtubebg_id' => '',
			'youtubebg_title' => '',
			'youtubebg_title_font_size' => '',
			'youtubebg_title_color' => '',
			'youtubebg_content_font_size' => '',
			'youtubebg_content_color' => '',
			
			'youtubebg_autoplay' => '',
			'youtubebg_controls' => '',
			'youtubebg_hd' => '',
			'youtubebg_loop' => '',
			'youtubebg_showinfo' => '',
			
		), $atts ) );

		wp_enqueue_style( 'vc_youtubebg', VCMP_URL . 'modules/vcmp-youtubebg/assets/css/vc_youtubebg.css');
		
		
		if ( $youtubebg_autoplay == 'true' ) { $autoplay ='1'; } else { $autoplay ='0'; };
		if ( $youtubebg_controls == 'true' ) { $controls ='1'; } else { $controls ='0'; };
		if ( $youtubebg_hd == 'true' ) { $hd ='1'; } else { $hd ='0'; };
		if ( $youtubebg_loop == 'true' ) { $loop ='1'; } else { $loop ='0'; };
		if ( $youtubebg_showinfo == 'true' ) { $showinfo ='1'; } else { $showinfo ='0'; };
		
		
		$output .= '<section class="vcmp_section-video-back '.esc_attr( $el_class ).'">
					  <div class="vcmp_video-wrap">
						
						<div class="vcmp_video-container">
						  <div id="player"></div>
						</div>
						
						<div class="vcmp_video-content">
						  <h2 style="font-size:'.$youtubebg_title_font_size.'; color:'.$youtubebg_title_color.'">
							 '.$youtubebg_title.'
						  </h2>
						  <div style="font-size:'.$youtubebg_content_font_size.'; color:'.$youtubebg_content_color.'">'.do_shortcode( $content ).'</div>
						</div>
						
					  </div>
					</section>';
					
		$output .= '<script>
		
					var tag = document.createElement(\'script\');
					tag.src = \'https://www.youtube.com/iframe_api\';
					var firstScriptTag = document.getElementsByTagName(\'script\')[0];
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
					var player;
					function onYouTubeIframeAPIReady() {
					  player = new YT.Player(\'player\', {
						height: \'100%\',
						width: \'100%\',
						videoId: \''.$youtubebg_id.'\',
						playerVars: { \'autoplay\': '.$autoplay.', \'controls\': '.$controls.', \'rel\': 0, \'hd\': '.$hd.', \'modestbranding\': 1, \'loop\': '.$loop.', \'showinfo\':'.$showinfo.', \'autohide\': 1, \'disablekb\': 1, \'wmode\': \'opaque\' },
						events: {
						  \'onReady\': onPlayerReady,
						  \'onStateChange\': function(e){
							var id = \''.$youtubebg_id.'\';
							if(e.data === YT.PlayerState.ENDED){
							  player.loadVideoById(id);
							}
						  }

						}
					  });
					}
					function onPlayerReady(event) {
					  event.target.playVideo();
					}
					function onPlayerReady(event) {
					  event.target.mute();
					}
		
					</script>';
		
      return $output;
	  
	  
    }
	

}
// Finally initialize code
new VcmpYoutubeBg();