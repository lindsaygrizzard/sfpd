<?php
if ( !function_exists( 'gymedge_fonts_url' ) ) {
	function gymedge_fonts_url(){
		$fonts_url = '';
		if ( 'off' !== _x( 'on', 'Google fonts - Open Sans and Roboto : on or off', 'gymedge' ) ) {
			$fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:400,400i,600|Roboto:400,500,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		}
		return $fonts_url;
	}	
}

add_action( 'wp_enqueue_scripts', 'gymedge_register_scripts', 12 );
if ( !function_exists( 'gymedge_register_scripts' ) ) {
	function gymedge_register_scripts(){
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       GYMEDGE_CSS_URL . 'owl.carousel.min.css', array(), GYMEDGE_THEME_VERSION );
		wp_register_style( 'owl-theme-default',  GYMEDGE_CSS_URL . 'owl.theme.default.min.css', array(), GYMEDGE_THEME_VERSION );
		// magnific popup
		wp_register_style( 'magnific-popup',     GYMEDGE_CSS_URL . 'magnific-popup.min.css', array(), GYMEDGE_THEME_VERSION );

		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',          GYMEDGE_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// isotope
		wp_register_script( 'isotope-pkgd',          GYMEDGE_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// magnific popup
		wp_register_script( 'jquery-magnific-popup', GYMEDGE_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// vc gallery js
		wp_register_script( 'gym-vc-gallery',        GYMEDGE_JS_URL . 'vc-gallery.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'gymedge_enqueue_scripts', 15 );
if ( !function_exists( 'gymedge_enqueue_scripts' ) ) {
	function gymedge_enqueue_scripts() {
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'gymedge-gfonts',       gymedge_fonts_url(), array(), GYMEDGE_THEME_VERSION );
		// Bootstrap CSS
		wp_enqueue_style( 'bootstrap',            GYMEDGE_CSS_URL . 'bootstrap.min.css', array(), GYMEDGE_THEME_VERSION );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',         GYMEDGE_CSS_URL . 'font-awesome.min.css', array(), GYMEDGE_THEME_VERSION );
		// Meanmenu CSS
		wp_enqueue_style( 'meanmenu',             GYMEDGE_CSS_URL . 'meanmenu.css', array(), GYMEDGE_THEME_VERSION );
		// main CSS
		wp_enqueue_style( 'gymedge-default',      GYMEDGE_CSS_URL . 'default.css', array(), GYMEDGE_THEME_VERSION );
		// vc modules css
		wp_enqueue_style( 'gymedge-vc',           GYMEDGE_CSS_URL . 'vc.css', array(), GYMEDGE_THEME_VERSION );
		// style CSS
		wp_enqueue_style( 'gymedge-style',        GYMEDGE_CSS_URL . 'style.css', array(), GYMEDGE_THEME_VERSION );
		// responsive CSS
		wp_enqueue_style( 'gymedge-responsive',   GYMEDGE_CSS_URL . 'responsive.css', array(), GYMEDGE_THEME_VERSION );
		// variable style CSS
		ob_start();
		include GYMEDGE_INC_DIR . 'variable-style.php';
		include GYMEDGE_INC_DIR . 'variable-style-vc.php';
		$variable_css  = ob_get_clean();
		$variable_css .= wp_kses_post( GymEdge::$options['custom_css'] ); // custom css
		wp_add_inline_style( 'gymedge-responsive', $variable_css );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',             GYMEDGE_JS_URL . 'bootstrap.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',            GYMEDGE_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu',       GYMEDGE_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Cookie js
		wp_enqueue_script( 'js-cookie',             GYMEDGE_JS_URL . 'js.cookie.min.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// main js
		wp_enqueue_script( 'gymedge-main',          GYMEDGE_JS_URL . 'main.js', array( 'jquery' ), GYMEDGE_THEME_VERSION, true );
		// localize script
		$gym_localize_data = array(
			'stickyMenu' => GymEdge::$options['sticky_menu'],
			'siteLogo'   => '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo('title') ) . '"><img class="logo-small" src="'. esc_url( GymEdge::$options['logo']['url'] ).'" /></a>',
			'extraOffset' => GymEdge::$options['sticky_menu'] ? 67 : 0,
			'extraOffsetMobile' => GymEdge::$options['sticky_menu'] ? 52 : 0,
		);
		wp_localize_script( 'gymedge-main', 'gymEdgeObj', $gym_localize_data );
	}
}

// Admin Scripts
add_action( 'admin_enqueue_scripts', 'gymedge_admin_scripts', 12 );
if ( !function_exists( 'gymedge_admin_scripts' ) ) {
	function gymedge_admin_scripts(){
		global $pagenow, $typenow;

		wp_enqueue_style( 'font-awesome', GYMEDGE_CSS_URL . 'font-awesome.min.css', array(), GYMEDGE_THEME_VERSION );

		if( !in_array( $pagenow, array('post.php', 'post-new.php', 'edit.php') ) ) return;
		
		if( $typenow == 'wlshowcasesc' ){
			wp_enqueue_style( 'gymedge-logo-showcase', GYMEDGE_CSS_URL . 'admin-logo-showcase.css', array(), GYMEDGE_THEME_VERSION );
		}
	}
}