<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Clean Team Showcase
 * Description: Clean Team Card Showcase shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpTeamCardClean extends VcmpModule{

	const slug = 'vcmp_teamcardclean_clean';
	const base = 'vcmp_teamcardclean_clean';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Clean Team Showcase", "VCMP_SLUG"),
            "description" 	=> __("Add clean team showcase to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_teamcardclean.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_teamcardclean_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array( 
						"type" => "attach_image",
						"heading" => __( "Team Member Image", "VCMP_SLUG" ),
						"param_name" => "teamcardclean_img",
						"description" => __( "Please choose a image for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
			
				array( 
						"type" => "textfield",
						"heading" => __( "Team Member Name", "VCMP_SLUG" ),
						"param_name" => "teamcardclean_name",
						"description" => __( "Please enter a name for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textfield",
						"heading" => __( "Team Member Position", "VCMP_SLUG" ),
						"param_name" => "teamcardclean_position",
						"description" => __( "Please enter a position for the team member.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array( 
						"type" => "textarea_html",
						"heading" => __( "Team Member Short Description", "VCMP_SLUG" ),
						"param_name" => "content",
						"description" => __( "Please enter short description for the team member.", "VCMP_SLUG" ),
						"holder" => "p",
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Facebook URL", "VCMP_SLUG" ),
					"param_name" => "teamcardclean_facebook_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Facebook URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Twitter URL", "VCMP_SLUG" ),
					"param_name" => "teamcardclean_twitter_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Twitter URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "LinkedIn URL", "VCMP_SLUG" ),
					"param_name" => "teamcardclean_linkedin_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter LinkedIn URL for the team member.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Google Plus URL", "VCMP_SLUG" ),
					"param_name" => "teamcardclean_googleplus_url",
					"group" => __( "Social", "VCMP_SLUG" ),
					'admin_label' => true,
					"description" => __( "Please enter Google Plus URL for the team member.", "VCMP_SLUG" )
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
			'teamcardclean_name' => '',
			'teamcardclean_position' => '',
			'teamcardclean_img' => '',
			'teamcardclean_facebook_url' => '',
			'teamcardclean_twitter_url' => '',
			'teamcardclean_linkedin_url' => '',
			'teamcardclean_googleplus_url' => '',
		), $atts ) );


		wp_enqueue_style( 'vc_teamcard_clean', VCMP_URL . 'modules/vcmp-team-card-clean/assets/css/vc_teamcard_clean.css');
		
		$vc_teamcardclean_bigthumbnails= array();
		$images = explode(',', $teamcardclean_img);

		
		foreach ($images as $image) {
		
		$key ='';
		$bigimage_array = wp_get_attachment_image_src(intval($image), array(9999, 0));
        $vc_teamcardclean_bigthumbnails[$key] = $bigimage_array[0];
		$alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		
		$output .= ' <div class="team-member '.esc_attr( $el_class ).'">
							<div class="team-img">
								<img src="'.$bigimage_array[0].'" alt="'.$alt.'" class="img-responsive">
								<div class="team-intro light-txt">
							<h5>'.$teamcardclean_name.'</h5>
							<span>'.$teamcardclean_position.'</span>
						</div>
							</div>
							<div class="team-hover">
								<div class="desk">
									'.$content.'
								</div>
								<div class="s-link">
									<a href="'.$teamcardclean_facebook_url.'"><i class="fa fa-facebook"></i></a>
									<a href="'.$teamcardclean_twitter_url.'"><i class="fa fa-twitter"></i></a>
									<a href="'.$teamcardclean_linkedin_url.'"><i class="fa fa-linkedin"></i></a>
									<a href="'.$teamcardclean_googleplus_url.'"><i class="fa fa-google-plus"></i></a>
								</div>
							</div>
						</div>
						';
						
		}
						
		return $output;
	  
    }
	

}
// Finally initialize code
new VcmpTeamCardClean();