<?php
if ( GymEdge::$layout == 'full-width' ) {
	$gym_layout_class = 'col-sm-12 col-xs-12';
}
else{
	$gym_layout_class = 'col-sm-8 col-md-9 col-xs-12';
}
get_template_part('template-parts/content', 'banner');
echo '<div id="primary" class="content-area"><div class="container"><div class="row">';
if ( GymEdge::$layout == 'left-sidebar' ) {
	get_sidebar();
}
echo '<div class="' .esc_attr( $gym_layout_class ) .'"><main id="main" class="site-main">';