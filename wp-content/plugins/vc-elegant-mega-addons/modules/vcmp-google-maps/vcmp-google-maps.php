<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Google Maps With Multiple Marker
 * Description: Google Maps With Multiple Marker shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpGoogleMaps extends VcmpModule{

	const slug = 'google_maps';
	const base = 'google_maps';

	public function __construct(){
		
		add_action( 'vc_before_init', array( $this, 'google_maps_shortcode_vc' ) );
		add_action( 'vc_before_init', array( $this, 'google_maps_content_shortcode_vc' ) );
			
		add_shortcode( 'google_maps', array( $this, 'vc_google_maps_shortcode' ));
		add_shortcode( 'google_maps_content', array( $this, 'google_maps_content_shortcode' ));
	}

	
	// Parent Element
	public function google_maps_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-elegant-mega',
				'name' => __( 'Google Maps' , 'VCMP_SLUG' ),
				'base' => 'google_maps',
				'description'             => __( 'Add google map to your page.', 'VCMP_SLUG' ),
				'as_parent'               => array('only' => 'google_maps_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view" => 'VcColumnView',
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'params'          => array(
				
					array( 
						"type" => "attach_image",
						"heading" => __( "Marker Image", "VCMP_SLUG" ),
						"param_name" => "googlemapsmarker_img",
						'admin_label' => true,
						"description" => __( "Please choose your custom marker image.", "VCMP_SLUG" ),
						"value" => ""
					),
				
					array( 
							"type" => "textfield",
							"heading" => __( "Map Height", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_height",
							'admin_label' => true,
							"description" => __( "Please enter the map height. Ex: 400px", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Zoom Level", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_zoomlevel",
							'admin_label' => true,
							"description" => __( "Please enter the map zoom level. Ex: 3", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Center Latitude", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_clatitude",
							'admin_label' => true,
							"description" => __( "Please enter the map center latitude.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Center Longitude", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_clongitude",
							'admin_label' => true,
							"description" => __( "Please enter the map center longitude.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Map Labels Color", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_labels",
							'admin_label' => true,
							"description" => __( "Please choose the map labels color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Map Waters Color", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_waters",
							'admin_label' => true,
							"description" => __( "Please choose the map waters color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "colorpicker",
							"heading" => __( "Map Main Area Color", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_all",
							'admin_label' => true,
							"description" => __( "Please choose the map main area color.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Scrollwheel', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_scrollwheel',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Activate scrollwheel support.', 'VCMP_SLUG' ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Pancontrol', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_pancontrol',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Show pancontrol.', 'VCMP_SLUG' ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Zoom control', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_zoomcontrol',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Show zoom control.', 'VCMP_SLUG' ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Map type control', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_maptypecontrol',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Show map type control.', 'VCMP_SLUG' ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Streetview control', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_streetviewcontrol',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Show streetview control.', 'VCMP_SLUG' ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Rotate control', 'VCMP_SLUG' ),
						'param_name' => 'googlemapsmarker_rotatecontrol',
						'value' => "",
						'group' => __( 'Control', 'js_composer' ),
						'description' => __( 'Show rotate control.', 'VCMP_SLUG' ),
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Saturation", "VCMP_SLUG" ),
						"param_name" => "googlemapsmarker_saturation",
						'group' => __( 'Control', 'js_composer' ),
						"description" => __( "Enter saturation for the map. Ex:-100", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Lightness", "VCMP_SLUG" ),
						"param_name" => "googlemapsmarker_lightness",
						'group' => __( 'Control', 'js_composer' ),
						"description" => __( "Enter lightness for the map. Ex:45", "VCMP_SLUG" )
					),
					
					array(
						"type" => "textfield",
						"heading" => __( "Info Window Width", "VCMP_SLUG" ),
						"param_name" => "googlemapsmarker_infowindow_width",
						'group' => __( 'Control', 'js_composer' ),
						"description" => __( "Enter info window width the map. Ex:400", "VCMP_SLUG" )
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
	

	// Nested Element
	public function google_maps_content_shortcode_vc() {
		vc_map( 
			array(
				"icon" => 'icon-vc-elegant-mega',
				'name'            => __('Google Maps Marker', 'VCMP_SLUG'),
				'base'            => 'google_maps_content',
				'description'     => __( 'Add marker to google map.', 'VCMP_SLUG' ),
				"category" => __('Elegant Mega Addons', 'VCMP_SLUG'),
				'content_element' => true,
				'as_child'        => array('only' => 'google_maps'), // Use only|except attributes to limit parent (separate multiple values with comma)
				'params'          => array(
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Content Title", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_title",
							'admin_label' => true,
							"description" => __( "Please enter the title.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textarea",
							"heading" => __( "Map Content", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_content",
							'admin_label' => true,
							"description" => __( "Please enter the content.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Latitude", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_latitude",
							'admin_label' => true,
							"description" => __( "Please enter the map latitude.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array( 
							"type" => "textfield",
							"heading" => __( "Map Longitude", "VCMP_SLUG" ),
							"param_name" => "googlemapsmarker_longitude",
							'admin_label' => true,
							"description" => __( "Please enter the map longitude.", "VCMP_SLUG" ),
							"value" => ""
					),
					
					array(
						'type' => 'checkbox',
						'heading' => __( 'Use theme default font family?', 'VCMP_SLUG' ),
						'param_name' => 'use_theme_fonts',
						'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
						'group' => __( 'Custom fonts', 'js_composer' ),
						'description' => __( 'Use font family from the theme.', 'VCMP_SLUG' ),
					),
					
					array(
					'type' => 'google_fonts',
					'param_name' => 'google_fonts',
					'value' => '',
					'admin_label' => true,
					'group' => __( 'Custom fonts', 'js_composer' ),
						
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
					'type' => 'font_container',
					'param_name' => 'font_container',
					'value' => 'tag:h2',
					'group' => __( 'Typography', 'VCMP_SLUG' ),
						
						'settings' => array(
							
							'fields' => array(
								'tag' => 'h4', // default value h4
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
				),
			) 
		);
	}
	
	
	
	
	/**
	 * Main Maps Shortcode
	 */
	public function vc_google_maps_shortcode( $atts, $content = null ) {
	
		$output = 
		$el_class = 
		$css = 
		$googlemapsmarker_height = 
		$googlemapsmarker_img = 
		$googlemapsmarker_zoomlevel = 
		$googlemapsmarker_clatitude = 
		$googlemapsmarker_clongitude = 
		$googlemapsmarker_labels = 
		$googlemapsmarker_waters = 
		$googlemapsmarker_all = 
		$googlemapsmarker_scrollwheel = 
		$googlemapsmarker_pancontrol = 
		$googlemapsmarker_zoomcontrol= 
		$googlemapsmarker_maptypecontrol = 
		$googlemapsmarker_streetviewcontrol = 
		$googlemapsmarker_rotatecontrol = 
		$googlemapsmarker_saturation = 
		$googlemapsmarker_lightness = 
		$googlemapsmarker_infowindow_width = '';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'css' => '',
					'googlemapsmarker_height' => '',
					'googlemapsmarker_img' => '',
					'googlemapsmarker_zoomlevel' => '',
					'googlemapsmarker_clatitude' => '',
					'googlemapsmarker_clongitude' => '',
					'googlemapsmarker_labels' => '',
					'googlemapsmarker_waters' => '',
					'googlemapsmarker_all' => '',
					'googlemapsmarker_scrollwheel' => '',
					'googlemapsmarker_pancontrol' => '',
					'googlemapsmarker_zoomcontrol' => '',
					'googlemapsmarker_maptypecontrol' => '',
					'googlemapsmarker_streetviewcontrol' => '',
					'googlemapsmarker_rotatecontrol' => '',
					'googlemapsmarker_saturation' => '',
					'googlemapsmarker_lightness' => '',
					'googlemapsmarker_infowindow_width' => '',
				), $atts 
			) 
		);

		wp_enqueue_style( 'vc_google_maps', VCMP_URL . 'modules/vcmp-google-maps/assets/css/vc_google_maps.css');
		wp_enqueue_script( 'vc_google_maps', VCMP_URL.'modules/vcmp-google-maps/assets/js/vc_google_maps.js', array('jquery'), '1.0', TRUE);
		wp_enqueue_script( 'vc_modernizr', VCMP_URL.'assets/modernizr.js', array('jquery'), '1.0', FALSE);
		
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ), self::slug, $atts );
		
		if ( $googlemapsmarker_scrollwheel=='' ) { $googlemapsmarker_scrollwheel='false';}
		if ( $googlemapsmarker_pancontrol=='' ) { $googlemapsmarker_pancontrol='false';}
		if ( $googlemapsmarker_zoomcontrol=='' ) { $googlemapsmarker_zoomcontrol='false';}
		if ( $googlemapsmarker_maptypecontrol=='' ) { $googlemapsmarker_maptypecontrol='false';}
		if ( $googlemapsmarker_streetviewcontrol=='' ) { $googlemapsmarker_streetviewcontrol='false';}
		if ( $googlemapsmarker_rotatecontrol=='' ) { $googlemapsmarker_rotatecontrol='false';}
		if ( $googlemapsmarker_saturation=='' ) { $googlemapsmarker_saturation='-100';}
		if ( $googlemapsmarker_lightness=='' ) { $googlemapsmarker_lightness='45';}
		if ( $googlemapsmarker_infowindow_width=='' ) { $googlemapsmarker_infowindow_width='400';}
		
		
		static $i = 0;
		static $ia = 0;
		static $ib = 0;
		
		$googlemapsmarker_img = wp_get_attachment_image_src(intval($googlemapsmarker_img), 'large');
		$googlemapsmarker_img = $googlemapsmarker_img[0];
		
		$output = '
				<div class="vcmp-our-map '.esc_attr( $css_class ).' '.esc_attr( $el_class ).'">
				<style scoped>
					/* Set a size for our map container, the Google Map will take up 100% of this container */
					#map-'.$i++.' {
						width: 100%;
						height: '. $googlemapsmarker_height.';
					}
				</style>
				
				<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQG8Q1ZK8q6mECJDhK49NUSSrnT5KlwZg&amp;libraries=places"></script>
				<script type="text/javascript">
						
						// When the window has finished loading create our google map below
						google.maps.event.addDomListener(window, \'load\', init);
					
						function init() {
							// Basic options for a simple Google Map
							// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
						
						
						var locations = [
										'.do_shortcode($content).'
										];
					
						var mapOptions = {

								center: new google.maps.LatLng('. $googlemapsmarker_clatitude.', '. $googlemapsmarker_clongitude.'), // Location
								
								scrollwheel: '.$googlemapsmarker_scrollwheel.',
								
								panControl: '.$googlemapsmarker_pancontrol.',
								
								zoomControl: '.$googlemapsmarker_zoomcontrol.',
								
								zoom: '. $googlemapsmarker_zoomlevel.',
								
								mapTypeControl: '.$googlemapsmarker_maptypecontrol.',
								
								streetViewControl: '.$googlemapsmarker_streetviewcontrol.',
								
								rotateControl: '.$googlemapsmarker_rotatecontrol.',
								
								styles: [
								
								{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"'. $googlemapsmarker_labels.'"}]},
								
								{"featureType":"landscape","elementType":"all","stylers":[{"color":"'.$googlemapsmarker_all.'"}]},
								
								{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},
								
								{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"off"}]},
								
								{"featureType":"road","elementType":"all","stylers":[{"saturation":'.$googlemapsmarker_saturation.'},{"lightness":'.$googlemapsmarker_lightness.'}]},
								
								{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},
								
								{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
								
								{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},
								
								{"featureType":"water","elementType":"all","stylers":[{"color":"'. $googlemapsmarker_waters.'"},{"visibility":"on"}]}]
							};
							
							var latlng = new google.maps.LatLng('. $googlemapsmarker_clatitude.', '. $googlemapsmarker_clongitude.'); 

							// Get the HTML DOM element that will contain your map 
							// We are using a div with id="map" seen below in the <body>
							var mapElement = document.getElementById(\'map-'.$ia++.'\');

							// Create the Google Map using out element and options defined above
							var map = new google.maps.Map(mapElement, mapOptions);
							
							var infowindow = new google.maps.InfoWindow({
							  maxWidth: '.$googlemapsmarker_infowindow_width.'
							});

							
							var marker, i;

							for (i = 0; i < locations.length; i++) {  
							  marker = new google.maps.Marker({
								draggable: true,
								position: new google.maps.LatLng(locations[i][1], locations[i][2]),
								icon: \''.$googlemapsmarker_img.'\',
								title: \''.$googlemapsmarker_title.'\',
								animation: google.maps.Animation.DROP,
								map: map
							  });

							  google.maps.event.addListener(marker, \'click\', (function(marker, i) {
								return function() {
								  infowindow.setContent(locations[i][0]);
								  infowindow.open(map, marker);
								}
							  })(marker, i));
							}
						}
				</script>
			
				<div id="map-'.$ib++.'"></div>
			
			</div>
		
				';
				
		return $output;
	}
	

	/**
	 * Grid Gallery Content Items Shortcode
	 */
	public function google_maps_content_shortcode( $atts, $content = null ) {
	
		$output = 
		$el_class = 
		$googlemapsmarker_title = 
		$googlemapsmarker_content = 
		$googlemapsmarker_latitude = 
		$googlemapsmarker_longitude = 
		$use_theme_fonts = 
		$google_fonts = 
		$font_container = 
		
		'';

		extract( 
			shortcode_atts( 
				array(
					'el_class' => '',
					'googlemapsmarker_title' => '',
					'googlemapsmarker_content' => '',
					'googlemapsmarker_latitude' => '',
					'googlemapsmarker_longitude' => '',
					'use_theme_fonts' => '',
					'google_fonts' => '',
					'font_container' => '',
				), $atts 
			) 
		);
		
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
		
		$output = ' 
					  [\'<' . $font_container_data['values']['tag'] . ' ' . $style . '>'.$googlemapsmarker_title.'</' . $font_container_data['values']['tag'] . '> '.$googlemapsmarker_content.' \', '.$googlemapsmarker_latitude.', '.$googlemapsmarker_longitude.', 1],
				  ';
				  
		return $output;
	}
	
}


	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_google_maps extends WPBakeryShortCodesContainer {

		}
	}

	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode')){
		class WPBakeryShortCode_google_maps_content extends WPBakeryShortCode {

		}
	}
// Finally initialize code
new VcmpGoogleMaps();

	