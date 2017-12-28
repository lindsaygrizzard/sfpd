<?php 
$args = array(
	'post_type'      => 'gym_testimonial',
	'posts_per_page' => $number,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'gym_testimonial_category',
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

$title = trim( $title );
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="owl-wrap rt-owl-dot-1 rt-owl-testimonial-1">
			<?php if ( !empty( $title ) ): ?>
				<div class="section-title">
					<h2><?php echo esc_html( $title );?></h2>
				</div>			
			<?php endif; ?>
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$id = get_the_id();
						$designation = get_post_meta( $id, 'gym_tes_designation', true );
						?>
						<div class="rt-vc-item">
							<div class="pull-left rt-vc-img">
								<?php the_post_thumbnail( 'thumbnail' );?>
							</div>
							<div class="media-body rt-vc-content">
								<h3><?php the_title();?>
									<?php if ( !empty( $designation ) ): ?>
										<span> / <?php echo esc_html( $designation );?></span>
									<?php endif; ?>
								</h3>
								<?php the_content();?>
							</div>
						</div>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>