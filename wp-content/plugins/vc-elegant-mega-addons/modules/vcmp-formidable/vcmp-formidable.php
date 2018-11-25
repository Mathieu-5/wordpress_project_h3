<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Formidable
 * Description: Formidable form selector for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFormidable extends VcmpModule{

	const slug = 'vcmp_formidable';
	const base = 'formidable';

	public function __construct(){
		if ( !is_plugin_active( "formidable/formidable.php" )) {
			return false;
		}
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::base, array( $this, 'build_shortcode' ) );
	}

	public function vc_before_init(){
		vc_map( array(
			'name' => __('Formidable', "VCMP_SLUG"),
			"description" => __("Easily add formidable forms to your page.", "VCMP_SLUG"),
			"base" => self::base,
			"class" => "",
			"icon" => "icon-vc-elegant-mega",
			"category" => "Elegant Mega Addons",
				'params' => array(
					array(
						'type' => 'dropdown',
						'class' => '',
						'heading' => __('Choose Form', "VCMP_SLUG"),
						'param_name' => 'id',
						'value' => $this->get_forms(),
						'admin_label' => true
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Display form title', "VCMP_SLUG" ),
						'param_name' => 'title',
						'value' => array( __( 'Yes', 'js_composer' ) => 'true' )
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Display form description', "VCMP_SLUG" ),
						'param_name' => 'description',
						'value' => array( __( 'Yes', 'js_composer' ) => 'true' )
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Minimize form HTML', "VCMP_SLUG" ),
						'param_name' => 'minimize',
						'value' => array( __( 'Yes', 'js_composer' ) => 'true' )
					),
					array(
						'type' => 'textfield',
						'heading' => __('Custom CSS Class', "VCMP_SLUG"),
						'param_name' => 'custom_css_class',
						'value' => ''
					)
				)
			)
		);
	}

	public function build_shortcode( $atts, $content = null ){		
		extract(shortcode_atts(array(		
			'id' => '',		
			'title' => false,		
			'description' => false,		
			'minimize' => false,
			'custom_css_class' => ''		
		), $atts));		
		
		$output = '<div class="vcmp-formidable '.$custom_css_class.'">';
		$output .= FrmFormsController::get_form_shortcode( array( 'id' => $id, 'title' => $title, 'description' => $description, 'minimize' => $minimize ) );
		$output .= '</div>';
		return $output;		
	}

	private function get_forms(){
		$forms = array();
		$formidable = new FrmForm();
		foreach ($formidable->get_published_forms() as $form) {
			$forms[$form->name] = $form->id;
		}
		return $forms;
	}
}

new VcmpFormidable();