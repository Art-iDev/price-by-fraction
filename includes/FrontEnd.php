<?php
namespace Arti\Fraction_Price;

class FrontEnd {

    public function __construct(){
        add_shortcode( 'unitary_price', [$this, 'render_shortcode'] );
    }

    public function render_shortcode( $atts ){

        global $product;

        $args = shortcode_atts(array(
            'price' => $product->get_meta( Admin::UNITARY_PRICE_FIELD_ID ),
        ), $atts);

        wc_get_template(
            'unitary-price.php',
            [
                'price' => 75
            ],
            '',
            trailingslashit( ARTI_FRACTION_PRICE_TEMPLATES )
        );

    }
}

new FrontEnd;
