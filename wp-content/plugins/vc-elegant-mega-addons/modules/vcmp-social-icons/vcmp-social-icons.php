<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Social Icons
 * Description: Animated social icons shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpSocialIcons extends VcmpModule{

	const slug = 'vcmp_social_icons';
	const base = 'vcmp_social_icons';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("Animated Social Icons", "VCMP_SLUG"),
            "description" 	=> __("Add animated social icons to your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "vc_socialallinone_class",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_socialallinone.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_socialallinone_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
			
				array(
						"type" => "dropdown",
						"heading" => __( "Animation", "VCMP_SLUG" ),
						"param_name" => "socialallinone_animation",
						"description" => __( "Please choose animation color for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Grow", "VCMP_SLUG" ) => "hvr-grow",
								__( "Shrink", "VCMP_SLUG" ) => "hvr-shrink",
								__( "Pulse", "VCMP_SLUG" ) => "hvr-pulse",
								__( "Pulse Grow", "VCMP_SLUG" ) => "hvr-pulse-grow",
								__( "Pulse Shrink", "VCMP_SLUG" ) => "hvr-pulse-shrink",
								__( "Push", "VCMP_SLUG" ) => "hvr-push",
								__( "Pop", "VCMP_SLUG" ) => "hvr-pop",
								__( "Bounce In", "VCMP_SLUG" ) => "hvr-bounce-in",
								__( "Bounce Out", "VCMP_SLUG" ) => "hvr-bounce-out",
								__( "Rotate", "VCMP_SLUG" ) => "hvr-rotate",
								__( "Grow Rotate", "VCMP_SLUG" ) => "hvr-grow-rotate",
								__( "Float", "VCMP_SLUG" ) => "hvr-float",
								__( "Sink", "VCMP_SLUG" ) => "hvr-sink",
								__( "Bob", "VCMP_SLUG" ) => "hvr-bob",
								__( "Hang", "VCMP_SLUG" ) => "hvr-hang",
								__( "Skew", "VCMP_SLUG" ) => "hvr-skew",
								__( "Skew Forward", "VCMP_SLUG" ) => "hvr-skew-forward",
								__( "Skew Backward", "VCMP_SLUG" ) => "hvr-skew-backward",
								__( "Wobble Horizontal", "VCMP_SLUG" ) => "hvr-wobble-horizontal",
								__( "Wobble Vertical", "VCMP_SLUG" ) => "hvr-wobble-vertical",
								__( "Wobble To Bottom Right", "VCMP_SLUG" ) => "hvr-wobble-to-bottom-right",
								__( "Wobble To Top Right", "VCMP_SLUG" ) => "hvr-wobble-to-top-right",
								__( "Wobble Top", "VCMP_SLUG" ) => "hvr-wobble-top",
								__( "Wobble Bottom", "VCMP_SLUG" ) => "hvr-wobble-bottom",
								__( "Wobble Skew", "VCMP_SLUG" ) => "hvr-wobble-skew",
								__( "Buzz", "VCMP_SLUG" ) => "hvr-buzz",
								__( "Buzz Out", "VCMP_SLUG" ) => "hvr-buzz-out",
								__( "Fade", "VCMP_SLUG" ) => "hvr-fade",
								__( "Back Pulse", "VCMP_SLUG" ) => "hvr-back-pulse",
								__( "Sweep To Right", "VCMP_SLUG" ) => "hvr-sweep-to-right",
								__( "Sweep To Left", "VCMP_SLUG" ) => "hvr-sweep-to-left",
								__( "Sweep To Bottom", "VCMP_SLUG" ) => "hvr-sweep-to-bottom",
								__( "Sweep To Top", "VCMP_SLUG" ) => "hvr-sweep-to-top",
								__( "Bounce To Right", "VCMP_SLUG" ) => "hvr-bounce-to-right",
								__( "Bounce To Left", "VCMP_SLUG" ) => "hvr-bounce-to-left",
								__( "Bounce To Bottom", "VCMP_SLUG" ) => "hvr-bounce-to-bottom",
								__( "Bounce To Top", "VCMP_SLUG" ) => "hvr-bounce-to-top",
								__( "Radial Out", "VCMP_SLUG" ) => "hvr-radial-out",
								__( "Radial In", "VCMP_SLUG" ) => "hvr-radial-in",
								__( "Rectangle In", "VCMP_SLUG" ) => "hvr-rectangle-in",
								__( "Rectangle Out", "VCMP_SLUG" ) => "hvr-rectangle-out",
								__( "Shutter In Horizontal", "VCMP_SLUG" ) => "hvr-shutter-in-horizontal",
								__( "Shutter Out Horizontal", "VCMP_SLUG" ) => "hvr-shutter-out-horizontal",
								__( "Shutter In Vertical", "VCMP_SLUG" ) => "hvr-shutter-in-vertical",
								__( "Shutter Out Vertical", "VCMP_SLUG" ) => "hvr-shutter-out-vertical",
								__( "Border Fade", "VCMP_SLUG" ) => "hvr-border-fade",
								__( "Hollow", "VCMP_SLUG" ) => "hvr-hollow",
								__( "Trim", "VCMP_SLUG" ) => "hvr-trim",
								__( "Ripple Out", "VCMP_SLUG" ) => "hvr-ripple-out",
								__( "Ripple In", "VCMP_SLUG" ) => "hvr-ripple-in",
								__( "Outline Out", "VCMP_SLUG" ) => "hvr-outline-out",
								__( "Outline In", "VCMP_SLUG" ) => "hvr-outline-in",
								__( "Round Corners", "VCMP_SLUG" ) => "hvr-round-corners",
								__( "Underline From Left", "VCMP_SLUG" ) => "hvr-underline-from-left",
								__( "Underline From Right", "VCMP_SLUG" ) => "hvr-underline-from-right",
								__( "Reveal", "VCMP_SLUG" ) => "hvr-reveal",
								__( "Underline Reveal", "VCMP_SLUG" ) => "hvr-underline-from-right",
								__( "Overline Reveal", "VCMP_SLUG" ) => "hvr-overline-reveal",
								__( "Overline From Left", "VCMP_SLUG" ) => "hvr-overline-from-left",
								__( "Overline From Center", "VCMP_SLUG" ) => "hvr-overline-from-center",
								__( "Overline From Right", "VCMP_SLUG" ) => "hvr-overline-from-right",
								__( "Shadow", "VCMP_SLUG" ) => "hvr-shadow",
								__( "Grow Shadow", "VCMP_SLUG" ) => "hvr-grow-shadow",
								__( "Float Shadow", "VCMP_SLUG" ) => "hvr-float-shadow",
								__( "Glow", "VCMP_SLUG" ) => "hvr-glow",
								__( "Grow Shadow", "VCMP_SLUG" ) => "hvr-grow-shadow",
								__( "Float Shadow", "VCMP_SLUG" ) => "hvr-float-shadow",
								__( "Glow", "VCMP_SLUG" ) => "hvr-glow",
								__( "Shadow Radial", "VCMP_SLUG" ) => "hvr-shadow-radial",
								__( "Box Shadow Outset", "VCMP_SLUG" ) => "hvr-box-shadow-outset",
								__( "Box Shadow Inset", "VCMP_SLUG" ) => "hvr-box-shadow-inset",
								__( "Bubble Top", "VCMP_SLUG" ) => "hvr-bubble-top",
								__( "Bubble Right", "VCMP_SLUG" ) => "hvr-bubble-right",
								__( "Bubble Bottom", "VCMP_SLUG" ) => "hvr-bubble-bottom",
								__( "Bubble Left", "VCMP_SLUG" ) => "hvr-bubble-left",
								__( "Bubble Float Top", "VCMP_SLUG" ) => "hvr-bubble-float-top",
								__( "Bubble Float Right", "VCMP_SLUG" ) => "hvr-bubble-float-right",
								__( "Bubble Float Bottom", "VCMP_SLUG" ) => "hvr-bubble-float-bottom",
								__( "Bubble Float Left", "VCMP_SLUG" ) => "hvr-bubble-float-left",
								__( "Curl Top Left", "VCMP_SLUG" ) => "hvr-curl-top-left",
								__( "Curl Top Right", "VCMP_SLUG" ) => "hvr-curl-top-right",
								__( "Curl Bottom Right", "VCMP_SLUG" ) => "hvr-curl-bottom-right",
								__( "Curl Bottom Left", "VCMP_SLUG" ) => "hvr-curl-bottom-left",
							)
				),
				
				array(
						"type" => "dropdown",
						"heading" => __( "Background Style", "VCMP_SLUG" ),
						"param_name" => "socialallinone_background_style",
						"description" => __( "Please choose background style for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Circle", "VCMP_SLUG" ) => "circle-soc",
								__( "Circle outline", "VCMP_SLUG" ) => "circle-outline-soc",
								__( "Boxed", "VCMP_SLUG" ) => "boxed-soc",
								__( "Boxed outline", "VCMP_SLUG" ) => "boxed-outline-soc"
							)
				),
              
				array(
						"type" => "dropdown",
						"heading" => __( "Alignment", "VCMP_SLUG" ),
						"param_name" => "socialallinone_alignment",
						"description" => __( "Please choose alignment for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
						"value" => array(
								__( "Default None", "VCMP_SLUG" ) => "",
								__( "Vertical", "VCMP_SLUG" ) => "vertical-social",
								__( "Horizontal", "VCMP_SLUG" ) => "horizontal-social"
							)
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Icon Width/Height", "VCMP_SLUG" ),
					  	"param_name" => "socialallinone_icon_wh",
					  	"description" => __( "Please enter icon size for social icons. Width and Height will be calculated together Ex: 30px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "textfield",
					  	"heading" => __( "Icon Font Size", "VCMP_SLUG" ),
					  	"param_name" => "socialallinone_icon_font_size",
					  	"description" => __( "Please enter icon font size for social icons. Ex: 14px", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Icon Color", "VCMP_SLUG" ),
					  	"param_name" => "socialallinone_icon_color",
					  	"description" => __( "Please choose icon color for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Background Color", "VCMP_SLUG" ),
					  	"param_name" => "socialallinone_background_color",
					  	"description" => __( "Please choose background color for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
				
				array( 
					  	"type" => "colorpicker",
					  	"heading" => __( "Border Color", "VCMP_SLUG" ),
					  	"param_name" => "socialallinone_border_color",
					  	"description" => __( "Please choose border color for social icons.", "VCMP_SLUG" ),
						"group" => __( "Settings", "VCMP_SLUG" ),
						'admin_label' => true,
					  	"value" => ""
				),
				
			  
				array( 
					"type" => "textfield",
					"heading" => __( "500PX Profile", "VCMP_SLUG" ),
					"param_name" => "px",
					"description" => __( "Please enter in your 500PX URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Adn Profile", "VCMP_SLUG" ),
					"param_name" => "adn",
					"description" => __( "Please enter in your Adn URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Amazon Profile", "VCMP_SLUG" ),
					"param_name" => "amazon",
					"description" => __( "Please enter in your Amazon URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Android Profile", "VCMP_SLUG" ),
					"param_name" => "android",
					"description" => __( "Please enter in your Android URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Angellist Profile", "VCMP_SLUG" ),
					"param_name" => "angellist",
					"description" => __( "Please enter in your Angellist URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Apple Profile", "VCMP_SLUG" ),
					"param_name" => "apple",
					"description" => __( "Please enter in your Apple URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Behance Profile", "VCMP_SLUG" ),
					"param_name" => "behance",
					"description" => __( "Please enter in your Behance URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Bitbucket Profile", "VCMP_SLUG" ),
					"param_name" => "bitbucket",
					"description" => __( "Please enter in your Bitbucket URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Email Address", "VCMP_SLUG" ),
					"param_name" => "email",
					"description" => __( "Please enter in your Email address.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Bitcoin Profile", "VCMP_SLUG" ),
					"param_name" => "bitcoin",
					"description" => __( "Please enter in your Bitcoin URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Bluetooth Support", "VCMP_SLUG" ),
					"param_name" => "bluetooth",
					"description" => __( "Please enter in your Bluetooth URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Buysellads Profile", "VCMP_SLUG" ),
					"param_name" => "buysellads",
					"description" => __( "Please enter in your Buysellads URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Credit Card Amex Support", "VCMP_SLUG" ),
					"param_name" => "ccamex",
					"description" => __( "Please enter in your Credit Card Amex URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Credit Card Dinners Support", "VCMP_SLUG" ),
					"param_name" => "ccdiners",
					"description" => __( "Please enter in your Credit Card Dinners URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Credit Card Discover Support", "VCMP_SLUG" ),
					"param_name" => "ccdiscover",
					"description" => __( "Please enter in your Credit Card Discover URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Credit Card Master Support", "VCMP_SLUG" ),
					"param_name" => "ccmastercard",
					"description" => __( "Please enter in your Credit Card Master URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Paypal Support", "VCMP_SLUG" ),
					"param_name" => "ccpaypal",
					"description" => __( "Please enter in your Paypal URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Stripe Support", "VCMP_SLUG" ),
					"param_name" => "ccstripe",
					"description" => __( "Please enter in your Stripe URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Credit Card Visa Support", "VCMP_SLUG" ),
					"param_name" => "ccvisa",
					"description" => __( "Please enter in your Credit Card Visa URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Chrome Support", "VCMP_SLUG" ),
					"param_name" => "chrome",
					"description" => __( "Please enter in your Chrome URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Codepen Profile", "VCMP_SLUG" ),
					"param_name" => "codepen",
					"description" => __( "Please enter in your Codepen URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Codiepie Profile", "VCMP_SLUG" ),
					"param_name" => "codiepie",
					"description" => __( "Please enter in your Codiepie URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Connectdevelop Profile", "VCMP_SLUG" ),
					"param_name" => "connectdevelop",
					"description" => __( "Please enter in your Connectdevelop URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "CSS3 Support", "VCMP_SLUG" ),
					"param_name" => "css3",
					"description" => __( "Please enter in your CSS3 Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Delicious Profile", "VCMP_SLUG" ),
					"param_name" => "delicious",
					"description" => __( "Please enter in your Delicious URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Deviant Art Profile", "VCMP_SLUG" ),
					"param_name" => "deviantart",
					"description" => __( "Please enter in your Deviant Art URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Digg Profile", "VCMP_SLUG" ),
					"param_name" => "digg",
					"description" => __( "Please enter in your Digg URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Dribbble Profile", "VCMP_SLUG" ),
					"param_name" => "dribbble",
					"description" => __( "Please enter in your Dribbble URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Dropbox Profile", "VCMP_SLUG" ),
					"param_name" => "dropbox",
					"description" => __( "Please enter in your Dropbox URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Drupal Profile", "VCMP_SLUG" ),
					"param_name" => "drupal",
					"description" => __( "Please enter in your Drupal URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "IE Edge Support", "VCMP_SLUG" ),
					"param_name" => "edge",
					"description" => __( "Please enter in your IE Edge Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Facebook Profile", "VCMP_SLUG" ),
					"param_name" => "facebook",
					"description" => __( "Please enter in your Facebook URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Firefox Support", "VCMP_SLUG" ),
					"param_name" => "firefox",
					"description" => __( "Please enter in your Firefox Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Flickr Profile", "VCMP_SLUG" ),
					"param_name" => "flickr",
					"description" => __( "Please enter in your Flickr URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Forumbee Profile", "VCMP_SLUG" ),
					"param_name" => "forumbee",
					"description" => __( "Please enter in your Forumbee URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Foursquare Profile", "VCMP_SLUG" ),
					"param_name" => "foursquare",
					"description" => __( "Please enter in your Foursquare URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Github Profile", "VCMP_SLUG" ),
					"param_name" => "github",
					"description" => __( "Please enter in your Github URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Google Plus Profile", "VCMP_SLUG" ),
					"param_name" => "google",
					"description" => __( "Please enter in your Google Plus URL.", "VCMP_SLUG" ),
					"value" => ""
				),

				array( 
					"type" => "textfield",
					"heading" => __( "Houzz Profile", "VCMP_SLUG" ),
					"param_name" => "houzz",
					"description" => __( "Please enter in your Houzz URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "HTML5 Support", "VCMP_SLUG" ),
					"param_name" => "html5",
					"description" => __( "Please enter in your HTML5 Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Instagram Profile", "VCMP_SLUG" ),
					"param_name" => "instagram",
					"description" => __( "Please enter in your Instagram URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Internet Explorer Support", "VCMP_SLUG" ),
					"param_name" => "explorer",
					"description" => __( "Please enter in your Internet Explorer Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Joomla Support", "VCMP_SLUG" ),
					"param_name" => "joomla",
					"description" => __( "Please enter in your Joomla Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Jsfiddle Profile", "VCMP_SLUG" ),
					"param_name" => "jsfiddle",
					"description" => __( "Please enter in your Jsfiddle URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Lastfm Profile", "VCMP_SLUG" ),
					"param_name" => "lastfm",
					"description" => __( "Please enter in your Lastfm URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Linked In Profile", "VCMP_SLUG" ),
					"param_name" => "linkedin",
					"description" => __( "Please enter in your Linked In URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Linux Support", "VCMP_SLUG" ),
					"param_name" => "linux",
					"description" => __( "Please enter in your Linux Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Maxcdn Support", "VCMP_SLUG" ),
					"param_name" => "maxcdn",
					"description" => __( "Please enter in your Maxcdn URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Odnoklassniki Profile", "VCMP_SLUG" ),
					"param_name" => "odnoklassniki",
					"description" => __( "Please enter in your Odnoklassniki URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Opencart Support", "VCMP_SLUG" ),
					"param_name" => "opencart",
					"description" => __( "Please enter in your Opencart Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Openid Profile", "VCMP_SLUG" ),
					"param_name" => "openid",
					"description" => __( "Please enter in your Openid URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Opera Support", "VCMP_SLUG" ),
					"param_name" => "opera",
					"description" => __( "Please enter in your Opera Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Optin Monster Profile", "VCMP_SLUG" ),
					"param_name" => "optinmonster",
					"description" => __( "Please enter in your Optin Monster URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "PageLines Profile", "VCMP_SLUG" ),
					"param_name" => "pagelines",
					"description" => __( "Please enter in your PageLines URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Paypal Profile", "VCMP_SLUG" ),
					"param_name" => "paypal",
					"description" => __( "Please enter in your Paypal URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Pinterest Profile", "VCMP_SLUG" ),
					"param_name" => "pinterest",
					"description" => __( "Please enter in your Pinterest URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "QQ Profile", "VCMP_SLUG" ),
					"param_name" => "qq",
					"description" => __( "Please enter in your QQ URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Rebel Profile", "VCMP_SLUG" ),
					"param_name" => "rebel",
					"description" => __( "Please enter in your Rebel URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Reddit Profile", "VCMP_SLUG" ),
					"param_name" => "reddit",
					"description" => __( "Please enter in your Reddit URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Safari Support", "VCMP_SLUG" ),
					"param_name" => "safari",
					"description" => __( "Please enter in your Safari Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Scribd Profile", "VCMP_SLUG" ),
					"param_name" => "scribd",
					"description" => __( "Please enter in your Scribd URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Sellsy Profile", "VCMP_SLUG" ),
					"param_name" => "sellsy",
					"description" => __( "Please enter in your Sellsy URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Share Profile", "VCMP_SLUG" ),
					"param_name" => "sharealt",
					"description" => __( "Please enter in your Share URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Skyatlas Profile", "VCMP_SLUG" ),
					"param_name" => "skyatlas",
					"description" => __( "Please enter in your Skyatlas URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Skype Profile", "VCMP_SLUG" ),
					"param_name" => "skype",
					"description" => __( "Please enter in your Skype URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Slack Support", "VCMP_SLUG" ),
					"param_name" => "slack",
					"description" => __( "Please enter in your Slack Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Slideshare Support", "VCMP_SLUG" ),
					"param_name" => "slideshare",
					"description" => __( "Please enter in your Slideshare URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Soundcloud Profile", "VCMP_SLUG" ),
					"param_name" => "soundcloud",
					"description" => __( "Please enter in your Soundcloud URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Spotify Profile", "VCMP_SLUG" ),
					"param_name" => "spotify",
					"description" => __( "Please enter in your Spotify URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Stackexchange Profile", "VCMP_SLUG" ),
					"param_name" => "stackexchange",
					"description" => __( "Please enter in your Stackexchange URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Stumbleupon Profile", "VCMP_SLUG" ),
					"param_name" => "stumbleupon",
					"description" => __( "Please enter in your Stumbleupon URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Tripadvisor Profile", "VCMP_SLUG" ),
					"param_name" => "tripadvisor",
					"description" => __( "Please enter in your Tripadvisor URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Tumblr Profile", "VCMP_SLUG" ),
					"param_name" => "tumblr",
					"description" => __( "Please enter in your Tumblr URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Twitch Profile", "VCMP_SLUG" ),
					"param_name" => "twitch",
					"description" => __( "Please enter in your Twitch URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Twitter Profile", "VCMP_SLUG" ),
					"param_name" => "twitter",
					"description" => __( "Please enter in your Twitter URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "USB Support", "VCMP_SLUG" ),
					"param_name" => "usb",
					"description" => __( "Please enter in your USB Support URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Vimeo Profile", "VCMP_SLUG" ),
					"param_name" => "vimeo",
					"description" => __( "Please enter in your Vimeo URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Vine Profile", "VCMP_SLUG" ),
					"param_name" => "vine",
					"description" => __( "Please enter in your Vine URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "VK Profile", "VCMP_SLUG" ),
					"param_name" => "vk",
					"description" => __( "Please enter in your VK URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Wechat Profile", "VCMP_SLUG" ),
					"param_name" => "wechat",
					"description" => __( "Please enter in your Wechat URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Weibo Profile", "VCMP_SLUG" ),
					"param_name" => "weibo",
					"description" => __( "Please enter in your Weibo URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Whatsapp Profile", "VCMP_SLUG" ),
					"param_name" => "whatsapp",
					"description" => __( "Please enter in your Whatsapp URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Wikipedia Profile", "VCMP_SLUG" ),
					"param_name" => "wikipedia",
					"description" => __( "Please enter in your Wikipedia URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Windows Profile", "VCMP_SLUG" ),
					"param_name" => "windows",
					"description" => __( "Please enter in your Windows URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "WordPress Profile", "VCMP_SLUG" ),
					"param_name" => "wordpress",
					"description" => __( "Please enter in your WordPress URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Xing Profile", "VCMP_SLUG" ),
					"param_name" => "xing",
					"description" => __( "Please enter in your Xing URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Yahoo! Profile", "VCMP_SLUG" ),
					"param_name" => "yahoo",
					"description" => __( "Please enter in your Yahoo! URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Yelp Profile", "VCMP_SLUG" ),
					"param_name" => "yelp",
					"description" => __( "Please enter in your Yelp URL.", "VCMP_SLUG" ),
					"value" => ""
				),
				
				array( 
					"type" => "textfield",
					"heading" => __( "Youtube Profile", "VCMP_SLUG" ),
					"param_name" => "youtube",
					"description" => __( "Please enter in your Youtube URL.", "VCMP_SLUG" ),
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
			'socialallinone_alignment' => '',
			'socialallinone_icon_wh' => '',
			'socialallinone_icon_font_size' => '',
			'socialallinone_icon_color' => '',
			'socialallinone_background_color' => '',
			'socialallinone_background_style' => '',
			'socialallinone_border_color' => '',
			'socialallinone_animation' => '',
		), $atts ) );

		wp_enqueue_style( 'vc_socialallinonestyle', VCMP_URL . 'modules/vcmp-social-icons/assets/vc_socialallinonestyle.css');
		wp_enqueue_style( 'vcmp_hover', VCMP_URL . 'assets/vcmp_hover.css');
	  
    $output .= '<style>.'.$socialallinone_background_style.' .vcmp-socials a {width: '.$socialallinone_icon_wh.'; height: '.$socialallinone_icon_wh.' } .'.$socialallinone_background_style.' .vcmp-socials i { font-size: '.$socialallinone_icon_font_size.'; color:'.$socialallinone_icon_color.' } .'.$socialallinone_background_style.' a { background: '.$socialallinone_background_color.'; } .'.$socialallinone_background_style.' a { border-color: '.$socialallinone_border_color.'; } .hvr-bubble-bottom:before { border-color: '.$socialallinone_background_color.' transparent transparent;} .hvr-bubble-left:before { border-color: transparent '.$socialallinone_background_color.' transparent transparent;} .hvr-bubble-float-top:before { border-color: transparent transparent '.$socialallinone_background_color.';} .hvr-bubble-float-right:before { border-color: transparent transparent transparent '.$socialallinone_background_color.';} .hvr-bubble-float-bottom:before { border-color: '.$socialallinone_background_color.' transparent transparent;} .hvr-bubble-float-left:before { border-color: transparent '.$socialallinone_background_color.' transparent transparent;} .hvr-bubble-top:before { border-color: transparent transparent '.$socialallinone_background_color.';} .hvr-bubble-right:before { border-color: transparent transparent transparent '.$socialallinone_background_color.';}</style><div class="'.$el_class.' '.$socialallinone_alignment.' '.$socialallinone_background_style.'">
					<ul class="vcmp-socials '.esc_attr( $el_class ).'">';

		if( isset( $atts['px'] ) )
		$output .= '<li><a href="' . $atts['px'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-500px"></i></a></li>';

		if( isset( $atts['adn'] ) )
		$output .= '<li><a href="' . $atts['adn'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-adn"></i></a></li>';

		if( isset( $atts['amazon'] ) )
		$output .= '<li><a href="' . $atts['amazon'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-amazon"></i></a></li>';

		if( isset( $atts['android'] ) )
		$output .= '<li><a href="' . $atts['android'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-android"></i></a></li>';

		if( isset( $atts['angellist'] ) )
		$output .= '<li><a href="' . $atts['angellist'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-angellist"></i></a></li>';

		if( isset( $atts['apple'] ) )
		$output .= '<li><a href="' . $atts['apple'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-apple"></i></a></li>';

		if( isset( $atts['behance'] ) )
		$output .= '<li><a href="' . $atts['behance'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-behance"></i></a></li>';

		if( isset( $atts['bitbucket'] ) )
		$output .= '<li><a href="' . $atts['bitbucket'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-bitbucket"></i></a></li>';
		
		if( isset( $atts['email'] ) )
		$output .= '<li><a href="' . $atts['email'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-envelope"></i></a></li>';

		if( isset( $atts['bitcoin'] ) )
		$output .= '<li><a href="' . $atts['bitcoin'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-bitcoin"></i></a></li>';

		if( isset( $atts['bluetooth'] ) )
		$output .= '<li><a href="' . $atts['bluetooth'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-bluetooth-b"></i></a></li>';

		if( isset( $atts['buysellads'] ) )
		$output .= '<li><a href="' . $atts['buysellads'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-buysellads"></i></a></li>';

		if( isset( $atts['ccamex'] ) )
		$output .= '<li><a href="' . $atts['ccamex'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-amex"></i></a></li>';

		if( isset( $atts['ccdiners'] ) )
		$output .= '<li><a href="' . $atts['ccdiners'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-diners-club"></i></a></li>';

		if( isset( $atts['ccdiscover'] ) )
		$output .= '<li><a href="' . $atts['ccdiscover'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-discover"></i></a></li>';

		if( isset( $atts['ccmastercard'] ) )
		$output .= '<li><a href="' . $atts['ccmastercard'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-mastercard"></i></a></li>';

		if( isset( $atts['ccpaypal'] ) )
		$output .= '<li><a href="' . $atts['ccpaypal'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-paypal"></i></a></li>';

		if( isset( $atts['ccstripe'] ) )
		$output .= '<li><a href="' . $atts['ccstripe'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-stripe"></i></a></li>';

		if( isset( $atts['ccvisa'] ) )
		$output .= '<li><a href="' . $atts['ccvisa'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-cc-visa"></i></a></li>';

		if( isset( $atts['chrome'] ) )
		$output .= '<li><a href="' . $atts['chrome'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-chrome"></i></a></li>';

		if( isset( $atts['codepen'] ) )
		$output .= '<li><a href="' . $atts['codepen'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-codepen"></i></a></li>';

		if( isset( $atts['codiepie'] ) )
		$output .= '<li><a href="' . $atts['codiepie'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-codiepie"></i></a></li>';

		if( isset( $atts['connectdevelop'] ) )
		$output .= '<li><a href="' . $atts['connectdevelop'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-connectdevelop"></i></a></li>';

		if( isset( $atts['css3'] ) )
		$output .= '<li><a href="' . $atts['css3'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-css3"></i></a></li>';

		if( isset( $atts['delicious'] ) )
		$output .= '<li><a href="' . $atts['delicious'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-delicious"></i></a></li>';

		if( isset( $atts['deviantart'] ) )
		$output .= '<li><a href="' . $atts['deviantart'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-deviantart"></i></a></li>';

		if( isset( $atts['digg'] ) )
		$output .= '<li><a href="' . $atts['digg'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-digg"></i></a></li>';

		if( isset( $atts['dribbble'] ) )
		$output .= '<li><a href="' . $atts['dribbble'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-dribbble"></i></a></li>';

		if( isset( $atts['dropbox'] ) )
		$output .= '<li><a href="' . $atts['dropbox'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-dropbox"></i></a></li>';

		if( isset( $atts['drupal'] ) )
		$output .= '<li><a href="' . $atts['drupal'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-drupal"></i></a></li>';

		if( isset( $atts['edge'] ) )
		$output .= '<li><a href="' . $atts['edge'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-edge"></i></a></li>';

		if( isset( $atts['facebook'] ) )
		$output .= '<li><a href="' . $atts['facebook'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-facebook"></i></a></li>';

		if( isset( $atts['firefox'] ) )
		$output .= '<li><a href="' . $atts['firefox'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-firefox"></i></a></li>';

		if( isset( $atts['flickr'] ) )
		$output .= '<li><a href="' . $atts['flickr'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-flickr"></i></a></li>';

		if( isset( $atts['forumbee'] ) )
		$output .= '<li><a href="' . $atts['forumbee'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-forumbee"></i></a></li>';

		if( isset( $atts['foursquare'] ) )
		$output .= '<li><a href="' . $atts['foursquare'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-foursquare"></i></a></li>';

		if( isset( $atts['github'] ) )
		$output .= '<li><a href="' . $atts['github'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-github"></i></a></li>';

		if( isset( $atts['google'] ) )
		$output .= '<li><a href="' . $atts['google'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-google-plus"></i></a></li>';

		if( isset( $atts['houzz'] ) )
		$output .= '<li><a href="' . $atts['houzz'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-houzz"></i></a></li>';

		if( isset( $atts['html5'] ) )
		$output .= '<li><a href="' . $atts['html5'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-html5"></i></a></li>';
		
		if( isset( $atts['instagram'] ) )
		$output .= '<li><a href="' . $atts['instagram'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-instagram"></i></a></li>';
		
		if( isset( $atts['explorer'] ) )
		$output .= '<li><a href="' . $atts['explorer'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-internet-explorer"></i></a></li>';
		
		if( isset( $atts['joomla'] ) )
		$output .= '<li><a href="' . $atts['joomla'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-joomla"></i></a></li>';
		
		if( isset( $atts['jsfiddle'] ) )
		$output .= '<li><a href="' . $atts['jsfiddle'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-jsfiddle"></i></a></li>';
		
		if( isset( $atts['lastfm'] ) )
		$output .= '<li><a href="' . $atts['lastfm'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-lastfm"></i></a></li>';
		
		if( isset( $atts['linkedin'] ) )
		$output .= '<li><a href="' . $atts['linkedin'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-linkedin"></i></a></li>';
		
		if( isset( $atts['linux'] ) )
		$output .= '<li><a href="' . $atts['linux'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-linux"></i></a></li>';
		
		if( isset( $atts['maxcdn'] ) )
		$output .= '<li><a href="' . $atts['maxcdn'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-maxcdn"></i></a></li>';
		
		if( isset( $atts['odnoklassniki'] ) )
		$output .= '<li><a href="' . $atts['odnoklassniki'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-odnoklassniki"></i></a></li>';
		
		if( isset( $atts['opencart'] ) )
		$output .= '<li><a href="' . $atts['opencart'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-opencart"></i></a></li>';
		
		if( isset( $atts['openid'] ) )
		$output .= '<li><a href="' . $atts['openid'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-openid"></i></a></li>';
		
		if( isset( $atts['opera'] ) )
		$output .= '<li><a href="' . $atts['opera'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-opera"></i></a></li>';
		
		if( isset( $atts['optinmonster'] ) )
		$output .= '<li><a href="' . $atts['optinmonster'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-optin-monster"></i></a></li>';
		
		if( isset( $atts['pagelines'] ) )
		$output .= '<li><a href="' . $atts['pagelines'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-pagelines"></i></a></li>';
		
		if( isset( $atts['paypal'] ) )
		$output .= '<li><a href="' . $atts['paypal'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-paypal"></i></a></li>';
		
		if( isset( $atts['pinterest'] ) )
		$output .= '<li><a href="' . $atts['pinterest'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-pinterest"></i></a></li>';
		
		if( isset( $atts['qq'] ) )
		$output .= '<li><a href="' . $atts['qq'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-qq"></i></a></li>';
		
		if( isset( $atts['rebel'] ) )
		$output .= '<li><a href="' . $atts['rebel'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-rebel"></i></a></li>';
		
		if( isset( $atts['reddit'] ) )
		$output .= '<li><a href="' . $atts['reddit'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-reddit"></i></a></li>';
		
		if( isset( $atts['safari'] ) )
		$output .= '<li><a href="' . $atts['safari'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-safari"></i></a></li>';
		
		if( isset( $atts['scribd'] ) )
		$output .= '<li><a href="' . $atts['scribd'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-scribd"></i></a></li>';
		
		if( isset( $atts['sellsy'] ) )
		$output .= '<li><a href="' . $atts['sellsy'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-sellsy"></i></a></li>';
		
		if( isset( $atts['sharealt'] ) )
		$output .= '<li><a href="' . $atts['sharealt'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-share-alt"></i></a></li>';
		
		if( isset( $atts['skyatlas'] ) )
		$output .= '<li><a href="' . $atts['skyatlas'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-skyatlas"></i></a></li>';
		
		if( isset( $atts['skype'] ) )
		$output .= '<li><a href="' . $atts['skype'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-skype"></i></a></li>';
		
		if( isset( $atts['slack'] ) )
		$output .= '<li><a href="' . $atts['slack'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-slack"></i></a></li>';
		
		if( isset( $atts['slideshare'] ) )
		$output .= '<li><a href="' . $atts['slideshare'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-slideshare"></i></a></li>';
		
		if( isset( $atts['soundcloud'] ) )
		$output .= '<li><a href="' . $atts['soundcloud'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-soundcloud"></i></a></li>';
		
		if( isset( $atts['spotify'] ) )
		$output .= '<li><a href="' . $atts['spotify'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-spotify"></i></a></li>';
		
		if( isset( $atts['stackexchange'] ) )
		$output .= '<li><a href="' . $atts['stackexchange'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-stack-exchange"></i></a></li>';
		
		if( isset( $atts['stumbleupon'] ) )
		$output .= '<li><a href="' . $atts['stumbleupon'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-stumbleupon"></i></a></li>';
		
		if( isset( $atts['tripadvisor'] ) )
		$output .= '<li><a href="' . $atts['tripadvisor'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-tripadvisor"></i></a></li>';
		
		if( isset( $atts['tumblr'] ) )
		$output .= '<li><a href="' . $atts['tumblr'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-tumblr"></i></a></li>';
		
		if( isset( $atts['twitch'] ) )
		$output .= '<li><a href="' . $atts['twitch'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-twitch"></i></a></li>';
		
		if( isset( $atts['twitter'] ) )
		$output .= '<li><a href="' . $atts['twitter'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-twitter"></i></a></li>';
		
		if( isset( $atts['usb'] ) )
		$output .= '<li><a href="' . $atts['usb'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-usb"></i></a></li>';
		
		if( isset( $atts['vimeo'] ) )
		$output .= '<li><a href="' . $atts['vimeo'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-vimeo"></i></a></li>';
		
		if( isset( $atts['vine'] ) )
		$output .= '<li><a href="' . $atts['vine'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-vine"></i></a></li>';
		
		if( isset( $atts['vk'] ) )
		$output .= '<li><a href="' . $atts['vk'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-vk"></i></a></li>';
		
		if( isset( $atts['wechat'] ) )
		$output .= '<li><a href="' . $atts['wechat'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-wechat"></i></a></li>';
		
		if( isset( $atts['weibo'] ) )
		$output .= '<li><a href="' . $atts['weibo'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-weibo"></i></a></li>';
		
		if( isset( $atts['whatsapp'] ) )
		$output .= '<li><a href="' . $atts['whatsapp'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-whatsapp"></i></a></li>';
		
		if( isset( $atts['wikipedia'] ) )
		$output .= '<li><a href="' . $atts['wikipedia'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-wikipedia-w"></i></a></li>';
		
		if( isset( $atts['windows'] ) )
		$output .= '<li><a href="' . $atts['windows'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-windows"></i></a></li>';
		
		if( isset( $atts['wordpress'] ) )
		$output .= '<li><a href="' . $atts['wordpress'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-wordpress"></i></a></li>';
		
		if( isset( $atts['xing'] ) )
		$output .= '<li><a href="' . $atts['xing'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-xing"></i></a></li>';
		
		if( isset( $atts['yahoo'] ) )
		$output .= '<li><a href="' . $atts['yahoo'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-yahoo"></i></a></li>';
		
		if( isset( $atts['yelp'] ) )
		$output .= '<li><a href="' . $atts['yelp'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-yelp"></i></a></li>';
		
		if( isset( $atts['youtube'] ) )
		$output .= '<li><a href="' . $atts['youtube'] . '" target="_blank" class="'.$socialallinone_animation.'"><i class="fa fa-youtube"></i></a></li>';

		$output .= '</ul></div>';

	

      return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpSocialIcons();