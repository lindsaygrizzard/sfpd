<?php
if ( ! class_exists( 'GymEdge_Address_Widget' ) ){
	class GymEdge_Address_Widget extends WP_Widget {
		public function __construct() {
			parent::__construct(
            'gymedge_address', // Base ID
            __( 'GymEdge: Address', 'gymedge' ), // Name
            array( 'description' => __( 'GymEdge: Address Widget', 'gymedge' ) ) // Args
        );
		}

		public function widget( $args, $instance ){
			echo wp_kses_post( $args['before_widget'] );
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
			}
			?>
			<ul>
				<?php 
				if( !empty( $instance['address'] ) ){
					?><li><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <?php echo wp_kses_post( $instance['address'] ); ?></li><?php
				}  
				if( !empty( $instance['phone'] ) ){
					?><li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
				}   
				if( !empty( $instance['email'] ) ){
					?><li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></li><?php
				}  
				if( !empty( $instance['fax'] ) ){
					?><li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo esc_html( $instance['fax'] ); ?></li><?php
				}   
				?>
			</ul>

			<?php
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ){
			$instance              = array();
			$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? wp_kses_post( $new_instance['address'] ) : '';
			$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
			$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
			$instance['fax']       = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';
			return $instance;
		}

		public function form( $instance ){
			$defaults = array(
				'title'   => __( 'Corporate Office' , 'gymedge' ),
				'address' => '',
				'phone'   => '',
				'email'   => '',
				'fax'     => ''  
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

			$fields = array(
				'title'     => array(
					'label' => __( 'Title', 'gymedge' ),
					'type'  => 'text',
				),
				'address'   => array(
					'label' => __( 'Address', 'gymedge' ),
					'type'  => 'textarea',
				),
				'phone'     => array(
					'label' => __( 'Phone Number', 'gymedge' ),
					'type'  => 'text',
				),
				'email'     => array(
					'label' => __( 'Email', 'gymedge' ),
					'type'  => 'text',
				),
				'fax'       => array(
					'label' => __( 'Fax', 'gymedge' ),
					'type'  => 'text',
				),
			);

			RT_Widget_Fields::display( $fields, $instance, $this );
		}
	}
}