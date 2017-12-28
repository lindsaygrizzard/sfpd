<?php
if ( !class_exists( 'GymEdge_Helper' ) ) {
	
	class GymEdge_Helper {

		public static function pagination() {

			if( is_singular() )
				return;

			global $wp_query;

			/** Stop execution if there's only 1 page */
			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			/**	Add current page to the array */
			if ( $paged >= 1 )
				$links[] = $paged;

			/**	Add the pages around the current page to the array */
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}

			echo '<div class="pagination-area"><ul>' . "\n";

			/**	Previous Post Link */
			if ( get_previous_posts_link() )
				printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' ) );

			/**	Link to first page, plus ellipses if necessary */
			if ( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if ( ! in_array( 2, $links ) )
					echo '<li>...</li>';
			}

			/**	Link to current page, plus 2 pages in either direction if necessary */
			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}

			/**	Link to last page, plus ellipses if necessary */
			if ( ! in_array( $max, $links ) ) {
				if ( ! in_array( $max - 1, $links ) )
					echo '<li>...</li>' . "\n";

				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}

			/**	Next Post Link */
			if ( get_next_posts_link() )
				printf( '<li>%s</li>' . "\n", get_next_posts_link( '<i class="fa fa-angle-double-right" aria-hidden="true"></i>' ) );

			echo '</ul></div>' . "\n";
		}


		public static function comments_callback( $comment, $args, $depth ){
			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
			?>
			<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments', $comment ); ?>>
			<div id="respond-<?php comment_ID(); ?>" class="each-comment">
				<div class="pull-left imgholder">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
				</div>

				<div class="media-body comments-body">
					<h4 class="media-heading"><?php echo get_comment_author_link( $comment );?></h4>
					<p class="comment-time"><?php printf( __( '%1$s @ %2$s', 'gymedge' ), get_comment_date( '', $comment ), get_comment_time() );?></p>
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'gymedge' ); ?></p>
						<?php endif; ?>
					<?php comment_text(); ?>
					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'respond',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="replay-area">',
						'after'     => '</div>'
						) ) );
					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php
		}

		public static function hex2rgb($hex) {
			$hex = str_replace("#", "", $hex);
			if(strlen($hex) == 3) {
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else {
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			$rgb = "$r, $g, $b";
			return $rgb;
		}
		
		public static function get_trainers(){
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'title',
				'order'            => 'ASC',
				'post_type'        => 'gym_trainer',
			);
			$posts = get_posts( $args );
			$trainers[0] = __( 'Select a Trainer', 'gymedge' );
			foreach ( $posts as $post ) {
				$trainers[$post->ID] = $post->post_title;
			}
			return $trainers;
		}
		
		public static function filter_social( $args ){
			return ( $args['url'] != '' );
		}

	}
}