<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: Overlay Menu
 * Description: Overlay Menu shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpOverlayMenu extends VcmpModule{

	const slug = 'vcmp_overlaymenu';
	const base = 'vcmp_overlaymenu';

	public function __construct(){
	
		$this->set_options();
		add_action( 'admin_init', array($this, 'admin_init') );
		add_action( 'admin_menu', array($this, 'admin_menu') );
		add_filter( 'vcmp_module_row_actions', array( $this, 'add_row_actions' ), 10, 2 );
		
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
		
		// Register special widgets for slick slide menu.
		add_action( 'widgets_init', array( $this, 'overlay_menu_widgets_init' ) );

		
		// This will be add menu icon to nav menu as item.
		if(!$this->load_placement){
			function add_menu_to_nav_menu ($items){
				
				$search ='';
				$search .= '<li class="vcmp-olmenu-btn menu-item"><a class="vcmp-btn-open" href="javascript:void(0)"></a></li>';
				return $items . $search;
			}
			add_filter('wp_nav_menu_items','add_menu_to_nav_menu');
		}
		
		
		
		// This will be add menu icon to ourside of the main wrapper.
		if($this->load_placement){
			function add_menu_to_outside() {
			
			echo '<div class="vcmp-olmenu-btn vcmp_menu_outside"><a class="vcmp-btn-open" href="javascript:void(0)"></a></div>';
			echo '<div class="vcmp-overlay"><div class="vcmp-olmenu">';
			
				dynamic_sidebar('overlaymenuwidget'); 

			echo '</div></div>';
			}
			add_action('wp_footer', 'add_menu_to_outside');
			}
			
			
			function add_menu_overlay_to_outside() {
			
			echo '<div class="vcmp-overlay"><div class="vcmp-olmenu">';
			
				dynamic_sidebar('overlaymenuwidget'); 

			echo '</div></div>';
			}
			add_action('wp_footer', 'add_menu_overlay_to_outside');


	}
		
	// construct a widget for the overlay menu
	public function overlay_menu_widgets_init() {
		
		if ( function_exists('register_sidebar') )
			register_sidebar(array(
			'name' => 'Overlay Menu',
			'id' => 'overlaymenuwidget',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));

	}
	
	// checking options
	private function set_options(){
		if( FALSE === get_option( 'vcmp_overlay_menu_install_time' ) ){

			update_option( 'vcmp_overlay_menu_install_time', current_time('timestamp') );

			update_option( 'vcmp_overlay_menu_outside', 1 );
			$this->load_placement = 1;

		}else{

			$this->load_placement = get_option( 'vcmp_overlay_menu_outside', 1 );
		
		}
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" => __("Overlay Menu", "VCMP_SLUG"),
            "description" => __("Add Overlay menu to your page.", "VCMP_SLUG"),
            "base" => self::base,
            "class" => "",
            "controls" => "full",
            "icon" => "icon-vc-elegant-mega",
            "category" => "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_overlaymenu.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_overlaymenu_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

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
			'overlaymenu_content' => '',
			'overlaymenu_bg_color' => '',
			'overlaymenu_content_color' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_overlaymenu', VCMP_URL . 'modules/vcmp-overlaymenu/assets/css/vc-overlaymenu.css');
    	wp_enqueue_script( 'vc_overlaymenu', VCMP_URL.'modules/vcmp-overlaymenu/assets/js/vc-overlaymenu.js', array('jquery'), '1.0', TRUE);
		
		$output .= '<div class="vcmp-overlay '.esc_attr( $el_class ).'" style="color: '.$overlaymenu_bg_color.'">
						<div class="vcmp-olmenu" style="color: '.$overlaymenu_content_color.'">
							'.do_shortcode(''.$overlaymenu_content.'').'
						</div>
					</div>
					';

      return $output;

    }
	
	
	public function add_row_actions($actions, $module){
		if('vcmp-overlaymenu' == $module){
			$actions['settings'] = $this->create_row_actions_link(
				'settings', 
				add_query_arg( 
					array(
						'page' => self::slug,
					),
					admin_url( 'admin.php' )
				), 
				__('Settings', VCMP_SLUG)
			);
		}
		return $actions;
	}
	
	
	public function admin_menu(  ) { 
		add_submenu_page( 
			NULL, 
			__('VC Overlay Menu Module Settings', VCMP_SLUG), 
			__('VC Overlay Menu Module Settings', VCMP_SLUG), 
			'manage_options', 
			self::slug, 
			array($this, 'vcmp_overlaymenu_admin_page') 
		);
	}


	public function vcmp_overlaymenu_admin_page(  ) { 
		?>
		<form action='options.php' method='post'>
			<h2><?php _e('ELEGANT MEGA ADDONS OVERLAY MENU MODULE SETTINGS', VCMP_SLUG); ?></h2>
			<?php
			settings_fields( self::slug );
			do_settings_sections( self::slug );
			submit_button();
			?>
		</form>
		<?php
	}


	public function admin_init(  ) { 

		add_settings_section(
			'vcmp_overlay_menu_settings', 
			__( 'Placement Settings', 'VCMP' ), 
			array($this, 'settings_section_callback'), 
			self::slug
		);

		register_setting( self::slug, 'vcmp_overlay_menu_outside' );

		add_settings_field( 
			'vcmp_overlay_menu_outside', 
			__( 'Display overlay menu outside the navigation', 'VCMP' ), 
			array($this, 'settings_field_callback'), 
			self::slug, 
			'vcmp_overlay_menu_settings',
			array(
				'name' => 'vcmp_overlay_menu_outside',
				'type' => 'checkbox'
			)
		);
	}

}
// Finally initialize code
new VcmpOverlayMenu();