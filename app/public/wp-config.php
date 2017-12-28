<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WY3GoC9liIZqDrDVk60vSLTsEDyj9z01pnxc8BaP61ZRbRx3j0lvdAIPyGr30cxwRp9N4LyVPaUA59qPtZNzvA==');
define('SECURE_AUTH_KEY',  'XdfZccEo2xSIQ2eHzX3Y5U6kQkwF2fS03lkHi2Nwnv+MYNIU7IRXvdX5hFo+DS5Lb8b0wTJJ861GpaPVRBKvmg==');
define('LOGGED_IN_KEY',    'GnsB6rTtO1AZd2eK+kqMZq8E2Vnr1YP7XVBTwiNFHRFDTUKBLaCJxAe92VHT++BhqRjI+A4Jets+UGJkmg1ciA==');
define('NONCE_KEY',        '9w6MinJqKnrS255xznHPwp0uwoOZ5dXWXhxBxBaSd3KQTUnnlaHPQUt3nTFy/LG0Nnr4QND64MGoPfOSAg7PVQ==');
define('AUTH_SALT',        'CU66kAJaUjO6bb6kBgIlCCLYw7VlFusnx75FbDYG5mkKkn78w4n1Z04QuUhv8D4dvM721fzvUEh/1Gx1LsfSJg==');
define('SECURE_AUTH_SALT', 'dmGUu2L07uzO0hrKlhFjqn0zsi558C3O/Z+M7Ad0AWSgJkpi1nEvDNlW6l3YiKSWwzhJWcqYa/7eqgDLfW9tlA==');
define('LOGGED_IN_SALT',   '6MwSOVW23SXWBnZnXD2UCSu9ArBTJPxLKVe/QcNZTGg9QdACkR72j8IT+hjXFvxXmp9+tMoSgsxtXHxfwddOFw==');
define('NONCE_SALT',       'CZoAfFoafw11Nun4Rt5c/5SGiwBP3K+Wn823dXe+0j63oV1IaJiCO3C4vh5rhN2W7pub6an59hSLc2+8fxyk/A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if (strpos($_SERVER['SERVER_SOFTWARE'], 'Flywheel/') !== false) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
