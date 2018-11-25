<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Parallax Canvas Bg
 * Description: Parallax Canvas Bg shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpParallaxCanvasBg extends VcmpModule{

	const slug = 'vcmp_parallaxcanvasbg';
	const base = 'vcmp_parallaxcanvasbg';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Parallax Canvas Bg", "VCMP_SLUG"),
            "description" => __("Add Parallax Canvas Bg to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_parallaxcanvasbg.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_parallaxcanvasbg_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Background Image", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_img",
						"description" => __( "Please choose your background image.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Background Height", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_height",
						"description" => __( "Please choose your background height. Ex: 600px", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Title", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_title",
						"description" => __( "Please enter your title.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Title Font Size", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_title_font_size",
						"description" => __( "Please choose your title font size.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Title Color", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_title_color",
						"description" => __( "Please choose your title color.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Title Background Color", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_title_bgcolor",
						"description" => __( "Please choose your title bg color.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Button Title", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_button_title",
						"description" => __( "Please enter your button title.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Button Background Color", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_button_bg",
						"description" => __( "Please choose your button bg color.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Button Font Size", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_button_title_font_size",
						"description" => __( "Please choose your button font size.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Button Link URL", "VCMP_SLUG" ),
						"param_name" => "parallaxcanvasbg_button_link",
						"description" => __( "Please choose your button link url.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
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
			'parallaxcanvasbg_img' => '',
			'parallaxcanvasbg_title' => '',
			'parallaxcanvasbg_title_font_size' => '',
			'parallaxcanvasbg_title_color' => '',
			'parallaxcanvasbg_title_bgcolor' => '',
			'parallaxcanvasbg_button_title' => '',
			'parallaxcanvasbg_button_title_font_size' => '',
			'parallaxcanvasbg_button_link' => '',
			'parallaxcanvasbg_button_bg' => '',
			'parallaxcanvasbg_height' => '',
			
		), $atts ) );


		wp_enqueue_style( 'vc_parallaxcanvasbg_css', VCMP_URL . 'modules/vcmp-parallaxcanvasbg/assets/css/vc-parallaxcanvasbg.css');
		wp_enqueue_script( 'vc_particles', VCMP_URL.'modules/vcmp-parallaxcanvasbg/assets/js/particles.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_jquery.parallax', VCMP_URL.'modules/vcmp-parallaxcanvasbg/assets/js/jquery.parallax.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_parallaxcanvasbg', VCMP_URL.'modules/vcmp-parallaxcanvasbg/assets/js/vc-parallaxcanvasbg.js', array('jquery'), '1.0', TRUE);
		
		$parallaxcanvasbg_img = wp_get_attachment_image_src(intval($parallaxcanvasbg_img), 'full');
		$parallaxcanvasbg_img = $parallaxcanvasbg_img[0];


		$output .= '<div id="vcmp_parallax_wrapper" class="vcmp_parallax_wrapper '.esc_attr( $el_class ).'" style="background: url('.$parallaxcanvasbg_img.') no-repeat fixed center center; height: '.$parallaxcanvasbg_height.';">
		
						<div id="vcmp_parallax" class="">

						  <div data-depth="0.6" class="layer">
							<div class="vcmp_parallax_content">
							  <h1 style="font-size: '.$parallaxcanvasbg_title_font_size.'; color: '.$parallaxcanvasbg_title_color.'; background: '.$parallaxcanvasbg_title_bgcolor.'; padding:5px; ">'.$parallaxcanvasbg_title.'</h1>
							</div>
						  </div>
						  
						  <div data-depth="0.4" class="layer">
							<div id="particles-js"></div>
						  </div>
						  
						  <div data-depth="0.3" class="layer">
							<div class="vcmp_parallax_subcontent"><a href="'.$parallaxcanvasbg_button_link.'" target="_blank" clasS="vcmp_parallax_button" style="font-size: '.$parallaxcanvasbg_button_title_font_size.'; background: '.$parallaxcanvasbg_button_bg.'">'.$parallaxcanvasbg_button_title.'</a></div>
						  </div>
						  
						</div>
						
					</div>
					';

      return $output;
	  
	  
    }
	

}
// Finally initialize code
new VcmpParallaxCanvasBg();