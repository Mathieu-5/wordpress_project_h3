<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Image Skew
 * Description: Image Skew shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpImageSkew extends VcmpModule{

	const slug = 'vcmp_imageskew';
	const base = 'vcmp_imageskew';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Image Skew", "VCMP_SLUG"),
            "description" => __("Add Image skew effects to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "vc_imageskew_class",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_imageskew.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_imageskew_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_images",
						"heading" => __( "Image", "VCMP_SLUG" ),
						"param_name" => "imageskew_img",
						"description" => __( "Please choose your images for the skew effect.", "VCMP_SLUG" ),
						"value" => ""
				),

				
				array( 
						"type" => "textfield",
						"heading" => __( "Image Link URL", "VCMP_SLUG" ),
						"param_name" => "imageskew_url",
						"description" => __( "Please enter the image link URL.", "VCMP_SLUG" ),
						'admin_label' => true,
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
			'imageskew_img' => '',
			'imageskew_url' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_imageskew', VCMP_URL . 'modules/vcmp-imageskew/assets/vc_imageskew.css');
		
		$imageskew_img_bigthumbnails= array();
		$images = explode(',', $imageskew_img);
		
		$output .= '<div class="vcmp_links '.esc_attr( $el_class ).'"><div class="vcmp_links_content">';
		
		foreach ($images as $image) {
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $imageskew_img_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);

		$output .= '<a href="' .$imageskew_url. '" class="vcmp_links_item"><img src="'.$bigimage_array[0].'" alt="'.$alt.'" class="vcmp_links_img"></a>';

		}
		
		$output .= '</div></div>';

		return $output;

    }
	

}
// Finally initialize code
new VcmpImageSkew();