<?php

function get_btc_conversion()
{
    $api_url = 'https://criptoya.com/api/btc/usd/0.1';
    $response = wp_remote_get($api_url);

    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if ($data && isset($data['binancep2p']['bid'])) {
            return $data['binancep2p']['bid'];
        }
    }

    return 0; // Si hay algún error o los datos no están disponibles, retornamos 0
}
