=== Disable WP REST API ===
Contributors: George Neagu  
Tags: rest api, security, disable, privacy  
Requires PHP: 7.4  
Tested up to: 6.8  
Stable tag: 1.2  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Disables the WordPress REST API for non-authenticated users, improving privacy and reducing potential attack surface. Includes a simple admin toggle to enable or disable blocking.

== Description ==

This plugin disables access to the WordPress REST API (`/wp-json/`) for all unauthenticated users. Only logged-in users will be able to make API requests.

It also includes a simple settings screen under **Settings → REST API Control** where you can toggle REST API blocking on or off.

Useful for sites that do not rely on headless frontends or external API consumers and prefer to limit public exposure of content or data.

Features:
- Blocks REST API for non-logged-in users
- Simple admin UI toggle
- Works with core endpoints and custom ones
- Returns proper `401 Unauthorized` response
- Lightweight and clean implementation
- Compatible with modern WordPress versions

✅ Logged-in users (e.g. admins, editors) can still use the REST API as usual.

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory or install it via the WordPress Plugin Directory.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to **Settings → REST API Control** to toggle blocking on or off.

== Frequently Asked Questions ==

= Will this break the block editor (Gutenberg)? =  
Possibly. If you're using the block editor, it relies on the REST API. Use with caution or only on sites that use the Classic Editor.

= Can I allow access for specific endpoints? =  
Not in this version. The plugin applies a global block for non-authenticated users.

= Where is the settings page? =  
Go to **Settings → REST API Control** in your WordPress admin.

= Is this plugin safe for production use? =  
Yes, as long as your theme or other plugins don't rely on unauthenticated API access.

== Changelog ==

= 1.2 =  
* Added admin UI toggle in Settings  
* Improved overall UX  

= 1.1 =  
* Improved compatibility with modern WordPress  
* Added `401` error message for clarity  
* Minor performance tweaks  

= 1.0 =  
* Initial release — disables REST API for non-logged-in users  

== Upgrade Notice ==

= 1.2 =  
Adds an admin toggle under Settings. Recommended update for easier control.
