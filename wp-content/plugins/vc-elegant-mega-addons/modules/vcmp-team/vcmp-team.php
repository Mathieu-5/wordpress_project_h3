<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Team Profiles
 * Description: Team profiles shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpTeam extends VcmpModule{

	const slug = 'vcmp_team';
	const base = 'vcmp_team';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Team Profiles", "VCMP_SLUG"),
            "description" 	=> __("Add team profiles to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_team.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_team_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
						"type" => "vcmp_presets",
						"param_name" => "Team",
						"admin_label" => false,
						"value" => "vcmp-team"
				),
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Team Member Image", "VCMP_SLUG" ),
						"param_name" => "team_img",
						"description" => __( "Please choose a image for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				vc_map_add_css_animation( true ),
			
				array( 
						"type" => "textfield",
						"heading" => __( "Team Member Name", "VCMP_SLUG" ),
						"param_name" => "team_name",
						"description" => __( "Please enter a name for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( "Title", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Team Member Position", "VCMP_SLUG" ),
						"param_name" => "team_position",
						"description" => __( "Please enter a position for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( "Title", "VCMP_SLUG" ),
						"value" => ""
				),
			
				array(
						"type" => "dropdown",
						"heading" => __( "Color Style", "VCMP_SLUG" ),
						"param_name" => "team_color_style",
						"description" => __( "Please choose a color style for team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( "Style", "VCMP_SLUG" ),
						"value" => array(
								__( "Please Select", "VCMP_SLUG" ) => "",
								__( "Red", "VCMP_SLUG" ) => "Red",
								__( "Blue", "VCMP_SLUG" ) => "Blue",
								__( "Light-Blue", "VCMP_SLUG" ) => "Light-Blue",
								__( "Blue-Grey", "VCMP_SLUG" ) => "Blue-Grey",
								__( "Pink", "VCMP_SLUG" ) => "Pink",
								__( "Purple", "VCMP_SLUG" ) => "Purple",
								__( "Deep-Purple", "VCMP_SLUG" ) => "Deep-Purple",
								__( "Indigo", "VCMP_SLUG" ) => "Indigo",
								__( "Teal", "VCMP_SLUG" ) => "Teal",
								__( "Green", "VCMP_SLUG" ) => "Green",
								__( "Light-Green", "VCMP_SLUG" ) => "Light-Green",
								__( "Lime", "VCMP_SLUG" ) => "Lime",
								__( "Yellow", "VCMP_SLUG" ) => "Yellow",
								__( "Amber", "VCMP_SLUG" ) => "Amber",
								__( "Orange", "VCMP_SLUG" ) => "Orange",
								__( "Deep-Orange", "VCMP_SLUG" ) => "Deep-Orange",
								__( "Brown", "VCMP_SLUG" ) => "Brown",
								__( "Grey", "VCMP_SLUG" ) => "Grey",
								__( "Cyan", "VCMP_SLUG" ) => "Cyan"
							)
				),
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Team Member Short Description", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter short description for the team member.", "VCMP_SLUG" ),
						"holder" => "p",
						'admin_label' => true,
						'group' => __( "Content", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Facebook URL", "VCMP_SLUG" ),
					"param_name" => "team_facebook_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					"description" => __( "Please enter Facebook URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Twitter URL", "VCMP_SLUG" ),
					"param_name" => "team_twitter_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					"description" => __( "Please enter Twitter URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "LinkedIn URL", "VCMP_SLUG" ),
					"param_name" => "team_linkedin_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					"description" => __( "Please enter LinkedIn URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Google Plus URL", "VCMP_SLUG" ),
					"param_name" => "team_googleplus_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					"description" => __( "Please enter Google Plus URL for the team member.", "VCMP_SLUG" )
				),

				array(
					"type" => "textfield",
					"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
					"param_name" => "el_class",
					"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
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
      
	  $output = $el_class =  $css = $css_animation ='';

		extract(shortcode_atts( array(
			'el_class' => '',
			'team_name' => '',
			'team_position' => '',
			'team_img' => '',
			'team_color_style' => '',
			'team_facebook_url' => '',
			'team_twitter_url' => '',
			'team_linkedin_url' => '',
			'team_googleplus_url' => '',
			'css_animation' => '',
			'css' => '',
		), $atts ) );

		wp_enqueue_script( 'vc_team', VCMP_URL.'modules/vcmp-team/assets/js/vc_team.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		
		$vc_team_bigthumbnails= array();
		$images = explode(',', $team_img);
		
		$output .= '<div class="row active-with-click '.esc_attr( $el_class ).' '.esc_attr( $css_class ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'"><article class="material-card '.$team_color_style.'">';
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_team_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<h2>
						<span>'.$team_name.'</span>
						<strong>
							<i class="fa fa-fw fa-star"></i>
							'.$team_position.'
						</strong>
					</h2>';
		$output .= '<div class="mc-content">
						<div class="img-container" style="background: url('.$bigimage_array[0].') no-repeat scroll center center / cover">
						</div>
						<div class="mc-description">
							'.$content.'
						</div>
					</div>';
		
		$output .= '<a class="mc-btn-action">
						<i class="fa fa-bars"></i>
					</a>';
					
		$output .= '<div class="mc-footer">
						<h4>
							Social
						</h4>
						<a class="fa fa-fw fa-facebook" href="'.$team_facebook_url.'" target="_blank"></a>
						<a class="fa fa-fw fa-twitter" href="'.$team_twitter_url.'" target="_blank"></a>
						<a class="fa fa-fw fa-linkedin" href="'.$team_linkedin_url.'" target="_blank"></a>
						<a class="fa fa-fw fa-google-plus" href="'.$team_googleplus_url.'" target="_blank"></a>
					</div>';
		
		}

		$output .= '</article></div>';

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpTeam();