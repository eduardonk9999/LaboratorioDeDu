<?php
/**
 * Template Name: About - Terminal
 * 
 * Página "Sobre" com estilo de terminal Linux
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
            <h1 class="terminal-title">eduardo@laboratoriodedu:~$</h1>
        </header>
        
        <main class="terminal-body" id="terminal-output" role="log" aria-live="polite" aria-label="Saída do terminal">
            <section class="terminal-command-group">
                <div class="terminal-line">
                    <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~$</span>
                    <code class="command">whoami</code>
                </div>
                <output class="terminal-line output" role="status">
                    Eduardo Silva
                </output>
            </section>
            
            <section class="terminal-command-group">
                <div class="terminal-line">
                    <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~$</span>
                    <code class="command">cat about.txt</code>
                </div>
                <output class="terminal-line output" role="status">
                    <article class="about-content">
                        <p>Engenheiro de software com experiência no desenvolvimento de soluções escaláveis, performáticas e orientadas ao negócio.</p>
                        
                        <section>
                            <h2 class="section-title">Backend:</h2>
                            <ul>
                                <li>Java e Spring Boot - APIs REST robustas, seguras e bem estruturadas</li>
                                <li>Python - Manipulação de dados e scripts para automatizar tarefas</li>
                            </ul>
                        </section>
                        
                        <section>
                            <h2 class="section-title">Frontend:</h2>
                            <ul>
                                <li>JavaScript, React e Next.js - Interfaces modernas e responsivas</li>
                                <li>GraphQL - Otimização da comunicação entre frontend e backend</li>
                                <li>Sites responsivos de alta performance e SEO com WordPress</li>
                            </ul>
                        </section>
                        
                        <section>
                            <h2 class="section-title">Infraestrutura & DevOps:</h2>
                            <ul>
                                <li>Bancos de dados relacionais</li>
                                <li>Práticas de DevOps - Ambientes consistentes, automação de deploys e escalabilidade</li>
                            </ul>
                        </section>
                        
                        <section>
                            <h2 class="section-title">Formação:</h2>
                            <ul>
                                <li>Análise e Desenvolvimento de Sistemas (cursando)</li>
                            </ul>
                        </section>
                        
                        <section>
                            <h2 class="section-title">Interesses:</h2>
                            <ul>
                                <li>Hardware Hacking</li>
                                <li>Bug Bounty</li>
                            </ul>
                        </section>
                        
                        <blockquote class="quote">
                            <p>Foco em entregar soluções completas, eficientes e de alta qualidade.</p>
                        </blockquote>
                        <blockquote class="quote">
                            <p>Sempre em busca de novos desafios que permitam evoluir profissionalmente e gerar impacto positivo.</p>
                        </blockquote>
                    </article>
                </output>
            </section>
            
            <section class="terminal-command-group">
                <div class="terminal-line">
                    <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~$</span>
                    <code class="command">ls -la skills/</code>
                </div>
                <output class="terminal-line output" role="status">
                    <nav class="skills-grid" aria-label="Habilidades técnicas">
                        <span class="skill-tag">Java</span>
                        <span class="skill-tag">Spring Boot</span>
                        <span class="skill-tag">Python</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">React</span>
                        <span class="skill-tag">Next.js</span>
                        <span class="skill-tag">GraphQL</span>
                        <span class="skill-tag">WordPress</span>
                        <span class="skill-tag">SQL</span>
                        <span class="skill-tag">DevOps</span>
                        <span class="skill-tag">Hardware Hacking</span>
                        <span class="skill-tag">Bug Bounty</span>
                    </nav>
                </output>
            </section>
            
            <div class="terminal-line">
                <span class="prompt" aria-label="Prompt do terminal">eduardo@laboratoriodedu:~$</span>
                <span class="command cursor-blink" aria-label="Cursor piscando">_</span>
            </div>
        </main>
    </section>
</article>

<?php
get_footer();
?>

