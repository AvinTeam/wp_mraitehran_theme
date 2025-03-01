<?php

(defined('ABSPATH')) || exit;

add_action('admin_enqueue_scripts', 'mrtai_admin_script');

function mrtai_admin_script()
{

    wp_register_style(
        'jalalidatepicker',
        MRTAI_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        MRTAI_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_enqueue_style(
        'mrtai_admin',
        MRTAI_CSS . 'admin.css',
        [ 'jalalidatepicker' ],
        MRTAI_VERSION
    );

    wp_enqueue_media();

    wp_enqueue_script(
        'mrtai_admin',
        MRTAI_JS . 'admin.js',
        [ 'jquery', 'jalalidatepicker' ],
        MRTAI_VERSION,
        true
    );

    $agents_term = [ [
        'id'   => 0,
        'text' => 'انتخاب همکار',
     ] ];

    $agents_terms = get_terms([
        'taxonomy'   => 'on_agents',
        'hide_empty' => false,
     ]);

    if (! empty($agents_terms) && ! is_wp_error($agents_terms)) {

        foreach ($agents_terms as $term) {

            $agents_term[  ] = [
                'id'   => $term->term_id,
                'text' => esc_html($term->name),
             ];
        }

    }

    $position_term = [ [
        'id'   => 0,
        'text' => 'انتخاب سمت',
     ] ];

    $position_terms = get_terms([
        'taxonomy'   => 'on_position',
        'hide_empty' => false,
     ]);

    if (! empty($position_terms) && ! is_wp_error($position_terms)) {

        foreach ($position_terms as $term) {

            $position_term[  ] = [
                'id'   => $term->term_id,
                'text' => esc_html($term->name),
             ];
        }

    }

    wp_localize_script(
        'mrtai_admin',
        'mrtai_js',
        [
            'ajaxurl'       => admin_url('admin-ajax.php'),
            'agents_term'   => $agents_term,
            'position_term' => $position_term,

         ]
    );

}

add_action('wp_enqueue_scripts', 'mrtai_style');

function mrtai_style()
{

    wp_register_style(
        'bootstrap',
        MRTAI_VENDOR . 'bootstrap/bootstrap.min.css',
        [  ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap.rtl',
        MRTAI_VENDOR . 'bootstrap/bootstrap.rtl.min.css',
        [ 'bootstrap' ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap-icons',
        MRTAI_VENDOR . 'bootstrap/bootstrap-icons.css',
        [ 'bootstrap' ],
        '1.11.3',
    );
    wp_register_script(
        'bootstrap',
        MRTAI_VENDOR . 'bootstrap/bootstrap.min.js',
        [  ],
        '5.3.3',
        true
    );

    wp_register_style(
        'swiper',
        MRTAI_VENDOR . 'swiper/swiper-bundle.min.css',
        [  ],
        '11.2.2',
    );

    wp_register_script(
        'swiper',
        MRTAI_VENDOR . 'swiper/swiper-bundle.min.js',
        [  ],
        '11.2.2',

    );

    wp_register_style(
        'jalalidatepicker',
        MRTAI_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        MRTAI_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_enqueue_style(
        'mrtai_style',
        MRTAI_CSS . 'public.css',
        [ 'bootstrap.rtl', 'bootstrap-icons', 'swiper', 'jalalidatepicker' ],
        MRTAI_VERSION
    );

    wp_enqueue_script(
        'mrtai_js',
        MRTAI_JS . 'public.js',
        [ 'jquery', 'bootstrap', 'swiper', 'jalalidatepicker' ],
        MRTAI_VERSION,
        true
    );

    wp_localize_script(
        'mrtai_js',
        'mrtai_js',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),

         ]
    );

}
