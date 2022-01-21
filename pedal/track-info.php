<?php
/**
 * Plugin Name:       Get Track Info
 * Plugin URI:        https://subte.uy
 * Description:       Inject in Wordpress Page the Track Info
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Cooperativa de trabajo SUBTE
 */

// Shortcode to output custom PHP in Elementor
function get_track_play_button_shortcode( $atts ) {
    $slug = 'templates/track/track';
    set_query_var( 'icon_classes', 's-24 text-primary' );
    if(rekord_canAccess('track_play_subscriptions')){ ?>
        <div class="playlist">
            <a id="podcast-play-button" <?php echo rekord_getTrack(); ?>> 
                <svg xmlns="http://www.w3.org/2000/svg" width="31.499" height="36.001" viewBox="0 0 31.499 36.001">
                    <path id="Icon_awesome-play" data-name="Icon awesome-play" d="M29.841,15.1,5.091.464A3.356,3.356,0,0,0,0,3.368V32.625a3.372,3.372,0,0,0,5.091,2.9L29.841,20.9a3.372,3.372,0,0,0,0-5.808Z" transform="translate(0 -0.002)" fill="#fff"/>
                </svg>
                Escuchar
            </a>
        </div>
     <?php } else { ?>
        <a href="<?php echo pmpro_url("levels")?>">
           <?php rekord_play_icon_template(); ?>
        </a>

    <?php } ?>
    <?php  set_query_var( 'icon_classes', null );

}

add_shortcode( 'podcast-play-button-shortcode', 'get_track_play_button_shortcode');

function get_track_url( $atts ) {
  if (rekord_get_field('track_url')) {
    ?>
    <a href="<?php echo rekord_get_field('track_url') ?>" 
      target="_blank" 
      rel="noopener noreferrer" 
      style="color: #54595F; font-size: 15px; display: flex; align-items: center; margin-bottom: 2rem;">
      <svg width="22" height="24" xmlns="http://www.w3.org/2000/svg" 
        fill-rule="evenodd" clip-rule="evenodd" style="width: 24px; height: 24px; fill: #54595F; margin-right: 0.6rem;">
        <path d="M23 24v-20h-8v2h6v16h-18v-16h6v-2h-8v20h22zm-12-13h-4l5 6 5-6h-4v-11h-2v11z"/>
      </svg>
      Descargar audio
    </a>

    <?php
  }
} 

add_shortcode( 'podcast-download-button', 'get_track_url');
