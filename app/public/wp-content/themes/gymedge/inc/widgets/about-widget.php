<?php
if ( ! class_exists( 'GymEdge_About_Widget' ) ){
	class GymEdge_About_Widget extends WP_Widget {
		public function __construct() {
			parent::__construct(
            'gymedge_about', // Base ID
            __( 'GymEdge: About', 'gymedge' ), // Name
            array( 'description' => __( 'GymEdge: About Widget', 'gymedge' ) ) // Args
        );
		}

		public function widget( $args, $instance ){
			echo wp_kses_post( $args['before_widget'] );
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
			}
			?>
			<p><?php if( !empty( $instance['description'] ) ) echo wp_kses_post( $instance['description'] ); ?></p>
			<div class="footer-social-media-area">
				<ul>
					<?php
					if( !empty( $instance['facebook'] ) ){
						?><li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php
					}
					if( !empty( $instance['twitter'] ) ){
						?><li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php
					}
					if( !empty( $instance['gplus'] ) ){
						?><li><a href="<?php echo esc_url( $instance['gplus'] ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php
					}
					if( !empty( $instance['linkedin'] ) ){
						?><li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php
					}
					if( !empty( $instance['pinterest'] ) ){
						?><li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php
					}
					if( !empty( $instance['rss'] ) ){
						?><li><a href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php
					}
					if( !empty( $instance['instagram'] ) ){
						?><li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php
					}
					?>
				</ul>
			</div> 

			<?php
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ){
			$instance                  = array();
			$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
			$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
			$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
			$instance['gplus']         = ( ! empty( $new_instance['gplus'] ) ) ? sanitize_text_field( $new_instance['gplus'] ) : '';
			$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
			$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
			$instance['rss']           = ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
			$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
			return $instance;
		}

		public function form( $instance ){
			$defaults = array(
				'title'          => __( 'About Company' , 'gymedge' ),
				'description'    => '',
				'facebook'       => '',
				'twitter'        => '',
				'gplus'          => '',
				'linkedin'       => '',
				'pinterest'      => '',
				'rss'            => '', 
				'instagram'      => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

			$fields = array(
				'title'          => array(
					'label'    => __( 'Title', 'gymedge' ),
					'type'       => 'text',
				),
				'description'          => array(
					'label'    => __( 'Description', 'gymedge' ),
					'type'       => 'textarea',
				),
				'facebook'          => array(
					'label'    => __( 'Facebook URL', 'gymedge' ),
					'type'       => 'url',
				),
				'twitter'          => array(
					'label'    => __( 'Twitter URL', 'gymedge' ),
					'type'       => 'url',
				),
				'gplus'          => array(
					'label'    => __( 'Google Plus URL', 'gymedge' ),
					'type'       => 'url',
				),
				'linkedin'          => array(
					'label'    => __( 'Linkedin URL', 'gymedge' ),
					'type'       => 'url',
				),
				'pinterest'          => array(
					'label'    => __( 'Pinterest URL', 'gymedge' ),
					'type'       => 'url',
				),
				'rss'          => array(
					'label'    => __( 'Rss Feed URL', 'gymedge' ),
					'type'       => 'url',
				),
				'instagram'          => array(
					'label'    => __( 'Instagram URL', 'gymedge' ),
					'type'       => 'url',
				),
			);

			RT_Widget_Fields::display( $fields, $instance, $this );
		}
	}
}