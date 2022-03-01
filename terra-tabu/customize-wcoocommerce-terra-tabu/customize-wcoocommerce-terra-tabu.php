<?php
/**
 * Plugin Name:       Customiza woocommerce para Terra Tabú
 * Plugin URI:        https://subte.uy/contacto
 * Description:       Plugin que customiza Woocommerce para Terra tabú
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Cooperativa de trabajo SUBTE
 */
  
// Part 1
// Add the message notification and place it over the billing section
// The "display:none" hides it by default
  
add_action( 'woocommerce_cart_totals_before_order_total', 'show_montevideo_shipping_info' );
  
function show_montevideo_shipping_info() {
   echo '<div class="shipping-notice woocommerce-info">Los envíos se levantan en Calma House</div>';
}
  
// Part 2
// Show or hide message based on billing country
  
// add_action( 'woocommerce_after_checkout_form', 'bbloomer_show_notice_shipping' );
  
// function bbloomer_show_notice_shipping(){
     
//    wc_enqueue_js( "
  
//       // Set the country code that will display the message
//       var countryCode = 'FR';
 
//       // Get country code from checkout
//       selectedCountry = $('select#billing_country').val();
 
//       // Function to toggle message
//       function toggle_upsell( selectedCountry ) {   
//          if( selectedCountry == countryCode ){
//             $('.shipping-notice').show();
//          }
//          else {
//             $('.shipping-notice').hide();
//          }
//       }
 
//       // Call function
//       toggle_upsell( selectedCountry );
//       $('select#billing_country').change(function(){
//          toggle_upsell( this.value );         
//       });
  
//    " );
     
// }
