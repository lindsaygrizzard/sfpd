<?php
add_action( 'widgets_init', 'gymedge_widgets_init' );
if ( !function_exists( 'gymedge_widgets_init' ) ) {
	function gymedge_widgets_init() {

		// Register Custom Widgets
		register_widget( 'GymEdge_About_Widget' );
		register_widget( 'GymEdge_Address_Widget' );

		// Register Widget Areas
		$footer_count = wp_get_sidebars_widgets();
		$footer_count = empty( $footer_count['footer'] ) ? 4 : count( $footer_count['footer'] );
		switch ( $footer_count ) {
			case '1':
			$footer_class = 'col-sm-12 col-xs-12';
			break;
			case '2':
			$footer_class = 'col-sm-6 col-xs-12';
			break;
			case '3':
			$footer_class = 'col-sm-4 col-xs-12';
			break;		
			default:
			$footer_class = 'col-sm-3 col-xs-12';
			break;
		}

		register_sidebar( array(
			'name'          => __( 'Sidebar', 'gymedge' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar padding-bottom1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );
		register_sidebar( array(
			'name'          => __( 'Footer', 'gymedge' ),
			'id'            => 'footer',
			'before_widget' => '<div class="'.$footer_class.'"><div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );
	}
}