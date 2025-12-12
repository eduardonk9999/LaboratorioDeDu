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

/**
 * Adiciona favicons e manifest
 */
function laboratoriodedu_add_favicons()
{
    $favicon_path = get_template_directory_uri() . '/assets/images/favicon/';
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($favicon_path . 'apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($favicon_path . 'favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon_path . 'favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo esc_url($favicon_path . 'site.webmanifest'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_path . 'favicon.ico'); ?>">
    <?php
}
add_action('wp_head', 'laboratoriodedu_add_favicons', 1);