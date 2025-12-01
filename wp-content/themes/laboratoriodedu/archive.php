<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<h1><?php the_archive_title(); ?></h1>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content'); ?>
    <?php endwhile; ?>
    <?php the_posts_pagination(); ?>
<?php else : ?>
    <p>Nenhum item encontrado.</p>
<?php endif; ?>

<?php
get_footer();
