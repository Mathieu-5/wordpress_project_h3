<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Display Posts
 * Description: Display any post type shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpDsplayPosts extends VcmpModule{

	const slug = 'vcmp_display_posts';
	const base = 'vcmp_display_posts';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Display Posts", "VCMP_SLUG"),
            "description" => __("Display any post type with awesome way into your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_display_posts.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_display_posts_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array( 
						"type" => "posttypes",
						"heading" => __( "Post Types", "VCMP_SLUG" ),
						"param_name" => "display_posts_types",
						"description" => __( "Please choose post types for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "display_posts_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Column Size", "VCMP_SLUG" ),
					"param_name" => "display_posts_col_size",
					"description" => __( "Enter the colum sizes for the posts Default is 100% and you can use 33% for 3 colums", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Hover Effect", "VCMP_SLUG" ),
					"param_name" => "display_posts_effect",
					"description" => __( "Do you want to display post hover effect?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Dates", "VCMP_SLUG" ),
					"param_name" => "display_posts_date",
					"description" => __( "Do you want to display post date?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Category", "VCMP_SLUG" ),
					"param_name" => "display_posts_category",
					"description" => __( "Do you want to display post category?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Title", "VCMP_SLUG" ),
					"param_name" => "display_posts_title",
					"description" => __( "Do you want to display post title?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Excerpt", "VCMP_SLUG" ),
					"param_name" => "display_posts_excerpt",
					"description" => __( "Do you want to display post excerpt?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Time", "VCMP_SLUG" ),
					"param_name" => "display_posts_time",
					"description" => __( "Do you want to display post time?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Comments", "VCMP_SLUG" ),
					"param_name" => "display_posts_comments",
					"description" => __( "Do you want to display post comments?", "VCMP_SLUG" )
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
			'display_posts_types' => '',
			'display_posts_limit' => '',
			'display_posts_effect' => '',
			'display_posts_date' => '',
			'display_posts_category' => '',
			'display_posts_title' => '',
			'display_posts_excerpt' => '',
			'display_posts_time' => '',
			'display_posts_comments' => '',
			'display_posts_col_size' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_display_posts', VCMP_URL . 'modules/vcmp-displayposts/assets/css/vc_displayposts.css');
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $display_posts_limit;
		
		$args = array(
			'numberposts' => $limit,
			'post_type' => preg_split("/\,/",$display_posts_types),
			'paged' => $paged,
			'posts_per_page' => $limit,
		);
		
		query_posts($args);
	
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$excerpt = substr(get_the_excerpt(), 0,200);
		$categories = get_the_category();
		
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'large', true);
		
		$output .= '
					<div class="vcmp-article-wrap '.esc_attr( $el_class ).'" style="width:'.$display_posts_col_size.';">
						<div class="vcmp-story"';
						
						if ( $image_url) {
							$output .= 'style="background: url(' . $image_url[0] . ') no-repeat top;';
						};
						
		$output .= '">';
		
		$output .= '<div class="vcmp-story-text">';
							  
						if ( $categories ) {
							$output .= '<h2 class="vcmp-tag"><a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a></h2>';
						};
								
		$output .= '<h1><a href="' . get_permalink() . '" title="'.the_title("","",false).'">'.the_title("","",false).'</a></h1>
					<h3 class="vcmp-date">'.get_the_date('d').' / '.get_the_date('M').' / '.get_the_date('Y').' </h3>
							</div>
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
new VcmpDsplayPosts();