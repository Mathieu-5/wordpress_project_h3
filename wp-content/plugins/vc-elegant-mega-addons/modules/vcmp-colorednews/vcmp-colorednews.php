<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Colored News
 * Description: Display colored news shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpColoredNews extends VcmpModule{

	const slug = 'vcmp_colorednews';
	const base = 'vcmp_colorednews';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	
 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Colored News", "VCMP_SLUG"),
            "description" => __("Display colored news awesome way into your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_colorednews.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_colorednews_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array( 
						"type" => "posttypes",
						"heading" => __( "Post Types", "VCMP_SLUG" ),
						"param_name" => "colorednews_types",
						"description" => __( "Please choose post types for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "colorednews_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Column Size", "VCMP_SLUG" ),
					"param_name" => "colorednews_col_size",
					"description" => __( "Enter the colum sizes for the posts Default is 100% and you can use 33% for 3 colums", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Slider Effect", "VCMP_SLUG" ),
						"param_name" => "colorednews_effect",
						"description" => __( "Please choose a effect for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Indigo", "VCMP_SLUG" ) => "indigo",
								__( "Blue", "VCMP_SLUG" ) => "blue",
								__( "Red", "VCMP_SLUG" ) => "red",
								__( "Black", "VCMP_SLUG" ) => "black",
								__( "White", "VCMP_SLUG" ) => "white",
								__( "Yellow", "VCMP_SLUG" ) => "yellow",
								__( "Green", "VCMP_SLUG" ) => "green",
								__( "Grey", "VCMP_SLUG" ) => "grey"
							)
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Author", "VCMP_SLUG" ),
					"param_name" => "colorednews_author",
					"description" => __( "Do you want to display post author?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Share Link", "VCMP_SLUG" ),
					"param_name" => "colorednews_share",
					"description" => __( "Do you want to display post share link?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Dates", "VCMP_SLUG" ),
					"param_name" => "colorednews_date",
					"description" => __( "Do you want to display post date?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Category", "VCMP_SLUG" ),
					"param_name" => "colorednews_category",
					"description" => __( "Do you want to display post category?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Title", "VCMP_SLUG" ),
					"param_name" => "colorednews_title",
					"description" => __( "Do you want to display post title?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Excerpt", "VCMP_SLUG" ),
					"param_name" => "colorednews_excerpt",
					"description" => __( "Do you want to display post excerpt?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Time", "VCMP_SLUG" ),
					"param_name" => "colorednews_time",
					"description" => __( "Do you want to display post time?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Comments", "VCMP_SLUG" ),
					"param_name" => "colorednews_comments",
					"description" => __( "Do you want to display post comments?", "VCMP_SLUG" ),
					'admin_label' => true,
					"value" => ""
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
			'colorednews_types' => '',
			'colorednews_limit' => '',
			'colorednews_effect' => '',
			'colorednews_author' => '',
			'colorednews_share' => '',
			'colorednews_date' => '',
			'colorednews_category' => '',
			'colorednews_title' => '',
			'colorednews_excerpt' => '',
			'colorednews_time' => '',
			'colorednews_comments' => '',
			'colorednews_col_size' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_colorednews', VCMP_URL . 'modules/vcmp-colorednews/assets/css/vc_colorednews.css');
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $colorednews_limit;
		
		$args = array(
			'numberposts' => $limit,
			'post_type' => preg_split("/\,/",$colorednews_types),
			'paged' => $paged,
			'posts_per_page' => $limit,
		);
		
		query_posts($args);
	
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$categories = get_the_category();
		$post_link=get_permalink();
		$post_title=urlencode(get_the_title());
		$post_excerpt=strip_tags(get_the_excerpt());
		
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'large', true);
		
		$output .= '<div class="vcmp_coloredgrid '.esc_attr( $el_class ).'"><div class="vcmp_colored_news"><div class="vcmp_colored_news_image">';
						
					if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
						
		$output .= '<img src="' . $image_url[0] . '" alt="'.the_title("","",false).'" />';
		
					};
						
						
		$output .='<div class="vcmp_colored_news_overlay vcmp_colored_news_overlay-'.$colorednews_effect.'"> <div class="vcmp_colored_news_overlay-content">';
							  
					if ( $colorednews_time == 'true' || $colorednews_category == 'true' ) {	
					
		
		$output .= '<ul class="vcmp_colored_news_meta">';
		
					if ( $colorednews_category == 'true' && $categories) {	
		
		
		$output .= '<li><a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><i class="fa fa-tag"></i> '.esc_html( $categories[0]->name ).'</a></li>';
								
					};
					
					if ( $colorednews_time == 'true' ) {	
					
		$output .='<li><a href="' . get_permalink() . '"><i class="fa fa-clock-o"></i> '.get_the_time('g:i:s a').'</a></li>';
		
					};
		
		$output .='</ul>';
							  
					};
							  
					if ( $colorednews_title == 'true' ) {

		$output .= '<a href="' . get_permalink() . '" class="vcmp_colored_news_title">'.the_title("","",false).'</a>';
		
					};
					
					
					if ( $colorednews_author == 'true' || $colorednews_share == 'true'  ) {

		$output .= '<ul class="vcmp_colored_news_meta vcmp_colored_news_meta-last">';
		
		
					if ( $colorednews_author == 'true'  ) {
					
		$output .= '<li><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'"><i class="fa fa-user"></i> '.get_the_author().'</a></li>';
		
					};
					
					if ( $colorednews_share == 'true'  ) {
					
		$output .= '<li>SHARE: <a href="https://www.facebook.com/sharer.php?u='.$post_link.'" class="share-btn fa fa-facebook-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a> 
					  
			<a href="https://twitter.com/share?url='.$post_link.'&amp;text='.$post_title.'" class="share-btn fa fa-twitter-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a> 
					  
			<a href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;';
			
						if ( $image_url) {
							$output .= 'media='.$image_url[0].'&amp;';
						};
							
		$output .= 'description='.$post_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>
			
			<a href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>
					  
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>
					  
			<a href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$post_title.'" class="share-btn fa fa-tumblr-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>
					  
			<a href="mailto:?subject='.$post_title.'&amp;body='.$post_excerpt.' '.$post_link.'" class="share-btn fa fa-envelope-square" onclick="javascript:window.open(this.href,
					  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>
					  
					  </li>';
		
					};
		
		$output .= '</ul>';
		
					};
							  
		$output .= '</div>
						  </div>
						</div>
					  </div>
				  </div>';
				  
		endwhile; else:
		endif;

	wp_reset_query();

	return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpColoredNews();