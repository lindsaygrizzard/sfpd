<?php
add_action( 'plugins_loaded', 'gymedge_core_load_demo_importer', 15 );
function gymedge_core_load_demo_importer(){
	add_filter( 'plugin_action_links_rt-demo-importer/rt-demo-importer.php', 'gymedge_importer_add_action_links' );
	add_filter( 'fw:ext:backups-demo:demos', 'gymedge_importer_backups_demos' );
	add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', 'gymedge_importer_after_demo_install' );
}

function gymedge_importer_add_action_links( $links ) {
	$mylinks = array(
		'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'gymedge-core' ).'</a>',
	);
	return array_merge( $links, $mylinks );
}

function gymedge_importer_backups_demos( $demos ) {
	$demos_array = array(
		'demo1' => array(
			'title' => __( 'Home 1 / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/',
		),
		'demo2' => array(
			'title' => __( 'Home 2 / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2/',
		),
		'demo3' => array(
			'title' => __( 'Home 3 / Yoga', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3/',
		),
		'demo4' => array(
			'title' => __( 'Home 4 / Personal Trainer', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-4/',
		),
		'demo9' => array(
			'title' => __( 'Home 5 / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5/',
		),
		'demo5' => array(
			'title' => __( 'Home 1 Onepage / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-1-onepage/',
		),
		'demo6' => array(
			'title' => __( 'Home 2 Onepage / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2-onepage/',
		),
		'demo7' => array(
			'title' => __( 'Home 3 Onepage / Yoga', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3-onepage/',
		),
		'demo8' => array(
			'title' => __( 'Home 4 Onepage / Personal Trainer', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-4-onepage/',
		),
		'demo10' => array(
			'title' => __( 'Home 5 Onepage / Gym Fitness', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5-onepage/',
		),
	);

	$download_url = 'http://radiustheme.com/demo/wordpress/demo-content/gymedge/';

	foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);

		$demos[ $demo->get_id() ] = $demo;

		unset($demo);
	}

	return $demos;
}

// Run after demo install
function gymedge_importer_after_demo_install( $collection ){
	// Update front page id
	$demos = array(
		'demo1'  => 1873,
		'demo2'  => 1857,
		'demo3'  => 12,
		'demo4'  => 1997,
		'demo5'  => 2182,
		'demo6'  => 2287,
		'demo7'  => 2329,
		'demo8'  => 2330,
		'demo9'  => 2476,
		'demo10' => 2601,
	);

	$data = $collection->to_array();

	foreach( $data['tasks'] as $task ) {
		if( $task['id'] == 'demo:demo-download' ){
			$demo_id = $task['args']['demo_id'];
			$page_id = $demos[$demo_id];
			update_option( 'page_on_front', $page_id );
			flush_rewrite_rules();
			break;
		}
	}

	// Update contact form 7 email
	$cf7id = 1929;
	$mail = get_post_meta( $cf7id, '_mail', true );
	$mail['recipient'] = get_option( 'admin_email' );
	if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
		$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
		$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
		$mail['sender'] = preg_replace( $pattern, $replacement, $mail['sender'] );
	}
	update_post_meta( $cf7id, '_mail', $mail );
}