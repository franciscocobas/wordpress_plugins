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


function displayViewMoreLink($text, $link, $sectionName) {
    echo '<div class="leer-mas-link-container">';
        echo '<a href="'.$link.'" class="leer-mas-link '.$sectionName.'">'.$text;
        ?>
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 136.12 109.52" style="enable-background:new 0 0 136.12 109.52;" xml:space="preserve">
            <path d="M134.44,54.4c-0.01-0.09-0.01-0.18-0.03-0.27c-0.03-0.19-0.09-0.37-0.16-0.56c-0.01-0.01-0.01-0.03-0.01-0.04
                c-0.18-0.46-0.45-0.9-0.85-1.3L83.42,2.26c-1.44-1.44-3.53-1.44-4.97,0L75.31,5.4C74,6.7,74,8.8,75.44,10.24l38.88,38.88H5.16
                c-2.04,0-3.52,1.48-3.52,3.52v4.44c0,1.85,1.48,3.33,3.52,3.33h109.12L75.42,99.27c-1.44,1.44-1.44,3.53,0,4.97l3.14,3.14
                c1.31,1.31,3.4,1.31,4.84-0.13l49.98-49.98c0.56-0.56,0.89-1.21,1.03-1.88c0.01-0.04,0.01-0.08,0.01-0.12
                c0.03-0.17,0.05-0.34,0.05-0.51C134.47,54.64,134.46,54.52,134.44,54.4z"/>
            </svg>
        </a>
    </div>
    <?php
}

 function build_noticias_container($posts, $sectionName, $viewMoreLink) {
    if (count($posts) === 0) echo '<p class="no-post-message">Por el momento no hay noticias para mostrar.</p>';
    echo '<div class="noticias-container '.$sectionName.'">';
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
    echo '</div>';
    if (count($posts) > 4) {
        displayViewMoreLink('Ver más', $viewMoreLink, $sectionName);
    }
 }

function build_publicaciones_container($posts, $sectionName, $viewMoreLink) {
    if (count($posts) === 0) echo '<p class="no-post-message">Por el momento no hay publicaciones para mostrar.</p>';
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        echo '<div class="publicacion-container '.$sectionName.'">';
        ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="28.555" height="27.448" viewBox="0 0 28.555 27.448"><defs><style>.a{fill:#3db7d3;fill-rule:evenodd;}</style></defs><path class="a" d="M2887.942,1014.826c.5,0,.939-1.391,1.275-2.083a14.146,14.146,0,0,1,10.607-8.086c1.721-.341,2.619.029,2.56,1.989-.112,3.893.063,7.8-.061,11.7a14.222,14.222,0,0,1-28.431-.365c-.027-3.663.122-7.325-.053-10.977-.108-2.349.939-2.734,2.962-2.277a14.031,14.031,0,0,1,10.045,7.732C2887.225,1013.229,2887.655,1014.825,2887.942,1014.826Z" transform="translate(-2873.831 -1004.545)"/></svg>
            <div>
                <div class="content">
                    <p><?php echo get_the_title($post) ?></p>
                    <?php 
                    if(!empty(get_field('link_al_archivo', $post->ID))) {
                        echo '<a target="_blank" href="'.esc_url(get_field('link_al_archivo', $post->ID)).'">Ver Publicaci&#243;n</a>';
                    } 
                    ?>
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
    if (count($posts) > 2) {
        displayViewMoreLink('Ver más', $viewMoreLink, $sectionName);
    }
 }

function build_events_container($posts, $sectionName, $viewMoreLink) {
    if (count($posts) === 0) echo '<p class="no-post-message">Por el momento no hay eventos para mostrar.</p>';
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

    if (count($posts) > 2) {
        displayViewMoreLink('Ver más eventos', $viewMoreLink, $sectionName);
    }
 }

 function build_recursos_container($posts, $viewMoreLink) {
    if (count($posts) === 0) echo '<p class="no-post-message">Por el momento no hay recursos para mostrar.</p>';
    echo '<div class="recursos-container">';
    foreach ($posts as $post) {
        $tags = get_the_tags($post->ID);
        echo '<div class="recurso-container">';
            echo '<div>';
                echo '<p class="post-title">'.get_the_title($post).'</p>';
                echo '<a href="'.esc_url(get_post_permalink($post)).'">Ver</a>';
            echo '</div>';
            foreach($tags as $tag) {
                echo '<a href="'.esc_attr(get_tag_link($tag->term_id)).'">'.$tag->name.'</a>';
            }
        echo '</div>';
    ?>
    <?php
    }
    echo '</div>';

    if (count($posts) > 2) {
        displayViewMoreLink('Ver más recursos', $viewMoreLink, $sectionName);
    }
 }

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

function get_noticias($atts) {
    $posts = get_posts(get_query('noticias', $atts['tag'], '4'));
    build_noticias_container($posts, $atts['tag'], $atts['view-more-link']);
}
add_shortcode('noticias', 'get_noticias');

function get_publicaciones($atts) {
    $posts = get_posts(get_query('publicaciones', $atts['tag'], '2'));
    build_publicaciones_container($posts, $atts['tag'], $atts['view-more-link']);
}
add_shortcode('publicaciones', 'get_publicaciones');

function get_eventos($atts) {
    $posts = get_posts(get_query('eventos', $atts['tag'], '2'));
    build_events_container($posts, $atts['tag'], $atts['view-more-link']);
}
add_shortcode('eventos', 'get_eventos');

// Create shortcode for noticias in portada
function get_noticias_without_tag($atts) {
    $args = array(
      'category_name' => 'noticias',
      'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts, $atts["page-name"], $atts["view-more-link"]);
}
add_shortcode('noticias-sin-tag', 'get_noticias_without_tag');

// Publicaciones
function get_publicaciones_novedades($atts) {
    $args = array(
        'category_name' => 'publicaciones',
        'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_publicaciones_container($posts, 'novedades', $atts['view-more-link']);
}
add_shortcode( 'publicaciones-novedades', 'get_publicaciones_novedades');

// Eventos
function get_eventos_novedades($atts) {
    $args = array(
        'category_name' => 'eventos',
        'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_events_container($posts, 'novedades', $atts['view-more-link']);
}
add_shortcode( 'eventos-novedades', 'get_eventos_novedades');

function get_otros_recursos_novedades($atts) {
    $args = array(
        'category_name' => 'otros-recursos',
        'posts_per_page' => 2
    );
    $posts = get_posts($args);
    build_recursos_container($posts, 'novedades', $atts['view-more-link']);
}
add_shortcode('otros-recursos-novedades', 'get_otros_recursos_novedades');
