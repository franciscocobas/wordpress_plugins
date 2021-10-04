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

function build_events_container($posts, $sectionName) {
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        ?>
        <div class="evento-container <?php echo $sectionName ?>">
            <div class="header">
                <p class="date"><?php echo the_field('fecha', $post->ID) ?> | <?php echo the_field('hora', $post->ID) ?></p>
                <p class="event-title"><?php echo get_the_title($post) ?></p>
                <a href="<?php echo esc_url(get_post_permalink($post)) ?>">
                    Ver m&aacute;s <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 136.12 109.52" style="enable-background:new 0 0 136.12 109.52;" xml:space="preserve">
                    <path d="M134.44,54.4c-0.01-0.09-0.01-0.18-0.03-0.27c-0.03-0.19-0.09-0.37-0.16-0.56c-0.01-0.01-0.01-0.03-0.01-0.04
                        c-0.18-0.46-0.45-0.9-0.85-1.3L83.42,2.26c-1.44-1.44-3.53-1.44-4.97,0L75.31,5.4C74,6.7,74,8.8,75.44,10.24l38.88,38.88H5.16
                        c-2.04,0-3.52,1.48-3.52,3.52v4.44c0,1.85,1.48,3.33,3.52,3.33h109.12L75.42,99.27c-1.44,1.44-1.44,3.53,0,4.97l3.14,3.14
                        c1.31,1.31,3.4,1.31,4.84-0.13l49.98-49.98c0.56-0.56,0.89-1.21,1.03-1.88c0.01-0.04,0.01-0.08,0.01-0.12
                        c0.03-0.17,0.05-0.34,0.05-0.51C134.47,54.64,134.46,54.52,134.44,54.4z"/>
                    </svg>
                </a>
            </div>
            <div class="content">
                <p><?php echo get_the_excerpt($post) ?></p>
            </div>
            <div class="tags-categories">
                <?php
                foreach($tags as $tag) {
                    echo "<a href=\"".esc_attr(get_tag_link($tag->term_id))."\">".$tag->name."</a>";
                }
                ?>
            </div>
        </div>
    <?php
    }
 }

function build_publicaciones_container($posts, $sectionName) {
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        ?>
        <div class="publicacion-container <?php echo $sectionName ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="28.555" height="27.448" viewBox="0 0 28.555 27.448"><defs><style>.a{fill:#3db7d3;fill-rule:evenodd;}</style></defs><path class="a" d="M2887.942,1014.826c.5,0,.939-1.391,1.275-2.083a14.146,14.146,0,0,1,10.607-8.086c1.721-.341,2.619.029,2.56,1.989-.112,3.893.063,7.8-.061,11.7a14.222,14.222,0,0,1-28.431-.365c-.027-3.663.122-7.325-.053-10.977-.108-2.349.939-2.734,2.962-2.277a14.031,14.031,0,0,1,10.045,7.732C2887.225,1013.229,2887.655,1014.825,2887.942,1014.826Z" transform="translate(-2873.831 -1004.545)"/></svg>
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

 function build_noticias_container($posts, $sectionName) {
    ?>
    <div class="noticias-container <?php echo $sectionName ?>">
    <?php
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        ?>

        <div class="noticia-container">
            <?php 
            echo "<a class='image-link-container' href=\"".esc_url(get_post_permalink($post))."\">".get_the_post_thumbnail($post, 'medium')."</a>";
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
      'category_name' => 'noticias',
      'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts, 'inicio');
}

add_shortcode('noticias-portada', 'get_noticias_portada');

// INVESTIGACIÓN
// Publicaciones
function get_publicaciones_investigacion($atts) {
    $posts = get_posts(get_query('publicaciones', 'investigacion', '2'));
    build_publicaciones_container($posts, 'investigacion');
}
add_shortcode( 'publicaciones-investigacion', 'get_publicaciones_investigacion');

// Noticias
function get_noticias_investigacion($atts) {
    $posts = get_posts(get_query('noticias', 'investigacion', '4'));
    build_noticias_container($posts, 'investigacion');
}
add_shortcode( 'noticias-investigacion', 'get_noticias_investigacion');

// Eventos
function get_eventos_investigacion($atts) {
    $posts = get_posts(get_query('eventos', 'investigacion', '2'));
    build_events_container($posts, 'investigacion');
}
add_shortcode( 'eventos-investigacion', 'get_eventos_investigacion');

// ENSEÑANZA
// Publicaciones
function get_publicaciones_ensenanza($atts) {
    $posts = get_posts(get_query('publicaciones', 'ensenanza', '2'));
    build_publicaciones_container($posts, 'ensenanza');
}
add_shortcode( 'publicaciones-ensenanza', 'get_publicaciones_ensenanza');

// Noticias
function get_noticias_ensenanza($atts) {
    $posts = get_posts(get_query('noticias', 'ensenanza', '4'));
    build_noticias_container($posts, 'ensenanza');
}
add_shortcode( 'noticias-ensenanza', 'get_noticias_ensenanza');

// Eventos
function get_eventos_ensenanza($atts) {
    $posts = get_posts(get_query('eventos', 'ensenanza', '2'));
    build_events_container($posts, 'ensenanza');
}
add_shortcode( 'eventos-ensenanza', 'get_eventos_ensenanza');

// EXTENSION
// Publicaciones
function get_publicaciones_extension($atts) {
    $posts = get_posts(get_query('publicaciones', 'extension', '2'));
    build_publicaciones_container($posts, 'extension');
}
add_shortcode( 'publicaciones-extension', 'get_publicaciones_extension');

// Noticias
function get_noticias_extension($atts) {
    $posts = get_posts(get_query('noticias', 'extension', '4'));
    build_noticias_container($posts, 'extension');
}
add_shortcode( 'noticias-extension', 'get_noticias_extension');

// Eventos
function get_eventos_extension($atts) {
    $posts = get_posts(get_query('eventos', 'extension', '2'));
    build_events_container($posts, 'extension');
}
add_shortcode( 'eventos-extension', 'get_eventos_extension');

// OBSERVATORIO
// Publicaciones
function get_publicaciones_observatorio($atts) {
    $posts = get_posts(get_query('publicaciones', 'observatorio', '2'));
    build_publicaciones_container($posts, 'observatorio');
}
add_shortcode( 'publicaciones-observatorio', 'get_publicaciones_observatorio');

// Noticias
function get_noticias_observatorio($atts) {
    $posts = get_posts(get_query('noticias', 'observatorio', '4'));
    build_noticias_container($posts, 'observatorio');
}
add_shortcode( 'noticias-observatorio', 'get_noticias_observatorio');

// Eventos
function get_eventos_observatorio($atts) {
    $posts = get_posts(get_query('eventos', 'observatorio', '2'));
    build_events_container($posts, 'observatorio');
}
add_shortcode( 'eventos-observatorio', 'get_eventos_observatorio');

// BIBLIOTECA
// Publicaciones
function get_publicaciones_biblioteca($atts) {
    $posts = get_posts(get_query('publicaciones', 'biblioteca', '2'));
    build_publicaciones_container($posts, 'biblioteca');
}
add_shortcode( 'publicaciones-biblioteca', 'get_publicaciones_biblioteca');

// Noticias
function get_noticias_biblioteca($atts) {
    $posts = get_posts(get_query('noticias', 'biblioteca', '4'));
    build_noticias_container($posts, 'biblioteca');
}
add_shortcode( 'noticias-biblioteca', 'get_noticias_biblioteca');

// Eventos
function get_eventos_biblioteca($atts) {
    $posts = get_posts(get_query('eventos', 'biblioteca', '2'));
    build_events_container($posts, 'biblioteca');
}
add_shortcode( 'eventos-biblioteca', 'get_eventos_biblioteca');

// NOVEDADES
// Noticias
function get_noticias_novedades($atts) {
    $args = array(
        'category_name' => 'noticias',
        'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts, 'novedades');
}
add_shortcode( 'noticias-novedades', 'get_noticias_novedades');

// Publicaciones
function get_publicaciones_novedades($atts) {
    $args = array(
        'category_name' => 'publicaciones',
        'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_publicaciones_container($posts, 'novedades');
}
add_shortcode( 'publicaciones-novedades', 'get_publicaciones_novedades');

// Eventos
function get_eventos_novedades($atts) {
    $args = array(
        'category_name' => 'eventos',
        'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_events_container($posts, 'novedades');
}
add_shortcode( 'eventos-novedades', 'get_eventos_novedades');
