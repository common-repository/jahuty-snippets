<?php
/**
 * Plugin Name: Jahuty Snippets
 * Plugin URI: http://www.jahuty.com
 * Description: Turn any page into a content-managed page with Jahuty.
 * Version: 1.0.1
 * Author: Andres OBrien
 */

add_action('admin_menu', 'jSnippetsMenu');
add_action('wp_enqueue_scripts', 'jSnippetsAddScripts');
add_action('wp_head', 'jSnippetsAddInlineScripts', 0);

function jSnippetsAddInlineScripts(): void
{
    $apiKey = jSnippetsGetApiKey();

    echo "<script type='text/javascript'>window.jahuty_api_key='{$apiKey}'</script>\n";
}

function jSnippetsAddScripts(): void
{
    wp_register_script('jahuty-scripts', 'https://s3-us-west-2.amazonaws.com/s3-uw2-snippets-p-public/jahuty-0.0.2.js');
    wp_enqueue_script('jahuty-scripts');
}

function jSnippetsGetApiKey()
{
    return esc_attr(get_option('jahuty_api_key', null));
}

function jSnippetsRegisterSettings(): void
{
    register_setting('jahuty_options', 'jahuty_api_key');
}

function jSnippetsMain(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.', 'TEXT-DOMAIN'));
    }

    ?>
    <h1>Snippets</h1>
    <div class="wrap">
        <form method="post" action="options.php" id="jahuty-api-key-options-form">
            <?php settings_fields('jahuty_options'); ?>
            <?php do_settings_sections('jahuty_options'); ?>
            <h3>
                <label for="jahuty_api_key">API Key: </label>
                <input class="regular-text"
                       type="text"
                       id="jahuty_api_key"
                       name="jahuty_api_key"
                       value="<?= jSnippetsGetApiKey() ?>"/>
            </h3>
            <p>
                <input class="button-primary" type="submit" name="submit" value="Save API Key"/>
            </p>
        </form>
    </div>
    <?php
}

function jSnippetsMenu(): void
{
    add_options_page('Jahuty Snippets', 'Snippets', 'manage_options', 'jahuty-snippets-plugin', 'jSnippetsMain');
    add_action('admin_init', 'jSnippetsRegisterSettings');
}
