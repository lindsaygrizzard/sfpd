<?php
$thumb_size = 'gymedge-size2';
$args = array(
	'posts_per_page' => $number,
	'cat' => $cat,
);

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
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="owl-wrap rt-owl-nav-2 rt-owl-post-3 rt-owl-dot-1">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, $count );
						$thumb_class = has_post_thumbnail() ? '':' vc-nothumb';
						?>
						<div class="single-item<?php echo esc_attr( $thumb_class );?>">
							<div class="single-item-meta">
								<div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
								<div class="date"><?php the_time( 'j M, Y' );?></div>
							</div>
							<div class="single-item-content">
								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<div><?php echo $content;?></div>
							</div>
						</div>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>