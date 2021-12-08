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

function eventos_custom_post_type() {
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
            'rest_base' => 'eventos',
            'show_in_graphql' => true,
            'graphql_single_name' => 'evento',
            'graphql_plural_name' => 'eventos',
            'supports' => array(
                'title', 'editor', 'thumbnail'
            )
        )
    );
}
add_action('init', 'eventos_custom_post_type');

add_action( 'graphql_register_types', function() {
    register_graphql_field( 'evento', 'fecha-evento', [
        'type' => 'Number',
        'description' => __( 'Link to edit the content', 'your-textdomain' ),
        'resolve' => function( $post, $args, $context, $info ) {
            return strtotime(get_field('fecha', $post->ID));
        }
    ]);
});
