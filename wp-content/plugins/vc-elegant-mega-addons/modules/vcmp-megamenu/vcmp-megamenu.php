<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Mega Menu
 * Description: Mega Menu shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpMegaMenu extends VcmpModule{

	const slug = 'vcmp_megamenu';
	const base = 'vcmp_megamenu';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

	
	// Remove the <div> surrounding the dynamic navigation to cleanup markup
	public function vcmp_mega_wp_nav_menu_args($args = '')
	{
		$args['container'] = false;
		return $args;
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Mega Menu", "VCMP_SLUG"),
            "description" => __("Add Mega Menu to your site.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_megamenu.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_megamenu_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
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
		), $atts ) );

		wp_enqueue_style( 'vc_megamenu', VCMP_URL . 'modules/vcmp-megamenu/assets/css/vc_megamenu.css');
    	wp_enqueue_style( 'vc_ionicons', VCMP_URL . 'modules/vcmp-megamenu/assets/css/ionicons.min.css');
		wp_enqueue_script( 'vc_megamenu', VCMP_URL.'modules/vcmp-megamenu/assets/js/vc_megamenu.js', array('jquery'), '1.0', TRUE);
		
		$vc_glide_bigthumbnails= array();
		$images = explode(',', $megamenu_img);

	return $output;
	  
    }
	

}
// Finally initialize code
new VcmpMegaMenu();