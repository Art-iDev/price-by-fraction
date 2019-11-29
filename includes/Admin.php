<?php
namespace Arti\Fraction_Price;

class Admin {

    const UNITARY_PRICE_FIELD_ID = '_arti_unitary_price';

    public function __construct(){

        add_action( 'woocommerce_product_options_general_product_data', [$this, 'add_product_field'] );
        add_action( 'woocommerce_process_product_meta', [$this, 'save'] );

    }

    /**
     * Add the field to the General tab in the product page in admin
     * @return void
     */
    public function add_product_field( $product ){
        woocommerce_wp_text_input(
            array(
                'id'          => self::UNITARY_PRICE_FIELD_ID,
                'label'       => __( 'Unitary price', 'arti-fraction-price' ),
                'type'        => 'number',
                'custom_attributes' => [
                    'min' => 0
                ]
            )
        );
    }

    /**
     * Save the unitary price
     * @param  int $product_id
     * @return void
     */
    public function save( $product_id ){

        if( isset( $_POST[self::UNITARY_PRICE_FIELD_ID] ) ){

            $unitary_price = $_POST[self::UNITARY_PRICE_FIELD_ID];

            $product = wc_get_product( $product_id );
            $product->update_meta_data( self::UNITARY_PRICE_FIELD_ID,  sanitize_text_field( $unitary_price ) );
            $product->save();

        }

    }

}

new Admin;
