<?php
/**
 * Plugin Name:       Post Audio Player
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Agrega un reproductor de audio a los posts
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */


function add_post_audio_player($atts) {
  $id = get_the_ID();
  echo '<audio src="'.	get_field('audio_de_la_nota', $id) .'" controls></audio>';
}
add_shortcode('post-audio-player', 'add_post_audio_player');
