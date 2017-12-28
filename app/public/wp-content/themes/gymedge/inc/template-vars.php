<?php
add_action( 'template_redirect', 'gymedge_template_vars' );
if ( !function_exists( 'gymedge_template_vars' ) ) {
	function gymedge_template_vars() {
		// Single Pages
		if ( is_single() || is_page() ) {
			$post_type = get_post_type();
			$post_id = get_the_id();
			switch ( $post_type ) {
				case 'page':
				$prefix = 'page';
				break;
				case 'post':
				$prefix = 'single_post';
				break;
				case 'gym_trainer':
				$prefix = 'trainer';
				break;
				case 'gym_class':
				$prefix = 'class';
				break;
				case 'product':
				$prefix = 'product';
				break;
				default:
				$prefix = 'single_post';
				break;
			}
			
			$layout          = get_post_meta( $post_id, 'gym_layout', true );
			$top_bar         = get_post_meta( $post_id, 'gym_top_bar', true );
			$header_style    = get_post_meta( $post_id, 'gym_header', true );
			$padding_top     = get_post_meta( $post_id, 'gym_top_padding', true );
			$padding_bottom  = get_post_meta( $post_id, 'gym_bottom_padding', true );
			$has_banner      = get_post_meta( $post_id, 'gym_banner', true );
			$has_breadcrumb  = get_post_meta( $post_id, 'gym_breadcrumb', true );
			$bgtype          = get_post_meta( $post_id, 'gym_banner_type', true );
			$bgcolor         = get_post_meta( $post_id, 'gym_banner_bgcolor', true );
			$bgimg           = get_post_meta( $post_id, 'gym_banner_bgimg', true );

			GymEdge::$layout         = ( empty( $layout ) || $layout == 'default' ) ? GymEdge::$options[$prefix. '_layout']: $layout;

			GymEdge::$top_bar        = ( empty( $top_bar ) || $top_bar == 'default' ) ? GymEdge::$options['top_bar']: $top_bar;

			GymEdge::$header_style   = ( empty( $header_style ) || $header_style == 'default' ) ? GymEdge::$options[$prefix. '_header']: $header_style;

			$padding_top               = ( empty( $padding_top ) || $padding_top == 'default' ) ? GymEdge::$options[$prefix. '_padding_top']: $padding_top;
			GymEdge::$padding_top    = (int) $padding_top;      

			$padding_bottom            = ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? GymEdge::$options[$prefix. '_padding_bottom']: $padding_bottom;
			GymEdge::$padding_bottom = (int) $padding_bottom;  

			GymEdge::$has_banner     = ( empty( $has_banner ) || $has_banner == 'default' ) ? GymEdge::$options[$prefix. '_banner']: $has_banner;

			GymEdge::$has_breadcrumb = ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? GymEdge::$options[$prefix. '_breadcrumb']: $has_breadcrumb;

			GymEdge::$bgtype         = ( empty( $bgtype ) || $bgtype == 'default' ) ? GymEdge::$options[$prefix. '_bgtype']: $bgtype;

			GymEdge::$bgcolor        = empty( $bgcolor ) ? GymEdge::$options[$prefix. '_bgcolor']: $bgcolor;

			if ( !empty( $bgimg ) ) {
				$attch_url = wp_get_attachment_image_src( $bgimg, 'full' );
				GymEdge::$bgimg =  $attch_url[0];
			}
			elseif ( !empty( GymEdge::$options[$prefix. '_bgimg']['id'] ) ) {
				$attch_url = wp_get_attachment_image_src( GymEdge::$options[$prefix. '_bgimg']['id'], 'full' );
				GymEdge::$bgimg =  $attch_url[0];
			}
			else{
				GymEdge::$bgimg = GYMEDGE_IMG_URL . 'banner.jpg';
			}
		}

		// Blog and Archive
		elseif ( is_home() || is_archive() || is_search() || is_404() ) {
			if ( is_search() ) {
				$prefix = 'search';
			}
			elseif( is_404() ){
				$prefix = 'error';
			}
			elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ){
				$prefix = 'shop';
			}
			else{
				$prefix = 'blog';
			}

			GymEdge::$layout         = GymEdge::$options[$prefix. '_layout'];
			GymEdge::$top_bar        = GymEdge::$options['top_bar'];
			GymEdge::$header_style   = GymEdge::$options[$prefix. '_header'];
			GymEdge::$padding_top    = GymEdge::$options[$prefix. '_padding_top'];
			GymEdge::$padding_bottom = GymEdge::$options[$prefix. '_padding_bottom'];
			GymEdge::$has_banner     = GymEdge::$options[$prefix. '_banner'];
			GymEdge::$has_breadcrumb = GymEdge::$options[$prefix. '_breadcrumb'];
			GymEdge::$bgtype         = GymEdge::$options[$prefix. '_bgtype'];
			GymEdge::$bgcolor        = GymEdge::$options[$prefix. '_bgcolor'];

			if ( !empty( GymEdge::$options[$prefix. '_bgimg']['id'] ) ) {
				$attch_url = wp_get_attachment_image_src( GymEdge::$options[$prefix. '_bgimg']['id'], 'full' );
				GymEdge::$bgimg =  $attch_url[0];
			}
			else{
				GymEdge::$bgimg = GYMEDGE_IMG_URL . 'banner.jpg';
			}		
		}
	}	
}

// Add body class
add_filter( 'body_class' , 'gymedge_body_classes' );
if ( !function_exists( 'gymedge_body_classes' ) ) {
	function gymedge_body_classes( $classes ) {
		$classes[] = 'non-stick';
		if ( GymEdge::$header_style == 'st2' ) {
			$classes[] = 'header-style-2';
		}
		$classes[] = ( GymEdge::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

		if ( GymEdge::$top_bar == 1 || GymEdge::$top_bar == 'on' ){
			$classes[] = 'has-topbar';
		}

		if ( !GymEdge::$options['logo_fixed_height'] ){
			$classes[] = 'logo-fixed-height-disabled';
		}
		if ( !GymEdge::$options['logo_fixed_height_sticky'] ){
			$classes[] = 'logo-fixed-height-sticky-disabled';
		}

		if ( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
			$classes[] = 'product-list-view';
		}
		else {
			$classes[] = 'product-grid-view';
		}

		return $classes;
	}
}