<?php
$args = array(
	'posts_per_page' => 5,
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

$posts = get_posts( $args );
?>
<div class="rt-post-grid">
	<div class="row">
		<div class="col-sm-6 col-xs-12">
			<div class="single-item">
				<?php if ( has_post_thumbnail( $posts[0] ) ): ?>
					<a href="<?php echo get_permalink( $posts[0] );?>" class="single-item-image"><?php echo get_the_post_thumbnail( $posts[0], 'gymedge-size1' );?></a>
				<?php else: ?>
					<div class="rt-noimg"></div>
				<?php endif; ?>
				<div class="rt-date"><?php echo get_the_time( 'd M, Y', $posts[0] );?></div>
				<h3><a href="<?php echo get_permalink( $posts[0] );?>"><?php echo get_the_title( $posts[0] );?></a></h3>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="row auto-clear">
				<?php unset( $posts[0] ); ?>
				<?php foreach ( $posts as $post ): ?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="single-item">
							<?php if ( has_post_thumbnail( $post ) ): ?>
								<a href="<?php echo get_permalink( $post );?>" class="single-item-image"><?php echo get_the_post_thumbnail( $post, 'gymedge-size2' );?></a>
							<?php else: ?>
								<div class="rt-noimg"></div>
							<?php endif; ?>
							<h3><a href="<?php echo get_permalink( $post );?>"><?php echo get_the_title( $post );?></a></h3>
						</div>
					</div>					
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>