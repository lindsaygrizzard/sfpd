<?php
$thumb_size = 'gymedge-size5';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'gym_class',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'gym_class_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}

switch ( $orderby ) {
	case 'title':
	$args['orderby'] = 'title';
	$args['order']   = 'ASC';
	break;
	case 'menu_order':
	$args['orderby'] = 'menu_order';
	$args['order']   = 'ASC';
	break;
}

$query = new WP_Query( $args );
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-12";

// Pagination fix
global $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-class-grid-1">
	<div class="row auto-clear">
		<?php if ( have_posts() ) :?>
			<?php while ( have_posts() ) : the_post();?>
				<?php
				$id = get_the_id();
				$schedule = get_post_meta( $id, 'gym_class_schedule', true );
				$schedule = ( $schedule != '' ) ? $schedule : array();
				$schedule_limit = apply_filters( 'gym_schedule_limit', false );
				if ( $schedule_limit ) {
					$schedule = array_slice( $schedule, 0, $schedule_limit );
				}
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="vc-item-wrap">
						<div class="vc-item">
							<?php the_post_thumbnail( $thumb_size );?>
							<div class="vc-overly">
								<ul class="vc-grid-ul-parent">
									<?php foreach ( $schedule as $time ): ?>
										<?php if ( !empty( $time['week'] ) && !empty( $time['start_time'] ) ): ?>
											<?php
											$start_time = !empty( $time['start_time'] ) ? strtotime( $time['start_time'] ) : false;

											if ( GymEdge::$options['class_time_format'] == '24' ) {
												$start_time = $start_time ? date( "H:i", $start_time ) : '';
											}
											else {
												$start_time = $start_time ? date( "g:ia", $start_time ) : '';
											}
											?>
											<li>
												<ul class="vc-grid-ul-child">
													<li><?php echo esc_html( $weeknames[$time['week']] );?></li>
													<li><?php echo esc_html( $start_time );?></li>
												</ul>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
							<a class="vc-meta" href="<?php the_permalink();?>"><?php the_title();?></a>
						</div>
					</div>
				</div>
			<?php endwhile;?>
			<div class="col-sm-12 col-xs-12"><?php rt_vc_pagination();?></div>
		<?php endif;?>
	</div>
</div>
<?php wp_reset_query();?>