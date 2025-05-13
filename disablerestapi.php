<?php
/*
Plugin Name: Disable WP REST API
Description: Disables the WordPress REST API for non-logged-in users. Includes admin toggle.
Version: 1.2
Author: George Neagu
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or exit;

// Default: enable REST API blocking
function dwrai_register_setting()
{
    register_setting('dwrai_settings_group', 'dwrai_disable_rest_api', [
        'type' => 'boolean',
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ]);
}
add_action('admin_init', 'dwrai_register_setting');

// Add settings page
function dwrai_add_settings_page()
{
    add_options_page(
        'REST API Control',
        'REST API Control',
        'manage_options',
        'dwrai-settings',
        'dwrai_render_settings_page'
    );
}
add_action('admin_menu', 'dwrai_add_settings_page');

// Render settings UI
function dwrai_render_settings_page()
{
?>
    <div class="wrap">
        <h1>REST API Control</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('dwrai_settings_group');
            do_settings_sections('dwrai_settings_group');
            $value = get_option('dwrai_disable_rest_api', true);
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Disable REST API for non-logged-in users</th>
                    <td>
                        <input type="checkbox" name="dwrai_disable_rest_api" value="1" <?php checked(1, $value); ?> />
                        <label for="dwrai_disable_rest_api">Yes, block unauthenticated access to the REST API</label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// Block REST API for unauthenticated users if setting is enabled
function dwrai_restrict_rest_api($result)
{
    $should_block = get_option('dwrai_disable_rest_api', true);
    if ($should_block && !is_user_logged_in()) {
        return new WP_Error(
            'rest_cannot_access',
            __('REST API restricted to authenticated users.'),
            array('status' => 401)
        );
    }
    return $result;
}
add_filter('rest_authentication_errors', 'dwrai_restrict_rest_api');
