<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article class="post-card">
            <h1 class="post-card-title"><?php the_title(); ?></h1>
            <div class="post-card-meta">
                <?php laboratoriodedu_posted_on(); ?>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
endif;

get_footer();
