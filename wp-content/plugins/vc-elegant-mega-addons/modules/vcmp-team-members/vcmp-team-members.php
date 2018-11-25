<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Team Members
 * Description: Team Members shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpTeamMembers extends VcmpModule{

	const slug = 'vcmp_team_members';
	const base = 'vcmp_team_members';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Team Members", "VCMP_SLUG"),
            "description" 	=> __("Add team members to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_teammembers.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_teammembers_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
						"type" => "vcmp_presets",
						"param_name" => "Team_Members",
						"admin_label" => false,
						"value" => "vcmp-team-members"
				),
				
				array( 
					"type" => "attach_image",
					"heading" => __( "Team Member Image", "VCMP_SLUG" ),
					"param_name" => "teammembers_img",
					"description" => __( "Please choose a image for the team member.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				vc_map_add_css_animation( true ),
			
				array( 
					"type" => "textfield",
					"heading" => __( "Team Member Name", "VCMP_SLUG" ),
					"param_name" => "teammembers_name",
					"description" => __( "Please enter a name for the team member.", "VCMP_SLUG" ),
					'admin_label' => true,
					'group' => __( "Title", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textarea_html",
					"heading" => __( "Team Member Short Description", "VCMP_SLUG" ),
					"param_name" => "content",
					"description" => __( "Please enter short description for the team member.", "VCMP_SLUG" ),
					"holder" => "p",
					'admin_label' => true,
					'group' => __( "Title", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Team Member Info Background Color", "VCMP_SLUG" ),
						"param_name" => "teammembers_info_bgcolor",
						"description" => __( "Please choose a background color for the team member info area.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( "Colors", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array( 
						"type" => "colorpicker",
						"heading" => __( "Team Member Info Text Color", "VCMP_SLUG" ),
						"param_name" => "teammembers_info_txtcolor",
						"description" => __( "Please choose a text color for the team member info area.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => __( "Colors", "VCMP_SLUG" ),
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Facebook URL", "VCMP_SLUG" ),
					"param_name" => "teammembers_facebook_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Facebook URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Twitter URL", "VCMP_SLUG" ),
					"param_name" => "teammembers_twitter_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Twitter URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "LinkedIn URL", "VCMP_SLUG" ),
					"param_name" => "teammembers_linkedin_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter LinkedIn URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Google Plus URL", "VCMP_SLUG" ),
					"param_name" => "teammembers_googleplus_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Google Plus URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Email Address", "VCMP_SLUG" ),
					"param_name" => "teammembers_email_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Email adress for the team member.", "VCMP_SLUG" )
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
      
	  $output = $el_class = $css = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'teammembers_name' => '',
			'teammembers_img' => '',
			'teammembers_info_bgcolor' => '',
			'teammembers_info_txtcolor' => '',
			'teammembers_facebook_url' => '',
			'teammembers_twitter_url' => '',
			'teammembers_linkedin_url' => '',
			'teammembers_googleplus_url' => '',
			'teammembers_email_url' => '',
			'css_animation' => '',
			'css' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_team_members', VCMP_URL . 'modules/vcmp-team-members/assets/css/vc_team_members.css');
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		if ( '' !== $css_animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
		}
		
		$vc_teammembers_bigthumbnails= array();
		$images = explode(',', $teammembers_img);
		
		static $i = 0;
		static $ia = 0;
		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_teammembers_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= '<div class="vcmp-member-wrapper '.esc_attr( $el_class ).' '.esc_attr( $css_class ).' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation.'" id="vcmp-member-'.$i++.'">
					  <div class="vcmp-member">
						<div class="vcmp-photo" style="background-image: url('.$bigimage_array[0].')">
						</div>
						<div class="vcmp-info" style="background:'.$teammembers_info_bgcolor.'; color:'.$teammembers_info_txtcolor.';">
						  <h3 style="background:'.$teammembers_info_bgcolor.'; color:'.$teammembers_info_txtcolor.' ">'.$teammembers_name.'</h3>
							  <div class="vcmp-social">
								<a href="'.$teammembers_facebook_url.'" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="'.$teammembers_twitter_url.'" target="_blank"><i class="fa fa-twitter"></i></a>
								<a href="'.$teammembers_linkedin_url.'" target="_blank"><i class="fa fa-linkedin"></i></a>
								<a href="'.$teammembers_googleplus_url.'" target="_blank"><i class="fa fa-google-plus"></i></a>
								<a href="'.$teammembers_email_url.'" target="_blank"><i class="fa fa-envelope"></i></a>
							  </div>
						  <div class="vcmp-bio" style="color:'.$teammembers_info_txtcolor.';">'.$content.'</div>
						</div>
					  </div>
					</div>
					<style>#vcmp-member-'.$ia++.' .vcmp-info .vcmp-social:before {color: '.$teammembers_info_bgcolor.';}</style>
					';
		}

		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpTeamMembers();