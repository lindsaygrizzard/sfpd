<?php
$gym_has_entry_meta  = ( GymEdge::$options['post_date'] || GymEdge::$options['post_author_name'] || GymEdge::$options['post_cats'] || GymEdge::$options['post_comment_num'] ) ? true : false;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header-single">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="entry-thumbnail"><?php the_post_thumbnail( 'gymedge-size1' );?></div>
		<?php endif; ?>
		<?php if ( $gym_has_entry_meta ): ?>
			<div class="entry-meta">
				<ul>
					<?php if ( GymEdge::$options['post_date'] ): ?>
						<li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time( 'F j, Y' );?></li>
					<?php endif; ?>
					<?php if ( GymEdge::$options['post_author_name'] ): ?>
						<li><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( 'By', 'gymedge' );?> : <?php the_author_posts_link();?></li>
					<?php endif; ?>
					<?php if ( has_category() && GymEdge::$options['post_cats'] ): ?>
						<li><i class="fa fa-list" aria-hidden="true"></i><?php esc_html_e( 'Categories', 'gymedge' );?> : <?php the_category( ', ' );?></li>
					<?php endif; ?>
					<?php if ( GymEdge::$options['post_comment_num'] ): ?>
						<li><i class="fa fa-comments-o" aria-hidden="true"></i><?php esc_html_e( 'Comments', 'gymedge' );?> : <?php echo '(' . esc_html( get_comments_number() . ')' );?></li>
					<?php endif; ?>
				</ul>			
			</div>			
		<?php endif; ?>
	</div>
	<div class="entry-content">
		<?php the_content();?>
		<?php wp_link_pages();?>
	</div>
	<?php if ( has_tag() && GymEdge::$options['post_tags'] ): ?>
		<div class="entry-footer">
			<h3><?php esc_html_e( 'Tags', 'gymedge' );?></h3>
			<p><?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ' ); ?></p>
		</div>
	<?php endif; ?>
</article>