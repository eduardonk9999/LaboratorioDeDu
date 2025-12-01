<?php
if (!defined('ABSPATH')) {
    exit;
}

function laboratoriodedu_enqueue_assets()
{
    // Estilo principal do tema (style.css)
    wp_enqueue_style(
        'laboratoriodedu-style',
        get_stylesheet_uri(),
        [],
        '0.1.0'
    );

    // CSS extra
    wp_enqueue_style(
        'laboratoriodedu-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['laboratoriodedu-style'],
        '0.1.0'
    );

    // JS principal
    wp_enqueue_script(
        'laboratoriodedu-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '0.1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'laboratoriodedu_enqueue_assets');
