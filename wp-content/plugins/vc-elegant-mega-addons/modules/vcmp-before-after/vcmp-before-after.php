<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Before After Image
 * Description: Before After Image shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpBeforeAfter extends VcmpModule{

	const slug = 'vcmp_beforeafter';
	const base = 'vcmp_beforeafter';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Before After Image", "VCMP_SLUG"),
            "description" => __("Add before after image to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_beforeimg",
						"description" => __( "Please choose your before image.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Before",
						"value" => ""
				),
				
				vc_map_add_css_animation( true ),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Label", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_before_label",
						"description" => __( "Please enter the before label.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Before",
						"value" => ""
				),
				
				array( 
						"type" => "attach_image",
						"heading" => __( "Image", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_afterimg",
						"description" => __( "Please choose your after image.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "After",
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Label", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_after_label",
						"description" => __( "Please enter the after label.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "After",
						"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Orientation", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_orientation",
						"description" => __( "Please choose orientation.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose orientation", "vc_themeofwp_addon" ) => "none",
								__( "Horizontal", "vc_themeofwp_addon" ) => "horizontal",
								__( "Vertical", "vc_themeofwp_addon" ) => "vertical"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Ofset", "vc_themeofwp_addon" ),
						"param_name" => "vcmpbeforeafter_ofset",
						"description" => __( "Please choose ofset.", "vc_themeofwp_addon" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose ofset", "vc_themeofwp_addon" ) => "",
								__( "0.1", "vc_themeofwp_addon" ) => "0.1",
								__( "0.2", "vc_themeofwp_addon" ) => "0.2",
								__( "0.3", "vc_themeofwp_addon" ) => "0.3",
								__( "0.4", "vc_themeofwp_addon" ) => "0.4",
								__( "0.5", "vc_themeofwp_addon" ) => "0.5",
								__( "0.6", "vc_themeofwp_addon" ) => "0.6",
								__( "0.7", "vc_themeofwp_addon" ) => "0.7",
								__( "0.8", "vc_themeofwp_addon" ) => "0.8",
								__( "0.9", "vc_themeofwp_addon" ) => "0.9"
							)
				),

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "vc_themeofwp_addon" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "vc_themeofwp_addon" )
				),
				
				array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
				),

            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function build_shortcode( $atts, $content = null ) {
      
	  $output = $el_class = $dataorientation = $vcmpbeforeafter_beforeimg = $vcmpbeforeafter_before_label = $vcmpbeforeafter_afterimg = $vcmpbeforeafter_after_label = $vcmpbeforeafter_orientation = $vcmpbeforeafter_ofset = $css = $css_animation = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'css' => '',
			'css_animation' => '',
			'vcmpbeforeafter_beforeimg' => '',
			'vcmpbeforeafter_before_label' => '',
			'vcmpbeforeafter_afterimg' => '',
			'vcmpbeforeafter_after_label' => '',
			'vcmpbeforeafter_orientation' => '',
			'vcmpbeforeafter_ofset' => '',
		), $atts ) );
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		wp_enqueue_style( 'vc_before_after', VCMP_URL . 'modules/vcmp-before-after/assets/css/vc_before_after.css');
		wp_enqueue_script( 'vc_event_move', VCMP_URL . 'modules/vcmp-before-after/assets/js/jquery.event.move.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_twentytwenty', VCMP_URL . 'modules/vcmp-before-after/assets/js/jquery.twentytwenty.js', array('jquery'), '1.0', TRUE);
		
		/*CSS ANIMATIONS*/
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		/*CSS ANIMATIONS*/
		
		$vcmpbeforeafter_beforeimg = wp_get_attachment_image_src(intval($vcmpbeforeafter_beforeimg), 'full');
		$vcmpbeforeafter_beforeimg = $vcmpbeforeafter_beforeimg[0];
		
		$vcmpbeforeafter_afterimg = wp_get_attachment_image_src(intval($vcmpbeforeafter_afterimg), 'full');
		$vcmpbeforeafter_afterimg = $vcmpbeforeafter_afterimg[0];
		
		static $i = 0;
		
		if( ( $vcmpbeforeafter_orientation == 'vertical') ) {
			$dataorientation = 'data-orientation="vertical"';
		}

		if( ( $vcmpbeforeafter_orientation == 'horizontal') ) {
			$dataorientation = 'data-orientation="horizontal"';
		}

		
			$output .= '<style>';
						if( ( !$vcmpbeforeafter_before_label == ' ') ) {
						  $output .= '#vcmpbeforeafter-'.$i.' .twentytwenty-before-label:before { opacity: 0 !important; }';
						}
						if( ( !$vcmpbeforeafter_after_label == ' ') ) {
						  $output .= '#vcmpbeforeafter-'.$i.' .twentytwenty-after-label:before { opacity: 0 !important; }';
						}
			$output .= '</style>';

		


			
        $output .= '<div id="vcmpbeforeafter-'.$i.'" class="'.esc_attr( $css_class ).' '.esc_attr( $el_class ).' ';
        			if ( '' !== $css_animation ) {
						$output .= ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'';
					}
        $output .= ' twentytwenty-container" '.$dataorientation.'>
						<img src="'.$vcmpbeforeafter_beforeimg.'">
						<img src="'.$vcmpbeforeafter_afterimg.'">
					</div>
					';
		
		
		
			$output .= '<style>';
					if( ( !$vcmpbeforeafter_before_label == '') ) {
						  $output .= '#vcmpbeforeafter-'.$i.' .twentytwenty-before-label:before { content: "'.$vcmpbeforeafter_before_label.'"; }';
					}
					if( ( !$vcmpbeforeafter_after_label == '') ) {
						  $output .= '#vcmpbeforeafter-'.$i.' .twentytwenty-after-label:before { content: "'.$vcmpbeforeafter_after_label.'"; }';
					}
			$output .= '</style>
					';
		

		$output .= '<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(window).load(function() {
							$("#vcmpbeforeafter-'.$i.'.twentytwenty-container[data-orientation!=\'vertical\']").twentytwenty({default_offset_pct: '.$vcmpbeforeafter_ofset.'});
							$("#vcmpbeforeafter-'.$i.'.twentytwenty-container[data-orientation=\'vertical\']").twentytwenty({default_offset_pct: '.$vcmpbeforeafter_ofset.', orientation: \'vertical\'});
						});
					});
					</script>
					';
		$i++;
		return $output;
		
    }
	

}
// Finally initialize code
new VcmpBeforeAfter();