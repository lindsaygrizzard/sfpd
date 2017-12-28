<?php
if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}

// Add max width property for vc_row_inner
$args = array(
	'type' => 'dropdown',
	'heading' => __( "Content Maximum Width", 'gymedge' ),
	'param_name' => 'rtmaxwidth',
	"value" => array( 
		__( 'Default', 'gymedge' ) => '',
		__( '500 px', 'gymedge' )  => '500',
		__( '550 px', 'gymedge' )  => '550',
		__( '600 px', 'gymedge' )  => '600',
		__( '650 px', 'gymedge' )  => '650',
		__( '700 px', 'gymedge' )  => '700',
		__( '750 px', 'gymedge' )  => '750',
		__( '800 px', 'gymedge' )  => '800',
		__( '850 px', 'gymedge' )  => '850',
		__( '900 px', 'gymedge' )  => '900',
		__( '950 px', 'gymedge' )  => '950',
		__( '1000 px', 'gymedge' ) => '1000',
		__( '1050 px', 'gymedge' ) => '1050',
		__( '1100 px', 'gymedge' ) => '1100',
		__( '1150 px', 'gymedge' ) => '1150',
		__( '1200 px', 'gymedge' ) => '1200',
	),
);
vc_add_param( 'vc_row_inner', $args );

// Render class name based on max width property on vc_row_inner
add_filter('vc_shortcodes_css_class', 'gymedge_change_element_class_name', 10, 3 );
if ( !function_exists( 'gymedge_change_element_class_name' ) ) {
	function gymedge_change_element_class_name( $class_string, $tag, $atts ) {
		if ( $tag == 'vc_row_inner' ) {
			if ( !empty( $atts['rtmaxwidth'] ) ) {
				$class_string .= ' vc-m-auto vc-mw-'. $atts['rtmaxwidth'];
			}
		}
		return $class_string;
	}
}

// Disable layerslider_vc from search result page to fix js mess up
add_filter( 'vc_shortcode_output', 'rdtheme_layerslider_vc_output', 10 , 3 );
function rdtheme_layerslider_vc_output( $output, $class, $atts ){
	$shortcode = $class->getShortcode();

	if ( $shortcode == 'layerslider_vc' && is_search() ) {
		return '';
	}

	return $output;
}