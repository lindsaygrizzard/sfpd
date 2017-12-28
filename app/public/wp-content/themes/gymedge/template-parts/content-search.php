<?php
$gym_no_thumbnail = '';
if ( !has_post_thumbnail() ) {
	$gym_no_thumbnail = 'search-no-thumbnail';
}
$gym_post_col = ( GymEdge::$layout == 'full-width' ) ? 'col-lg-4 col-md-4 col-sm-4 col-xs-12' : 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
?>
<div class="<?php echo esc_attr( $gym_post_col );?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class( $gym_no_thumbnail ); ?>>
		<div class="entry-header">
			<?php the_post_thumbnail( 'gymedge-size2' );?>
		</div>
		<div class="entry-summary">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3><?php the_excerpt();?><div class="mt20"><a class="read-more" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'gymedge' );?></a></div>
		</div>
	</article>
</div>