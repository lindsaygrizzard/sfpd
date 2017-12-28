<?php
//vc_add_shortcode_param( 'rt_textarea', 'rt_textarea_field' );
function rt_textarea_field( $settings, $value ) {
	rows = 1
	$rows = !empty( $settings['rows'] ) ? $settings['rows'] : '1';
	return '<textarea name="'
	. $settings['param_name'] . '" class="wpb_vc_param_value wpb-textarea '
	. $settings['param_name'] . ' ' . $settings['type'] . '" rows="' . $rows . '">'
	. $value . '</textarea>';
}