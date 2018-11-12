<?php
add_action( 'init', 'ajout_custom_type_petition' );
function ajout_custom_type_petition()
{
$post_type = "petition";
$labels = array(
        'name'               => 'Pétitions',
        'singular_name'      => 'Pétition',
        'all_items'          => 'Toutes les pétitions',
        'add_new'            => 'Ajouter une pétition',
        'add_new_item'       => 'Ajouter une pétition',
        'edit_item'          => "Editer la pétition",
        'new_item'           => 'Nouvelle pétition',
        'view_item'          => "Voir la pétition",
        'search_items'       => 'Chercher une pétition',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'Petition Parent',
        'menu_name'          => 'Pétitions',
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
  $object_type = array("petition");
  $args = array(
          'label' => __( 'Thématique' ),
          'rewrite' => array( 'slug' => 'theme' ),
          'hierarchical' => true,
  );
  register_taxonomy( $taxonomy, $object_type, $args );
}