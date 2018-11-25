<?php
if ( ! defined( 'ABSPATH' ) )  exit; // Exit if accessed directly

/*
 * VCMP Module: WooCommerce Products
 * Description: Display WooCommerce products shortcode for Visual Composer
 * Author Name: ThemeofWP.com
 * Author URL: http://themeofwp.com/
 * Version: 1.0.0
 */

class VcmpWooCommerceProducts extends VcmpModule{

	const slug = 'vcmp_woocommerce';
	const base = 'vcmp_woocommerce';

	public function __construct(){
		add_action( 'vc_before_init', array( $this, 'vc_before_init' ) );
		add_shortcode( self::slug, array( $this, 'build_shortcode' ) );
	}

 
    public function vc_before_init(){
        vc_map( array(
            "name" 			=> __("WooCommerce Products", "VCMP_SLUG"),
            "description" 	=> __("Display WooCommerce products with awesome way into your page.", "VCMP_SLUG"),
            "base" 			=> self::base,
            "class" 		=> "",
            "controls" 		=> "full",
            "icon" 			=> "icon-vc-elegant-mega",
            "category" 		=> "Elegant Mega Addons",
            //'admin_enqueue_js' => array(plugins_url('assets/vc_woocommerce.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_woocommerce_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Limit", "VCMP_SLUG" ),
					"param_name" => "woocommerce_limit",
					"description" => __( "Enter the post limit for the posts Default is unlimited and you can use numeric value.", "VCMP_SLUG" )
				),
				
				array(
					"type" => "textfield",
					"heading" => __( "Post Column Size", "VCMP_SLUG" ),
					"param_name" => "woocommerce_col_size",
					"description" => __( "Enter the colum sizes for the posts Default is 100% and you can use 33% for 3 colums", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Hover Effect", "VCMP_SLUG" ),
					"param_name" => "woocommerce_effect",
					"description" => __( "Do you want to display post hover effect?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Dates", "VCMP_SLUG" ),
					"param_name" => "woocommerce_date",
					"description" => __( "Do you want to display post date?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Category", "VCMP_SLUG" ),
					"param_name" => "woocommerce_category",
					"description" => __( "Do you want to display post category?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Title", "VCMP_SLUG" ),
					"param_name" => "woocommerce_title",
					"description" => __( "Do you want to display post title?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Excerpt", "VCMP_SLUG" ),
					"param_name" => "woocommerce_excerpt",
					"description" => __( "Do you want to display post excerpt?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Time", "VCMP_SLUG" ),
					"param_name" => "woocommerce_time",
					"description" => __( "Do you want to display post time?", "VCMP_SLUG" )
				),
				
				array(
					"type" => "checkbox",
					"heading" => __( "Display Post Comments", "VCMP_SLUG" ),
					"param_name" => "woocommerce_comments",
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
      
	  $output = 
	  $el_class = 
	  $woocommerce_limit = 
	  $woocommerce_effect = 
	  $woocommerce_date = 
	  $woocommerce_category = 
	  $woocommerce_title = 
	  $woocommerce_excerpt = 
	  $woocommerce_time = 
	  $woocommerce_comments = 
	  $woocommerce_col_size =  '';

		extract(shortcode_atts( array(
			'el_class' => '',
			'woocommerce_limit' => '',
			'woocommerce_effect' => '',
			'woocommerce_date' => '',
			'woocommerce_category' => '',
			'woocommerce_title' => '',
			'woocommerce_excerpt' => '',
			'woocommerce_time' => '',
			'woocommerce_comments' => '',
			'woocommerce_col_size' => '',
		), $atts ) );
		
		wp_enqueue_style( 'vc_woocommerce', VCMP_URL . 'modules/vcmp-woocommerce/assets/css/vc_woocommerce.css');
		wp_enqueue_script( 'vc_woocommerce', VCMP_URL.'modules/vcmp-woocommerce/assets/js/vc_woocommerce.js', array('jquery'), '1.0', TRUE);
		
		echo '
			
			<div id="vcwoogrid-wrapper" class=" '.esc_attr( $el_class ).'">
				<div id="vcwoogrid-selector">
					   <div id="vcwoogrid-menu">
						   View:
						   <ul>           	   
							   <li class="vcwoolargeGrid"><a href=""></a></li>
							   <li class="vcwoosmallGrid"><a class="active" href=""></a></li>
						   </ul>
					   </div>
				</div>
			
			';
		
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$limit = $woocommerce_limit;
		
		$args = array(
			//'post_type' => array('post','reviews'),
			'post_type' => array('product'),
			'paged' => $paged,
			'posts_per_page' => $limit,
			'showposts' => $limit,
		);
		
		query_posts($args);
	
		

		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		global  $woocommerce, $product;
		$vcmp_excerpt = substr(get_the_excerpt(), 0,20);
		$vcmp_categories = get_the_category();
		$vcmp_alt = get_post_meta(intval($image), '_wp_attachment_image_alt', true);
		$vcmp_price = get_post_meta( get_the_ID(), '_regular_price', true);
		$vcmp_sale = get_post_meta( get_the_ID(), '_sale_price', true);
		$vcmp_cursymbol = get_woocommerce_currency_symbol();
		$vcmp_sku = $product->get_sku();
		$vcmp_colors = $product->get_attribute( 'pa_color' );
		$vcmp_sizes = $product->get_attribute( 'pa_size' );

		
		$output .= '
		
		<div class="vcwooproduct">
			<div class="vcwooinfo-large">
				<h4><a href="' . esc_url( get_permalink( $product->id ) ) . '">'.esc_attr( $product->get_title() ).'</a></h4>';
				
				if ( $vcmp_sku ) {
		$output .= '<div class="vcwoosku">PRODUCT SKU: <strong>'.$vcmp_sku.'</strong></div>';
				};
				
				if ( $vcmp_price || $vcmp_sale ) {
		$output .= '<div class="vcwooprice-big">';
				
					if ( $vcmp_sale) {
		$output .= '<span>'.$vcmp_cursymbol.''.$vcmp_price.'</span> '.$vcmp_cursymbol.''.$vcmp_sale.'';
					} else { 
		$output .= ''.$vcmp_cursymbol.''.$vcmp_price.'';
					};
					
		$output .= '</div>';
				};
				 
				
				if ( $vcmp_sizes || $vcmp_colors ) {
				
				
					if ( $vcmp_sizes ) {
						$output .= '<h3>COLORS</h3>
								<div class="vcwoocolors-large">
									<span>' . $vcmp_colors . '</span>
								</div>';
					};
						
					if ( $vcmp_sizes ) {
						$output .= '<h3>SIZES</h3>
								<div class="vcwoosizes-large">
									<span>' . $vcmp_sizes . '</span>
								</div>';
					};
				
				};
				
				
		$output .= '<form enctype="multipart/form-data" method="post" class="cart">
					<input type="hidden" value="'.esc_attr( $product->id ).'" name="add-to-cart">
					<button class="single_add_to_cart_button vcwooadd-cart-large alt" type="submit">Add to cart</button>
					</form>
                     
							 
			</div>
			<div class="vcwooProduct3D">
				<div class="vcwooproduct-front">
					<div class="vcwooshadow"></div>';
					
					if ( has_post_thumbnail() ) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
					
			$output .= '<img src="' . $image_url[0] . '" alt="'.$vcmp_alt.'" />';
					
					};
					
			$output .= '<div class="vcwooimage_overlay"></div>';
			
							
			$output .= '<form enctype="multipart/form-data" method="post" class="cart"><input type="hidden" value="'.esc_attr( $product->id ).'" name="add-to-cart"><button class="single_add_to_cart_button vcwooadd_to_cart" type="submit">Add to cart</button></form>
							
					<div class="vcwooview_gallery">View gallery</div>                
					
					<div class="stats">        	
						<div class="vcwoostats-container">
							<span class="vcwooproduct_price">'.$vcmp_cursymbol.''.$vcmp_price.'</span>
							<span class="vcwooproduct_name"><a href="' . esc_url( get_permalink( $product->id ) ) . '">'.esc_attr( $product->get_title() ).'</a></span>    
							<p>' . $vcmp_excerpt . '</p> ';                                           
							
						if ( $vcmp_sizes || $vcmp_colors ) {
			$output .= '<div class="vcwooproduct-options">';
						
							if ( $vcmp_sizes ) {
				$output .= '<strong>SIZES</strong>
								<span>' . $vcmp_sizes . '</span>';
							};
							
							if ( $vcmp_colors ) {
				$output .= '<strong>COLORS</strong>
								<div class="vcwoocolors">' . $vcmp_colors . '</div>';
							};
							
			$output .= '</div>';   
						};
                   
			$output .= '</div>                         
					</div>
				</div>
				
				<div class="vcwooproduct-back">
					<div class="vcwooshadow"></div>
					<div class="vcwoocarousel">
						<ul class="vcwoocarousel-container">';
							
						global $product;
						$attachment_ids = $product->get_gallery_attachment_ids();
						foreach( $attachment_ids as $attachment_id ) 
						{
						$image_source = wp_get_attachment_url( $attachment_id );
			
			$output .= ' <li style="background: url('.$image_source.') no-repeat 50% center / cover; "></li>';
							  
						}
							
			
			$output .= '</ul>
						<div class="vcwooarrows-perspective">
							<div class="vcwoocarouselPrev">
								<div class="y"></div>
								<div class="x"></div>
							</div>
							<div class="vcwoocarouselNext">
								<div class="y"></div>
								<div class="x"></div>
							</div>
						</div>
					</div>
					<div class="vcwooflipback">
						<div class="cy"></div>
						<div class="cx"></div>
					</div>
				</div>	  
			</div>	
		</div>
	
		';
		

				  
		endwhile; else:
		endif;

	wp_reset_query();
	
	echo '</div>';

	return $output;
	  
	   
	  
    }
	

}
// Finally initialize code
new VcmpWooCommerceProducts();