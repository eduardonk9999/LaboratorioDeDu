<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<article class="post-card">
    <h1 class="post-card-title">404</h1>
    <p>Essa rota do laboratório não existe.</p>
    <p><a href="<?php echo esc_url(home_url('/')); ?>">Voltar para a base</a></p>
</article>

<?php
get_footer();
