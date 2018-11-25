<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Hexagon Grid
 * Description: Hexagon Grid shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpHexagonGrid extends VcmpModule{

	const slug = 'hexagon_grid';
	const base = 'hexagon_grid';

	public function __construct(){
	
		add_action( 'vc_before_init', array( $this, 'hexagon_grid_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'hexagon_grid_content_shortcode_vc' ) );
		
		add_shortcode( 'hexagon_grid', array( $this, 'vc_hexagon_grid_shortcode' ));
		add_shortcode( 'hexagon_grid_content', array( $this, 'hexagon_grid_content_shortcode' ));
		
	}

	
	// Parent Element
	public function hexagon_grid_shortcode_vc() {
		vc_map( 
			array(
				"icon" 					  => 'icon-vc-elegant-mega',
				'name'                    => __( 'Hexagon Grid' , 'VCMP_SLUG' ),
				'base'                    => 'hexagon_grid',
				'description'             => __( 'Add hexagong grid gallery to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'hexagon_grid_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => false,
				"js_view" 				  => 'VcColumnView',
				"category" 				  => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          		  => array(
					
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
				),
			) 
		);
	}
	

	// Nested Element
	public function hexagon_grid_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" 			  => 'icon-vc-elegant-mega',
				'name'            => __('Grid Item', 'VCMP_SLUG'),
				'base'            => 'hexagon_grid_content',
				'description'     => __( 'Add hexagong grid items to your gallery.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'hexagon_grid'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
				
					array( 
							"type" => "colorpicker",
							"heading" => __( "Default Background Color", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_grid_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Hover Background Color", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_grid_hover_bg",
							'admin_label' => true,
							"description" => __( "Please choose the grid background color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "attach_image",
							"heading" => __( "Thumbnail Image", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_img",
							'admin_label' => true,
							"description" => __( "Please choose your image.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Default Title", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_default_title",
							'admin_label' => true,
							'group' => __( "Title", "VCMP_SLUG" ),
							"description" => __( "Please enter the default title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Hover Title", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_title",
							'admin_label' => true,
							'group' => __( "Title", "VCMP_SLUG" ),
							"description" => __( "Please enter the hover title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Title Link URL", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_url",
							'admin_label' => true,
							'group' => __( "Title", "VCMP_SLUG" ),
							"description" => __( "Please enter the link URL.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea_html",
							"heading" => __( "Content", "VCMP_SLUG" ),
							"param_name" => "content",
							'admin_label' => true,
							'group' => __( "Content", "VCMP_SLUG" ),
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Content Color", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_content_color",
							'admin_label' => true,
							'group' => __( "Content", "VCMP_SLUG" ),
							"description" => __( "Please choose the title color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Content Font Size", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_content_fontsize",
							'admin_label' => true,
							'group' => __( "Content", "VCMP_SLUG" ),
							"description" => __( "Please enter the title font size.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Facebook", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_facebook",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Facebook share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Twitter", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_twitter",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Twitter share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
							"type" => "dropdown",
							"heading" => __( "Instagram", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_showinstagram",
							'group' => __( "Social", "VCMP_SLUG" ),
							"value" => array(
											__( "No", "VCMP_SLUG" ) => "no", 
											__( "Yes", "VCMP_SLUG" ) => "instagram", 
										),
							"description" => __( "Do you want to use view on Instagram social icon?", "VCMP_SLUG" ),
							"admin_label" => false
					),
					
					array( 
							"type" => "textfield", 
							"heading" => __( "Instagram Link", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_instagram",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => false,
							"dependency" => Array( 
											'element' => "hexagongrid_showinstagram",
											'value' => array( 'instagram' ),
											),
							"description" => __( "Please enter the content url on Instagram. Ex:https://www.instagram.com/p/BEPQ4Cptvfm/?taken-by=themeofwp", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "LinkedIn", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_linkedin",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use LinkedIn share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Pinterest", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_pinterest",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Pinterest share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Google+", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_google",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Google+ share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Digg", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_digg",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Digg share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Reddit", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_reddit",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Reddit share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Stumbleupon", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_stumbleupon",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Stumbleupon share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "Tumblr", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_tumblr",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use Tumblr share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "checkbox",
							"heading" => __( "E-mail", "VCMP_SLUG" ),
							"param_name" => "hexagongrid_email",
							'group' => __( "Social", "VCMP_SLUG" ),
							'admin_label' => true,
							"description" => __( "Do you want to use E-mail share?.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
					'type' => 'checkbox',
					'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
					'param_name' => 'use_theme_fonts',
					'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
					'group' => __( 'Custom fonts', 'VCMP_SLUG' ),
					'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
					
					),
				
					array(
					'type' => 'google_fonts',
					'param_name' => 'google_fonts',
					'value' => '',
					'group' => __( 'Custom fonts', 'VCMP_SLUG' ), 
					
							"dependency" => Array( 
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
						'type' => 'checkbox',
						'heading' => __( 'Custom font for the content?', 'VCMP_SLUG' ),
						'param_name' => 'use_custom_for_content',
						'value' => "",
						'group' => __( 'Custom fonts', 'js_composer' ),
						"dependency" => Array( 
									'element' => "use_theme_fonts",
									'value_not_equal_to' => array( 'yes' ),
								),
						'description' => __( 'Use this custom font family for the content.', 'VCMP_SLUG' ),
					),
						
					array(
					'type' => 'font_container',
					'param_name' => 'font_container',
					'value' => 'tag:h1',
					'group' => __( 'Typography', 'VCMP_SLUG' ),
						
						'settings' => array(
							
							'fields' => array(
								'tag' => 'h2', // default value h2
								'text_align',
								'font_size',
								'line_height',
								'color',
								'font_style',
								'tag_description' => __( 'Select element tag.', 'VCMP_SLUG' ),
								'text_align_description' => __( 'Select text alignment.', 'VCMP_SLUG' ),
								'font_size_description' => __( 'Enter font size.', 'VCMP_SLUG' ),
								'line_height_description' => __( 'Enter line height.', 'VCMP_SLUG' ),
								'color_description' => __( 'Select heading color.', 'VCMP_SLUG' ),
								'font_style_description' => __('Select letter style.', 'VCMP_SLUG'),
							),
						),
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
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Grid Gallery Shortcode
	 */
	public function vc_hexagon_grid_shortcode( $atts, $content = null ) {
		$output = $el_class = $css = '';
		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_hexagongrid', VCMP_URL . 'modules/vcmp-hexagon-grid/assets/css/vc_hexagongrid.css');
		wp_enqueue_style( 'vc_magnific_popup', VCMP_URL . 'assets/magnific/magnific-popup.css');
		wp_enqueue_script( 'vc_magnific_popup', VCMP_URL.'assets/magnific/jquery.magnific-popup.min.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_hexagongrid_magnific', VCMP_URL.'modules/vcmp-hexagon-grid/assets/js/vc_hexagongrid_magnific.js', array('jquery'), '1.0', TRUE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		$output = '<ul id="vcmp_hexagon_grid" class="vcmp_clr '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">'. do_shortcode($content).'</ul>';
		return $output;
	}
	
	
	public function nl2p($str) {
		$arr=explode("\n",$str);
		$out='';

		for($i=0;$i<count($arr);$i++) {
			if(strlen(trim($arr[$i]))>0)
				$out.=''.trim($arr[$i]).'';
		}
		return $out;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function hexagon_grid_content_shortcode( $atts, $content = null ) {
	
		$output = $el_class = $css = $use_theme_fonts = $google_fonts = $use_custom_for_content = $font_container = $hexagongrid_img = $hexagongrid_title = $hexagongrid_default_title = $hexagongrid_url = $hexagongrid_content_fontsize = $hexagongrid_content_color = $hexagongrid_grid_bg = $hexagongrid_grid_hover_bg = $hexagongrid_facebook = $hexagongrid_twitter = $hexagongrid_instagram = $hexagongrid_linkedin = $hexagongrid_pinterest = $hexagongrid_google = $hexagongrid_digg = $hexagongrid_reddit = $hexagongrid_stumbleupon = $hexagongrid_tumblr = $hexagongrid_tumblr = $hexagongrid_email = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'use_theme_fonts' => '',
					'google_fonts' => '',
					'use_custom_for_content' => '',
					'font_container' => '',
					
					'hexagongrid_img' => '',
					'hexagongrid_title' => '',
					'hexagongrid_default_title' => '',
					'hexagongrid_url' => '',
					'hexagongrid_content_fontsize' => '',
					'hexagongrid_content_color' => '',
					'hexagongrid_grid_bg' => '',
					'hexagongrid_grid_hover_bg' => '',
					
					'hexagongrid_facebook' => '',
					'hexagongrid_twitter' => '',
					'hexagongrid_instagram' => '',
					'hexagongrid_linkedin' => '',
					'hexagongrid_pinterest' => '',
					'hexagongrid_google' => '',
					'hexagongrid_digg' => '',
					'hexagongrid_reddit' => '',
					'hexagongrid_stumbleupon' => '',
					'hexagongrid_tumblr' => '',
					'hexagongrid_email' => '',
				), $atts 
			) 
		);
		
		$content = $this->nl2p($content);
		
		static $i = 0;
		static $it = 0;
		
		$hexagongrid_img = wp_get_attachment_image_src(intval($hexagongrid_img), 'full');
		$hexagongrid_img = $hexagongrid_img[0];
		
		$post_title=urlencode(get_the_title());
		$post_link=get_permalink();
		$post_excerpt=strip_tags(get_the_excerpt());
		$post_thumb=wp_get_attachment_url(get_post_thumbnail_id());
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		/*CUSTOM TYPOGRAPHY*/
		$font_container_obj = new Vc_Font_Container();
		$font_container_data = $font_container_obj->_vc_font_container_parse_attributes( 
			array(
		        'tag',
		        'text_align',
		        'font_size',
		        'line_height',
		        'color',
		        'font_style',
		        'font_style_italic',
		        'font_style_bold'
			), 
			$font_container 
		);
		
		if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
			foreach ( $font_container_data['values'] as $key => $value ) {
				if ( $key != 'tag' && strlen( $value ) > 0 ) {
					if ( preg_match( '/description/', $key ) ) {
						continue;
					}
					if ( $key == 'font_size' || $key == 'line_height' ) {
						$value = preg_replace( '/\s+/', '', $value );
					}
					if ( $key == 'font_size' ) {
						$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
						// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
						$regexr = preg_match( $pattern, $value, $matches );
						$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
						$unit = isset( $matches[2] ) ? $matches[2] : 'px';
						$value = $value . $unit;
					}
					if ( strlen( $value ) > 0 ) {
						if(array_key_exists($key, $font_container_data['fields'])){
							switch ($key) {
								case 'font_style_italic':
										if($value == 1){
											$styles[$key] = 'font-style: italic';
										}
									break;

								case 'font_style_bold':
										if($value == 1){
											$styles[$key] = 'font-weight: bold';
										}
									break;
								
								default:
										$styles[$key] = str_replace( '_', '-', $key ) . ': ' . $value;
									break;
							}
						}
					}
				}
			}
		}
		/*CUSTOM TYPOGRAPHY*/
		
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
				$styles[] = 'font-style:' . $google_fonts_styles[2];
				$styles[] = 'background-color:' . $hexagongrid_grid_hover_bg;
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
		
		
		$output .= ' <li class="'.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">
						<div style="background-color: '.$hexagongrid_grid_bg.'; background-image: url('.$hexagongrid_img.'); background-position: 0 50%; background-repeat: no-repeat; background-attachment: scroll;  background-size: cover;">
							<span class="defaulthexcontent">'.$hexagongrid_default_title.'</span>
							
							<' . $font_container_data['values']['tag'] . ' class="hexagon-title" ' . $style . '>
								<a href="'.$hexagongrid_url.'" style="color:' . $font_container_data['values']['color'] . '; font-size:' . $font_container_data['values']['font_size'] . '" class="zoom-anim-dialog" data-type="image">
									'.$hexagongrid_title.'
								</a>
							</' . $font_container_data['values']['tag'] . '>
							
							<p style="background-color:'.$hexagongrid_grid_hover_bg.'; color:'.$hexagongrid_content_color.'; font-size:'.$hexagongrid_content_fontsize.'; ';
							
							if ( $use_custom_for_content== 'true' ) {
										$output .= ' font-family:'.$google_fonts_family[0].'; font-weight:'.$google_fonts_styles[1].'; font-style:'.$google_fonts_styles[2].'';
							}
							
		$output .= ' ">';
		
		$output .= '<span class="hoverhexcontent">'. do_shortcode($content) .'</span>
							
							<span class="griddershare">';
								
		if ( !$hexagongrid_facebook == '' ) {			
		$output .= '<a title="'.__( "Share on Facebook", "VCMP_SLUG" ).'" href="https://www.facebook.com/sharer.php?display=popup&amp;u='. $hexagongrid_img .'&amp;t='.$hexagongrid_title.'" class="share-btn fa fa-facebook" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';								  
		};
		
		if ( !$hexagongrid_twitter == '' ) {									  
		$output .= '<a title="'.__( "Share on Twitter", "VCMP_SLUG" ).'" href="https://twitter.com/share?url='.$post_link.'&amp;text='.$hexagongrid_title.'+'. $hexagongrid_img .'" class="share-btn fa fa-twitter" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_instagram == '' ) {									  
		$output .= '<a title="'.__( "View on Instagram", "VCMP_SLUG" ).'" href="'.$hexagongrid_instagram.'" class="share-btn fa fa-instagram" onclick="javascript:window.open(this.href,
											  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800\');return false;"></a>';
		};
		
		if ( !$hexagongrid_linkedin == '' ) { 
		$output .= '<a title="'.__( "Share on LinkedIn", "VCMP_SLUG" ).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$post_link.'" class="share-btn fa fa-linkedin" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_pinterest == '' ) { 
		$output .= '<a title="'.__( "Share on Pinterest", "VCMP_SLUG" ).'" href="https://pinterest.com/pin/create/button/?url='.$post_link.'&amp;media='.$hexagongrid_img.'&amp;description='.$hexagongrid_title.'" class="share-btn fa fa-pinterest" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_google == '' ) {						
		$output .= '<a title="'.__( "Share on Google", "VCMP_SLUG" ).'" href="https://plus.google.com/share?url='.$post_link.'" class="share-btn fa fa-google-plus" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
					
		if ( !$hexagongrid_digg == '' ) {
		$output .= '<a title="'.__( "Share on Digg", "VCMP_SLUG" ).'" href="http://www.digg.com/submit?url='.$post_link.'" class="share-btn fa fa-digg" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
						
		if ( !$hexagongrid_reddit == '' ) {
		$output .= '<a title="'.__( "Share on Reddit", "VCMP_SLUG" ).'" href="http://reddit.com/submit?url='.$post_link.'" class="share-btn fa fa-reddit" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_stumbleupon == '' ) { 
		$output .= '<a title="'.__( "Share on Stumbleupon", "VCMP_SLUG" ).'" href="http://www.stumbleupon.com/submit?url='.$post_link.'&amp;title='.$hexagongrid_title.'" class="share-btn fa fa-stumbleupon" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_tumblr == '' ) { 
		$output .= '<a title="'.__( "Share on Tumblr", "VCMP_SLUG" ).'" href="http://www.tumblr.com/share/link?url='.$post_link.'&amp;name='.$hexagongrid_title.'" class="share-btn fa fa-tumblr" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		if ( !$hexagongrid_email == '' ) { 
		$output .= '<a title="'.__( "Sent by E-mail", "VCMP_SLUG" ).'" href="mailto:?subject='.$hexagongrid_title.'&amp;body='.$content.' '. $hexagongrid_custom_video .''.$hexagongrid_img.''. $hexagongrid_youtube_video .''. $hexagongrid_vimeo_video .''. $hexagongrid_text_only .' '.$post_link.'" class="share-btn fa fa-envelope" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600\');return false;"></a>';
		};
		
		$output .= '		</span>
						</p>
					</div>
				</li>
					
					';
		
		return $output;
		
	}

}


	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_hexagon_grid extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_hexagon_grid_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpHexagonGrid();