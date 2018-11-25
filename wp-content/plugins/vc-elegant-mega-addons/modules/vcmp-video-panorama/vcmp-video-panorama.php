<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Video Panorama
 * Description: Video Panorama shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: https://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpVideoPanorama extends VcmpModule{

	const slug = 'vcmp_video_panorama';
	const base = 'vcmp_video_panorama';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        	vc_map( 
				array(
					"icon"                    => "icon-vc-elegant-mega", 
					'name'                    => __( 'Video Panorama' , "VCMP_SLUG" ),
					"base" 					  => self::base,
					'description'             => __( 'Add Video Panorama to your page.', "VCMP_SLUG" ),
					'content_element'         => true,
					'show_settings_on_create' => true,
					"category" 				  => __('Elegant Mega Addons', "VCMP_SLUG" ),
					'params'          		  => array(

					array(
						"type" 			  	=> "textfield",
						"heading" 			=> __( "Panorama Video", "VCMP_SLUG" ),
						"param_name" 		=> "panorama_video",
						"description" 		=> __( "Please choose your panorama video from medi library.", "VCMP_SLUG" ),
						'admin_label' 		=> true,
						"value" 			=> ""
					),


					array(
						"type" 				=> "textfield",
						"heading" 			=> __( "Panorama Height", "VCMP_SLUG" ),
						"param_name" 		=> "panorama_height",
						"description" 		=> __( "Please enter the height. Ex: 400", "VCMP_SLUG" ),
						'admin_label' 		=> true,
						"value" 			=> ""
					),


					array(
						"type" 				=> "colorpicker",
						"heading" 			=> __( "Panorama Background Color", "VCMP_SLUG" ),
						"param_name" 		=> "panorama_bgcolor",
						"description" 		=> __( "Please choose the bg color.", "VCMP_SLUG" ),
						'admin_label' 		=> true,
						"value" 			=> ""
					),

					array(
						'type' 				=> 'checkbox',
						'heading' 			=> __( 'Show Settings', 'twvc_themeofwp_addon' ),
						'param_name' 		=> 'panorama_showsettings',
						'value' 			=> array( __( 'Yes', 'twvc_themeofwp_addon' ) => 'setting' ),
						'group' 			=> __( 'Navbar', 'twvc_themeofwp_addon' ),
						'description' 		=> __( 'Do you want to show settings on navbar?', 'twvc_themeofwp_addon' ),
					),

					array(
						'type' 				=> 'checkbox',
						'heading' 			=> __( 'Show Fullscreen', 'twvc_themeofwp_addon' ),
						'param_name' 		=> 'panorama_showfullscreen',
						'value' 			=> array( __( 'Yes', 'twvc_themeofwp_addon' ) => 'fullscreen' ),
						'group' 			=> __( 'Navbar', 'twvc_themeofwp_addon' ),
						'description' 		=> __( 'Do you want to show fullscreen on navbar?', 'twvc_themeofwp_addon' ),
					),

					array(
						"type" 				=> "textfield",
						"heading" 			=> __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" 		=> "el_class",
						"description" 		=> __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),

					array(
						'type' 				=> 'css_editor',
						'heading' 			=> __( 'Custom Design Options', "VCMP_SLUG" ),
						'param_name' 		=> 'css',
						'group' 			=> __( 'Design options', "VCMP_SLUG" ),
					),
				)
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output =
		$el_class =
		$css = '';
		$panorama_video = '';
		$panorama_height = '';
		$panorama_bgcolor = '';
		$panorama_showsettings = '';
		$panorama_showfullscreen = '';
		$panorama_infospot = '';

		extract(
			shortcode_atts(
				array(
					'el_class' => '',
					'css' => '',
					'panorama_video' => '',
					'panorama_height' => '',
					'panorama_bgcolor' => '',
					'panorama_showsettings' => '',
					'panorama_showfullscreen' => '',
					'panorama_infospot' => '',
				), $atts
			)
		);


		if ( '' == $panorama_showsettings ) {
			$panorama_showsettings ='';
		} else{
			$panorama_showsettings ='setting';
		}

		if ( '' == $panorama_showfullscreen ) {
			$panorama_showfullscreen ='';
		} else{
			$panorama_showfullscreen ='fullscreen';
		}


		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );

		static $i = 0;

		wp_enqueue_script( 'vc_video_three_min', VCMP_URL.'modules/vcmp-video-panorama/assets/js/three.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_video_panolens', VCMP_URL.'modules/vcmp-video-panorama/assets/js/panolens.js', array('jquery'), '1.0', TRUE);

		$output .= '<div id="panorama-'.$i.'" class="'.esc_attr( $el_class ).' '.esc_attr( $css_class ).'">'. do_shortcode($content).'</div>';



		$output .= '
					<style>
						html, body {
							margin: 0;
							width: 100%;
							height: 100%;
						}
						#panorama-'.$i.', .panolens-canvas {
						  width: 100% !important;
						  height: '.$panorama_height.'px;
						  background: '.$panorama_bgcolor.';
						}
					</style>
					<script type="text/javascript">
							  ';



					$output .= '
                          jQuery(document).ready(function(){

							// Panorama options
							var panorama, viewer, container;

							container = document.querySelector( \'#panorama-'.$i.'\' );

							panorama = new PANOLENS.VideoPanorama( \''.$panorama_video.'\', { autoplay: true } );
							
							viewer = new PANOLENS.Viewer( { 
								output: \'console\', 
								container: container,
								controlButtons: [\''.$panorama_showsettings.'\', \''.$panorama_showfullscreen.'\'],
								} );

							viewer.add( panorama );

							}) // document.ready

					</script>';
		$i++;
		return $output;
    }
}
// Finally initialize code
new VcmpVideoPanorama();