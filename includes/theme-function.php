<?php

(defined('ABSPATH')) || exit;

function mrtai_layout($path)
{
    global $mrtai_option;
    require_once MRTAI_VIEWS . 'layout/' . $path . '.php';

}

function mrtai_js($path)
{
    return MRTAI_JS . $path . '?ver=' . MRTAI_VERSION;
}

function mrtai_css($path)
{
    return MRTAI_CSS . $path . '?ver=' . MRTAI_VERSION;
}

function mrtai_image($path)
{
    return MRTAI_IMAGE . $path . '?ver=' . MRTAI_VERSION;
}

function mrtai_start_working(): array
{
    $mrtai_option = get_option('mrtai_option');

    if (! isset($mrtai_option[ 'version' ]) || version_compare(MRTAI_VERSION, $mrtai_option[ 'version' ], '>')) {

        update_option(
            'mrtai_option',
            [
                'version'   => MRTAI_VERSION,
                'contact_7' => (isset($mrtai_option[ 'contact_7' ])) ? $mrtai_option[ 'contact_7' ] : '',
                'phone'     => (isset($mrtai_option[ 'phone' ])) ? $mrtai_option[ 'phone' ] : '',
                'email'     => (isset($mrtai_option[ 'email' ])) ? $mrtai_option[ 'email' ] : '',
                'address'   => (isset($mrtai_option[ 'address' ])) ? $mrtai_option[ 'address' ] : '',
                'map'       => (isset($mrtai_option[ 'map' ])) ? $mrtai_option[ 'map' ] : '',

             ]

        );
    }

    return get_option('mrtai_option');

}

function mrtai_update_option($data)
{

    $mrtai_option = get_option('mrtai_option');

    $mrtai_option = [
        'version'   => MRTAI_VERSION,
        'contact_7' => (isset($data[ 'contact_7' ])) ? $data[ 'contact_7' ] : $mrtai_option[ 'contact_7' ],
        'phone'     => (isset($data[ 'phone' ])) ? $data[ 'phone' ] : $mrtai_option[ 'phone' ],
        'email'     => (isset($data[ 'email' ])) ? $data[ 'email' ] : $mrtai_option[ 'email' ],
        'address'   => (isset($data[ 'address' ])) ? $data[ 'address' ] : $mrtai_option[ 'address' ],
        'map'       => (isset($data[ 'map' ])) ? $data[ 'map' ] : $mrtai_option[ 'map' ],

     ];
    update_option('mrtai_option', $mrtai_option);

}
