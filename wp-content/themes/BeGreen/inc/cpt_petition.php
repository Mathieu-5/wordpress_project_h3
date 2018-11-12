<?php
add_action( 'init', 'ajout_custom_type_petition' );

function ajout_custom_type_petition()
{

$post_type = "petition";
$labels = array(
        'name'               => 'petitions',
        'singular_name'      => 'petition',
        'all_items'          => 'Tous les petitions',
        'add_new'            => 'Ajouter un petition',
        'add_new_item'       => 'Ajouter un petition',
        'edit_item'          => "Editer le petition",
        'new_item'           => 'Nouveau petition',
        'view_item'          => "Voir le petition",
        'search_items'       => 'Chercher un petition',
        'not_found'          => 'Pas de résultat',
        'not_found_in_trash' => 'Pas de résultat',
        'parent_item_colon'  => 'petition Parent',
        'menu_name'          => 'Pétitions',
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'supports'            => array( 'title','thumbnail','editor', 'revisions'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-write-blog',
        'show_in_nav_menus'   => false,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => false,
        'rewrite'             => array( 'slug' => $post_type )
    );

  register_post_type($post_type, $args );

}
