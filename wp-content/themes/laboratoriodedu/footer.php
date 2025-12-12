<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
</main>

<footer class="site-footer">
    <div class="footer-content">
        <p class="footer-left">
            LaboratorioEdu
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/iconMy.png" alt="LaboratorioEdu" class="site-icon">
            · <?php echo date('Y'); ?>
        </p>
        
        <nav class="footer-nav" role="navigation" aria-label="Redes sociais">
            <a href="https://www.linkedin.com/in/eduardo-silva-537963160/" target="_blank" rel="noopener noreferrer" class="linkedin-link" aria-label="LinkedIn">
                <?php
                $linkedin_svg = get_template_directory() . '/assets/images/linkedin.svg';
                if (file_exists($linkedin_svg)) {
                    echo file_get_contents($linkedin_svg);
                }
                ?>
            </a>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
