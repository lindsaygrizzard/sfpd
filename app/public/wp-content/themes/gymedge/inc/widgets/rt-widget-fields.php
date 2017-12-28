<?php
if( !class_exists( 'RT_Widget_Fields' ) ){

	class RT_Widget_Fields {
		
		public static function display( $fields, $instance, $object ){
			foreach ( $fields as $key => $field ) {
				$label  = $field['label'];
				$id     = $object->get_field_id( $key );
				$name   = $object->get_field_name( $key );
				$value  = $instance[$key];
				
				if ( method_exists( __CLASS__, $field['type'] ) ) {
					echo '<p>';
					echo '<label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . ':</label>';
					if ( version_compare( phpversion() , '5.3.0', '<' ) ) {
						call_user_func( __CLASS__ . '::'. $field['type'], $id, $name, $value );
					}
					else {
						call_user_func( array( __CLASS__, $field['type'] ), $id, $name, $value );
					}
					echo '</p>';
				}
			}
		}

		public static function text( $id, $name, $value ){
			?>
			<input class="widefat" type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" />
			<?php
		}

		public static function textarea( $id, $name, $value ){
			?>
			<textarea class="widefat" rows="3" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
			<?php
		}

		public static function url( $id, $name, $value ){
			?>
			<input class="widefat" type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_url( $value ); ?>" />
			<?php
		}

	}
}