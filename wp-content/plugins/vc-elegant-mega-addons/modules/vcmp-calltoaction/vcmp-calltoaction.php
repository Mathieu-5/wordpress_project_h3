<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Call to Action
 * Description: Call to Action shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpCalltoAction extends VcmpModule{

	const slug = 'vcmp_calltoaction';
	const base = 'vcmp_calltoaction';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Call to Action", VCMP_SLUG),
            "description" => __("Add Call to action to your page.", VCMP_SLUG),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmpcalltoaction.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmpcalltoaction_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
						"type" => "vcmp_presets",
						"param_name" => "Call_to_Action",
						"admin_label" => false,
						"value" => "vcmp-calltoaction"
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Title", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_title",
						"description" => __( "Please enter a name for the CTA.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Title Font Size", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_title_font_size",
						"description" => __( "Please enter a font size for the CTA title.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "CTA Title Color", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_titlecolor",
						"description" => __( "Please choose a color for the CTA title.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Height", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_height",
						"description" => __( "Please enter height. Ex:200px", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "attach_image",
						"heading" => __( "CTA Background Image", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_bgimg",
						"description" => __( "Please choose a background image for the CTA.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
			
				array( 
						"type" => "colorpicker",
						"heading" => __( "CTA Background Color", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_bgcolor",
						"description" => __( "Please choose a background color for the CTA.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "CTA Content Color", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_textcolor",
						"description" => __( "Please choose a color for the CTA content.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Content Font Size", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_content_font_size",
						"description" => __( "Please enter a font size for the CTA content.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "CTA Content", VCMP_SLUG ),
						"param_name" => "content",
						"description" => __( "Please enter short description for CTA.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Button Title", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_buttontitle",
						"description" => __( "Please enter a title for the CTA button.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "CTA Button Background Color", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_buttonbgcolor",
						"description" => __( "Please choose a color for the CTA button.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
						
				array( 
						"type" => "colorpicker",
						"heading" => __( "CTA Button Text Color", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_buttontextcolor",
						"description" => __( "Please choose a color for the CTA button text.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textfield",
						"heading" => __( "CTA Button Link URL", VCMP_SLUG ),
						"param_name" => "vcmpcalltoaction_buttonlink",
						"description" => __( "Please choose a color for the CTA button link url.", VCMP_SLUG ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', VCMP_SLUG ),
						'param_name' => 'css',
						'group' => __( 'Design options', VCMP_SLUG ),
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
			'css' => '',
			'vcmpcalltoaction_title' => '',
			'vcmpcalltoaction_title_font_size' => '',
			'vcmpcalltoaction_titlecolor' => '',
			'vcmpcalltoaction_height' => '',
			'vcmpcalltoaction_bgimg' => '',
			'vcmpcalltoaction_bgcolor' => '',
			'vcmpcalltoaction_content_font_size' => '',
			'vcmpcalltoaction_textcolor' => '',
			'vcmpcalltoaction_buttontitle' => '',
			'vcmpcalltoaction_buttonbgcolor' => '',
			'vcmpcalltoaction_buttontextcolor' => '',
			'vcmpcalltoaction_buttonlink' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_calltoaction', VCMP_URL . 'modules/vcmp-calltoaction/assets/css/vc_calltoaction.css');
		
		$vc_vcmpcalltoaction_bigthumbnails= array();
		$images = explode(',', $vcmpcalltoaction_bgimg);
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_vcmpcalltoaction_bigthumbnails[$key] = $bigimage_array[0];
		
		
		$output = '
					<div class="vcmp_cta '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" style="background: '.$vcmpcalltoaction_bgcolor.' url('.$bigimage_array[0].') no-repeat fixed center center; color: '.$vcmpcalltoaction_textcolor.'; height: '.$vcmpcalltoaction_height.';">
						<h1 style="font-size: '.$vcmpcalltoaction_title_font_size.'; color: '.$vcmpcalltoaction_titlecolor.';">'.$vcmpcalltoaction_title.'</h1>
						<p style="font-size: '.$vcmpcalltoaction_content_font_size.'; color: '.$vcmpcalltoaction_textcolor.'">'.do_shortcode( strip_tags( $content ) ) .'</p>
						<a href="'.$vcmpcalltoaction_buttonlink.'" class="vcmp_ctabtn" style="background: '.$vcmpcalltoaction_buttonbgcolor.'; color: '.$vcmpcalltoaction_buttontextcolor.';">'.$vcmpcalltoaction_buttontitle.'</a>
					</div>

					';
		
		}


		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpCalltoAction();