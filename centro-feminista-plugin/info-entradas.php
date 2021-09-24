<?php
/**
 * Plugin Name:       Get Posts shortcodes
 * Plugin URI:        https://subte.uy/contacto
 * Description:       This plugin is specific for Centro Feminista Wordpress Website
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Cooperativa de trabajo SUBTE
 */

function build_publicaciones_container($posts) {
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        ?>
        <div class="publicacion-container">
            <!--<img src="" />-->
            <div>
                <div class="content">
                    <p><?php echo get_the_title($post) ?></p>
                    <a href="<?php echo esc_url(get_post_permalink($post)) ?>">Ver Publicaci&#243;n</a>
                </div>
                <div class="tags-categories">
                    <?php
                    foreach($tags as $tag) {
                        echo "<a href=\"".esc_attr(get_tag_link($tag->term_id))."\">".$tag->name."</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
 }

 function build_noticias_container($posts) {
    ?>
    <div class="noticias-container">
    <?php
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        ?>

        <div class="noticia-container">
            <?php 
            echo "<a href=\"".esc_url(get_post_permalink($post))."\">".get_the_post_thumbnail($post, 'thumbnail')."</a>";
            echo "<div class=\"text-content\">";
            echo "<p class=\"post-title\">";
            echo "<a href=\"".esc_url(get_post_permalink($post))."\">".get_the_title($post)."</a>";
            echo "</p>";
            echo "<p class=\"excerpt\">".get_the_excerpt($post)."</p>";
            foreach($tags as $tag) {
                echo "<div class=\"tags-container\">";
                echo "<a href=\"".esc_attr(get_tag_link($tag->term_id))."\">".$tag->name."</a>";
                echo "</div>";
            }
            echo "</div>"
            ?>
        </div>
    <?php
    }
    ?>
    </div>
    <?php
 }

$CAT_EVENTOS = 'eventos';
$CAT_NOTICIAS = 'noticias';
$CAT_PUBLICACIONES = 'publicaciones';
$CAT_SEMINARIOS = 'seminarios';

$TAG_BIBLIOTECA = 'biblioteca';
$TAG_ENSENANZA = 'ensenanza';
$TAG_EXTENSION = 'extension';
$TAG_INVESTIGACION = 'investigacion';
$TAG_OBSERVATORIO = 'observatorio';

function get_query($category_slug, $tag_slug, $number_posts) {
    $query = array(
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category_slug
            ),
            array(
                'taxonomy' => 'post_tag',
                'field' => 'slug',
                'terms' => $tag_slug
            ),
        ),
        'posts_per_page' => $number_posts
    );
    return $query;
}

// Create shortcode for noticias in portada
function get_noticias_portada($atts) {
    $args = array(
      'category_name' => $CAT_NOTICIAS,
      'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts);
}

add_shortcode('noticias-portada', 'get_noticias_portada');

// Create shortcode for poublicaciones in investigacion
function get_publicaciones_investigacion($atts) {
    $posts = get_posts(get_query('publicaciones', 'investigacion', '2'));
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-investigacion', 'get_publicaciones_investigacion');

// Create shortcode for noticias in investigacion
function get_noticias_investigacion($atts) {
    $posts = get_posts(get_query('noticias', 'investigacion', '4'));
    build_noticias_container($posts);
}

add_shortcode( 'noticias-investigacion', 'get_noticias_investigacion');

// Create shortcode for poublicaciones in enseñanza
function get_publicaciones_ensenanza($atts) {
    $posts = get_posts(get_query('publicaciones', 'ensenanza', '2'));
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-ensenanza', 'get_publicaciones_ensenanza');

// Create shortcode for noticias in enseñanza
function get_noticias_ensenanza($atts) {
    $posts = get_posts(get_query('noticias', 'ensenanza', '4'));
    build_noticias_container($posts);
}

add_shortcode( 'noticias-ensenanza', 'get_noticias_ensenanza');

// Create shortcode for noticias in enseñanza
function get_publicaciones_extension($atts) {
    $posts = get_posts(get_query('publicaciones', 'extension', '2'));
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-extension', 'get_publicaciones_extension');

// Create shortcode for noticias in enseñanza
function get_noticias_extension($atts) {
    $posts = get_posts(get_query('noticias', 'extension', '4'));
    build_noticias_container($posts);
}

add_shortcode( 'noticias-extension', 'get_noticias_extension');

// Create shortcode for noticias in enseñanza
function get_publicaciones_observatorio($atts) {
    $posts = get_posts(get_query('publicaciones', 'observatorio', '2'));
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-observatorio', 'get_publicaciones_observatorio');

// Create shortcode for noticias in enseñanza
function get_noticias_observatorio($atts) {
    $posts = get_posts(get_query('noticias', 'observatorio', '4'));
    build_noticias_container($posts);
}

add_shortcode( 'noticias-observatorio', 'get_noticias_observatorio');

// Create shortcode for noticias in enseñanza
function get_publicaciones_biblioteca($atts) {
    $posts = get_posts(get_query('publicaciones', 'biblioteca', '2'));
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-biblioteca', 'get_publicaciones_biblioteca');

// Create shortcode for noticias in enseñanza
function get_noticias_biblioteca($atts) {
    $posts = get_posts(get_query('noticias', 'biblioteca', '4'));
    build_noticias_container($posts);
}

add_shortcode( 'noticias-biblioteca', 'get_noticias_biblioteca');

// Create shortcode for noticias in enseñanza
function get_noticias_novedades($atts) {
    $args = array(
        'category_name' => 'noticias',
        'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts);
}

add_shortcode( 'noticias-novedades', 'get_noticias_novedades');

// Create shortcode for noticias in enseñanza
function get_publicaciones_novedades($atts) {
     $args = array(
        'category_name' => 'publicaciones',
        'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-novedades', 'get_publicaciones_novedades');
