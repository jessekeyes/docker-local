<?php

/** FSAP specific wp-config file 
 * 
 * INSTRUCTIONS
 * 
 * Replace vars as indicated, leave the rest as default
*/

/**
 * ACTION NEEDED!
 * REPLACE with the project's table prefix, and your local URL
 */
$table_prefix  = 'tktk_'; // replace this one with the project's 

define('WP_SITEURL', 'http://localhost:8080');

define('WP_HOME', 'http://localhost:8080');

define('PROD_URL', 'https://www.petaindia.com');

/* optional for your local */
error_reporting( E_ALL );
define( 'WP_DEBUG', false);
define('SCRIPT_DEBUG', false);

/* add any other things you might need for your local set up */


/**
 * 
 * STOP EDITING!!!!!!!!!!!
 * 
 * The db will be copied to the container with the credentials below, do not edit
 * 
 */

/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');
/** MySQL database username */
define('DB_USER', 'wordpress');
/** MySQL database password */
define('DB_PASSWORD', 'wordpress');
/** MySQL hostname */
define('DB_HOST', 'db');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

 function filter_image_url($url){
	$liveurl = PROD_URL; // make this prod url of the project
	$localurl = WP_SITEURL;
	$url = str_replace($localurl, $liveurl, $url);
	return $url;
}
add_filter('wp_get_attachment_url', 'filter_image_url');

// Replace srcset paths
function filter_image_srcset($sources) {
	$liveurl = PROD_URL; // make this prod url of the project
	$localurl = WP_SITEURL;

	foreach( $sources as &$source )  {
		if ( !file_exists( $source['url'] ) ) {
			$source['url'] = str_replace( $localurl, $liveurl, $source['url'] );
		}
	}
	return $sources;
}
add_filter('wp_calculate_image_srcset', 'filter_image_srcset', 1, 1);
