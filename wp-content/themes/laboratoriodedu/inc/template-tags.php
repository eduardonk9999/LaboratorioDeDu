<?php
if (!defined('ABSPATH')) {
    exit;
}

function laboratoriodedu_posted_on()
{
    echo '<span class="posted-on">' . esc_html(get_the_date()) . '</span>';
}

/**
 * Menu padrão caso nenhum menu seja criado
 */
function laboratoriodedu_default_menu()
{
    echo '<ul class="menu-primary">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    
    // Busca página "Quem sou eu" ou com template About
    $about_page = get_pages([
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'page-templates/about-terminal.php',
        'number'     => 1,
    ]);
    
    if (!empty($about_page)) {
        echo '<li><a href="' . esc_url(get_permalink($about_page[0]->ID)) . '">Quem sou eu</a></li>';
    }
    
    echo '</ul>';
}