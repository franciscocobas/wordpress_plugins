<?php
/**
 * Plugin Name:       Eventos Custom Post Type
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Add Eventos Custom Post Types
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */

function columnistas_custom_post_type() {
    register_post_type('m24_eventos',
        array(
            'labels' => array(
                'name' => __('Eventos', 'textdomain'),
                'singular_name' => __('Evento', 'textdomain'),
            ),
            'public' => true,
            'has_archive'  => true,
            'rewrite' => array( 'slug' => 'eventos-urls' ),
            'menu_icon' => 'dashicons-calendar',
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'evento',
            'graphql_plural_name' => 'eventos',
            'supports' => array(
                'title', 'editor', 'thumbnail'
            )
        )
    );
}
add_action('init', 'columnistas_custom_post_type');
