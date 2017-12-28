<?php
$thumb_size = 'gymedge-size2';
$args = array(
	'post_type'      => 'gym_class',
	'posts_per_page' => $grid_item_number,
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
?>
<div class="rt-class-grid-2">
	<div class="row auto-clear">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$content = get_the_content();
				$content = apply_filters( 'the_content', $content );
				$content = wp_trim_words( $content, 11 );
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="single-item">
						<div class="single-item-content">
							<div class="single-item-image"><?php the_post_thumbnail( $thumb_size );?></div>
							<div class="overly"></div>
							<div class="details"><a href="<?php the_permalink();?>"><?php esc_html_e( 'Details', 'gymedge-core' );?></a></div>
						</div>
						<div class="single-item-meta">
							<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<div><?php echo $content;?></div>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
	</div>
</div>
<?php wp_reset_query();?>