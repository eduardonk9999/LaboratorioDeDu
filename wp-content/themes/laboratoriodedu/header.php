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
                LaboratorioEdu
            </a>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/iconMy.png" alt="LaboratorioEdu" class="site-icon">
        </div>
        <div class="site-description">
            <?php bloginfo('description'); ?>
        </div>
    </div>

    <div class="header-right">
        <nav class="site-nav" role="navigation" aria-label="Menu principal">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'menu-primary',
                    'fallback_cb'    => false,
                ]);
            } else {
                laboratoriodedu_default_menu();
            }
            ?>
        </nav>
    </div>
</header>

<main class="site-main">
