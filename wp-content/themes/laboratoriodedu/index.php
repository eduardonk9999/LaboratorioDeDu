<?php
// Silence is golden.
<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content'); ?>
    <?php endwhile; ?>

    <div class="pagination">
        <?php
        the_posts_pagination([
            'mid_size'  => 2,
            'prev_text' => '&laquo; Anteriores',
            'next_text' => 'Próximos &raquo;',
        ]);
        ?>
    </div>
<?php else : ?>
    <p>Nenhum experimento publicado ainda.</p>
<?php endif; ?>

<?php
get_footer();
