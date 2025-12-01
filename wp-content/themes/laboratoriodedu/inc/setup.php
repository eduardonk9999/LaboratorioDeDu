<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('laboratoriodedu_setup')) {
    function laboratoriodedu_setup()
    {
        // Deixa o WP controlar o <title>
        add_theme_support('title-tag');

        // Thumbnails em posts
        add_theme_support('post-thumbnails');

        // HTML5 em elementos do core
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        // Menu principal
        register_nav_menus([
            'primary' => __('Menu principal', 'laboratoriodedu'),
        ]);
    }
}
add_action('after_setup_theme', 'laboratoriodedu_setup');
