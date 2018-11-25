<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Gallery With Blury Popup
 * Description: Gallery With Blury Popup shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGalleryBlury extends VcmpModule{

	const slug = 'vcmp_gallerybullrypopup';
	const base = 'vcmp_gallerybullrypopup';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );		
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Gallery Blury Popup", "VCMP_SLUG"),
            "description" => __("Add gallery With blury popup effect to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_gallerybullrypopup.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_gallerybullrypopup_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "gallerybullrypopup_imgs",
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
			'gallerybullrypopup_imgs' => '',
		), $atts ) );

		wp_enqueue_style ( 'vc_gallerybullrypopup', VCMP_URL . 'modules/vcmp-gallerybullrypopup/assets/css/vc-gallerybullrypopup.css');
		wp_enqueue_script( 'vc_gallerybullrypopup', VCMP_URL.'modules/vcmp-gallerybullrypopup/assets/js/vc-gallerybullrypopup.js', array('jquery'), '1.0', TRUE);
		
		$vc_gallerybullrypopup_bigthumbnails= array();
		$images = explode(',', $gallerybullrypopup_imgs);
		
		$output .= '<div class="gallerybullry '.esc_attr( $el_class ).'">';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(300, 300));
        $vc_gallerybullrypopup_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		$title = get_post_meta(intval($image), '_wp_attachment_image_title', true);

		$output .= '<figure><img src="'.$bigimage_array[0].'" alt="'.$alt.'"><figcaption>'.$alt.'<small>'.$title.'</small></figcaption></figure>';
		
		}

		$output .='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
					  <symbol id="close" viewBox="0 0 18 18">
						<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
								S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
								l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
								c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
								s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
					  </symbol>
					</svg>
				</div>';

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpGalleryBlury();