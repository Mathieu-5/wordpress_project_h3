<?php
add_action( 'init', 'ajout_custom_type_projet' );
function ajout_custom_type_projet()
{
$post_type = "projet";
$labels = array(
        'name'               => 'Projets KS',
        'singular_name'      => 'Projet',
        'all_items'          => 'Toutes les projets',
        'add_new'            => 'Ajouter une projet',
        'add_new_item'       => 'Ajouter une projet',
        'edit_item'          => "Editer la projet",
        'new_item'           => 'Nouvelle projet',
        'view_item'          => "Voir la projet",
        'search_items'       => 'Chercher une projet',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'Petition Parent',
        'menu_name'          => 'Projets KS',
    );
    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'supports'            => array( 'title','thumbnail','editor', 'revisions'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-write-blog',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => array( 'slug' => $post_type )
    );
  register_post_type($post_type, $args );
  $taxonomy = "theme";
  $object_type = array("projet");
  $args = array(
          'label' => __( 'Thématique' ),
          'rewrite' => array( 'slug' => 'theme' ),
          'hierarchical' => true,
  );
  register_taxonomy( $taxonomy, $object_type, $args );
}