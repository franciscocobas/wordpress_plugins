<?php
/**
 * Plugin Name:       Remove Author Page
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Removes author page from being displayed
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */

function my_custom_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        // Redirect to homepage, set status to 301 permenant redirect. 
        // Function defaults to 302 temporary redirect. 
        wp_redirect(get_option('home'), 301); 
        exit; 
    }
}

add_action('template_redirect', 'my_custom_disable_author_page');
