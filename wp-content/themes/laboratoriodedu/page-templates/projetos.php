<?php
/**
 * Template Name: Projetos - Terminal
 * 
 * Página de listagem de projetos com estilo de terminal Linux
 * HTML extremamente semântico
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<article class="terminal-container">
    <section class="terminal-window">
        <header class="terminal-header">
            <nav class="terminal-buttons" aria-label="Controles da janela do terminal">
                <button type="button" class="btn btn-close" aria-label="Fechar terminal">
                    <span class="sr-only">Fechar</span>
                </button>
                <button type="button" class="btn btn-minimize" aria-label="Minimizar terminal">
                    <span class="sr-only">Minimizar</span>
                </button>
                <button type="button" class="btn btn-maximize" aria-label="Maximizar terminal">
                    <span class="sr-only">Maximizar</span>
                </button>
            </nav>
            <h1 class="terminal-title">eduardo@laboratoriodedu:~/projetos$</h1>
        </header>
        
        <main class="terminal-body" id="terminal-output" role="log" aria-live="polite" aria-label="Saída do terminal">
            <section class="terminal-command-group">
                <div class="terminal-line">
                    <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~/projetos$</span>
                    <code class="command">ls -la</code>
                </div>
                <output class="terminal-line output" role="status">
                    <?php
                    // Busca todos os posts (projetos)
                    $projetos_query = new WP_Query([
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        // Remove filtro de categoria para mostrar todos os posts
                    ]);
                    
                    if ($projetos_query->have_posts()) :
                    ?>
                        <ul class="projetos-list" role="list">
                            <?php while ($projetos_query->have_posts()) : $projetos_query->the_post(); ?>
                                <li class="projeto-item" role="listitem">
                                    <article class="projeto-terminal-card">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>" class="projeto-thumbnail-link">
                                                <?php the_post_thumbnail('medium', ['class' => 'projeto-thumbnail', 'alt' => get_the_title()]); ?>
                                            </a>
                                        <?php endif; ?>
                                        
                                        <div class="projeto-info">
                                            <h2 class="projeto-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            
                                            <?php if (has_excerpt()) : ?>
                                                <p class="projeto-excerpt"><?php the_excerpt(); ?></p>
                                            <?php endif; ?>
                                            
                                            <?php
                                            $tecnologias = laboratoriodedu_get_projeto_tecnologias();
                                            if (!empty($tecnologias)) :
                                            ?>
                                                <div class="projeto-techs">
                                                    <?php foreach ($tecnologias as $tech) : ?>
                                                        <span class="tech-badge"><?php echo esc_html($tech); ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="projeto-meta">
                                                <?php
                                                $ano = laboratoriodedu_get_projeto_ano();
                                                if ($ano) {
                                                    echo '<span class="projeto-ano">' . esc_html($ano) . '</span> · ';
                                                }
                                                ?>
                                                <span class="projeto-date"><?php echo get_the_date(); ?></span>
                                                
                                                <?php
                                                $status = laboratoriodedu_get_projeto_status();
                                                if ($status) {
                                                    $status_labels = [
                                                        'concluido' => '✅ Concluído',
                                                        'em-desenvolvimento' => '🚧 Em Dev',
                                                        'pausado' => '⏸️ Pausado',
                                                        'arquivado' => '📦 Arquivado',
                                                    ];
                                                    $status_label = isset($status_labels[$status]) ? $status_labels[$status] : $status;
                                                    echo ' · <span class="projeto-status">' . esc_html($status_label) . '</span>';
                                                }
                                                ?>
                                            </div>
                                            
                                            <?php
                                            $links = laboratoriodedu_get_projeto_links();
                                            if (!empty($links['github']) || !empty($links['demo']) || !empty($links['site']) || !empty($links['figma'])) :
                                            ?>
                                                <div class="projeto-links">
                                                    <?php if (!empty($links['github'])) : ?>
                                                        <a href="<?php echo esc_url($links['github']); ?>" target="_blank" rel="noopener" class="projeto-link-btn">📦 GitHub</a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($links['demo'])) : ?>
                                                        <a href="<?php echo esc_url($links['demo']); ?>" target="_blank" rel="noopener" class="projeto-link-btn">🚀 Demo</a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($links['site'])) : ?>
                                                        <a href="<?php echo esc_url($links['site']); ?>" target="_blank" rel="noopener" class="projeto-link-btn">🌐 Site</a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($links['figma'])) : ?>
                                                        <a href="<?php echo esc_url($links['figma']); ?>" target="_blank" rel="noopener" class="projeto-link-btn">🎨 Figma</a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p class="no-projetos">Nenhum projeto encontrado. Crie posts para que apareçam aqui.</p>
                    <?php endif; ?>
                </output>
            </section>
            
            <div class="terminal-line">
                <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~/projetos$</span>
                <span class="command cursor-blink" aria-label="Cursor piscando">_</span>
            </div>
        </main>
    </section>
</article>

<?php
get_footer();
?>

