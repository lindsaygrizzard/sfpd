<?php
// Layout class
if ( GymEdge::$layout == 'full-width' ) {
	$gym_layout_class = 'col-sm-12 col-xs-12';
}
else{
	$gym_layout_class = 'col-sm-8 col-md-9 col-xs-12';
}
?>
<?php get_header();?>
<?php get_template_part('template-parts/content', 'banner');?>
<div class="error-page-area">
	<div class="container">
		<div class="row">
			<?php
			if ( GymEdge::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $gym_layout_class );?>">
				<?php get_template_part( 'template-parts/content', 'error' );?>
			</div>
			<?php
			if ( GymEdge::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>