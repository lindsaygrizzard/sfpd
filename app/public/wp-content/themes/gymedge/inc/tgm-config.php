<?php
add_action( 'tgmpa_register', 'gymedge_register_required_plugins' );
if ( !function_exists( 'gymedge_register_required_plugins' ) ) {
	function gymedge_register_required_plugins() {
		$plugins = array(
			// Bundled
			array(
				'name'         => 'GymEdge Core',
				'slug'         => 'gymedge-core',
				'source'       => 'gymedge-core.zip',
				'required'     =>  true,
				'external_url' => 'http://radiustheme.com',
				'version'      => '2.5'
			),
			array(
				'name'         => 'RT Demo Importer',
				'slug'         => 'rt-demo-importer',
				'source'       => 'rt-demo-importer.zip',
				'required'     =>  true,
				'external_url' => 'http://radiustheme.com',
				'version'      => '2.1'
			),
			array(
				'name'         => 'WPBakery Page Builder',
				'slug'         => 'js_composer',
				'source'       => 'js_composer.zip',
				'required'     => true,
				'external_url' => 'http://vc.wpbakery.com',
				'version'      => '5.4.4'
			),
			array(
				'name'         => 'LayerSlider WP',
				'slug'         => 'LayerSlider',
				'source'       => 'LayerSlider.zip',
				'required'     => false,
				'external_url' => 'https://layerslider.kreaturamedia.com',
				'version'      => '6.6.2'
			),
			array(
				'name'         => 'WP Logo Showcase',
				'slug'         => 'wp-logo-showcase',
				'source'       => 'wp-logo-showcase.zip',
				'required'     => false,
				'external_url' => 'https://radiustheme.com/',
				'version'      => '2.1.2'
			),

			// Bundled from repo
			array(
				'name'     => 'Easy Twitter Feed Widget',
				'slug'     => 'easy-twitter-feed-widget',
				'source'   => 'easy-twitter-feed-widget.zip',
				'required' => false,
				'external_url' => 'https://designorbital.com',
				'version'      => '0.8'
			),

			// Repository
			array(
				'name'     => 'Redux Framework',
				'slug'     => 'redux-framework',
				'required' => true,
			),
			array(
				'name'     => 'Breadcrumb NavXT',
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),
			array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => 'Flickr Badges Widget',
				'slug'     => 'flickr-badges-widget',
				'required' => false,
			),
			array(
				'name'     => 'WP Retina 2x',
				'slug'     => 'wp-retina-2x',
				'required' => false,
			),
			array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Quick View',
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Wishlist',
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			),

		);

		$config = array(
			'id'           => 'gymedge',             // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => GYMEDGE_PLUGINS_DIR,   // Default absolute path to bundled plugins.
			'menu'         => 'gymedge-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}