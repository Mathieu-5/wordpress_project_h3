<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Tiled News
 * Description: Display any post type as tiled style shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpTiledNews extends VcmpModule{

	const slug = 'vcmp_tiled_news';
	const base = 'vcmp_tiled_news';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Tiled News", "VCMP_SLUG"),
            "description" 	=> __("Display any post type with tiled style into your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array( 
					"type" => "posttypes",
					"heading" => __( "Post Types", "VCMP_SLUG" ),
					"param_name" => "tiled_news_types",
					"description" => __( "Please choose post type.", "VCMP_SLUG" ),
					'admin_label' => true,
					"group" => __( "Source", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "tiled_news_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Hover Effect", "VCMP_SLUG" ),
					"param_name" => "tiled_news_effect",
					'admin_label' => true,
					"description" => __( "Do you want to display post hover effect?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Dates", "VCMP_SLUG" ),
					"param_name" => "tiled_news_date",
					'admin_label' => true,
					"description" => __( "Do you want to display post date?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Category", "VCMP_SLUG" ),
					"param_name" => "tiled_news_category",
					'admin_label' => true,
					"description" => __( "Do you want to display post category?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Title", "VCMP_SLUG" ),
					"param_name" => "tiled_news_title",
					'admin_label' => true,
					"description" => __( "Do you want to display post title?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Excerpt", "VCMP_SLUG" ),
					"param_name" => "tiled_news_excerpt",
					'admin_label' => true,
					"description" => __( "Do you want to display post excerpt?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Time", "VCMP_SLUG" ),
					"param_name" => "tiled_news_time",
					'admin_label' => true,
					"description" => __( "Do you want to display post time?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Comments", "VCMP_SLUG" ),
					"param_name" => "tiled_news_comments",
					'admin_label' => true,
					"description" => __( "Do you want to display post comments?", "VCMP_SLUG" ),
					"group" => __( "Settings", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Order", "VCMP_SLUG" ),
						"param_name" => "tiled_news_order",
						"description" => __( "Please choose order.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Order",
						"value" => array(
								__( "Choose orientation", "VCMP_SLUG" ) => "",
								__( "Ascending - lowest to highest values (1, 2, 3; a, b, c)", "VCMP_SLUG" ) => "ASC",
								__( "Descending - highest to lowest values (3, 2, 1; c, b, a)", "VCMP_SLUG" ) => "DESC"
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Order By", "VCMP_SLUG" ),
						"param_name" => "tiled_news_orderby",
						"description" => __( "Please choose order by.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Order",
						"value" => array(
								__( "Choose orientation", "VCMP_SLUG" ) => "",
								__( "none", "VCMP_SLUG" ) => "none",
								__( "ID", "VCMP_SLUG" ) => "ID",
								__( "author", "VCMP_SLUG" ) => "author",
								__( "name", "VCMP_SLUG" ) => "name",
								__( "type", "VCMP_SLUG" ) => "type",
								__( "date", "VCMP_SLUG" ) => "date",
								__( "modified", "VCMP_SLUG" ) => "modified",
								__( "parent", "VCMP_SLUG" ) => "parent",
								__( "rand", "VCMP_SLUG" ) => "rand",
								__( "comment_count", "VCMP_SLUG" ) => "comment_count",
								__( "menu_order", "VCMP_SLUG" ) => "menu_order",
							)
				),
				
				array(
				'type' => 'checkbox',
				'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
				'param_name' => 'use_theme_fonts',
				'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
				'group' => __( 'Custom Fonts', 'js_composer' ),
				'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
				),
				
				array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => '',
				'group' => __( 'Custom Fonts', 'js_composer' ),
				'admin_label' => false,
						"dependency" => array( 
								'element' => "use_theme_fonts",
								'value_not_equal_to' => array( 'yes' ),
						),
						
						'settings' => array(
							'fields' => array(
								'font_family_description' => __( 'Select font family.', 'VCMP_SLUG' ),
								'font_style_description' => __( 'Select font styling.', 'VCMP_SLUG' ),
							),
						),
				),
				
				array(
					'type' => 'css_editor',
					'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
					'param_name' => 'css',
					'admin_label' => true,
					'group' => __( 'Design options', 'VCMP_SLUG' ),
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
      
	  $output = $el_class = $css = $tiled_news_types = $tiled_news_limit = $tiled_news_effect = $tiled_news_date = $tiled_news_category = $tiled_news_title = $tiled_news_excerpt = $tiled_news_time = $tiled_news_comments = $tiled_news_order = $tiled_news_orderby = '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'css' => '',
			'tiled_news_types' => '',
			'tiled_news_limit' => '',
			'tiled_news_effect' => '',
			'tiled_news_date' => '',
			'tiled_news_category' => '',
			'tiled_news_title' => '',
			'tiled_news_excerpt' => '',
			'tiled_news_time' => '',
			'tiled_news_comments' => '',
			'tiled_news_order' => '',
			'tiled_news_orderby' => '',
			'use_theme_fonts' => '',
			'google_fonts' => '',
			
		), $atts ) );

		wp_enqueue_style( 'vc_tiled_news', VCMP_URL . 'modules/vcmp-tiled-news/assets/css/vc_tiled_news.css');
		wp_enqueue_script( 'vc_prefixfree', VCMP_URL.'assets/prefixfree.min.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		/*GOOGLE FONTS*/
		$google_fonts_obj = new Vc_Google_Fonts();
		$google_fonts_data = $google_fonts_obj->_vc_google_fonts_parse_attributes(
			array(
		        'font_family',
		        'font_style'
			),
			$google_fonts
		);
		
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		
		if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
		
			if ( $google_fonts_data['values']['font_family'] ) {
				$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
				
				$styles[] = 'font-family:' . $google_fonts_family[0];
				$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
				
				$styles[] = 'font-weight:' . $google_fonts_styles[1];
				$styles[] = 'font-style:' . $google_fonts_styles[2];
				
			}
		}
		
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
		} else {
			$style = '';
		}
		
		if ( ! empty( $google_fonts ) ) {
			wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
		}
		/*GOOGLE FONTS*/
		
		if ( $tiled_news_effect == 'true' ) {
			$tiled_news_effect ='gradienteffect';
		};
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $tiled_news_limit;
		$order = $tiled_news_order;
		$orderby = $tiled_news_orderby;
		$args = array(
			'numberposts' => $limit,
			'post_type' => preg_split("/\,/",$tiled_news_types),
			'paged' => $paged,
			'posts_per_page' => $limit,
			'orderby' => $orderby,
			'order'   => $order,
		);
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		
		$output = '<!-- wrapper--><div class="vcmp_tiled_news" id="vcmp_tiled_news'.$i++.'" >';
		
		query_posts($args);
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$excerpt = substr(get_the_excerpt(), 0,30);
		$categories = get_the_category();
		
		$output .= '<!-- article--><article class="vcmp-tiled-column '.$tiled_news_effect.' '.$tiled_news_types.' '.esc_attr( $el_class ).' '.esc_attr( $css_class ).'">
						<a href="' . get_permalink() . '" title="'.the_title("","",false).'">
					';
					
					if ( $tiled_news_title == 'true' ) {
		
		$output .= '<h3 class="vcmp-tiled-title">'.the_title("","",false).'</h3>';
		
					} else { };
					
										if ( $tiled_news_date == 'true' ) {
		$output .= '<span class="vcmp-tiled-day">'.get_the_date('d').' / '.get_the_date('M').'</span>
					';
						  
					} else { };
					
						  
					if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
						
		$output .= '<span class="vcmp-tiled-thumbnail" style="background: url(' . $image_url[0] . ') no-repeat 0 0 / cover;"></span>';
		
						 } else {
						 
		$output .= '<span class="vcmp-tiled-thumbnail" style="background: rgba(0, 0, 0, 0.6)"></span>';
						 
						 };
						
					  
					if ( $tiled_news_category == 'true' ) {
					
		$output .= '<span class="vcmp-tiled-category">'.esc_html( $categories[0]->name ).'</span>';
		
					} else { };
					
					
					if ( $tiled_news_comments == 'true' ) {
					
		$output .= '<span class="vcmp-tiled-comments"><i class="fa fa-comments"></i> '.get_comments_number().'</span>';
		
					} else { };
					
					if ( $tiled_news_excerpt == 'true' ) {
		
		$output .= '<p class="vcmp-tiled-description">'.$excerpt.'</p>';
		
					} else { };
					
					  


					
		$output .= '
						</a><!-- link end-->
					</article><!-- article end-->
				  ';
				  
		endwhile; else:
		endif;
		
	wp_reset_query();
	
	$output .= '<!-- wrapper--></div> <style>#vcmp_tiled_news'.$ia++.' h3, #vcmp_tiled_news'.$ib++.' span  {font-family:'.$google_fonts_family[0].'; font-weight:'.$google_fonts_styles[1].'; font-style:'.$google_fonts_styles[2].' }</style>';

	return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpTiledNews();