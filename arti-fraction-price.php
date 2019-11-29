<?php
defined( 'ABSPATH' )
    or die( 'No script kiddies please!' );
/**
 * Plugin Name: Price by Fraction - Art-i
 * Plugin URI: https://www.github.com/arti/price-by-fraction
 * Description: Add snippet with the unitary price of a good
 * Version: 1.0.0
 * Author: Luis Eduardo Casper Braschi
 * Author URI: http://art-idesenvolvimento.com.br
 * Text Domain: arti-fraction-price
 * Domain Path: languages/
 * License: GPL 2.0
 */

define( 'ARTI_FRACTION_PRICE_BASENAME', plugin_basename( __FILE__ ) );
define( 'ARTI_FRACTION_PRICE_DIR', dirname( __FILE__ ) );
define( 'ARTI_FRACTION_PRICE_TEMPLATES', dirname( __FILE__ ) . '/templates' );

add_action( 'woocommerce_init', function(){

    include_once ARTI_FRACTION_PRICE_DIR . '/includes/Admin.php';

    if( !is_admin() ) {
        arti_fraction_price();
    }

} );

function arti_fraction_price(){

    static $arti_fraction_price;

    if( is_null( $arti_fraction_price ) ){
        $arti_fraction_price = include ARTI_FRACTION_PRICE_DIR . '/includes/FrontEnd.php';
    }

    return $arti_fraction_price;

}
