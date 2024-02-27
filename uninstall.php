<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('btc_conversion');
delete_option('btc_last_update');

$timestamp = wp_next_scheduled('btc_price_fetch');

if ($timestamp) {
    wp_unschedule_event($timestamp, 'btc_price_fetch');
}
