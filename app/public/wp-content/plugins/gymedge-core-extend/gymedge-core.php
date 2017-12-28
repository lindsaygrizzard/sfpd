<?php
/*
Plugin Name: GymEdge Core
Plugin URI: http://radiustheme.com
Description: GymEdge Core Plugin for GymEdge Theme
Version: 2.5
Author: Radius Theme
Author URI: http://radiustheme.com
*/

// Text Domain
add_action( 'plugins_loaded', 'gymedge_core_load_textdomain' );
function gymedge_core_load_textdomain() {
	load_plugin_textdomain( 'gymedge-core' , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

// Post types
add_action( 'after_setup_theme', 'gymedge_core_post_types', 12 );
function gymedge_core_post_types(){
	if ( !defined( 'GYMEDGE_THEME_VERSION' ) ) {
		return;
	}
	require_once 'radius-posts/rt-posts.php';
	require_once 'radius-posts/rt-postmeta.php';
	require_once 'post-types.php';
	require_once 'post-meta.php';
}

// Visual composer
add_action( 'after_setup_theme', 'gymedge_core_vc_modules', 13 );
function gymedge_core_vc_modules(){
	if ( !defined( 'GYMEDGE_THEME_VERSION' ) || ! defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	$modules = array( 'inc/abstruct', 'title', 'post-slider', 'post-grid', 'bmi-calculator', 'trainer', 'class', 'class-upcoming', 'schedule', 'routine', 'testimonial', 'info-text', 'about', 'pricing-box', 'button', 'counter', 'gallery', 'cta', 'cta-signup', 'cta-discount', 'about-fitness' );
	
	if ( class_exists( 'WooCommerce' ) ) {
		array_push( $modules, 'product-slider' );
	}

	apply_filters( 'gymedge_vc_addons_list', $modules );
	
	foreach ( $modules as $module ) {
		$template_name = "/vc-custom-addons/{$module}-class.php";
		if ( file_exists( STYLESHEETPATH . $template_name ) ) {
			$file = STYLESHEETPATH . $template_name;
		}
		elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
			$file = TEMPLATEPATH . $template_name;
		}
		else {
			$file = 'vc-modules/' . $module. '.php';
		}

		require_once $file;
	}
}

// Custom Functions
function rt_vc_pagination(){
	if ( !defined( 'GYMEDGE_THEME_VERSION' ) ) {
		return;
	}
	return GymEdge_Helper::pagination();
}

// Demo Importer settings
require_once 'demo-importer.php';