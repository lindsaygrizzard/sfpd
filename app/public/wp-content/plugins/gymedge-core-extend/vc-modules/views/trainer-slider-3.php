<?php 
$args = array(
	'post_type'      => 'gym_trainer',
	'posts_per_page' => $slider_item_number,
	);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'gym_team_category',
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
<div class="owl-wrap rt-owl-nav-2 rt-owl-team-3 rt-owl-dot-1<?php echo esc_attr( $slider_nav_class );?>">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$id = get_the_id();
						$socials = get_post_meta( $id, 'gym_trainer_socials', true );
						$designation = get_post_meta( $id, 'gym_trainer_designation', true );
						?>
						<div class="vc-item-wrap">
							<div class="vc-item">
								<?php the_post_thumbnail( 'gymedge-size4' );?>
								<div class="vc-overly">
									<?php if ( !empty( $socials ) ): ?>
										<ul>
											<?php foreach ( $socials as $key => $social ): ?>
												<?php if ( !empty( $social ) ): ?>
													<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<div class="vc-team-meta">
							<h3 class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php if ( $designation_display ): ?>
									<div class="designation"><?php echo esc_html( $designation );?></div>
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