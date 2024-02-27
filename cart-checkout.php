<?php

function display_btc_price_in_cart_subtotal($cart_subtotal)
{
    global $btc_svg_code;

    $global_btc_conversion = get_option('btc_conversion', 0);

    if ($global_btc_conversion == 0) {
        return $cart_subtotal . '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;"> BTC Price Unavailable </span></span>';
    } else {
        $subtotal_value = WC()->cart->get_subtotal();
        $btc_value = $subtotal_value / $global_btc_conversion;
        $btc_price = number_format($btc_value, 6, '.', '');
        return $cart_subtotal . '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;"> ' . $btc_price . '</span></span>';
    }
}

function display_btc_price_in_cart()
{
    global $btc_svg_code;

    $global_btc_conversion = get_option('btc_conversion', 0);

    if ($global_btc_conversion == 0) {
        echo '<tr class="btc-price"><th>' . __('Price BTC', 'your-text-domain') . '</th><td>' . $btc_svg_code . '<span style="font-weight: bold;"> BTC Price Unavailable </span></td></tr>';
    } else {
        $cart_total = WC()->cart->get_cart_contents_total();
        $btc_value = $cart_total / $global_btc_conversion;
        $btc_price = number_format($btc_value, 6, '.', '');
        echo '<tr class="btc-price"><th>' . __('Price BTC', 'your-text-domain') . '</th><td>' . $btc_svg_code . '<span style="font-weight: bold;"> ' . $btc_price . '</span></td></tr>';
    }
}

function display_btc_price_in_checkout()
{
    global $btc_svg_code;

    $global_btc_conversion = get_option('btc_conversion', 0);

    if ($global_btc_conversion == 0) {
        echo '<tr class="btc-price"><th>' . __('Price BTC', 'your-text-domain') . '</th><td>' . $btc_svg_code . '<span style="font-weight: bold;"> BTC Price Unavailable </span></td></tr>';
    } else {
        $order_total = WC()->cart->get_cart_contents_total();
        $btc_value = $order_total / $global_btc_conversion;
        $btc_price = number_format($btc_value, 6, '.', '');
        echo '<tr class="btc-price"><th>' . __('Price BTC', 'your-text-domain') . '</th><td>' . $btc_svg_code . '<span style="font-weight: bold;"> ' . $btc_price . '</span></td></tr>';
    }
}

function display_btc_price_in_cart_item($product_price, $cart_item, $cart_item_key)
{
    global $btc_svg_code;

    $product = $cart_item['data'];
    $global_btc_conversion = get_option('btc_conversion', 0);

    if ($global_btc_conversion == 0) {
        return $product_price . '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;"> BTC Price Unavailable </span></span>';
    } else {
        $btc_value = $product->get_price() / $global_btc_conversion;
        $btc_price = number_format($btc_value, 6, '.', '');
        return $product_price . '<span class="btc-price">' . $btc_svg_code . '<span style="font-weight: bold;"> ' . $btc_price . '</span></span>';
    }
}


add_filter('woocommerce_cart_item_price', 'display_btc_price_in_cart_item', 10, 3);

add_filter('woocommerce_cart_totals_before_order_total', 'display_btc_price_in_cart');

add_action('woocommerce_review_order_before_order_total', 'display_btc_price_in_checkout');

add_filter('woocommerce_cart_subtotal', 'display_btc_price_in_cart_subtotal');
