<?php
if (!isset($content_width)) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'gymedge_setup');
function gymedge_setup() {
	// Language
	load_theme_textdomain( 'gymedge', GYMEDGE_BASE_DIR . 'languages' );

	// Theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	add_post_type_support( 'post', 'page-attributes' );

	// Image sizes
	add_image_size( 'gymedge-size1', 1200, 600, true ); // post large
	add_image_size( 'gymedge-size2', 410, 200, true ); // post small, class slider
	add_image_size( 'gymedge-size3', 360, 460, true ); // trainer
	add_image_size( 'gymedge-size4', 360, 360, array( 'center', 'top' ) ); // trainer square
	add_image_size( 'gymedge-size5', 360, 300, true ); // class grid
	add_image_size( 'gymedge-size6', 800, 600, true ); // gallery large
	add_image_size( 'gymedge-size7', 400, 270, true ); // gallery small

	// Register menus
	register_nav_menus(array(
		'primary' => esc_html__( 'Primary', 'gymedge' ),
		'top'     => esc_html__( 'Header Top', 'gymedge' ),
	));
}