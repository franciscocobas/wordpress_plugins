<?php
/**
 * Plugin Name:       Columnistas Custom Post Type
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Add Columnistas Custom Post Types
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */

function columnistas_custom_post_type() {
    register_post_type('m24_columnistas',
        array(
            'labels' => array(
                'name' => __('Columnistas', 'textdomain'),
                'singular_name' => __('Columnista', 'textdomain'),
            ),
            'public' => true,
            'has_archive'  => true,
            'rewrite' => array( 'slug' => 'columnistas-urls' ),
            'menu_icon' => 'dashicons-admin-users',
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'columnista',
            'graphql_plural_name' => 'columnistas',
        )
    );
}
add_action('init', 'columnistas_custom_post_type');
