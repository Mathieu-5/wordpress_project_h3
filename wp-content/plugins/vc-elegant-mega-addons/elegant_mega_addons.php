<?php

if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/**
 * Plugin Name:       Elegant Mega Addons for Visual Composer
 * Plugin URI:        https://themeofwp.com/elegant-mega-addons-for-visual-composer/
 * Description:       All In One Premium Elegant Mega Addons for <a href="https://bit.ly/1UNVpys" target="_blank">WPBakery Visual Composer</a>. Includes all you need VC elements, predefined templates & presets all in one package.
 * Version:           3.1.7
 * Author:            ThemeofWP.com
 * Author URI:        https://themeofwp.com/
 * Text Domain:       vcmp
 * Requires at least: 3.0
 * Tested up to:      4.9
 * License:           You should have purchased a license from https://codecanyon.net/user/themeofwp/portfolio/
 * Support Forum:     https://themeofwp.com/support/
 */

if(!defined('VCMP_VERSION')){
	define('VCMP_VERSION', '3.1.7');
}

if ( !defined( 'VCMP_PATH' ) )
	define( 'VCMP_PATH', plugin_dir_path( __FILE__ ) );

if ( !defined( 'VCMP_URL' ) )
	define( 'VCMP_URL', plugin_dir_url( __FILE__ ) );

if ( !defined( 'VCMP_SLUG' ) )
	define( 'VCMP_SLUG', 'vcmp' );

register_activation_hook(__FILE__, 'vcmp_plugin_activate');
add_action('admin_init', 'vcmp_activation_redirect');

function vcmp_plugin_activate() {
	add_option('vcmp_plugin_do_activation_redirect', true);
}

function vcmp_activation_redirect() {
	if (get_option('vcmp_plugin_do_activation_redirect', false)) {
		delete_option('vcmp_plugin_do_activation_redirect');
		if(!isset($_GET['activate-multi']) && defined( 'WPB_VC_VERSION' ) ) {
			wp_redirect( admin_url( 'admin.php?page=about-elegant' ) );
		}
	 }
}

require_once( dirname(__FILE__).'/lib/class-vcmp-base.php' );
require_once( dirname(__FILE__).'/lib/class-vcmp-module.php' );
require_once( dirname(__FILE__).'/lib/vc-template-manager.php' );
require_once( dirname(__FILE__).'/lib/params/vcmp-presets/vcmp-presets-preview.php' );

/*-----------------------------------------------------------------------------------*/
/*	Add modules link to plugins page
/*-----------------------------------------------------------------------------------*/
	if( ! function_exists("vcmp_plugin_action_links") ){
		add_filter('plugin_action_links', 'vcmp_plugin_action_links', 10, 2);
		function vcmp_plugin_action_links($links, $file) {
			static $this_plugin;

			if (!$this_plugin) {
				$this_plugin = plugin_basename(__FILE__);
			}

			if ($file == $this_plugin) {
				// The "page" query string value must be equal to the slug
				// of the Settings admin page we defined earlier, which in
				// this case equals "vcmp-settings".
				$modules_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=vcmp">Modules</a>';
				$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=vcmp-settings">Settings</a>';
				array_unshift($links, $modules_link, $settings_link );
			}

			return $links;
		}
	}


/*-----------------------------------------------------------------------------------*/
/*	Initalising Shortcodes In Content and Widget
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Empty paragraph fix
/*-----------------------------------------------------------------------------------*/
    if( ! function_exists("vcmp_shortcode_empty_paragraph_fix") ){
		add_filter('the_content', 'vcmp_shortcode_empty_paragraph_fix');
		function vcmp_shortcode_empty_paragraph_fix($content)
		{
			$array = array (
				'<p>[' => '[',
				']</p>' => ']',
				']<br />' => ']'
			);

			$content = strtr($content, $array);

			return $content;
		}
	}


	/*--------------------------------------------*
	 * Proper way to enqueue scripts and styles
	 *--------------------------------------------*/
	if( ! function_exists("load_vcmp_styles") ){
		add_action( 'wp_enqueue_scripts', 'load_vcmp_styles' );
		function load_vcmp_styles() {
			wp_enqueue_style( 'vcmp_font', plugins_url( '/assets/vcmp_fonts.css', __FILE__ ) );
			wp_enqueue_style( 'vcmp_animate', plugins_url( '/assets/vcmp_animate.css', __FILE__ ) );
			wp_enqueue_script( 'vc_easing', VCMP_URL . 'assets/jquery.easing.min.js', array('jquery'), '1.0', FALSE);
		}
	}

	if( ! function_exists("load_vcmp_admin_styles") ){
		add_action( 'admin_init', 'load_vcmp_admin_styles' );
		function load_vcmp_admin_styles() {
			wp_enqueue_style( 'vcmp_font-awesome-animation', plugins_url( '/assets/font-awesome-animation.min.css', __FILE__ ) );
			wp_enqueue_style( 'vcmp_style', plugins_url( '/assets/vcmp.css', __FILE__ ) );
			wp_enqueue_script( 'vcmp_js', VCMP_URL . 'assets/vcmp.js', array('jquery'), '1.0', FALSE);
		}
	}



	if ( !class_exists ('VCMP')) {
		final class VCMP extends VcmpBase{

			/*--------------------------------------------*
			 * Constants
			 *--------------------------------------------*/
			const module_dir = 'modules';
			const min_vc_version = '4.0';

			/**
			 * Single Instance
			 */
			private static $_instance = null;

			private $_modules_activated = array();
			private $_modules_installed = array();

			private $_module;
			private $_action;

			private $_admin_page;

			private $_plugin_data = array();

			/**
			 * Get Instance
			 */
			public static function getInstance() {
				if ( is_null( self::$_instance ) ) {
					self::$_instance = new self();
				}
				return self::$_instance;
			}

			/**
			 * Constructor
			 */
			private function __construct() {
				// Initialize plugin data
				if( !function_exists( 'get_plugin_data' ) ){
					require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				}
				$this->_plugin_data = get_plugin_data(__FILE__);

				$this->_action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : false;
				$this->_module = isset($_GET['module']) ? sanitize_text_field($_GET['module']) : false;

				add_action( 'init', array( $this, 'activation_hook' ) );

				// Register a deactivation hook for the plugin
				register_deactivation_hook( __FILE__, array( $this, 'deactivation_hook' ) );

				// Run plugins
				add_action( 'plugins_loaded', array( $this, 'init' ) );

				add_action( 'wp_ajax_update_vcmp_modules', array($this,'vcmp_update_modules'));

			}

			/**
			 * Run plugins
			 */
			public function init(){

				// Check dependencies
				//if(!$this->is_vc_activated()) return false;

				// Check ompatibilities
				if(!$this->is_vc_version_compatible()) return false;

				$this->setup_localization();

				$this->load_modules(true);

				add_action( 'admin_init', array( $this, 'admin_init' ) );

				add_action( 'admin_notices', array( $this, 'admin_notices' ) );

				add_action( 'admin_menu', array( $this, 'admin_menu' ) );

			}

		function vcmp_update_modules(){
			$vcmp_modules = array();

			$this->_modules_activated = get_option( 'vcmp_modules', array() );



			foreach($this->_modules_activated as $hangisi => $deactive_all){

				$this->deactivate_module($hangisi);

			}
			$this->flush_modules();

			$this->_modules_activated = array();

			if(isset($_POST['elegant_modules'])){

				foreach($_POST['elegant_modules'] AS $for_activate){
					$sonuc = $this->activate_module($for_activate);

				}

			}

			$this->_modules_activated = get_option( 'vcmp_modules', array() );

			if($this->_modules_activated){
				echo 'success';

			} else {
				echo 'failed';
			}
			die();
		}

			/**
			 * Run on admin_init action
			 */
			public function admin_init(){
				$nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : false;

				switch ($this->_action) {

					case 'activate_module':
							if( wp_verify_nonce( $nonce, 'activate_module' ) && $this->_module ) {
								$this->activate_module($this->_module);
							}else{
								wp_die( __('Invalid request!', VCMP_SLUG) );
							}
						break;

					case 'deactivate_module':
							if( wp_verify_nonce( $nonce, 'deactivate_module' ) && $this->_module ) {
								$this->deactivate_module($this->_module);
							}else{
								wp_die( __('Invalid request!', VCMP_SLUG) );
							}
						break;

					default:
						# code...
						break;
				}

			}

			/**
			 * Add admin page
			 */
			public function admin_menu(){
				$this->_admin_page = add_menu_page(
					$this->_plugin_data['Name'],
					'Elegant Addons',
					'manage_options',
					VCMP_SLUG,
					array($this, 'render_admin_page'),
					plugin_dir_url( __FILE__ ) . 'assets/img/elegant_mega_addons_visual_composer.png'
				);

				add_submenu_page(
					"vcmp",
					__("About",VCMP_SLUG),
					__("About",VCMP_SLUG),
					'manage_options',
					"about-elegant",
					array($this,'vcmp_about_page')
				);

				add_submenu_page(
					"vcmp",
					__("What's New",VCMP_SLUG),
					__("What's New",VCMP_SLUG),
					'manage_options',
					"vcmp-whats-new",
					array($this,'vcmp_whats_new')
				);

				add_submenu_page(
					"vcmp",
					__("Updates",VCMP_SLUG),
					__("Updates",VCMP_SLUG),
					'manage_options',
					"vcmp-updates",
					array($this,'vcmp_updates_page')
				);

				add_action('load-'.$this->_admin_page, array($this, 'flush_modules'));
			}


			/**
			 * Render about page
			 */
			function vcmp_about_page(){

			?>
			<div class="wrap vcmp-page-welcome about-wrap">

				<h1>Welcome to Elegant Mega <?php echo VCMP_VERSION; ?> </h1>
				<div class="about-text">Congratulations! You are about to use most powerful time saver for WordPress ever - All in one elements, templates package Elegant Mega Addons. </div>
				<div class="wp-badge vc-page-logo"> Version <?php echo VCMP_VERSION; ?>	</div>

				<div class="wrap">
					<h2 class="nav-tab-wrapper">
						<a href="<?php admin_url( 'admin.php' );?>?page=about-elegant" data-tab="about-elegant" class="nav-tab nav-tab-active"> <?php _e('About', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp" data-tab="vcmp-modules" class="nav-tab"> <?php _e('Modules', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-whats-new" data-tab="vcmp-whats-new" class="nav-tab"> <?php _e('What\'s New', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-updates" data-tab="vcmp-updates" class="nav-tab"> <?php _e('Updates', VCMP_SLUG); ?> </a>
					</h2>
				</div>

				<div class="vcmp_about_feature feature-section vc_row">

					<div class="about-text">Thanks for purhased Elegant Mega Addons for Visual Composer. The Elegant Mega has a lot of modules. It comes with tons of features such as predefined templates, presets, effects, powerfull & flexible settings.</div>

					<div class="grid-wrapper">
						<div class="col-lg-6 grid-top-column-border">
							<h4><span class="dashicons dashicons-welcome-widgets-menus vcmp_lefticon"></span> Predefined Templates & Presets</h4>
							<p>Now you got 120+ Predefined templates and presets with Elegant Mega Addons. You can simply use them one click in templates section.</p>
						</div>

						<div class="col-lg-6 grid-right-column-border grid-top-column-border">
							<h4><span class="dashicons dashicons-image-rotate-left vcmp_lefticon"></span> One Click Usage</h4>
							<p>Elegant Mega Addons comes with predefined one click template & preset usage. So you can easily use templates & presets like as plugin demo.</p>
						</div>
					</div>

					<div class="grid-wrapper">
						<div class="col-lg-6">
							<h4><span class="dashicons dashicons-admin-plugins vcmp_lefticon"></span> <a href="<?php admin_url( 'admin.php' );?>?page=vcmp">Module Basis Structure</a></h4>
							<p>Elegant Mega Addons comes with module basis structure for the flexible usage. You'll allow to activate/deactivate each <a href="<?php admin_url( 'admin.php' );?>?page=vcmp">module</a> as your needs anytime.</p>
						</div>

						<div class="col-lg-6 grid-right-column-border">
							<h4><span class="dashicons dashicons-image-filter vcmp_lefticon"></span> Tons of Effects</h4>
							<p>Infinity effects & variations usage comes with Elegant Mega Addons in your way. You can apply your own customized shortcodes in anywhere with flexible effects.</p>
						</div>
					</div>

					<div class="grid-wrapper">
						<div class="col-lg-6">
							<h4><span class="dashicons dashicons-admin-tools vcmp_lefticon"></span> Tons of Settings</h4>
							<p>Infinity settings combinations usage comes with Elegant Mega Addons in your way. You can apply your own customized settings in anywhere with flexible settings.</p>
						</div>

						<div class="col-lg-6 grid-right-column-border">
							<h4><span class="dashicons dashicons-image-rotate vcmp_lefticon"></span> Continuous Updates</h4>
							<p>We'll be include continous updates & new module additions in the Elegant Mega Addons. You'll be get latest updates and new modules periodically.</p>
						</div>
					</div>

					<div class="grid-wrapper">
						<div class="col-lg-6">
							<h4><span class="dashicons dashicons-email-alt vcmp_lefticon"></span> <a href="http://themeofwp.com/support/" target="_blank">Premium Support & Documentation</a></h4>
							<p>You are the #1 priority for us! and you'll be get premium <a href="http://themeofwp.com/support/" target="_blank">fastest support</a> anytime from our support team. Your satisfaction is our success.You can access online <a href="http://themeofwp.com/plugins/elegantmegaaddons/doc/" target="_blank">documentation</a></p>
						</div>

						<div class="col-lg-6 grid-right-column-border">
							<h4><span class="dashicons dashicons-editor-paste-text vcmp_lefticon"></span> Fully Translatable</h4>
							<p>Elegant Mega Addons included .mo, .po files and you'll be allow to translate plugin to your language easily. WPML, qTranslate and others supported.</p>
						</div>
					</div>

				</div>

			</div>


			<?php
			}

			/**
			 * Render whats's new page
			 */
			function vcmp_whats_new(){

			?>
			<div class="wrap vcmp-page-welcome about-wrap">

				<h1>Elegant Mega What's New </h1>
				<div class="about-text">New Modules! Sounds good? Keep updated and get more modules.</div>
				<div class="wp-badge vc-page-logo"> Version <?php echo VCMP_VERSION; ?>	</div>

				<div class="wrap">
					<h2 class="nav-tab-wrapper">
						<a href="<?php admin_url( 'admin.php' );?>?page=about-elegant" data-tab="about-elegant" class="nav-tab"> <?php _e('About', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp" data-tab="vcmp-modules" class="nav-tab"> <?php _e('Modules', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-whats-new" data-tab="vcmp-whats-new" class="nav-tab nav-tab-active"> <?php _e('What\'s New', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-updates" data-tab="vcmp-updates" class="nav-tab"> <?php _e('Updates', VCMP_SLUG); ?> </a>
					</h2>
				</div>

				<div class="vcmp_welcome-feature feature-section vc_row">

					<div class="about-text">The Elegant Mega Addons currently has a lot of modules. It will be updated periodically and you'll get much more modules & existing modules will be improved.</div>

					<div class="grid-wrapper">
						<div class="col-lg-6 grid-top-column-border">
							<h4><span class="dashicons dashicons-admin-plugins vcmp_lefticon"></span> Much More Useful Modules</h4>
							<p>Elegant Mega v<?php echo VCMP_VERSION; ?> renewed & improved. Now you'll get more powerfull, flexible tons of settings & tons of addons with Elegant Mega v<?php echo VCMP_VERSION; ?>.</p>
						</div>

						<div class="col-lg-6 grid-right-column-border grid-top-column-border">
							<h4><span class="dashicons dashicons-image-rotate-right vcmp_lefticon"></span> Get Your Freebies</h4>
							<p>Elegant Mega v<?php echo VCMP_VERSION; ?> comes with WordPress theme as gift. Just <a href="http://themeofwp.com/verify/wp-login.php?action=register" target="_blank">click here</a> to verify your license key and claim your WordPress theme ($59 worth) for free.</p>
						</div>
					</div>

					<div class="grid-wrapper">
						<div class="col-lg-6">
							<h4><span class="dashicons dashicons-images-alt2 vcmp_lefticon"></span>New Predefined Templates</h4>
							<p>We are picking up more useful things and implement into the Elegant Mega Addons as module after the strict test. You'll get more usefull more powerful elements with every next updates.</p>
						</div>

						<div class="col-lg-6 grid-right-column-border">
							<h4><span class="dashicons dashicons-admin-settings vcmp_lefticon"></span> Icons, Fonts, Typography, Design</h4>
							<p>Infinity effects & variations usage comes with Elegant Mega Addons in your way. You can apply your own customized shortcodes in anywhere with flexible effects.</p>
						</div>
					</div>

					<div class="grid-wrapper">
						<div class="col-lg-12 nopadding">
							<iframe src="//themeofwp.com/plugins/elegantmegaaddons/change-log.html" frameborder="0" width="100%" height="400px"></iframe>
						</div>
					</div>

				</div>

			</div>

			<?php
			}


			/**
			 * Render updates page
			 */
			function vcmp_updates_page(){

			?>
			<div class="wrap vcmp-page-welcome about-wrap">

				<h1>Elegant Mega Updates </h1>
				<div class="about-text">You can get latest Elegant Mega updates quickly.</div>
				<div class="wp-badge vc-page-logo"> Version <?php echo VCMP_VERSION; ?>	</div>

				<div class="wrap">
					<h2 class="nav-tab-wrapper">
						<a href="<?php admin_url( 'admin.php' );?>?page=about-elegant" data-tab="about-elegant" class="nav-tab"> <?php _e('About', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp" data-tab="vcmp-modules" class="nav-tab"> <?php _e('Modules', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-whats-new" data-tab="vcmp-whats-new" class="nav-tab"> <?php _e('What\'s New', VCMP_SLUG); ?> </a>
						<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-updates" data-tab="vcmp-updates" class="nav-tab nav-tab-active"> <?php _e('Updates', VCMP_SLUG); ?> </a>
					</h2>
				</div>

				<div class="about-text">You can get latest Elegant Mega updates via Envato Market Plugin. You can find <a href="https://envato.github.io/wp-envato-market/dist/envato-market.zip" target="_blank">plugin file here</a>.</div>
				<p>The Envato Market plugin can install WordPress themes and plugins purchased from ThemeForest & CodeCanyon by connecting with the Envato Market API using a secure OAuth personal token. Once your themes & plugins are installed WordPress will periodically check for updates, so keeping your items up to date is as simple as a few clicks.</p>
			</div>

			<?php
			}


			/**
			 * Render admin page
			 */
			public function render_admin_page(){
			?>
			<div class="wrap vcmp-page-welcome about-wrap">
			<h1>Elegant Mega Modules </h1>
			<div class="about-text">Elegant Mega has module basis structure. You can easily activate/deactivate any module as your needs anytime. When you updated plugin, you can check this page and activate new module(s).</div>
			<div class="wp-badge vc-page-logo"> Version <?php echo VCMP_VERSION; ?>	</div>

			<div class="wrap">
				<h2 class="nav-tab-wrapper">
					<a href="<?php admin_url( 'admin.php' );?>?page=about-elegant" data-tab="about-elegant" class="nav-tab"> <?php _e('About', VCMP_SLUG); ?> </a>
					<a href="<?php admin_url( 'admin.php' );?>?page=vcmp" data-tab="vcmp-modules" class="nav-tab nav-tab-active"> <?php _e('Modules', VCMP_SLUG); ?> </a>
					<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-whats-new" data-tab="vcmp-whats-new" class="nav-tab"> <?php _e('What\'s New', VCMP_SLUG); ?> </a>
					<a href="<?php admin_url( 'admin.php' );?>?page=vcmp-updates" data-tab="vcmp-updates" class="nav-tab"> <?php _e('Updates', VCMP_SLUG); ?> </a>
				</h2>
			</div>

			<ul class="subsubsub vcmp_module_count">
				<li class="all"><a href="<?php echo add_query_arg(array('page' => VCMP_SLUG), admin_url( 'admin.php' )) ;?>">All <span class="count">(<?php echo count($this->_modules_installed); ?>)</span></a> |</li>
				<li class="active"><a href="<?php echo add_query_arg(array('page' => VCMP_SLUG, 'filter' => 'active'), admin_url( 'admin.php' )) ;?>">Active <span class="count">(<?php echo count($this->_modules_activated); ?>)</span></a> |</li>
				<li class="inactive"><a href="<?php echo add_query_arg(array('page' => VCMP_SLUG, 'filter' => 'inactive'), admin_url( 'admin.php' )) ;?>">Inactive <span class="count">(<?php echo (count($this->_modules_installed) - count($this->_modules_activated)); ?>)</span></a></li>
			</ul>

			<div class="tablenav top">

				<div id="msg"></div>

			<form method="post" id="vcmp_modules_form">
			<input type="hidden" name="action" value="update_vcmp_modules">

			<table class="wp-list-table widefat plugins">
				<thead>
				<tr>
					<th scope="col" id="name" class="manage-column column-name" style=""><input id="vcmp-select-all" type="checkbox"><label class="vcmp_selectall" for="vcmp-select-all"><?php _e('Enable/Disable All', VCMP_SLUG); ?></label></th>
					<th scope="col" id="name" class="manage-column column-name" style=""><?php _e('Module', VCMP_SLUG); ?></th>
					<th scope="col" id="name" class="manage-column column-name" style=""></th>
					<th scope="col" id="name" class="manage-column column-name" style=""></th>
				</tr>
				</thead>
				<tbody id="the-list" class="vcmp-module-list">
					<?php
					$i = 0;
					foreach ($this->_modules_installed as $key => $module) {
						$show = true;
						$filter = isset($_GET['filter']) ? $_GET['filter'] : false;

						if($filter){
							switch ($filter) {
								case 'active':
										if(FALSE === $this->is_module_active($key)){
											$show = FALSE;
										}
									break;

								case 'inactive':
										if(TRUE === $this->is_module_active($key)){
											$show = FALSE;
										}
									break;

								default:
									# code...
									break;
							}
						}
						if(!$show){
							continue;
						}

						$name = (!empty($module['data']['name'])) ? $module['data']['name'] : $key;
						$description = (!empty($module['data']['description'])) ? $module['data']['description'] : __('No description available', VCMP_SLUG);
						$vcmp_name_id = str_replace(' ', '-', $name);

						$row_select = array();
						if($this->is_module_active($key)){

							$row_select['deactivate'] = sprintf('<label for="'.$key.'" class="deactivate"><input name="elegant_modules[]" value="'.$key.'" id="'.$key.'" type="checkbox" checked="checked"> <i></i> </label>',
								wp_nonce_url(
									add_query_arg(
										array(
											'page' => VCMP_SLUG,
											'module' => $key,
											'action' => 'deactivate_module'
										),
										admin_url( 'admin.php' )
									),
									'deactivate_module'
								),
								__('Deactivate', VCMP_SLUG)
							);
							$row_class = 'active';
						}else{
							$row_select['activate'] = sprintf('<label for="'.$key.'" class="activate"><input name="elegant_modules[]" value="'.$key.'" id="'.$key.'" type="checkbox"> <i></i> </label>',
								wp_nonce_url(
									add_query_arg(
										array(
											'page' => VCMP_SLUG,
											'module' => $key,
											'action' => 'activate_module',
										),
										admin_url( 'admin.php' )
									),
									'activate_module'
								),
								__('Activate', VCMP_SLUG)
							);
							$row_class = 'inactive';
						}
						if($this->is_module_active($key)){
							$row_select = apply_filters('vcmp_module_row_actions', $row_select, $key);
						}


						$row_actions = array();
						if($this->is_module_active($key)){
							$row_actions['deactivate'] = sprintf('<span class="deactivate"><a href="%s">%s</a></span>',
								wp_nonce_url(
									add_query_arg(
										array(
											'page' => VCMP_SLUG,
											'module' => $key,
											'action' => 'deactivate_module'
										),
										admin_url( 'admin.php' )
									),
									'deactivate_module'
								),
								__('Deactivate', VCMP_SLUG)
							);
							$row_class = 'active';
						}else{
							$row_actions['activate'] = sprintf('<span class="activate"><a href="%s">%s</a></span>',
								wp_nonce_url(
									add_query_arg(
										array(
											'page' => VCMP_SLUG,
											'module' => $key,
											'action' => 'activate_module',
										),
										admin_url( 'admin.php' )
									),
									'activate_module'
								),
								__('Activate', VCMP_SLUG)
							);
							$row_class = 'inactive';
						}
						if($this->is_module_active($key)){
							$row_actions = apply_filters('vcmp_module_row_actions', $row_actions, $key);
						}

						// module version and author
						$row_metas = array();
						$version = (!empty($module['data']['version'])) ? $module['data']['version'] : false;
						if($version){
							$row_metas['version'] = sprintf('<span class="version">%s %s</span>',
								__('Version', VCMP_SLUG),
								$version
							);
						}
						$author_name = (!empty($module['data']['author_name'])) ? $module['data']['author_name'] : false;
						$author_url = (!empty($module['data']['author_url'])) ? $module['data']['author_url'] : false;
						if($author_name){
							if($author_url){
								$row_metas['author'] = sprintf('<span class="author">%s <a href="%s">%s</a></span>',
									__('By', VCMP_SLUG),
									$author_url,
									$author_name
								);
							}else{
								$row_metas['author'] = sprintf('<span class="author">%s %s</span>',
									__('By', VCMP_SLUG),
									$author_name
								);
							}
						}
						$row_metas = apply_filters('vcmp_module_row_metas', $row_metas, $key);

					?>
					<?php
						  if (!$i%2) echo '<tr class="" data-slug="">';
					?>

						<td class="<?php echo $row_class?>"><?php echo implode( " | ", $row_select ); ?></td>
						<td class="vcmp-plugin-title"><strong><?php echo $name; ?></strong>
							<div class="vcmp-plugin-description"><p><?php echo $description; ?></p></div>
							<div class="vcmp-row-actions visible"><?php echo implode( " | ", $row_actions ); ?></div>
							<!--<div class="vcmp-row-metas visible"><?php //echo implode( " | ", $row_metas ); ?></div>-->
						</td>
					 <?php if ($i%2) echo '</tr>'; $i++; ?>

					<?php
					}
					?>

				</tbody>
				<tfoot>
				<tr>
					<th scope="col" class="manage-column column-name" style=""><input id="vcmp-select-all-bottom" type="checkbox"><label class="vcmp_selectall" for="vcmp-select-all-bottom"><?php _e('Enable/Disable All', VCMP_SLUG); ?></label></th>
					<th scope="col" class="manage-column column-name" style=""><?php _e('Module', VCMP_SLUG); ?></th>
					<th scope="col" class="manage-column column-name" style=""></th>
					<th scope="col" class="manage-column column-name" style=""></th>
				</tr>
				</tfoot>
			</table>
			<input type="button" name="save-modules" id="save-modules" value="Save Settings" class="button button-primary button-large">
			</form>
			</div>

			<script>
			var save_btn = jQuery("#save-modules");
				save_btn.bind('click',function(e){
					e.preventDefault();
					var data = jQuery("#vcmp_modules_form").serialize();
					//console.log(jQuery("#vcmp_modules_form"));
					jQuery.ajax({
						url: ajaxurl,
						data: data,
						dataType: 'html',
						type: 'post',
						success: function(result){
							result = jQuery.trim(result);
							if(result == "success"){
								jQuery("#msg").html('<div class="vcmp_success update-nag"><p><?php echo __('Settings were updated successfuly.',VCMP_SLUG); ?></p></div>');
								jQuery('html,body').animate({ scrollTop: 0 }, 300);
								window.location.reload();
							} else {
								jQuery("#msg").html('<div class="vcmp_error update-nag"><p><?php echo __('No settings were updated.',VCMP_SLUG); ?></p></div>');
								jQuery('html,body').animate({ scrollTop: 0 }, 300);
								window.location.reload();
							}
						}
					});
				});
			</script>
			<?php
			}

			/**
			 * Load modules
			 */
			private function load_modules( $run = false ){

				$this->_modules_activated = get_option( 'vcmp_modules', array() );

				foreach(glob($this->get_module_dir()."/*", GLOB_ONLYDIR) as $dir){
					$module_dir = basename($dir);
					foreach(glob($dir."/*.php") as $module_file){
						$file_data = get_file_data($module_file, $this->get_module_data());
						if(!empty($file_data['name'])){
							$this->_modules_installed[$module_dir] = array(
								'data' => $file_data,
								'file' => basename($module_file)
							);
							break;
						}
					}
				}

				if($run){
					$this->run_modules();
				}

			}

			/**
			 * Run all activated modules
			 */
			private function run_modules(){
				foreach ($this->_modules_activated as $key => $module) {
					if($this->is_module_exists($key, $module['file'])){
						require_once( $this->get_module_path($key, $module['file']) );
					}
				}
			}

			/**
			 * Flush activated modules data
			 */
			public function flush_modules(){
				foreach ($this->_modules_activated as $key => $module) {
					if(isset($this->_modules_installed[$key]) && $this->is_module_exists($key, $module['file'])){
						$this->_modules_activated[$key] = $this->_modules_installed[$key];
					}else{
						unset($this->_modules_activated[$key]);
						$this->add_admin_notice('error', sprintf(__('The module %s has been deactivated due to an error: Module file does not exist.', VCMP_SLUG), $module['data']['name']));
					}
				}
				$this->save_activated_modules(  );
			}

			/**
			 * Save all activated modules data to database
			 */
			private function save_activated_modules(){
				return update_option( 'vcmp_modules', $this->_modules_activated );
			}

			/**
			 * Delete all activated modules data from database
			 */
			private function delete_activated_modules(){
				return delete_option( 'vcmp_modules' );
			}

			/**
			 * Check if module is activated
			 */
			private function is_module_active($module){
				return isset( $this->_modules_activated[$module] );
			}

			/**
			 * Check if module file is exists
			 */
			private function is_module_exists($dir, $file){
				return file_exists( $this->get_module_path( $dir, $file ) );
			}

			/**
			 * Activate module
			 */
			private function activate_module( $module ){

				if(!$this->is_module_active( $module )){
					$this->_modules_activated[$module] = $this->_modules_installed[$module];
					$this->save_activated_modules( );
					$this->add_admin_notice('updated', __('Module activated.', VCMP_SLUG));
					$this->run_modules();
					do_action('vcmp_module_activated', $module, $this->_modules_activated[$module]);
					return true;
				}else{
					return false;
				}
			}

			/**
			 * Deactivate module
			 */
			private function deactivate_module( $module ){
				if($this->is_module_active( $module )){
					do_action('vcmp_module_deactivated', $module, $this->_modules_activated[$module]);
					unset($this->_modules_activated[$module]);
					$this->save_activated_modules( );
					$this->add_admin_notice('updated', __('Module deactivated.', VCMP_SLUG));
					$this->run_modules();
					return true;
				}else{
					return false;
				}
			}

			/**
			 * Get modules base directory
			 */
			private function get_module_dir(){
				return VCMP_PATH . DIRECTORY_SEPARATOR . self::module_dir . DIRECTORY_SEPARATOR;
			}

			/**
			 * Get module file path
			 */
			private function get_module_path( $dir, $file ){
				return $this->get_module_dir() . $dir . DIRECTORY_SEPARATOR . $file;
			}

			/**
			 * Get modules header data
			 */
			private function get_module_data(){
				return array(
					'name' => 'VCMP Module',
					'description' => 'Description',
					'version' => 'Version',
					'author_name' => 'Author Name',
					'author_url' => 'Author URL'
				);
			}

			/**
			 * Runs when the plugin is activated
			 */
			public function activation_hook() {

				// Check if Visual Composer is installed
				if ( ! defined( 'WPB_VC_VERSION' ) ) {
					// Display notice that Visual Compser is required
					add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
					return;
				}

				//Check compatibility
				if( !$this->is_vc_version_compatible() ) {
					die( sprintf( __( 'This plugin requires WPBakery Visual Composer plugin version %s or greater', VCMP_SLUG ), self::min_vc_version ) );
				}

				if( FALSE === get_option( 'vcmp_first_install_time' ) ){
					$this->load_modules();
					if($this->_modules_installed){
						foreach ( $this->_modules_installed as $key => $value ) {
							$this->_modules_activated[$key] = $value;
						}
					}
					$this->save_activated_modules( );
					update_option( 'vcmp_first_install_time', current_time('timestamp') );
				}
			}

			/**
			 * Runs when the plugin is deactivated
			 */
			public function deactivation_hook() {
			}

			/*
			Show notice if your plugin is activated but Visual Composer is not
			*/
			public function showVcVersionNotice() {
				$plugin_data = get_plugin_data(__FILE__);
				echo '
				<div class="updated">
				  <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/1UNVpys" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', VCMP_SLUG), $plugin_data['Name']).'</p>
				</div>';
			}

			/**
			 * Check if VC plugin version is compatible
			 */
			private function is_vc_version_compatible() {
				if( !defined('WPB_VC_VERSION') ) return false;
				return version_compare( WPB_VC_VERSION,  self::min_vc_version, '>' );
			}

			/**
			 * Setup localization
			 */
			public function setup_localization() {
				load_plugin_textdomain( VCMP_SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
			}

		} // end class

		VCMP::getInstance();
	}