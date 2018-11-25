<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Contact Form 7
 * Description: Contact Form 7 form selector for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpContactFormSeven extends VcmpModule{

	const slug = 'vcmp_contactform7';
	const base = 'vcmp_contactform7';

	public function __construct(){
		if ( !is_plugin_active( "contact-form-7/wp-contact-form-7.php" )) {
			return false;
		}
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::base, array( $this, 'build_shortcode' ) );
	}

	public function vc_before_init(){
		vc_map( array(
			'name' => __('Contact Form 7', VCMP_SLUG),
			"description" => __("Easily add Contact Form 7 forms to your page.", "VCMP_SLUG"),
			"base" => self::base,
			"class" => "",
			"icon" => "icon-vc-elegant-mega",
			"category" => "Elegant Mega Addons",
				'params' => array(
					array(
						'type' => 'dropdown',
						'class' => '',
						'heading' => __('Choose Form', VCMP_SLUG),
						'param_name' => 'id',
						'value' => $this->get_forms(),
						'admin_label' => true
					),
				)
			)
		);
	}

	public function build_shortcode( $atts, $content = null ){		
		extract(shortcode_atts(array(		
			'id' => '',			 	
		), $atts));		

		$output = ''.do_shortcode('[contact-form-7 id="'. $id.'"]').'';
		
		return $output;		
	}
	
	
	private function get_forms(){
		$forms = array();
		$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
		if( $cfsevenForms = get_posts( $args ) ){
			foreach($cfsevenForms as $cfsevenForm){
				$forms[$cfsevenForm->post_title] = $cfsevenForm->ID;
			}
		}
		return $forms;
	}


}

new VcmpContactFormSeven();