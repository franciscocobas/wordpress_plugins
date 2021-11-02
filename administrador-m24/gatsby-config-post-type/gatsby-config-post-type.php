<?php
/**
 * Plugin Name:       Gatsby Config Custom Post Type
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Add Gatsby Config Custom Post Types
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */

function gatsby_config_custom_post_type() {
    register_post_type('gatsby_config',
        array(
            'labels' => array(
                'name' => __('Configuraciones Gatsby', 'textdomain'),
                'singular_name' => __('Configuración Gatsby', 'textdomain'),
            ),
            'public' => true,
            'has_archive'  => true,
            'rewrite' => array( 'slug' => 'gatsby-config' ),
            'menu_icon' => 'dashicons-admin-generic',
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'gatsbyConfig',
            'graphql_plural_name' => 'gatsbyConfigs',
        )
    );
}
add_action('init', 'gatsby_config_custom_post_type');
