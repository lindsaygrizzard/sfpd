<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<?php
$gym_logo_width = (int) GymEdge::$options['logo_width'];
$gym_logo_class = "col-sm-$gym_logo_width col-xs-12";
$gym_menu_width = 12 - $gym_logo_width;
if( GymEdge::$options['search_icon'] == 1 || GymEdge::$options['cart_icon'] == 1 ){
	$gym_menu_width = $gym_menu_width - 1;
}
$gym_menu_class = "col-sm-{$gym_menu_width} col-xs-12";

$gym_dark_logo = empty( GymEdge::$options['logo']['url'] ) ? GYMEDGE_IMG_URL . 'logo.png' : GymEdge::$options['logo']['url'];
$gym_light_logo = empty( GymEdge::$options['logo_light']['url'] ) ? GYMEDGE_IMG_URL . 'logo2.png' : GymEdge::$options['logo_light']['url'];

// Navigation menu condition
$gym_pagemenu = false;
if ( ( is_single() || is_page() ) ) {
	$gym_menuid = get_post_meta( get_the_id(), 'gym_page_menu', true );
	if ( !empty( $gym_menuid ) && $gym_menuid != 'default' ) {
		$gym_pagemenu = $gym_menuid;
	}
}
?>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gymedge' ); ?></a>
		<header id="masthead" class="site-header">
			<?php 
			if ( GymEdge::$top_bar == 1 || GymEdge::$top_bar == 'on' ){
				get_template_part( 'template-parts/content', 'header-top' );
			}
			?>
			<div class="container masthead-container">
				<div class="row">
					<div class="<?php echo esc_attr( $gym_logo_class );?>">
						<div class="site-branding">
							<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $gym_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
							<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $gym_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
						</div>
					</div>
					<div class="<?php echo esc_attr( $gym_menu_class );?>">
						<div id="site-navigation" class="main-navigation">
							<?php
							if ( $gym_pagemenu ) {
								wp_nav_menu( array( 'menu' => $gym_pagemenu,'container' => 'nav' ) );
							}
							else{
								wp_nav_menu( array( 'theme_location' => 'primary','container' => 'nav' ) );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="meanmenu"></div>
		<div id="content" class="site-content">