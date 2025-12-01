<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('template-parts/content');
    endwhile;
else :
    echo '<p>Nada por aqui ainda.</p>';
endif;

get_footer();
