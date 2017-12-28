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
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="owl-wrap rt-owl-nav-2 rt-owl-dot-1 rt-owl-post-2<?php echo esc_attr( $slider_nav_class );?>">
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php if ( $query->have_posts() ) :?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<?php
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, $count );
						?>
						<div class="single-item">
							<div class="single-item-content">
								<div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
								<div class="overly"></div>
								<div class="date"><?php the_time( 'j' );?><br/><?php the_time( 'M' );?><br/><?php the_time( 'Y' );?></div>
								<div class="details"><a href="<?php the_permalink();?>"><i class="fa fa-link" aria-hidden="true"></i></a></div>
							</div>
							<div class="single-item-meta">
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