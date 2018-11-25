<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Floating News
 * Description: Display floating news shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpFloatingNews extends VcmpModule{

	const slug = 'vcmp_floatingnews';
	const base = 'vcmp_floatingnews';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Floating News", "VCMP_SLUG"),
            "description" => __("Add floating news into your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_floatingnews.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_floatingnews_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array( 
						"type" => "posttypes",
						"heading" => __( "Post Types", "VCMP_SLUG" ),
						"param_name" => "floatingnews_types",
						"description" => __( "Please choose post types for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "floatingnews_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
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
			'floatingnews_types' => '',
			'floatingnews_limit' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_floatingnews', VCMP_URL . 'modules/vcmp-floatingnews/assets/css/vc_floatingnews.css');
		wp_enqueue_script( 'vc_waypoints', VCMP_URL.'modules/vcmp-floatingnews/assets/js/jquery.waypoints.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_floatingnews', VCMP_URL.'modules/vcmp-floatingnews/assets/js/vc_floatingnews.js', array('jquery'), '1.0', TRUE);
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $floatingnews_limit;
		
		$args = array(
			'numberposts' => $limit,
			'post_type' => preg_split("/\,/",$floatingnews_types),
			'paged' => $paged,
			'posts_per_page' => $limit,
		);
		
		query_posts($args);
	
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$excerpt = substr(get_the_excerpt(), 0,200);
		$categories = get_the_category();
		
		
		$output .= '<div class="vcmpzoomme '.esc_attr( $el_class ).'">';
		
				if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'full', true);
						
		$output .= '<img src="' . $image_url[0] . '" alt="'.the_title("","",false).'" />';
		
				};
		
		$output .= '
						<div class="vcmpzoommain">
							<h1><a href="' . get_permalink() . '">'.the_title("","",false).'</a></h1>
								  <p class="vcmp_date">
									by <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().' </a>on '.get_the_date('d').' '.get_the_date('d').' '.get_the_date('Y').'
								  </p>
								<p>'.get_the_excerpt().'</p>
						</div>
					</div>
							';
				  
		endwhile; else:
		endif;

	wp_reset_query();

	return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpFloatingNews();