<?php
$gym_primary_color   = GymEdge::$options['primary_color']; // #fb5b21
$gym_secondery_color = GymEdge::$options['secondery_color']; // #b0360a
$gym_primary_rgb     = GymEdge_Helper::hex2rgb( $gym_primary_color ); // 251, 91, 33
?>
<?php // Primary Color ?>

.site-header .search-box .search-button i,
.scrollToTop:after {
	color: <?php echo esc_html( $gym_primary_color );?> !important;
}


<?php
// Top Bar
$gym_topbar_rgb = GymEdge_Helper::hex2rgb( GymEdge::$options['top_bar_bgcolor'] );
?>
#tophead {
	background-color: <?php echo esc_html( GymEdge::$options['top_bar_bgcolor'] ); ?>;
	color: <?php echo esc_html( GymEdge::$options['top_bar_color'] ); ?>;
}
#tophead .tophead-contact a,
#tophead .tophead-links ul li a,
#tophead .tophead-social li a {
	color: <?php echo esc_html( GymEdge::$options['top_bar_color'] ); ?>;
}
.header-style-2 #tophead {
	background-color: rgba(<?php echo esc_html( $gym_topbar_rgb ); ?>, 0.5 );
}

<?php
// Menu
$gym_menu_typo = GymEdge::$options['menu_typo'];
$gym_menu_color = GymEdge::$options['menu_color'];
$gym_menu_hover_color = GymEdge::$options['menu_hover_color'];
$gym_submenu_color = GymEdge::$options['submenu_color'];
$gym_submenu_bgcolor = GymEdge::$options['submenu_bgcolor'];
$gym_submenu_hover_bgcolor = GymEdge::$options['submenu_hover_bgcolor'];
?>
.stick .site-header {
	border-color: <?php echo esc_html( $gym_primary_color ); ?>
}
.site-header .main-navigation ul li a,
.mean-container .mean-nav ul li a {
	font-family: <?php echo esc_html( $gym_menu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $gym_menu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $gym_menu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $gym_menu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $gym_menu_color ); ?>;
	font-style: <?php echo empty( $gym_menu_typo['font-style'] ) ? 'normal' : $gym_menu_typo['font-style']; ?>;
}
.site-header .main-navigation ul li a:hover,
.header-style-2.non-stick .site-header .main-navigation ul.menu > li > a:hover,
.site-header .main-navigation ul.menu > li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a,
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $gym_menu_hover_color ); ?>;
}
.site-header .main-navigation ul li a.active {
	color: <?php echo esc_html( $gym_menu_hover_color );?> !important;
}
.site-header .main-navigation ul li ul li {
	background-color: <?php echo esc_html( $gym_submenu_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li:hover {
	background-color: <?php echo esc_html( $gym_submenu_hover_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li a {
	color: <?php echo esc_html( $gym_submenu_color ); ?>;
}

.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $gym_primary_color ); ?>;
}
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $gym_primary_color ); ?>;
}
.mean-container .mean-bar {
	border-color: <?php echo esc_html( $gym_primary_color ); ?>;
}

<?php
// Footer
$gym_footer_bgcolor = GymEdge::$options['footer_bgcolor'];
$gym_footer_title_color = GymEdge::$options['footer_title_color'];
$gym_footer_color = GymEdge::$options['footer_color'];
$gym_copyright_bgcolor = GymEdge::$options['copyright_bgcolor'];
$gym_copyright_color = GymEdge::$options['copyright_color'];
?>
.footer-top-area {
	background-color: <?php echo esc_html( $gym_footer_bgcolor ); ?>;
}
.footer-top-area .widget h3 {
	color: <?php echo esc_html( $gym_footer_title_color ); ?>;
}
.footer-top-area .widget {
	color: <?php echo esc_html( $gym_footer_color ); ?>;
}
.footer-bottom-area {
	background-color: <?php echo esc_html( $gym_copyright_bgcolor ); ?>;
}
.footer-bottom-area .footer-bottom p {
	color: <?php echo esc_html( $gym_copyright_color ); ?>;
}

<?php
// Typography
$gym_typo_body = GymEdge::$options['typo_body'];
$gym_typo_h1   = GymEdge::$options['typo_h1'];
$gym_typo_h2   = GymEdge::$options['typo_h2'];
$gym_typo_h3   = GymEdge::$options['typo_h3'];
$gym_typo_h4   = GymEdge::$options['typo_h4'];
$gym_typo_h5   = GymEdge::$options['typo_h5'];
$gym_typo_h6   = GymEdge::$options['typo_h6'];
?>
body {
	font-family: <?php echo esc_html( $gym_typo_body['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_body['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_body['line-height'] ); ?>;
}
h1 {
	font-family: <?php echo esc_html( $gym_typo_h1['font-family'] ); ?>;
	font-size: <?php echo esc_html( $gym_typo_h1['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h1['line-height'] ); ?>;
}
h2 {
	font-family: <?php echo esc_html( $gym_typo_h2['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h2['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h2['line-height'] ); ?>;
}
h3 {
	font-family: <?php echo esc_html( $gym_typo_h3['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h3['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h3['line-height'] ); ?>;
}
h4 {
	font-family: <?php echo esc_html( $gym_typo_h4['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h4['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h4['line-height'] ); ?>;
}
h5 {
	font-family: <?php echo esc_html( $gym_typo_h5['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h5['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h5['line-height'] ); ?>;
}
h6 {
	font-family: <?php echo esc_html( $gym_typo_h6['font-family'] ); ?>, sans-serif;;
	font-size: <?php echo esc_html( $gym_typo_h6['font-size'] ); ?>;
	line-height: <?php echo esc_html( $gym_typo_h6['line-height'] ); ?>;
}

<?php // Page Settings ?>
.content-area {
	padding-top: <?php echo esc_html( GymEdge::$padding_top );?>px;
	padding-bottom: <?php echo esc_html( GymEdge::$padding_bottom );?>px;
}
.entry-banner {
<?php if ( GymEdge::$bgtype == 'bgcolor' ): ?>
	background-color: <?php echo esc_html( GymEdge::$bgcolor );?>;
<?php else: ?>
	background: url(<?php echo esc_url( GymEdge::$bgimg );?>) no-repeat scroll center center / cover;
<?php endif; ?>
}

<?php // Buttons ?>
.rdtheme-button-2 {
	background-color: <?php echo esc_html( $gym_primary_color ); ?>;
}
.rdtheme-button-3:hover {
	color: <?php echo esc_html( $gym_primary_color ); ?> !important;
}

<?php // Plugin: Layer Slider ?>
.ls-bar-timer {
	background-color: <?php echo esc_html( $gym_primary_color );?>;
	border-bottom-color: <?php echo esc_html( $gym_primary_color );?>;
}

<?php // Plugin: Logo Showcase ?>
.rt-wpls .wpls-carousel .slick-prev,
.rt-wpls .wpls-carousel .slick-next {
    background-color: <?php echo esc_html( $gym_primary_color );?>;
}

<?php // WooCommerce ?>
.product-grid-view .woo-shop-top .view-mode ul li:first-child .fa,
.product-list-view .woo-shop-top .view-mode ul li:last-child .fa,
.woocommerce ul.products li.product h3 a:hover,
.woocommerce ul.products li.product .price,
.woocommerce .product-thumb-area .product-info ul li a:hover .fa,
.woocommerce a.woocommerce-review-link:hover,
.woocommerce div.product p.price, .woocommerce div.product span.price,
.woocommerce div.product .product-meta a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-message::before,
.woocommerce-info::before {
	color: <?php echo esc_html( $gym_primary_color );?>;
}

.woocommerce ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce a.added_to_cart,
.woocommerce div.product form.cart .button,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
p.demo_store,
.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit[disabled]:disabled:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button[disabled]:disabled:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button[disabled]:disabled:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button[disabled]:disabled:hover,
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a {
	background-color: <?php echo esc_html( $gym_primary_color );?>;
}

.woocommerce-message,
.woocommerce-info {
	border-color: <?php echo esc_html( $gym_primary_color );?>;
}

.woocommerce .product-thumb-area .overlay {
    background-color: rgba(<?php echo esc_html( $gym_primary_rgb );?>, 0.8);
}