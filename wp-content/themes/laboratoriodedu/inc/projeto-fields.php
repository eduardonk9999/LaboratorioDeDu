<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adiciona campos customizados para projetos
 */

/**
 * Adiciona meta boxes para projetos
 */
function laboratoriodedu_add_projeto_meta_boxes()
{
    // Adiciona meta box para posts (projetos)
    add_meta_box(
        'projeto_links',
        __('🔗 Links do Projeto', 'laboratoriodedu'),
        'laboratoriodedu_projeto_links_callback',
        'post',
        'normal',
        'high'
    );

    add_meta_box(
        'projeto_info',
        __('ℹ️ Informações do Projeto', 'laboratoriodedu'),
        'laboratoriodedu_projeto_info_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'laboratoriodedu_add_projeto_meta_boxes');

/**
 * Callback para meta box de links
 */
function laboratoriodedu_projeto_links_callback($post)
{
    wp_nonce_field('laboratoriodedu_save_projeto_meta', 'laboratoriodedu_projeto_meta_nonce');

    $github_url = get_post_meta($post->ID, '_projeto_github_url', true);
    $demo_url = get_post_meta($post->ID, '_projeto_demo_url', true);
    $figma_url = get_post_meta($post->ID, '_projeto_figma_url', true);
    $site_url = get_post_meta($post->ID, '_projeto_site_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="projeto_github_url"><?php _e('GitHub URL', 'laboratoriodedu'); ?></label></th>
            <td>
                <input type="url" id="projeto_github_url" name="projeto_github_url" value="<?php echo esc_attr($github_url); ?>" class="regular-text" placeholder="https://github.com/usuario/repo">
                <p class="description">Link para o repositório no GitHub</p>
            </td>
        </tr>
        <tr>
            <th><label for="projeto_demo_url"><?php _e('URL da Demo', 'laboratoriodedu'); ?></label></th>
            <td>
                <input type="url" id="projeto_demo_url" name="projeto_demo_url" value="<?php echo esc_attr($demo_url); ?>" class="regular-text" placeholder="https://demo.com">
                <p class="description">Link para a versão demo/publicada do projeto</p>
            </td>
        </tr>
        <tr>
            <th><label for="projeto_site_url"><?php _e('Site URL (opcional)', 'laboratoriodedu'); ?></label></th>
            <td>
                <input type="url" id="projeto_site_url" name="projeto_site_url" value="<?php echo esc_attr($site_url); ?>" class="regular-text" placeholder="https://site.com">
                <p class="description">Link para o site oficial do projeto</p>
            </td>
        </tr>
        <tr>
            <th><label for="projeto_figma_url"><?php _e('Figma URL (opcional)', 'laboratoriodedu'); ?></label></th>
            <td>
                <input type="url" id="projeto_figma_url" name="projeto_figma_url" value="<?php echo esc_attr($figma_url); ?>" class="regular-text" placeholder="https://figma.com/...">
                <p class="description">Link para o design no Figma</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Callback para meta box de informações
 */
function laboratoriodedu_projeto_info_callback($post)
{
    $status = get_post_meta($post->ID, '_projeto_status', true);
    $tecnologias = get_post_meta($post->ID, '_projeto_tecnologias', true);
    $ano = get_post_meta($post->ID, '_projeto_ano', true);
    ?>
    <p>
        <label for="projeto_status"><strong><?php _e('Status:', 'laboratoriodedu'); ?></strong></label><br>
        <select id="projeto_status" name="projeto_status" style="width: 100%;">
            <option value=""><?php _e('Selecione...', 'laboratoriodedu'); ?></option>
            <option value="concluido" <?php selected($status, 'concluido'); ?>><?php _e('✅ Concluído', 'laboratoriodedu'); ?></option>
            <option value="em-desenvolvimento" <?php selected($status, 'em-desenvolvimento'); ?>><?php _e('🚧 Em Desenvolvimento', 'laboratoriodedu'); ?></option>
            <option value="pausado" <?php selected($status, 'pausado'); ?>><?php _e('⏸️ Pausado', 'laboratoriodedu'); ?></option>
            <option value="arquivado" <?php selected($status, 'arquivado'); ?>><?php _e('📦 Arquivado', 'laboratoriodedu'); ?></option>
        </select>
    </p>
    
    <p>
        <label for="projeto_tecnologias"><strong><?php _e('Tecnologias:', 'laboratoriodedu'); ?></strong></label><br>
        <input type="text" id="projeto_tecnologias" name="projeto_tecnologias" value="<?php echo esc_attr($tecnologias); ?>" class="regular-text" placeholder="React, Node.js, MongoDB">
        <p class="description">Separe por vírgula (ex: React, Node.js, MongoDB)</p>
    </p>
    
    <p>
        <label for="projeto_ano"><strong><?php _e('Ano:', 'laboratoriodedu'); ?></strong></label><br>
        <input type="number" id="projeto_ano" name="projeto_ano" value="<?php echo esc_attr($ano); ?>" min="2000" max="<?php echo date('Y') + 1; ?>" placeholder="<?php echo date('Y'); ?>">
    </p>
    <?php
}

/**
 * Salva os meta boxes
 */
function laboratoriodedu_save_projeto_meta($post_id)
{
    // Verifica nonce
    if (!isset($_POST['laboratoriodedu_projeto_meta_nonce']) || 
        !wp_verify_nonce($_POST['laboratoriodedu_projeto_meta_nonce'], 'laboratoriodedu_save_projeto_meta')) {
        return;
    }

    // Verifica autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Verifica permissões
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Salva campos de links
    if (isset($_POST['projeto_github_url'])) {
        update_post_meta($post_id, '_projeto_github_url', esc_url_raw($_POST['projeto_github_url']));
    }

    if (isset($_POST['projeto_demo_url'])) {
        update_post_meta($post_id, '_projeto_demo_url', esc_url_raw($_POST['projeto_demo_url']));
    }

    if (isset($_POST['projeto_site_url'])) {
        update_post_meta($post_id, '_projeto_site_url', esc_url_raw($_POST['projeto_site_url']));
    }

    if (isset($_POST['projeto_figma_url'])) {
        update_post_meta($post_id, '_projeto_figma_url', esc_url_raw($_POST['projeto_figma_url']));
    }

    // Salva informações
    if (isset($_POST['projeto_status'])) {
        update_post_meta($post_id, '_projeto_status', sanitize_text_field($_POST['projeto_status']));
    }

    if (isset($_POST['projeto_tecnologias'])) {
        update_post_meta($post_id, '_projeto_tecnologias', sanitize_text_field($_POST['projeto_tecnologias']));
    }

    if (isset($_POST['projeto_ano'])) {
        update_post_meta($post_id, '_projeto_ano', absint($_POST['projeto_ano']));
    }
}
add_action('save_post', 'laboratoriodedu_save_projeto_meta');

/**
 * Funções helper para obter dados do projeto
 */
function laboratoriodedu_get_projeto_links($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return [
        'github' => get_post_meta($post_id, '_projeto_github_url', true),
        'demo'   => get_post_meta($post_id, '_projeto_demo_url', true),
        'site'   => get_post_meta($post_id, '_projeto_site_url', true),
        'figma'  => get_post_meta($post_id, '_projeto_figma_url', true),
    ];
}

function laboratoriodedu_get_projeto_status($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return get_post_meta($post_id, '_projeto_status', true);
}

function laboratoriodedu_get_projeto_tecnologias($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $techs = get_post_meta($post_id, '_projeto_tecnologias', true);
    if ($techs) {
        return array_map('trim', explode(',', $techs));
    }
    return [];
}

function laboratoriodedu_get_projeto_ano($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return get_post_meta($post_id, '_projeto_ano', true);
}

