<?php
$thumb_size = 'gymedge-size2';
$args = array(
	'post_type'      => 'gym_class',
	'posts_per_page' => $slider_item_number,
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
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="owl-wrap rt-owl-nav-2 rt-owl-dot-1 rt-owl-class-2<?php echo esc_attr( $slider_nav_class );?>">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$id = get_the_id();
						$schedule = get_post_meta( $id, 'gym_class_schedule', true );
						$schedule = ( $schedule != '' ) ? $schedule : array();
						$trainers = array();

						foreach ( $schedule as $trainer ) {
							$type = !empty( $trainer['trainer'] ) ? get_post_type( $trainer['trainer'] ) : '';
							// if trainer exists
							if ( $type == 'gym_trainer' ) {
								$trainers[] = get_the_title( $trainer['trainer'] );
							}
						}
						$trainers = array_unique( $trainers );
						$trainers_html = implode( ', ', $trainers );
						?>
						<div class="single-item">
							<div class="single-item-content">
								<div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
								<div class="overly"></div>
								<div class="details"><a href="<?php the_permalink();?>"><?php esc_html_e( 'Details', 'gymedge-core' );?></a></div>
							</div>
							<div class="single-item-meta">
								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php if ( !empty( $trainers ) ): ?>
									<span class="author"><i class="fa fa-user"></i><?php echo esc_html( $trainers_html );?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>