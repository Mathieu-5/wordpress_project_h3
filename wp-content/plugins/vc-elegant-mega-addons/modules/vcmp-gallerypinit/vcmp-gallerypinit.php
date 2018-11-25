<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Gallery PinIt Button
 * Description: Gallery With PinIt Button shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGalleryPinit extends VcmpModule{

	const slug = 'vcmp_gallerypinit';
	const base = 'vcmp_gallerypinit';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Gallery PinIt Button", "VCMP_SLUG"),
            "description" => __("Add gallery with pinit button to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_gallerypinit.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_gallerypinit_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "gallerypinit_imgs",
						"description" => __( "Please choose your image.", "VCMP_SLUG" ),
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
			'gallerypinit_imgs' => '',
		), $atts ) );

		wp_enqueue_style ( 'vc_gallerypinit', VCMP_URL . 'modules/vcmp-gallerypinit/assets/css/vc-gallerypinit.css');
		wp_enqueue_script( 'vc_gallerypinit', VCMP_URL.'modules/vcmp-gallerypinit/assets/js/vc-gallerypinit.js', array('jquery'), '1.0', TRUE);
		
		$vc_gallerypinit_bigthumbnails= array();
		$images = explode(',', $gallerypinit_imgs);
		
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(800,600));
        $vc_gallerypinit_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);

		$output .= '<div class="vcmp_pinitgallery '.esc_attr( $el_class ).'"><img src="'.$bigimage_array[0].'" alt="'.$alt.'"></div>';
		
		}

		$output .=	'<script>
						jQuery(document).ready(function($) {
							$(\'.vcmp_pinitgallery img\').imgPin();
						});
					</script>
					';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpGalleryPinit();