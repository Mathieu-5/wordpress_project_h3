<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Service With Image Icon
 * Description: Service with image icon shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpServices extends VcmpModule{

	const slug = 'vcmp_services';
	const base = 'vcmp_services';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Service Image Icon", VCMP_SLUG),
            "description" 	=> __("Add service with image icon to your page.", VCMP_SLUG),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmpservices.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmpservices_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Service Image Icon", VCMP_SLUG ),
						"param_name" => "vcmpservices_icon",
						"description" => __( "Please choose a image icon for the service.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
			
				
				array( 
						"type" => "textfield",
						"heading" => __( "Service Title", VCMP_SLUG ),
						"param_name" => "vcmpservices_title",
						"description" => __( "Please enter a name for the service.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Service Title Font Size", VCMP_SLUG ),
						"param_name" => "vcmpservices_title_fsize",
						"description" => __( "Please enter a font size for the service title for example: 24px.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Service Title Color", VCMP_SLUG ),
						"param_name" => "vcmpservices_titlecolor",
						"description" => __( "Please choose a color for the service title.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Service Text Color", VCMP_SLUG ),
						"param_name" => "vcmpservices_textcolor",
						"description" => __( "Please choose a color for the service text color.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Service Content", VCMP_SLUG ),
						"param_name" => "content",
						"description" => __( "Please enter short description for service.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Service Content Font Size", VCMP_SLUG ),
						"param_name" => "vcmpservices_description_fsize",
						"description" => __( "Please enter a font size for the service content for example: 12px.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textfield",
						"heading" => __( "Service Button Link URL", VCMP_SLUG ),
						"param_name" => "vcmpservices_buttonlink",
						"description" => __( "Please choose a color for the service button link url.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", VCMP_SLUG ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", VCMP_SLUG )
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
			'vcmpservices_title' => '',
			'vcmpservices_icon' => '',
			'vcmpservices_titlecolor' => '',
			'vcmpservices_title_fsize' => '',
			'vcmpservices_textcolor' => '',
			'vcmpservices_description_fsize' => '',
			'vcmpservices_buttonlink' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_services', VCMP_URL . 'modules/vcmp-services/assets/css/vc_services.css');
	
		$vc_vcmpservices_bigthumbnails= array();
		$images = explode(',', $vcmpservices_icon);
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_vcmpservices_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		
		$output = '
					<div class="vcmp_service '.esc_attr( $el_class ).'">
					  <div class="vcmp_service_img">
						<a href="'.$vcmpservices_buttonlink.'" class="vcmp_service_url"><img src="'.$bigimage_array[0].'" alt="'.$alt.'" class="vcmp_service_imgage" /></a>
					  </div>
					  <h3 style="color: '.$vcmpservices_titlecolor.'; font-size:'.$vcmpservices_title_fsize.'; "><a href="'.$vcmpservices_buttonlink.'" class="vcmp_service_url" style="color: '.$vcmpservices_titlecolor.';">'.$vcmpservices_title.'</a></h3>
					  <p style="color: '.$vcmpservices_textcolor.'; font-size:'.$vcmpservices_description_fsize.'; ">'.do_shortcode( strip_tags( $content ) ).'</p>
					</div>
					
					';
					
		}
		
		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpServices();