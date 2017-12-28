<?php
$gym_theme_data = wp_get_theme( get_template() );

if ( function_exists('vc_is_inline') && vc_is_inline() ) {
	define( 'GYMEDGE_THEME_VERSION', time() );
}
else {
	define( 'GYMEDGE_THEME_VERSION', ( WP_DEBUG ) ? time() : $gym_theme_data->get( 'Version' ) );
}
define( 'GYMEDGE_THEME_AUTHOR_URI', $gym_theme_data->get( 'AuthorURI' ) );

// DIR
define( 'GYMEDGE_BASE_DIR',    get_template_directory(). '/' );
define( 'GYMEDGE_INC_DIR',     GYMEDGE_BASE_DIR . 'inc/' );
define( 'GYMEDGE_LIB_DIR',     GYMEDGE_BASE_DIR . 'lib/' );
define( 'GYMEDGE_WID_DIR',     GYMEDGE_INC_DIR . 'widgets/' );
define( 'GYMEDGE_PLUGINS_DIR', GYMEDGE_INC_DIR . 'plugins/' );
define( 'GYMEDGE_JS_DIR',      GYMEDGE_BASE_DIR . 'assets/js/' );

// URL
define( 'GYMEDGE_BASE_URL',    get_template_directory_uri(). '/' );
define( 'GYMEDGE_ASSETS_URL',  GYMEDGE_BASE_URL . 'assets/' );
define( 'GYMEDGE_CSS_URL',     GYMEDGE_ASSETS_URL . 'css/' );
define( 'GYMEDGE_JS_URL',      GYMEDGE_ASSETS_URL . 'js/' );
define( 'GYMEDGE_IMG_URL',     GYMEDGE_ASSETS_URL . 'img/' );

// Includes
require_once GYMEDGE_INC_DIR . 'redux-config.php';
require_once GYMEDGE_INC_DIR . 'gymedge.php';
require_once GYMEDGE_INC_DIR . 'helper-functions.php';
require_once GYMEDGE_INC_DIR . 'general.php';
require_once GYMEDGE_INC_DIR . 'scripts.php';
require_once GYMEDGE_INC_DIR . 'template-vars.php';
require_once GYMEDGE_INC_DIR . 'woo-hooks.php';
require_once GYMEDGE_INC_DIR . 'vc-settings.php';

// Widgets
require_once GYMEDGE_WID_DIR . 'widget-settings.php';
require_once GYMEDGE_WID_DIR . 'rt-widget-fields.php';
require_once GYMEDGE_WID_DIR . 'address-widget.php';
require_once GYMEDGE_WID_DIR . 'about-widget.php';
require_once GYMEDGE_WID_DIR . 'search-widget.php'; // override default

// TGM Plugin Activation
require_once GYMEDGE_LIB_DIR . 'class-tgm-plugin-activation.php';
require_once GYMEDGE_INC_DIR . 'tgm-config.php';