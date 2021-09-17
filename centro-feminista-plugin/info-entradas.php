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
                    <a href="<?php echo esc_url(get_post_permalink($post)) ?>">Ver Publicación</a>
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

// Shortcode to output custom PHP in Elementor
function get_publicaciones_investigacion( $atts ) {
    $args = array(
      'category__and' => '10',
      'tag__in' => '14',
      'posts_per_page' => '2'
    );
    $posts = get_posts($args);
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-investigacion', 'get_publicaciones_investigacion');

// Shortcode to output custom PHP in Elementor
function get_noticias_investigacion( $atts ) {
    $args = array(
      'category__and' => '11',
      'tag__in' => '14',
      'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_noticias_container($posts);
}

add_shortcode( 'noticias-investigacion', 'get_noticias_investigacion');

// Shortcode to output custom PHP in Elementor
function get_publicaciones_ensenanza( $atts ) {
    $tag_ensenanza = '15';
    $category_publicaciones = '10';
    $args = array(
      'category__and' => $category_publicaciones,
      'tag__in' => $tag_ensenanza,
      'posts_per_page' => '4'
    );
    $posts = get_posts($args);
    build_publicaciones_container($posts);
}

add_shortcode( 'publicaciones-ensenanza', 'get_publicaciones_ensenanza');
