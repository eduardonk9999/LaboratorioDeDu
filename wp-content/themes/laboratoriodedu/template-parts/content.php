<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <h2 class="post-card-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

    <div class="post-card-meta">
        <?php laboratoriodedu_posted_on(); ?>
        <?php
        $cats = get_the_category();
        if (!empty($cats)) {
            echo ' · ' . esc_html($cats[0]->name);
        }
        ?>
    </div>

    <div class="post-card-excerpt">
        <?php
        if (is_singular()) {
            the_content();
        } else {
            the_excerpt();
        }
        ?>
    </div>
</article>
