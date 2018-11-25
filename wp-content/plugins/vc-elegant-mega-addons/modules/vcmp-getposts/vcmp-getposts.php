<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Get Posts
 * Description: Display any post type shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGetPosts extends VcmpModule{

	const slug = 'vcmp_get_posts';
	const base = 'vcmp_get_posts';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Get Posts", "VCMP_SLUG"),
            "description" => __("Display any post type with awesome way into your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_get_posts.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_get_posts_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array( 
					"type" => "posttypes",
					"heading" => __( "Post Types", "VCMP_SLUG" ),
					"param_name" => "get_posts_types",
					"description" => __( "Please enter  post type slug. Ex: post", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "get_posts_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Column Size", "VCMP_SLUG" ),
					"param_name" => "get_posts_col_size",
					"description" => __( "Enter the colum sizes for the posts Default is 100% and you can use 33% for 3 colums", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Hover Effect", "VCMP_SLUG" ),
					"param_name" => "get_posts_effect",
					'admin_label' => true,
					"description" => __( "Do you want to display post hover effect?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Dates", "VCMP_SLUG" ),
					"param_name" => "get_posts_date",
					'admin_label' => true,
					"description" => __( "Do you want to display post date?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Category", "VCMP_SLUG" ),
					"param_name" => "get_posts_category",
					'admin_label' => true,
					"description" => __( "Do you want to display post category?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Title", "VCMP_SLUG" ),
					"param_name" => "get_posts_title",
					'admin_label' => true,
					"description" => __( "Do you want to display post title?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Excerpt", "VCMP_SLUG" ),
					"param_name" => "get_posts_excerpt",
					'admin_label' => true,
					"description" => __( "Do you want to display post excerpt?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Time", "VCMP_SLUG" ),
					"param_name" => "get_posts_time",
					'admin_label' => true,
					"description" => __( "Do you want to display post time?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Comments", "VCMP_SLUG" ),
					"param_name" => "get_posts_comments",
					'admin_label' => true,
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
			'get_posts_types' => '',
			'get_posts_limit' => '',
			'get_posts_effect' => '',
			'get_posts_date' => '',
			'get_posts_category' => '',
			'get_posts_title' => '',
			'get_posts_excerpt' => '',
			'get_posts_time' => '',
			'get_posts_comments' => '',
			'get_posts_col_size' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_get_posts', VCMP_URL . 'modules/vcmp-getposts/assets/css/vc_get_posts.css');
		wp_enqueue_script( 'vc_get_posts', VCMP_URL.'modules/vcmp-getposts/assets/js/vc_get_posts.js', array('jquery'), '1.0', TRUE);
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $get_posts_limit;
		$args = array(
			'numberposts' => $limit,
			'post_type' => preg_split("/\,/",$get_posts_types),
			'paged' => $paged,
			'posts_per_page' => $limit,
		);
		
		
		query_posts($args);
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$excerpt = substr(get_the_excerpt(), 0,100);
		$categories = get_the_category();
		
		$output .= '<!-- Post-->
					<div class="column '.$get_posts_types.' '.esc_attr( $el_class ).'" style="width:'.$get_posts_col_size.'">';
					
					if ( $get_posts_effect == 'true' ) {
					
		$output .= '<!-- Post Module-->
					<div class="post-module">';
					
					} else { 
					
		$output .= '<!-- Post Module-->
					<div class="post-module hover">';
					
					};
					
		
		$output .= '<!-- Thumbnail-->
					  <div class="thumbnail">
					  ';
					  
					  
					if ( $get_posts_date == 'true' ) {
					  
		$output .= '<div class="date">
						  <div class="day">'.get_the_date('d').'</div>
						  <div class="month">'.get_the_date('M').'</div>
					</div>
					';
						  
					} else { };
					
						  
					if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
						
		$output .= '<img src="' . $image_url[0] . '" alt="'.the_title("","",false).'" />';
		
						 } else {
						 
		$output .= '<img src="" alt="" />';
						 
						 };
						 
		$output .= '</div><!-- Thumbnail-->
					  
					<!-- Post Content-->
					<div class="post-content">';
					  
					if ( $get_posts_category == 'true' ) {
					
		$output .= '<div class="category">'.esc_html( $categories[0]->name ).'</div>';
		
					} else { };
					
					
					if ( $get_posts_title == 'true' ) {
		
		$output .= '<h1 class="title"><a href="' . get_permalink() . '">'.the_title("","",false).'</a></h1>';
		
					} else { };
					
					
					if ( $get_posts_excerpt == 'true' ) {
		
		$output .= '<p class="description">'.$excerpt.'</p>';
		
					} else { };
					
					
					if ( $get_posts_time == 'true' || $get_posts_comments == 'true' ) {	
						
		$output .= '<div class="post-meta">';
		
					} else { };
		
					if ( $get_posts_time == 'true' ) {
					
		$output .= '<span class="timestamp"><i class="fa fa-clock-o"></i> '.get_the_time('g:i:s a').' </span>';
		
					} else { };
					
					
					if ( $get_posts_comments == 'true' ) {
					
		$output .= '<span class="comments"><i class="fa fa-comments"></i><a href="'.get_comments_link().'"> '.get_comments_number().' comments</a></span>';
		
					} else { };
					
					if ( $get_posts_time == 'true' || $get_posts_comments == 'true' ) {	
					
		$output .= '</div>';
					
					} else { };
					
		$output .= '</div><!-- Post Content-->
					  
					</div><!-- Post Module-->
					
					</div><!-- Post-->
				  ';
				  
		endwhile; else:
		endif;

	wp_reset_query();

	return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpGetPosts();