<?php
/*
Plugin Name: Disable REST API
Description: This plugin is meant to restrict access to the WordPress REST API.
Version: 1.1
Stable tag: 1.1
Author: George Neagu
Tested up to: 6.8
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_filter('rest_authentication_errors', function ($result) {
    if (!is_user_logged_in()) {
        return new WP_Error('rest_cannot_access', 'REST API restricted to authenticated users.', ['status' => 401]);
    }
    return $result;
});
