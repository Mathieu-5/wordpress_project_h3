<?php
define( 'THEME_PATH' ,          get_template_directory()            );
define( 'TEMPLATE_PATH' ,       THEME_PATH .    '/templates'        );
define( 'THEME_URL' ,           get_template_directory_uri()        );
define( 'CSS_URL' ,             THEME_URL .    '/assets/styles'       );
define( 'IMAGES_URL' ,          THEME_URL .    '/assets/images'       );
define( 'JS_URL' ,              THEME_URL .    '/assets/scripts'      );
define( 'FAVICONS_URL' ,        THEME_URL .    '/assets/favicon'      );
define( 'ADMIN_IMAGES_URL' ,    IMAGES_URL .   '/admin'             );
foreach ( glob( THEME_PATH . "/inc/*.php" ) as $file ) {
    include_once $file;
}

//SYNTAXE register_nav_menu( 'slug', 'Titre à afficher dans le BO' )

add_action( 'after_setup_theme', 'menus_du_themes' );
function menus_du_themes() {
  register_nav_menu( 'header', 'Menu principal' );
}
?>

<?php // SYNTAXE : wp_nav_menu( array $args = array() )
$args=array(
    'theme_location' => 'header', // nom du slug
    'menu' => 'header_fr', // nom à donner cette occurence du menu
    'menu_class' => 'menu_header', // class à attribuer au menu
    'menu_id' => 'menu_id' // id à attribuer au menu
    // voir les autres arguments possibles sur le codex
);
wp_nav_menu($args);
?>