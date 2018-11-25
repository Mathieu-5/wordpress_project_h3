<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Doughnut Chart
 * Description: Doughnut chart shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpDoughnutChart extends VcmpModule {
	const slug = 'vcmp_doughnut_chart';
	const base = 'vcmp_doughnut_chart';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}
	public function vc_before_init(){
		vc_map(array(
				"name" => __( "Doughnut Chart", VCMP_SLUG),
				"description" => __("Add doughnut chart to your page.", "VCMP_SLUG"),
				"base" => self::base,
				"category" => "Elegant Mega Addons",
				"icon" => "icon-vc-elegant-mega",
				"params" => array(
					
					array(
						"type" => "dropdown",
						"heading" => __( "Chart type", VCMP_SLUG ),
						"param_name" => "check_doughnut_type",
						"value" => array(
										__( "With Icon", VCMP_SLUG ) => "icon_mode", 
										__( "Custom Field", VCMP_SLUG ) => "field_mode",
										__( "Percentage", VCMP_SLUG ) => "percentage",
									),
						"description" => __( "Select the type of the chart.", VCMP_SLUG ),
						"admin_label" => false
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Icon", VCMP_SLUG ),
						"param_name" => "checkicon",
						"value" => array(
							__( "No Icon", VCMP_SLUG ) => "no_icon", 
							__( "Yes, Display Icon", VCMP_SLUG ) => "custom_icon",
						),
						"description" => __( "Show icon in the chart?", VCMP_SLUG ),
						"admin_label" => false,
						"dependency" => Array(
											'element' => "check_doughnut_type",
											'value' => array( 'icon_mode' ),
											),
					),

					// ---------------------
					// icons from entypo, entypo socials, steadyicons, lineicons, icons
					array(
						"type" => "dropdown",
						"heading" => __( "Icon", VCMP_SLUG ),
						"param_name" => "icon",
						"value" => array(
									'fa-glass' 						=> 	'fa-glass',
									'fa-music' 						=> 	'fa-music',
									'fa-search' 					=> 	'fa-search',
									'fa-envelope-o' 				=> 	'fa-envelope-o',
									'fa-heart' 						=> 	'fa-heart',
									'fa-star' 						=> 	'fa-star',
									'fa-star-o' 					=> 	'fa-star-o',
									'fa-user' 						=> 	'fa-user',
									'fa-film' 						=> 	'fa-film',
									'fa-th-large' 					=> 	'fa-th-large',
									'fa-th' 						=> 	'fa-th',
									'fa-th-list' 					=> 	'fa-th-list',
									'fa-check' 						=> 	'fa-check',
									'fa-times' 						=> 	'fa-times',
									'fa-search-plus' 				=> 	'fa-search-plus',
									'fa-search-minus' 				=> 	'fa-search-minus',
									'fa-power-off' 					=> 	'fa-power-off',
									'fa-signal' 					=> 	'fa-signal',
									'fa-gear' 						=> 	'fa-gear',
									'fa-cog' 						=> 	'fa-cog',
									'fa-trash-o' 					=> 	'fa-trash-o',
									'fa-home' 						=> 	'fa-home',
									'fa-file-o' 					=> 	'fa-file-o',
									'fa-clock-o' 					=> 	'fa-clock-o',
									'fa-road' 						=> 	'fa-road',
									'fa-download' 					=> 	'fa-download',
									'fa-arrow-circle-o-down' 		=> 	'fa-arrow-circle-o-down',
									'fa-arrow-circle-o-up' 			=> 	'fa-arrow-circle-o-up',
									'fa-inbox' 						=> 	'fa-inbox',
									'fa-play-circle-o' 				=> 	'fa-play-circle-o',
									'fa-rotate-right' 				=> 	'fa-rotate-right',
									'fa-repeat' 					=> 	'fa-repeat',
									'fa-refresh' 					=> 	'fa-refresh',
									'fa-list-alt' 					=> 	'fa-list-alt',
									'fa-lock' 						=> 	'fa-lock',
									'fa-flag' 						=> 	'fa-flag',
									'fa-headphones' 				=> 	'fa-headphones',
									'fa-volume-off' 				=> 	'fa-volume-off',
									'fa-volume-down'				=> 	'fa-volume-down',
									'fa-volume-up' 					=> 	'fa-volume-up',
									'fa-qrcode' 					=> 	'fa-qrcode',
									'fa-barcode' 					=> 	'fa-barcode',
									'fa-tag' 						=> 	'fa-tag',
									'fa-tags' 						=> 	'fa-tags',
									'fa-book' 						=> 	'fa-book',
									'fa-bookmark' 					=> 	'fa-bookmark',
									'fa-print' 						=> 	'fa-print',
									'fa-camera' 					=> 	'fa-camera',
									'fa-font' 						=> 	'fa-font',
									'fa-bold' 						=> 	'fa-bold',
									'fa-italic' 					=> 	'fa-italic',
									'fa-text-height' 				=> 	'fa-text-height',
									'fa-text-width' 				=> 	'fa-text-width',
									'fa-align-left' 				=> 	'fa-align-left',
									'fa-align-center' 				=> 	'fa-align-center',
									'fa-align-right' 				=> 	'fa-align-right',
									'fa-align-justify' 				=> 	'fa-align-justify',
									'fa-list'				 		=> 	'fa-list',
									'fa-dedent' 					=> 	'fa-dedent',
									'fa-outdent' 					=> 	'fa-outdent',
									'fa-indent' 					=> 	'fa-indent',
									'fa-video-camera' 				=> 	'fa-video-camera',
									'fa-photo' 						=> 	'fa-photo',
									'fa-image'			 			=> 	'fa-image',
									'fa-picture-o' 					=> 	'fa-picture-o',
									'fa-pencil' 					=> 	'fa-pencil',
									'fa-map-marker' 				=> 	'fa-map-marker',
									'fa-adjust' 					=> 	'fa-adjust',
									'fa-tint' 						=> 	'fa-tint',
									'fa-edit'	 					=> 	'fa-edit',
									'fa-pencil-square-o' 			=> 	'fa-pencil-square-o', 
									'fa-share-square-o' 			=> 	'fa-share-square-o',
									'fa-check-square-o' 			=> 	'fa-check-square-o',
									'fa-arrows' 					=> 	'fa-arrows',
									'fa-step-backward' 				=> 	'fa-step-backward',
									'fa-fast-backward' 				=> 	'fa-fast-backward',
									'fa-backward' 					=> 	'fa-backward',
									'fa-play' 						=> 	'fa-play',
									'fa-pause' 						=> 	'fa-pause',
									'fa-stop' 						=> 	'fa-stop',
									'fa-forward' 					=> 	'fa-forward',
									'fa-fast-forward' 				=> 	'fa-fast-forward',
									'fa-step-forward' 				=> 	'fa-step-forward',
									'fa-eject' 						=> 	'fa-eject',
									'fa-chevron-left' 				=> 	'fa-chevron-left',
									'fa-chevron-right' 				=> 	'fa-chevron-right',
									'fa-plus-circle' 				=> 	'fa-plus-circle',
									'fa-minus-circle' 				=> 	'fa-minus-circle',
									'fa-times-circle' 				=> 	'fa-times-circle',
									'fa-check-circle' 				=> 	'fa-check-circle',
									'fa-question-circle' 			=> 	'fa-question-circle',
									'fa-info-circle' 				=> 	'fa-info-circle',
									'fa-crosshairs' 				=> 	'fa-crosshairs',
									'fa-times-circle-o' 			=> 	'fa-times-circle-o',
									'fa-check-circle-o' 			=> 	'fa-check-circle-o',
									'fa-ban' 						=> 	'fa-ban',
									'fa-arrow-left' 				=> 	'fa-arrow-left',
									'fa-arrow-right' 				=> 	'fa-arrow-right',
									'fa-arrow-up'		 			=> 	'fa-arrow-up',
									'fa-arrow-down' 				=> 	'fa-arrow-down',
									'fa-mail-forward' 				=> 	'fa-mail-forward',
									'fa-share' 						=> 	'fa-share',
									'fa-expand' 					=> 	'fa-expand',
									'fa-compress' 					=> 	'fa-compress',
									'fa-plus' 						=> 	'fa-plus',
									'fa-minus' 						=> 	'fa-minus',
									'fa-asterisk' 					=> 	'fa-asterisk',
									'fa-exclamation-circle' 		=> 	'fa-exclamation-circle',
									'fa-gift' 						=> 	'fa-gift',
									'fa-leaf' 						=> 	'fa-leaf',
									'fa-fire' 						=> 	'fa-fire',
									'fa-eye' 						=> 	'fa-eye',
									'fa-eye-slash' 					=> 	'fa-eye-slash',
									'fa-warning' 					=> 	'fa-warning',
									'fa-exclamation-triangle'	 	=> 	'fa-exclamation-triangle',
									'fa-plane' 						=> 	'fa-plane',
									'fa-calendar' 					=> 	'fa-calendar',
									'fa-random' 					=> 	'fa-random',
									'fa-comment' 					=> 	'fa-comment',
									'fa-magnet' 					=> 	'fa-magnet',
									'fa-chevron-up' 				=> 	'fa-chevron-up',
									'fa-chevron-down' 				=> 	'fa-chevron-down',
									'fa-retweet' 					=> 	'fa-retweet',
									'fa-shopping-cart' 				=> 	'fa-shopping-cart',
									'fa-folder' 					=> 	'fa-folder',
									'fa-folder-open' 				=> 	'fa-folder-open',
									'fa-arrows-v' 					=> 	'fa-arrows-v',
									'fa-arrows-h' 					=> 	'fa-arrows-h',
									'fa-bar-chart-o' 				=> 	'fa-bar-chart-o',
									'fa-twitter-square' 			=> 	'fa-twitter-square',
									'fa-facebook-square' 			=> 	'fa-facebook-square',
									'fa-camera-retro' 				=> 	'fa-camera-retro',
									'fa-key' 						=> 	'fa-key',
									'fa-gears' 						=> 	'fa-gears',
									'fa-cogs' 						=> 	'fa-cogs',
									'fa-comments' 					=> 	'fa-comments',
									'fa-thumbs-o-up' 				=> 	'fa-thumbs-o-up',
									'fa-thumbs-o-down' 				=> 	'fa-thumbs-o-down',
									'fa-star-half' 					=> 	'fa-star-half',
									'fa-heart-o' 					=> 	'fa-heart-o',
									'fa-sign-out' 					=> 	'fa-sign-out',
									'fa-linkedin-square' 			=> 	'fa-linkedin-square',
									'fa-thumb-tack' 				=> 	'fa-thumb-tack',
									'fa-external-link' 				=> 	'fa-external-link',
									'fa-sign-in' 					=> 	'fa-sign-in',
									'fa-trophy' 					=> 	'fa-trophy',
									'fa-github-square' 				=> 	'fa-github-square',
									'fa-upload' 					=> 	'fa-upload',
									'fa-lemon-o' 					=> 	'fa-lemon-o',
									'fa-phone'			 			=> 	'fa-phone',
									'fa-square-o' 					=> 	'fa-square-o',
									'fa-bookmark-o' 				=> 	'fa-bookmark-o',
									'fa-phone-square' 				=> 	'fa-phone-square',
									'fa-twitter' 					=> 	'fa-twitter',
									'fa-facebook' 					=> 	'fa-facebook',
									'fa-github' 					=> 	'fa-github',
									'fa-unlock' 					=> 	'fa-unlock',
									'fa-credit-card' 				=> 	'fa-credit-card',
									'fa-rss' 						=> 	'fa-rss',
									'fa-hdd-o'		 				=> 	'fa-hdd-o',
									'fa-bullhorn' 					=> 	'fa-bullhorn',
									'fa-bell' 						=> 	'fa-bell',
									'fa-certificate' 				=> 	'fa-certificate',
									'fa-hand-o-right' 				=> 	'fa-hand-o-right',
									'fa-hand-o-left'	 			=> 	'fa-hand-o-left',
									'fa-hand-o-up'			 		=> 	'fa-hand-o-up',
									'fa-hand-o-down' 				=> 	'fa-hand-o-down',
									'fa-arrow-circle-left' 			=> 	'fa-arrow-circle-left',
									'fa-arrow-circle-right' 		=> 	'fa-arrow-circle-right',
									'fa-arrow-circle-up' 			=> 	'fa-arrow-circle-up',
									'fa-arrow-circle-down' 			=> 	'fa-arrow-circle-down',
									'fa-globe' 						=> 	'fa-globe',
									'fa-wrench' 					=> 	'fa-wrench',
									'fa-tasks' 						=> 	'fa-tasks',
									'fa-filter' 					=> 	'fa-filter',
									'fa-briefcase' 					=> 	'fa-briefcase',
									'fa-arrows-alt' 				=> 	'fa-arrows-alt',
									'fa-group' 						=> 	'fa-group',
									'fa-users' 						=> 	'fa-users',
									'fa-chain' 						=> 	'fa-chain',
									'fa-link' 						=> 	'fa-link',
									'fa-cloud' 						=> 	'fa-cloud',
									'fa-flask' 						=> 	'fa-flask',
									'fa-cut' 						=> 	'fa-cut',
									'fa-scissors' 					=> 	'fa-scissors',
									'fa-copy' 						=> 	'fa-copy',
									'fa-files-o' 					=> 	'fa-files-o',
									'fa-paperclip' 					=> 	'fa-paperclip',
									'fa-save' 						=> 	'fa-save',
									'fa-floppy-o' 					=> 	'fa-floppy-o',
									'fa-square' 					=> 	'fa-square',
									'fa-navicon' 					=> 	'fa-navicon',
									'fa-reorder' 					=> 	'fa-reorder',
									'fa-bars' 						=> 	'fa-bars',
									'fa-list-ul' 					=> 	'fa-list-ul',
									'fa-list-ol' 					=> 	'fa-list-ol',
									'fa-strikethrough' 				=> 	'fa-strikethrough',
									'fa-underline' 					=> 	'fa-underline',
									'fa-table' 						=> 	'fa-table',
									'fa-magic' 						=> 	'fa-magic',
									'fa-truck' 						=> 	'fa-truck',
									'fa-pinterest' 					=> 	'fa-pinterest',
									'fa-pinterest-square' 			=> 	'fa-pinterest-square',
									'fa-google-plus-square' 		=> 	'fa-google-plus-square',
									'fa-google-plus' 				=> 	'fa-google-plus',
									'fa-money' 						=> 	'fa-money',
									'fa-caret-down' 				=> 	'fa-caret-down',
									'fa-caret-up' 					=> 	'fa-caret-up',
									'fa-caret-left' 				=> 	'fa-caret-left',
									'fa-caret-right' 				=> 	'fa-caret-right',
									'fa-columns' 					=> 	'fa-columns',
									'fa-unsorted' 					=> 	'fa-unsorted',
									'fa-sort' 						=> 	'fa-sort',
									'fa-sort-down' 					=> 	'fa-sort-down',
									'fa-sort-desc' 					=> 	'fa-sort-desc',
									'fa-sort-up' 					=> 	'fa-sort-up',
									'fa-sort-asc' 					=> 	'fa-sort-asc',
									'fa-envelope' 					=> 	'fa-envelope',
									'fa-linkedin' 					=> 	'fa-linkedin',
									'fa-rotate-left' 				=> 	'fa-rotate-left',
									'fa-undo' 						=> 	'fa-undo',
									'fa-legal' 						=> 	'fa-legal',
									'fa-gavel' 						=> 	'fa-gavel',
									'fa-dashboard' 					=> 	'fa-dashboard',
									'fa-tachometer'		 			=> 	'fa-tachometer',
									'fa-comment-o' 					=> 	'fa-comment-o',
									'fa-comments-o' 				=> 	'fa-comments-o',
									'fa-flash' 						=> 	'fa-flash',
									'fa-bolt' 						=> 	'fa-bolt',
									'fa-sitemap' 					=> 	'fa-sitemap',
									'fa-umbrella' 					=> 	'fa-umbrella',
									'fa-paste' 						=> 	'fa-paste',
									'fa-clipboard' 					=> 	'fa-clipboard',
									'fa-lightbulb-o' 				=> 	'fa-lightbulb-o',
									'fa-exchange' 					=> 	'fa-exchange',
									'fa-cloud-download' 			=> 	'fa-cloud-download',
									'fa-cloud-upload' 				=> 	'fa-cloud-upload',
									'fa-user-md' 					=> 	'fa-user-md',
									'fa-stethoscope' 				=> 	'fa-stethoscope',
									'fa-suitcase' 					=> 	'fa-suitcase',
									'fa-bell-o' 					=> 	'fa-bell-o',
									'fa-coffee' 					=> 	'fa-coffee',
									'fa-cutlery' 					=> 	'fa-cutlery',
									'fa-file-text-o' 				=> 	'fa-file-text-o',
									'fa-building-o' 				=> 	'fa-building-o',
									'fa-hospital-o' 				=> 	'fa-hospital-o',
									'fa-ambulance'					=> 	'fa-ambulance',
									'fa-medkit' 					=> 	'fa-medkit',
									'fa-fighter-jet' 				=> 	'fa-fighter-jet',
									'fa-beer' 						=> 	'fa-beer',
									'fa-h-square' 					=> 	'fa-h-square',
									'fa-plus-square' 				=> 	'fa-plus-square',
									'fa-angle-double-left' 			=> 	'fa-angle-double-left',
									'fa-angle-double-right' 		=> 	'fa-angle-double-right',
									'fa-angle-double-up' 			=> 	'fa-angle-double-up',
									'fa-angle-double-down' 			=> 	'fa-angle-double-down',
									'fa-angle-left' 				=> 	'fa-angle-left',
									'fa-angle-right' 				=> 	'fa-angle-right',
									'fa-angle-up' 					=> 	'fa-angle-up',
									'fa-angle-down' 				=> 	'fa-angle-down',
									'fa-desktop' 					=> 	'fa-desktop',
									'fa-laptop' 					=> 	'fa-laptop',
									'fa-tablet' 					=> 	'fa-tablet',
									'fa-mobile-phone' 				=> 	'fa-mobile-phone',
									'fa-mobile' 					=> 	'fa-mobile',
									'fa-circle-o' 					=> 	'fa-circle-o',
									'fa-quote-left' 				=> 	'fa-quote-left',
									'fa-quote-right' 				=> 	'fa-quote-right',
									'fa-spinner' 					=> 	'fa-spinner',
									'fa-circle' 					=> 	'fa-circle',
									'fa-mail-reply' 				=> 	'fa-mail-reply',
									'fa-reply' 						=> 	'fa-reply',
									'fa-github-alt' 				=> 	'fa-github-alt',
									'fa-folder-o' 					=> 	'fa-folder-o',
									'fa-folder-open-o' 				=> 	'fa-folder-open-o',
									'fa-smile-o' 					=> 	'fa-smile-o',
									'fa-frown-o' 					=> 	'fa-frown-o',
									'fa-meh-o' 						=> 	'fa-meh-o',
									'fa-gamepad' 					=> 	'fa-gamepad',
									'fa-keyboard-o' 				=> 	'fa-keyboard-o',
									'fa-flag-o' 					=> 	'fa-flag-o',
									'fa-flag-checkered' 			=> 	'fa-flag-checkered',
									'fa-terminal' 					=> 	'fa-terminal',
									'fa-code' 						=> 	'fa-code',
									'fa-mail-reply-all' 			=> 	'fa-mail-reply-all',
									'fa-reply-all' 					=> 	'fa-reply-all',
									'fa-star-half-empty' 			=> 	'fa-star-half-empty',
									'fa-star-half-full' 			=> 	'fa-star-half-full',
									'fa-star-half-o' 				=> 	'fa-star-half-o',
									'fa-location-arrow' 			=> 	'fa-location-arrow',
									'fa-crop' 						=> 	'fa-crop',
									'fa-code-fork' 					=> 	'fa-code-fork',
									'fa-unlink'						=> 	'fa-unlink',
									'fa-chain-broken' 				=> 	'fa-chain-broken',
									'fa-question' 					=> 	'fa-question',
									'fa-info' 						=> 	'fa-info',
									'fa-exclamation' 				=> 	'fa-exclamation',
									'fa-superscript' 				=> 	'fa-superscript',
									'fa-subscript' 					=> 	'fa-subscript',
									'fa-eraser' 					=> 	'fa-eraser',
									'fa-puzzle-piece' 				=> 	'fa-puzzle-piece',
									'fa-microphone' 				=> 	'fa-microphone',
									'fa-microphone-slash' 			=> 	'fa-microphone-slash',
									'fa-shield' 					=> 	'fa-shield',
									'fa-calendar-o' 				=> 	'fa-calendar-o',
									'fa-fire-extinguisher' 			=> 	'fa-fire-extinguisher',
									'fa-rocket' 					=> 	'fa-rocket',
									'fa-maxcdn'		 				=> 	'fa-maxcdn',
									'fa-chevron-circle-left' 		=> 	'fa-chevron-circle-left', 
									'fa-chevron-circle-right' 		=> 	'fa-chevron-circle-right',
									'fa-chevron-circle-up' 			=> 	'fa-chevron-circle-up',
									'fa-chevron-circle-down' 		=> 	'fa-chevron-circle-down',
									'fa-html5' 						=> 	'fa-html5',
									'fa-css3' 						=> 	'fa-css3',
									'fa-anchor' 					=> 	'fa-anchor',
									'fa-unlock-alt' 				=> 	'fa-unlock-alt',
									'fa-bullseye' 					=> 	'fa-bullseye',
									'fa-ellipsis-h' 				=> 	'fa-ellipsis-h',
									'fa-ellipsis-v' 				=> 	'fa-ellipsis-v',
									'fa-rss-square'		 			=> 	'fa-rss-square',
									'fa-play-circle' 				=> 	'fa-play-circle',
									'fa-ticket' 					=> 	'fa-ticket',
									'fa-minus-square' 				=> 	'fa-minus-square',
									'fa-minus-square-o' 			=> 	'fa-minus-square-o',
									'fa-level-up' 					=> 	'fa-level-up',
									'fa-level-down' 				=> 	'fa-level-down',
									'fa-check-square' 				=> 	'fa-check-square',
									'fa-pencil-square' 				=> 	'fa-pencil-square',
									'fa-external-link-square' 		=> 	'fa-external-link-square',
									'fa-share-square' 				=> 	'fa-share-square',
									'fa-compass' 					=> 	'fa-compass',
									'fa-toggle-down' 				=> 	'fa-toggle-down',
									'fa-caret-square-o-down'		=> 	'fa-caret-square-o-down',
									'fa-toggle-up' 					=> 	'fa-toggle-up',
									'fa-caret-square-o-up'	 		=> 	'fa-caret-square-o-up',
									'fa-toggle-right' 				=> 	'fa-toggle-right',
									'fa-caret-square-o-right' 		=> 	'fa-caret-square-o-right',
									'fa-euro' 						=> 	'fa-euro',
									'fa-eur' 						=> 	'fa-eur',
									'fa-gbp' 						=> 	'fa-gbp',
									'fa-dollar' 					=> 	'fa-dollar',
									'fa-usd' 						=> 	'fa-usd',
									'fa-rupee' 						=> 	'fa-rupee',
									'fa-inr' 						=> 	'fa-inr',
									'fa-cny' 						=> 	'fa-cny',
									'fa-rmb' 						=> 	'fa-rmb',
									'fa-yen' 						=> 	'fa-yen',
									'fa-jpy' 						=> 	'fa-jpy',
									'fa-ruble' 						=> 	'fa-ruble',
									'fa-rouble' 					=> 	'fa-rouble',
									'fa-rub' 						=> 	'fa-rub',
									'fa-won' 						=> 	'fa-won',
									'fa-krw' 						=> 	'fa-krw',
									'fa-bitcoin' 					=> 	'fa-bitcoin',
									'fa-btc' 						=> 	'fa-btc',
									'fa-file' 						=> 	'fa-file',
									'fa-file-text' 					=> 	'fa-file-text',
									'fa-sort-alpha-asc' 			=> 	'fa-sort-alpha-asc',
									'fa-sort-alpha-desc' 			=> 	'fa-sort-alpha-desc',
									'fa-sort-amount-asc' 			=> 	'fa-sort-amount-asc',
									'fa-sort-amount-desc' 			=> 	'fa-sort-amount-desc',
									'fa-sort-numeric-asc' 			=> 	'fa-sort-numeric-asc',
									'fa-sort-numeric-desc' 			=> 	'fa-sort-numeric-desc',
									'fa-thumbs-up' 					=> 	'fa-thumbs-up',
									'fa-thumbs-down' 				=> 	'fa-thumbs-down',
									'fa-youtube-square' 			=> 	'fa-youtube-square',
									'fa-youtube' 					=> 	'fa-youtube',
									'fa-xing' 						=> 	'fa-xing',
									'fa-xing-square' 				=> 	'fa-xing-square',
									'fa-youtube-play' 				=> 	'fa-youtube-play',
									'fa-dropbox' 					=> 	'fa-dropbox',
									'fa-stack-overflow' 			=> 	'fa-stack-overflow',
									'fa-instagram' 					=> 	'fa-instagram',
									'fa-flickr' 					=> 	'fa-flickr',
									'fa-adn' 						=> 	'fa-adn',
									'fa-bitbucket' 					=> 	'fa-bitbucket',
									'fa-bitbucket-square'			=> 	'fa-bitbucket-square',
									'fa-tumblr' 					=> 	'fa-tumblr',
									'fa-tumblr-square' 				=> 	'fa-tumblr-square',
									'fa-long-arrow-down' 			=> 	'fa-long-arrow-down',
									'fa-long-arrow-up' 				=> 	'fa-long-arrow-up',
									'fa-long-arrow-left' 			=> 	'fa-long-arrow-left',
									'fa-long-arrow-right' 			=> 	'fa-long-arrow-right',
									'fa-apple' 						=> 	'fa-apple',
									'fa-windows' 					=> 	'fa-windows',
									'fa-android' 					=> 	'fa-android',
									'fa-linux' 						=> 	'fa-linux',
									'fa-dribbble' 					=> 	'fa-dribbble',
									'fa-skype' 						=> 	'fa-skype',
									'fa-foursquare' 				=> 	'fa-foursquare',
									'fa-trello' 					=> 	'fa-trello',
									'fa-female' 					=> 	'fa-female',
									'fa-male' 						=> 	'fa-male',
									'fa-gittip' 					=> 	'fa-gittip',
									'fa-sun-o' 						=> 	'fa-sun-o',
									'fa-moon-o' 					=> 	'fa-moon-o',
									'fa-archive' 					=> 	'fa-archive',
									'fa-bug' 						=> 	'fa-bug',
									'fa-vk' 						=> 	'fa-vk',
									'fa-weibo' 						=> 	'fa-weibo',
									'fa-renren' 					=> 	'fa-renren',
									'fa-pagelines' 					=> 	'fa-pagelines',
									'fa-stack-exchange' 			=> 	'fa-stack-exchange',
									'fa-arrow-circle-o-right' 		=> 	'fa-arrow-circle-o-right',
									'fa-arrow-circle-o-left' 		=> 	'fa-arrow-circle-o-left',
									'fa-toggle-left' 				=> 	'fa-toggle-left',
									'fa-caret-square-o-left' 		=> 	'fa-caret-square-o-left',
									'fa-dot-circle-o' 				=> 	'fa-dot-circle-o',
									'fa-wheelchair' 				=> 	'fa-wheelchair',
									'fa-vimeo-square' 				=> 	'fa-vimeo-square',
									'fa-turkish-lira' 				=> 	'fa-turkish-lira',
									'fa-try' 						=> 	'fa-try',
									'fa-plus-square-o' 				=> 	'fa-plus-square-o', 
									'fa-space-shuttle' 				=> 	'fa-space-shuttle',
									'fa-slack' 						=> 	'fa-slack',
									'fa-envelope-square' 			=> 	'fa-envelope-square',
									'fa-wordpress' 					=> 	'fa-wordpress',
									'fa-openid' 					=> 	'fa-openid',
									'fa-institution' 				=> 	'fa-institution',
									'fa-bank' 						=> 	'fa-bank',
									'fa-university' 				=> 	'fa-university',
									'fa-mortar-board' 				=> 	'fa-mortar-board',
									'fa-graduation-cap' 			=> 	'fa-graduation-cap',
									'fa-yahoo' 						=> 	'fa-yahoo',
									'fa-google' 					=> 	'fa-google',
									'fa-reddit' 					=> 	'fa-reddit',
									'fa-reddit-square' 				=> 	'fa-reddit-square',
									'fa-stumbleupon-circle' 		=> 	'fa-stumbleupon-circle',
									'fa-stumbleupon' 				=> 	'fa-stumbleupon',
									'fa-delicious' 					=> 	'fa-delicious',
									'fa-digg' 						=> 	'fa-digg',
									'fa-pied-piper-square' 			=> 	'fa-pied-piper-square',
									'fa-pied-piper' 				=> 	'fa-pied-piper',
									'fa-pied-piper-alt' 			=> 	'fa-pied-piper-alt',
									'fa-drupal' 					=> 	'fa-drupal',
									'fa-joomla' 					=> 	'fa-joomla',
									'fa-language' 					=> 	'fa-language',
									'fa-fax' 						=> 	'fa-fax',
									'fa-building' 					=> 	'fa-building',
									'fa-child' 						=> 	'fa-child',
									'fa-paw' 						=> 	'fa-paw',
									'fa-spoon' 						=> 	'fa-spoon',
									'fa-cube' 						=> 	'fa-cube',
									'fa-cubes' 						=> 	'fa-cubes',
									'fa-behance' 					=> 	'fa-behance',
									'fa-behance-square' 			=> 	'fa-behance-square',
									'fa-steam' 						=> 	'fa-steam',
									'fa-steam-square' 				=> 	'fa-steam-square',
									'fa-recycle' 					=> 	'fa-recycle',
									'fa-automobile' 				=> 	'fa-automobile',
									'fa-car' 						=> 	'fa-car',
									'fa-cab' 						=> 	'fa-cab',
									'fa-taxi' 						=> 	'fa-taxi',
									'fa-tree' 						=>	'fa-tree',
									'fa-spotify' 					=> 	'fa-spotify',
									'fa-deviantart' 				=> 	'fa-deviantart',
									'fa-soundcloud' 				=> 	'fa-soundcloud',
									'fa-database' 					=> 	'fa-database',
									'fa-file-pdf-o' 				=> 	'fa-file-pdf-o',
									'fa-file-word-o'	 			=> 	'fa-file-word-o',
									'fa-file-excel-o' 				=> 	'fa-file-excel-o',
									'fa-file-powerpoint-o' 			=> 	'fa-file-powerpoint-o',
									'fa-file-photo-o' 				=> 	'fa-file-photo-o',
									'fa-file-picture-o' 			=> 	'fa-file-picture-o',
									'fa-file-image-o' 				=> 	'fa-file-image-o',
									'fa-file-zip-o' 				=> 	'fa-file-zip-o',
									'fa-file-archive-o' 			=> 	'fa-file-archive-o',
									'fa-file-sound-o' 				=> 	'fa-file-sound-o',
									'fa-file-audio-o' 				=> 	'fa-file-audio-o',
									'fa-file-movie-o' 				=> 	'fa-file-movie-o',
									'fa-file-video-o' 				=> 	'fa-file-video-o',
									'fa-file-code-o' 				=> 	'fa-file-code-o',
									'fa-vine' 						=> 	'fa-vine',
									'fa-codepen' 					=> 	'fa-codepen',
									'fa-jsfiddle' 					=> 	'fa-jsfiddle',
									'fa-life-bouy' 					=> 	'fa-life-bouy',
									'fa-life-saver' 				=> 	'fa-life-saver',
									'fa-support' 					=> 	'fa-support',
									'fa-life-ring' 					=> 	'fa-life-ring',
									'fa-circle-o-notch' 			=> 	'fa-circle-o-notch',
									'fa-ra' 						=> 	'fa-ra',
									'fa-rebel' 						=> 	'fa-rebel',
									'fa-ge' 						=> 	'fa-ge',
									'fa-empire' 					=> 	'fa-empire',
									'fa-git-square' 				=> 	'fa-git-square',
									'fa-git' 						=> 	'fa-git',
									'fa-hacker-news' 				=> 	'fa-hacker-news',
									'fa-tencent-weibo' 				=> 	'fa-tencent-weibo',
									'fa-qq' 						=> 	'fa-qq',
									'fa-wechat' 					=> 	'fa-wechat',
									'fa-weixin' 					=> 	'fa-weixin',
									'fa-send' 						=> 	'fa-send',
									'fa-paper-plane' 				=> 	'fa-paper-plane',
									'fa-send-o' 					=> 	'fa-send-o',
									'fa-paper-plane-o' 				=> 	'fa-paper-plane-o',
									'fa-history' 					=> 	'fa-history',
									'fa-circle-thin' 				=> 	'fa-circle-thin',
									'fa-header' 					=> 	'fa-header',
									'fa-paragraph' 					=> 	'fa-paragraph',
									'fa-sliders' 					=> 	'fa-sliders',
									'fa-share-alt'	 				=> 	'fa-share-alt',
									'fa-share-alt-square' 			=> 	'fa-share-alt-square',
									'fa-bomb' 						=> 	'fa-bomb'
								),
						"description" => __( "Select your icon.", VCMP_SLUG ),
						"dependency" => Array(
											'element' => "checkicon",
											'value' => array( 'custom_icon' ),
											),
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Icon color", VCMP_SLUG ),
						"param_name" => "icon_color",
						"value" => array(
										__( "Theme color default", VCMP_SLUG ) => "",
										__( "Custom color", VCMP_SLUG ) => "custom"
									),
						"description" => __( "Color type for the icon.", VCMP_SLUG ),
						"admin_label" => false,
						"dependency" => Array(
											'element' => "check_doughnut_type",
											'value' => array( 'icon_mode ' ),
											)
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Icon custom color", VCMP_SLUG ),
						"param_name" => "custom_icon_color",
						"description" => __( "Select custom color for icon.", VCMP_SLUG ),
						"dependency" => Array(
											'element' => "icon_color",
											'value' => array( 'custom' ),
											),
					),
					
					// ---------------------
					// check_doughnut_type == field_mode
					array(
						"type" => "textfield",
						"heading" => __( "Chart bar text", VCMP_SLUG ),
						"param_name" => "doughnut_text",
						"description" => __( "Title for the chart.", VCMP_SLUG ),
						"admin_label" => false,
						"dependency" => Array( 
											'element' => "check_doughnut_type",
											'value' => array( 'field_mode' ),
											),
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Field color", VCMP_SLUG ),
						"param_name" => "doughnut_text_color",
						"value" => array(
										__( "Theme color default", VCMP_SLUG ) => "",
										__( "Custom color", VCMP_SLUG ) => "custom",
									),
						"description" => __( "Color type for the title.", VCMP_SLUG ),
						"admin_label" => false,
						"dependency" => Array(
											'element' => "check_doughnut_type",
											'value' => array( 'field_mode' ),
											)
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Test custom color", VCMP_SLUG ),
						"param_name" => "custom_doughnut_text_color",
						"description" => __( "Select custom color the text.", VCMP_SLUG ),
						"dependency" => Array(
											'element' => "doughnut_text_color",
											'value' => array('custom'),
											),
					),

					// ---------------------
					// check_doughnut_type == percentage
					array(
						"type" => "textfield",
						"heading" => __( "Chart percentage", VCMP_SLUG ),
						"param_name" => "doughnut_percentage",
						"description" => __( "Percentage for the bar.", VCMP_SLUG ),
						"admin_label" => false
					),

					array(
						"type" => "textfield",
						"heading" => __( "Text", VCMP_SLUG ),
						"param_name" => "doughnut_percentage_text",
						"description" => __( "Text will be displayed under the chart.", VCMP_SLUG ),
						"value" => "Text",
						"admin_label" => false,
						"dependency" => Array(
											'element' => "check_doughnut_type",
											'value' => array( 'percentage' ),
											),
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Percentage text color", VCMP_SLUG ),
						"param_name" => "percentage_color",
						"value" => array(
										__( "Theme color default", VCMP_SLUG ) => "",
										__( "Custom color", VCMP_SLUG ) => "custom" ,
									),
						"description" => __( "Color type for your percentage text.", VCMP_SLUG ),
						"admin_label" => false,
						"dependency" => Array(
											'element' => "check_doughnut_type",
											'value' => array('percentage' ),
											),
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Percentage Color", VCMP_SLUG ),
						"param_name" => "custom_percentage_color",
						"description" => __( "Color for percentage number.", VCMP_SLUG ),
						"dependency" => Array(
											'element' => "percentage_color",
											'value' => array( 'custom' ),
											),
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Percentage Text Color", VCMP_SLUG ),
						"param_name" => "custom_percentage_text_color",
						"value" => "#000000",
						"description" => __( "Color for percentage text.", VCMP_SLUG ),
						"dependency" => Array(
											'element' => "percentage_color",
											'value' => array( 'custom' ),
											),
					),

					// ---------------------
					// settings
					array(
						"type" => "textfield",
						"heading" => __( "Font & Icon size", VCMP_SLUG ),
						"param-name" => "font_size",
						"description" => __( "Size of the text & icon for the chart.( default = 30px )", VCMP_SLUG ),
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Bar Color", VCMP_SLUG ),
						"param_name" => "bar_color",
						"value" => "#2ABB9B",
						"description" => __( "Color fot the bar.", VCMP_SLUG ),
					),

					array(
						"type" => "colorpicker",
						"heading" => __( "Track Color", VCMP_SLUG ),
						"param_name" => "bartrack_color",
						"value" => "#EBEDEF",
						"description" => __( "Color for the track of the bar.", VCMP_SLUG ),
					),

					array(
						"type" => "textfield",
						"heading" => __( "Chart Size", VCMP_SLUG ),
						"param_name" => "bar_size",
						"description" => __( "Size of the chart.( default = 170 )", VCMP_SLUG ),
						"admin_label" => false,
					),

					array(
						"type" => "textfield",
						"heading" => __( "Bar Width", VCMP_SLUG ),
						"param_name" => "bar_width",
						"description" => __( "Width for the bar.( default = 6 )", VCMP_SLUG ),
						"admin_label" => false,
					),

					array(
						"type" => "dropdown",
						"heading" => __( "Bar edge style", VCMP_SLUG ),
						"param_name" => "line_style",
						"description" => __( "Shape for the corners of the bar" ),
						"value" => array(
										__( "Round", VCMP_SLUG ) => "round",
										__( "Butt", VCMP_SLUG ) => "butt",
										__( "Square", VCMP_SLUG ) => "square",
									),
					),

					array(
						"type" => "textfield",
						"heading" => __( "Extra class name", VCMP_SLUG ),
						"param_name" => "el_class",
						"description" => __( "Extra class to be customized via CSS.", VCMP_SLUG ),
					),

				)
		)); // end vc_map
	} // end vc_before_init

	public function build_shortcode( $atts ) {		
	
		$output = $el_class = $check_doughnut_type = $checkicon = $icon = $icon_color = $custom_icon_color = $doughnut_text = $doughnut_text_color = $custom_doughnut_text_color = $doughnut_percentage = $doughnut_percentage_text = $percentage_color = $custom_percentage_color = $custom_percentage_text_color = $bar_color = $bartrack_color = $bar_size = $bar_width = '';
		
		wp_enqueue_script( 'easy-pie-chart-js', VCMP_URL . 'modules/vcmp-doughnut-chart/assets/js/easypiechart.js', 'jquery', 1.0, true );
		wp_enqueue_script( 'vcmp-doughnut-js', VCMP_URL . 'modules/vcmp-doughnut-chart/assets/js/vcmp-doughnut.js', 'jquery', 1.0, true );
		wp_enqueue_style( 'vc_doughnutchart', VCMP_URL . 'modules/vcmp-doughnut-chart/assets/css/vc_doughnutchart.css');

		extract( shortcode_atts( array(
			'el_class' => '',
			'check_doughnut_type' => '',
			'checkicon' => '',
			'icon' => '',
			'icon_color' => '',
			'custom_icon_color' => '',
			'doughnut_text' => '',
			'doughnut_text_color' => '',
			'custom_doughnut_text_color' => '',
			'doughnut_percentage' => '',
			'doughnut_percentage_text' => '',
			'percentage_color' => '',
			'custom_percentage_color' => '',
			'custom_percentage_text_color' => '',
			'font_size' => '30',
			'bar_color' => '',
			'bartrack_color' => '',
			'bar_size' => '',
			'bar_width' => '',
			'line_style' => 'round',
		), $atts ) );

		// ---------------------
		// set default
		if( !empty( $bar_size ) ) {
			$size_output = $bar_size;
		} else {
			$size_output = 170;
		}

		if( !empty( $bar_width ) ) {
			$line_output = $bar_width;
		} else {
			$line_output = 6;
		}

		// ---------------------
		// variable to output
		$doughnut_output = null;
		$color_icon = null;
		$color_field = null;
		$color_percentage = null;
		$color_text_percentage = null;

		// ---------------------
		// colors
		if ( $icon_color == "custom" ) { 
			$color_icon = ' style="color: '.$custom_icon_color.';" ';
		}

		if ( $doughnut_text_color =="custom" ) { 
			$color_field = ' style="color: '.$custom_doughnut_text_color.';" ';
		}

		if ( $percentage_color == "custom" ) { 
			$color_percentage = ' style="color: '.$custom_percentage_color.';" ';  
			$color_text_percentage = ' style="color: '.$custom_percentage_text_color.';" ';
		}

		// ---------------------
		// output text
		if ( $check_doughnut_type == "field_mode" ) { 
			$doughnut_output = '<span class="field-text"'.$color_field.'>'.$doughnut_text.'</span>';  
		}

		if ( $check_doughnut_type == "percentage" ) { 
			$doughnut_output = '<span class="percentage no-field"'.$color_percentage.'>'.$doughnut_percentage.'</span>';
			$circular_text_output = '<span class="vcmp-doughnut-text"'.$color_text_percentage.'>'.$doughnut_percentage_text.'</span>';
		}

		// ---------------------
		// output icon
		if ( $check_doughnut_type == "icon_mode" && $checkicon == "custom_icon" ) { 
			$doughnut_output = '<span class="field-icon"'.$color_icon.'><i class="'.$icon.'"></i></span>'; 
		}

		// ---------------------
		// output chart
		$output .= '<div'.$class.'  '.esc_attr( $el_class ).' style="font-size: '.$font_size.'px;">';
		$output .= '<div class="vcmp-doughnut" data-barstyle="'.$line_style.'" data-bgcolor="'.$bar_color.'" data-trackcolor ="'.$bartrack_color.'" data-size="'.$size_output.'" data-line="'.$line_output.'" data-percent="'.$doughnut_percentage.'" style="line-height: '.$size_output.'px; text-align: center;">'.$doughnut_output.'</div>';
		$output .= $circular_text_output;
		$output .= '</div>';

		// ---------------------
		// output output
		return $output;
	} // build_shortcode
}
new VcmpDoughnutChart();