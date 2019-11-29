<?php
namespace Arti\Fraction_Price;

class FrontEnd {

    public function __construct(){
        add_shortcode( 'unitary_price', [$this, 'render_shortcode'] );
        add_action( 'woocommerce_single_product_summary', [$this, 'render_template'], 15 );
    }

    public function render_shortcode( $atts ){

        global $product;

        $args = shortcode_atts(
            [
                'price' => $product->get_meta( Admin::UNITARY_PRICE_FIELD_ID ),
            ],
            $atts
        );

        ob_start();

        wc_get_template(
            'unitary-price-shortcode.php',
            [
                'price' => $args['price']
            ],
            '',
            trailingslashit( ARTI_FRACTION_PRICE_TEMPLATES )
        );

        return ob_get_clean();

    }

    public function render_template(){

        global $product;

        if( $price = $product->get_meta( Admin::UNITARY_PRICE_FIELD_ID ) ){
            wc_get_template(
                'unitary-price.php',
                [
                    'price' => $price
                ],
                '',
                trailingslashit( ARTI_FRACTION_PRICE_TEMPLATES )
            );
        }

    }
}

return new FrontEnd;
