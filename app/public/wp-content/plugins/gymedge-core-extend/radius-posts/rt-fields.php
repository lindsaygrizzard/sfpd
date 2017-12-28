<?php
if( !class_exists( 'RT_Fields' ) ){

	class RT_Fields {
		public function display_fields( $fields, $post_id, $post_status ){
			echo '<table class="rt-postmeta-container">';

			foreach ( $fields as $key => $field ) {
				// Display group field
				if( $field['type'] == 'group' ){
					$parent_key = $key. "['$key']";
					foreach ( $field['value'] as $key2 => $field2 ) {
						$parent_key = $key. "[$key2]";
						$default = get_post_meta( $post_id, $key, true );
						$default = empty( $default[$key2] ) ? false : $default[$key2];
						$this->display_single_field( $parent_key, $field2, $post_id, $default );
					}
				}
				// Display repeater field
				elseif( $field['type'] == 'repeater' ){
					$this->display_repeater_field( $key, $field, $post_id );
				}
				// Display single field
				else{
					$this->display_single_field( $key, $field, $post_id );
				}
			}

			echo '</table>';
		}

		// Colorpicker(partially) and datepicker isn't supported in repeater field
		private function display_repeater_field( $key, $field, $post_id ){
			$meta = get_post_meta( $post_id, $key, true );
			if ( empty( $meta ) ) {
				$meta = array();
			}
			$count = count($meta);

			echo !empty( $field['label'] ) ? '<tr><th colspan="2">'. esc_html( $field['label'] ) .':</th></tr>' : '';
			echo '<tr><td colspan="2" class="rt-postmeta-repeater-wrap" data-num="'.$count.'" data-fieldname="'. esc_attr( $key ) .'">';

			// First Hidden Item
			echo '<table class="rt-postmeta-repeater">';
			foreach ( $field['value'] as $key2 => $field2 ) {
				$parent_key = $key. "[hidden][$key2]";
				$this->display_single_field( $parent_key, $field2, $post_id, '' );
			}
			echo '</table>';

			// repeatative items
			if ( !empty( $meta ) ){
				foreach ( $meta as $item => $itemvalue ) {
					echo '<table class="rt-postmeta-repeater">';
					foreach ( $itemvalue as $fieldkey => $fieldvalue) {
						$display_key = $key."[$item]"."[$fieldkey]";
						$field3 = $field['value'][$fieldkey];
						$this->display_single_field( $display_key, $field3, $post_id, $fieldvalue );
					}
					echo '</table>';
				}
			}

			$buttontext = empty( $field['button'] ) ? __( 'Add More', 'gymedge-core' ) : $field['button'];
			echo '<div class="rt-postmeta-repeater-addmore"><button>'. $buttontext .'</button></div></td></tr>';
		}

		private function display_single_field( $key, $field, $post_id, $default = false ){
			$desc = '';
			if ( !empty( $field['desc'] ) ){
				$desc = '<div class="rt-postmeta-desc">' . esc_html( $field['desc'] ) . '</div>';
			}

			$container_attr = '';
			if ( !empty( $field['required'] ) ) {
				$container_attr .= ' class="rt-postmeta-dependent"'; 
				$container_attr .= ' data-required="'. esc_attr( $field['required'][0] ).'"';
				$container_attr .= ' data-required-value="'. esc_attr( $field['required'][1] ).'"';
			}

			// Display Title
			if( $field['type'] == 'header' ){
				$default = empty( $field['default'] ) ? 'h1' : $field['default'];
				echo '<tr'.$container_attr.'><td colspan="2"><' . esc_html( $default ) . '>' . esc_html( $field['label'] ) . '</' . esc_html( $default ) . '>' . $desc;
			}
			elseif( empty( $field['label'] ) ){
				echo '<tr'.$container_attr.'><td colspan="2">';
			}
			else{
				echo '<tr'.$container_attr.'><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
			}

			// Set default value
			if ( !$default ) {
				$default = get_post_meta( $post_id, $key, true );
			}

			if ( $field['type'] != 'multi_checkbox' && empty( $default ) && !empty( $field['default'] ) ) {
				$default = $field['default'];
			}

				// class
			$class = '';
			$class .= empty( $field['class'] ) ? '' : ' class="'. esc_attr( $field['class'] ). '"';

				// Display input
			if ( method_exists( $this, $field['type'] ) ) {
				$this->{$field['type']}( $key, $field, $default, $class );
				echo $desc;
			}

			echo '</td></tr>';
		}

		public function text( $key, $field, $default, $class ){
			$default = esc_attr( $default );
			echo '<input type="text"'. $class .
			' name="' . esc_attr( $key ) . '"'.
			' id="' . esc_attr( $key ) . '"'.
			' value="' . esc_attr( $default ) . ''.
			'" />';
		}

		public function number( $key, $field, $default, $class ){
			$default = esc_attr( $default );
			echo '<input type="number"'. $class .
			' name="' . esc_attr( $key ) . '"'.
			' id="' . esc_attr( $key ) . '"'.
			' value="' . esc_attr( $default ) . ''.
			'" />';
		}

		public function textarea( $key, $field, $default, $class ){
			echo '<textarea '. $class .
			'name="' . esc_attr( $key ) . '"'.
			' id="' . esc_attr( $key ) . '"'.
			'>'.
			esc_textarea( $default ) . 
			'</textarea>';
		}

		public function select( $key, $field, $default, $class ){
			echo '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '">';
			foreach ( $field['options'] as $key => $value ) {
				echo '<option',
				$default == $key ? ' selected="selected"' : '',
				' value="' . esc_attr( $key ) . '"'.
				'>' .
				esc_html( $value ) . 
				'</option>';
			}
			echo '</select>';
		}

		public function checkbox( $key, $field, $default, $class ){
			echo '<input type="checkbox"'.
			' name="' . esc_attr( $key ) . '"'.
			' id="' . esc_attr( $key ) . '"',
			$default ? ' checked="checked"' : '',
			'/>';
		}

		public function multi_checkbox( $key, $field, $default, $class ){
			if ( empty( $default ) ) {
				$default = array();
			}

			foreach ( $field['options'] as $value => $title ) {
				$id = $key . '_' . $value;

				echo '<span class="rt-postmeta-radio"><input type="checkbox"'. $class .
				' name="' . esc_attr( $key ) . '[]"'.
				' id="' . esc_attr( $id ) . '"'.
				' value="' . esc_attr( $value ) . '"',
				in_array( $value, $default ) ? ' checked="checked"' : '',
				' /> '.
				'<label '.
				'for="' . esc_attr( $id ) . '">'.
				esc_html( $title ).
				'</label></span>';
			}
		}

		public function radio( $key, $field, $default, $class ){
			foreach ( $field['options'] as $value => $title ) {
				$id = $key . '_' . $value;

				echo '<span class="rt-postmeta-radio"><input type="radio"'. $class .
				' name="' . esc_attr( $key ) . '"'.
				' id="' . esc_attr( $id ) . '"'.
				' value="' . esc_attr( $value ) . '"',
				$default == $value ? ' checked="checked"' : '',
				' /> '.
				'<label '.
				'for="' . esc_attr( $id ) . '">'.
				esc_html( $title ).
				'</label></span>';
			}
		}

		public function image( $key, $field, $default, $class ){
			$image = '';
			$disstyle = '';

			if ( $default ) {
				$image = wp_get_attachment_image_src( $default, 'medium' );
				$image = $image[0];
			}
			else{
				$disstyle = 'display:none;';
			}

			echo '
			<div class="rt_metabox_image">
				<input name="'. esc_attr( $key ) .'" type="hidden" class="custom_upload_image" value="'. esc_attr( $default ) .'" />
				<img src="'. esc_url( $image ) .'" class="custom_preview_image" style="'. esc_attr( $disstyle ) .'" alt="" />
				<input class="rt_upload_image upload_button_'. esc_attr( $key ) .' button-primary" type="button" value="' . esc_html__( 'Choose Image', 'gymedge-core' ). '" />
				<div class="rt_remove_image_wrap" style="'. esc_attr( $disstyle ) .'"><a href="#" class="rt_remove_image button" >' . __( 'Remove Image', 'gymedge-core' ). '</a></div>
			</div>
			';
		}

		public function color_picker( $key, $field, $default, $class ){
			echo '<input type="text" class="rt-metabox-colorpicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function date_picker( $key, $field, $default, $class ){
			echo '<input type="text" class="rt-metabox-datepicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function time_picker( $key, $field, $default, $class ){
			echo '<input type="text" class="rt-metabox-timepicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function time_picker_24( $key, $field, $default, $class ){
			echo '<input type="text" class="rt-metabox-timepicker-24" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

	}
}