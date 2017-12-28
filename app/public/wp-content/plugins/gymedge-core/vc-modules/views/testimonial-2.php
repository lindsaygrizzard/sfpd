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
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="owl-wrap rt-owl-dot-1 rt-owl-testimonial-2 <?php echo esc_attr( $txtcolor );?>">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$id = get_the_id();
						$designation = get_post_meta( $id, 'gym_tes_designation', true );
						?>
						<div class="rt-vc-item">
							<div class="rt-vc-content"><?php the_content();?></div>
							<?php if ( has_post_thumbnail() ): ?>
								<div class="rt-vc-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
							<?php endif; ?>
							<h3 class="rt-vc-title"><?php the_title();?></h3>
							<?php if ( !empty( $designation ) ): ?>
								<div class="rt-vc-designation"><?php echo esc_html( $designation );?></div>
							<?php endif; ?>
						</div>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>