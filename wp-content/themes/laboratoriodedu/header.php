<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="site-branding">
        <div class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                LaboratorioDeDu
            </a>
        </div>
        <div class="site-description">
            <?php bloginfo('description'); ?>
        </div>
    </div>

    <nav class="site-nav" role="navigation" aria-label="Menu principal">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => 'laboratoriodedu_default_menu',
            'menu_class'     => 'menu-primary',
        ]);
        ?>
    </nav>
</header>

<main class="site-main">
