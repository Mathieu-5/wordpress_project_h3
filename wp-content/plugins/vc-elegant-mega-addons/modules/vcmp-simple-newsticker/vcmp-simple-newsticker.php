<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Simple News Ticker
 * Description: Simple News Ticker shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpSimpleNewsticker extends VcmpModule{

	const slug = 'simple_newsticker';
	const base = 'simple_newsticker';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'simple_newsticker_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'simple_newsticker_content_shortcode_vc' ) );
		add_shortcode( 'simple_newsticker', array( $this, 'vc_simple_newsticker_shortcode' ));
		add_shortcode( 'simple_newsticker_content', array( $this, 'simple_newsticker_content_shortcode' ));
	}

	
	// Parent Element
	public function simple_newsticker_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Simple News Ticker' , 'VCMP_SLUG' ),
				'base'                    => 'simple_newsticker',
				'description'             => __( 'Add simple news ticker to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'simple_newsticker_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          => array(
					
					array(
						"type" => "dropdown",
						"heading" => __( "Ticker Type", "vc_themeofwp_addon" ),
						"param_name" => "simplenewsticker_type",
						"description" => __( "Please choose the ticker type.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose ticker type", "VCMP_SLUG" ) => "",
								__( "Simple Style", "VCMP_SLUG" ) => "simplenews",
								__( "Breaking Style", "VCMP_SLUG" ) => "breakingnews",
								__( "Easing Style", "VCMP_SLUG" ) => "easingnews"
							)
					),
					
					array(
						"type" => "dropdown",
						"heading" => __( "Direction", "vc_themeofwp_addon" ),
						"param_name" => "simplenewsticker_direction",
						"description" => __( "Please choose the ticker direction.", "VCMP_SLUG" ),
						'admin_label' => true,
						'group' => "Settings",
						"value" => array(
								__( "Choose ticker direction", "VCMP_SLUG" ) => "",
								__( "Up", "VCMP_SLUG" ) => "up",
								__( "Down", "VCMP_SLUG" ) => "down"
							),
						"dependency" => Array( 
								'element' => "simplenewsticker_type",
								'value_not_equal_to' => array( 'breakingnews' ),
						),
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Display Limit", "VCMP_SLUG" ),
						"param_name" => "simplenewsticker_visible",
						"description" => __( "How many post will be display at same time. You should use numeric value. Ex:3", "VCMP_SLUG" ),
						'group' => "Settings",
						"dependency" => Array( 
								'element' => "simplenewsticker_type",
								'value_not_equal_to' => array( 'breakingnews' ),
						),
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Set ticker interval', 'VCMP_SLUG' ),
						'param_name' => 'simplenewsticker_interval',
						'group' => "Settings",
					),

					array(
						'type' => 'css_editor',
						'heading' => __( 'Custom Design Options', 'VCMP_SLUG' ),
						'param_name' => 'css',
						'group' => __( 'Design options', 'VCMP_SLUG' ),
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
				)
			) 
		);
    }
	

	// Nested Element
	public function simple_newsticker_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Simple News Ticker Item', 'VCMP_SLUG'),
				'base'            => 'simple_newsticker_content',
				'description'     => __( 'Add simple news ticker items to price table shiny.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'machine'),
				'content_element' => true,
				'as_child'        => array('only' => 'simple_newsticker'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					
					array( 
						"type" => "posttypes",
						"heading" => __( "Post Types", "VCMP_SLUG" ),
						"param_name" => "simplenewsticker_posts_types",
						"description" => __( "Please choose post types for the slider.", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => ""
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Post Limit", "VCMP_SLUG" ),
						"param_name" => "simplenewsticker_posts_limit",
						"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" )
					),

					array(
						"type" => "textfield",
						"heading" => __( "Extra Class Name", "VCMP_SLUG" ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS", "VCMP_SLUG" )
					),
					
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Grid Gallery Shortcode
	 */
	public function vc_simple_newsticker_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $css = $simplenewsticker_type = $simplenewsticker_direction = $simplenewsticker_visible = $simplenewsticker_interval = '';
		
		static $i = 0;
		static $ia = 0;

		extract( 
			shortcode_atts( 
				array(
					'simplenewsticker_type' => '',
					'simplenewsticker_direction' => '',
					'simplenewsticker_visible' => '',
					'simplenewsticker_interval' => '',
					'el_class' => '',
					'css' => '',
				), $atts 
			) 
		);


		wp_enqueue_style( 'vc_simple_newsticker', VCMP_URL . 'modules/vcmp-simple-newsticker/assets/css/vc_simple_newsticker.css');
		wp_enqueue_script( 'vc_easing', VCMP_URL.'modules/vcmp-simple-newsticker/assets/js/jquery.easing.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_simple_newsticker', VCMP_URL.'modules/vcmp-simple-newsticker/assets/js/jquery.easy-ticker.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$output = '
				<div class="'.$simplenewsticker_type.' vcmp-news-panel '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'" id="vcmp-news-panel-'.$i++.'">
					<ul>
						'. do_shortcode($content) .'
					</ul>
				</div>
				
				<script>
				jQuery(document).ready(function($) {
					$(\'#vcmp-news-panel-'.$ia++.'.'.$simplenewsticker_type.'\').easyTicker({ 
				';
				if( ( $simplenewsticker_type !== 'breakingnews') ) {
				$output .= ' direction: \''.$simplenewsticker_direction.'\', ';
				}
				if( ( $simplenewsticker_type == 'breakingnews') ) {			
				$output .= ' visible: 1, ';

				} else { 
				$output .= ' visible: '.$simplenewsticker_visible.', ';
				}				
				
				$output .= ' interval: '.$simplenewsticker_interval.' ';
			
			$output .= '});
				});
				</script>
				';
				
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function simple_newsticker_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $simplenewsticker_type = $simplenewsticker_posts_types = $simplenewsticker_posts_limit = $simplenewsticker_fontsize = $simplenewsticker_content = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'simplenewsticker_posts_types' => '',
					'simplenewsticker_posts_limit' => '',
					'simplenewsticker_fontsize' => '',
					'simplenewsticker_content' => '',
				), $atts 
			) 
		);
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $simplenewsticker_posts_limit;
		
		$args = array(
			'post_type' => array(''.$simplenewsticker_posts_types.''),
			'paged' => $paged,
			'posts_per_page' => $limit,
		);
		
		query_posts($args);
	
		

		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		$excerpt = substr(get_the_excerpt(), 0,200);
		$categories = get_the_category();
		
		$output .= '
				<li class="vcmp-news-item '.esc_attr( $el_class ).'">
				  <a href="' . get_permalink() . '">
				  ';
				  
				if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
						
					if( ( $simplenewsticker_type !== 'breakingnews') ) {
						$output .= '<img src="' . $image_url[0] . '" alt="" />';
					}
					
				} else { };
				
		$output .= '<span class="vcmp-news-item-title">'.the_title("","",false).'</span>
					<span class="vcmp-news-item-content">'.$excerpt.'</span>
					<span class="vcmp-news-item-meta">'.get_the_date('d').'/'.get_the_date('M').'/'.get_the_date('Y').'</span>
				  </a>
				</li>
				';
				 
		endwhile; else:
		endif;

		wp_reset_query();
		
		return $output;
	}
	
	


}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_simple_newsticker extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_simple_newsticker_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpSimpleNewsticker();

	