<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Perspective Card
 * Description: Perspective Card shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpPerspectiveCard extends VcmpModule{

	const slug = 'vcmp_perspective_card';
	const base = 'vcmp_perspective_card';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Perspective Card", "VCMP_SLUG"),
            "description" => __("Add Perspective card to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_vcmpperspectivecard.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_vcmpperspectivecard_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Perspective Card Background Image", "VCMP_SLUG" ),
						"param_name" => "vcmpperspectivecard_bgimg",
						"description" => __( "Please choose a image for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
			
				array( 
						"type" => "textfield",
						"heading" => __( "Perspective Card Title", "VCMP_SLUG" ),
						"param_name" => "vcmpperspectivecard_title",
						"description" => __( "Please enter a name for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Perspective Card Short Description", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter short description for the team member.", "VCMP_SLUG" ),
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
			'vcmpperspectivecard_title' => '',
			'vcmpperspectivecard_bgimg' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_perpective_card', VCMP_URL . 'modules/vcmp-perpective-card/assets/css/vc_perpective_card.css');
		wp_enqueue_script( 'vc_perpective_card', VCMP_URL.'modules/vcmp-perpective-card/assets/js/vc_perpective_card.js', array('jquery'), '1.0', TRUE);
		
		$vc_vcmpperspectivecard_bigthumbnails= array();
		$images = explode(',', $vcmpperspectivecard_bgimg);
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_vcmpperspectivecard_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '
					
					  <div class="perspectivecard '.esc_attr( $el_class ).'" style="background: url('.$bigimage_array[0].') no-repeat 50% 50%">
						
						<div class="perspectivecard-front">
							<div class="perspectivecard-title">'.$vcmpperspectivecard_title.'</div>
							<div class="perspectivecard-subtitle">'.$content.'</div>
							<div class="perspectivecard-shine"></div>
							<div class="perspectivecard-shadow"></div>
						</div>
					</div>

					';
		
		}


		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpPerspectiveCard();