<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$gym_title = woocommerce_page_title( false );
}
elseif ( is_404() ) {
	$gym_title = GymEdge::$options['error_title'];
}
elseif ( is_search() ) {
	$gym_title = __( 'Search Results for : ', 'gymedge' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$gym_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$gym_title = apply_filters( 'gym_blog_title', __( 'All Posts', 'gymedge' ) );
	}
}
elseif ( is_archive() ) {
	$gym_title = get_the_archive_title();
}
else{
	$gym_title = get_the_title();
}
?>
<?php if ( GymEdge::$has_banner == '1' || GymEdge::$has_banner == 'on' ): ?>

<?php endif; ?>