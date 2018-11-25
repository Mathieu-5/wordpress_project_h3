<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Photo Frame
 * Description: Photo Frame shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPhotoFrame extends VcmpModule{

	const slug = 'vcmp_photoframe';
	const base = 'vcmp_photoframe';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Photo Frame", "VCMP_SLUG"),
            "description" => __("Add Photo frame to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_photoframe.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_photoframe_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "photoframe_imgs",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
						"value" => "",
						'admin_label' => true
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Frame Effect", "VCMP_SLUG" ),
						"param_name" => "photoframe_effect",
						"description" => __( "Please choose a effect for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "White", "VCMP_SLUG" ) => "white",
								__( "White Tick", "VCMP_SLUG" ) => "white thick",
								__( "Black", "VCMP_SLUG" ) => "black",
								__( "Black Tick", "VCMP_SLUG" ) => "black thick",
								__( "Red", "VCMP_SLUG" ) => "red",
								__( "Red Tick", "VCMP_SLUG" ) => "red thick"
							)
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
			'photoframe_imgs' => '',
			'photoframe_effect' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_photoframe_css', VCMP_URL . 'modules/vcmp-photoframe/assets/css/vc-photoframe.css');
		
		$vc_photoframe_bigthumbnails= array();
		$images = explode(',', $photoframe_imgs);
		
		$output .= '<section class="photoframes '.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_photoframe_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		
		$output .= '
					<figure class="'.$photoframe_effect.' vcmp_photoframe">
						<img src="'.$bigimage_array[0].'" alt="'.$alt.'" width="300" />
						<figcaption>
							<h2>'.$alt.'</h2>
						</figcaption>
					</figure>

					';
		}
		
		$output .= '</section>';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpPhotoFrame();