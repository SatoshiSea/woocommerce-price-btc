<?php
function display_btc_price($price, $product)
{
    global $btc_svg_code;

    $global_btc_conversion = get_option('btc_conversion', 0);

    if ($global_btc_conversion == 0) {
        return $price .= '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;"> BTC Price Unavailable </span></span>';
    } else {
        if ($product->is_on_sale()) {
            $product_price = $product->get_sale_price();
        } else {
            $product_price = $product->get_price();
        }

        if ($product->is_type('variable')) {
            $variation_prices = $product->get_variation_prices(true);

            if ($variation_prices && is_array($variation_prices) && isset($variation_prices['price']) && is_array($variation_prices['price']) && !empty($variation_prices['price'])) {
                $min_variation_price = min($variation_prices['price']);
                $max_variation_price = max($variation_prices['price']);

                $min_btc_value = $min_variation_price / $global_btc_conversion;
                $max_btc_value = $max_variation_price / $global_btc_conversion;

                $min_btc_price = number_format($min_btc_value, 6, '.', '');
                $max_btc_price = number_format($max_btc_value, 6, '.', '');

                $price .= '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;">' . $min_btc_price . ' - ' . $max_btc_price . '</span></span>';
            } else {
                // Producto sin existencias, puedes manejarlo como desees.
                $price .= '';
            }
        } else {
            $btc_value = $product_price / $global_btc_conversion;
            $btc_price = number_format($btc_value, 6, '.', '');
            $price .= '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;">' . $btc_price . '</span></span>';
        }

        return $price;
    }
}

add_filter('woocommerce_get_price_html', 'display_btc_price', 10, 2);
