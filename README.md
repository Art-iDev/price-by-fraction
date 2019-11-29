# Price by Fraction

Add unitary price to your product.

## Usage

You just have add the price per unity in the product general tab and you are done.

## Shortcode

You can display the unitary price in other areas of your product page by using the shortcode `[unitary_price]`.
To override the price, you can use the attribeute "price" like `[unitary_price price=35]`.

## Template

Add a file "woocommerce/unitary-price.php" (regular template after the regular price) or "woocommerce/unitary-price-shortcode.php" (for the shortcode) to your theme/child-theme folder to override the basic templates.

## Removing from product page

You just have to unhook the callback `remove_action( 'woocommerce_single_product_summary', [arti_fraction_price(), 'render_template'], 15 );`.
