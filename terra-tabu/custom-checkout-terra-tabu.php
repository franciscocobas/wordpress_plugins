<?php
/**
 * Plugin Name:       Customiza woocommerce para Terra Tabú
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Plugin que customiza Woocommerce para Terra tabú
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Cooperativa de trabajo SUBTE
 */

add_action( 'woocommerce_email_before_order_table', 'add_order_email_instructions', 10, 2 );

function add_order_email_instructions( $order, $sent_to_admin ) {

   $shipping_method = @array_shift( $order->get_shipping_methods() );
   $shipping_method_id = $shipping_method['method_id'];

   if ( ! $sent_to_admin ) {
      if ( 'local_pickup:11' == $shipping_method_id ) {
         // local pickup option
         echo '<p><strong>Instrucciones:</strong> Por favor contactarse con Belén Carrión (cel: 098 143 347) para coordinar retirada en el local.</p>';
      } else {
         // other methods
         echo '';
      }
   }
}
