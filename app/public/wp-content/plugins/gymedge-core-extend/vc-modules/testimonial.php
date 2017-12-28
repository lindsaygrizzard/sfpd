<?php
class GymEdge_VC_Testimonial extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Testimonials", 'gymedge-core' );
		$this->base = 'gymedge-vc-testimonial';
		$this->translate = array(
			'title' => __( "WHAT CLIENT'S SAY", 'gymedge-core' ),
		);
		parent::__construct();
	}
	
	public function load_scripts(){
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function fields(){
		$terms = get_terms( array('taxonomy' => 'gym_testimonial_category') );
		$category_dropdown = array( __( 'All Categories', 'gymedge-core' ) => '0' );

		foreach ( $terms as $category ) {
			$category_dropdown[$category->name] = $category->term_id;
		}

		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", 'gymedge-core' ),
				"param_name" => "style",
				"value" => array( 
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Categories", 'gymedge-core' ),
				"param_name" => "cat",
				'value' => $category_dropdown,
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Order By", 'gymedge-core' ),
				"param_name" => "orderby",
				"value" => array(
					__( 'Date (Recents comes first)', 'gymedge-core' )  => 'date',
					__( 'Title', 'gymedge-core' ) => 'title',
					__( 'Custom Order (Available via Order field inside Page Attributes box)', 'gymedge-core' ) => 'menu_order',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Text Color", 'gymedge-core' ),
				"param_name" => "txtcolor",
				"value" => array(
					__( "Dark", 'gymedge-core' )  => 'dark',
					__( "Light", 'gymedge-core' ) => 'light',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style2' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => $this->translate['title'],
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Total number testimonials", 'gymedge-core' ),
				"param_name" => "number",
				"value" => -1,
				'description' => __( 'Write -1 to show all', 'gymedge-core' ),
			),
			// Slider options
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Autoplay", 'gymedge-core' ),
				"param_name" => "slider_autoplay",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
				"description" => __( "Enable or disable autoplay. Default: Enable", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Stop on Hover", 'gymedge-core' ),
				"param_name" => "slider_stop_on_hover",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
				'dependency' => array(
					'element' => 'slider_autoplay',
					'value'   => array( 'true' ),
				),
				"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Autoplay Interval", 'gymedge-core' ),
				"param_name" => "slider_interval",
				"value" => array( 
					__( '5 Seconds', 'gymedge-core' ) => '5000',
					__( '4 Seconds', 'gymedge-core' ) => '4000',
					__( '3 Seconds', 'gymedge-core' ) => '3000',
					__( '2 Seconds', 'gymedge-core' ) => '4000',
					__( '1 Second', 'gymedge-core' )  => '1000',
				),
				'dependency' => array(
					'element' => 'slider_autoplay',
					'value'   => array( 'true' ),
				),
				"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Autoplay Slide Speed", 'gymedge-core' ),
				"param_name" => "slider_autoplay_speed",
				"value" => 200,
				'dependency' => array(
					'element' => 'slider_autoplay',
					'value'   => array( 'true' ),
				),
				"description" => __( "Slide speed in milliseconds. Default: 200", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
			),	
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Loop", 'gymedge-core' ),
				"param_name" => "slider_loop",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
				"description" => __( "Loop to first item. Default: Enable", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'    => 'style1',
			'cat'      => '',
			'orderby'  => 'date',
			'txtcolor' => 'dark',
			'title'    => $this->translate['title'],
			'number'   => '-1',
			// slider
			'slider_autoplay'       => 'true',
			'slider_stop_on_hover'  => 'true',
			'slider_interval'       => '5000',
			'slider_autoplay_speed' => '200',
			'slider_loop'           => 'true',
			), $atts ) );

		// validation
		$number  = intval( $number );

		$owl_data = array( 
			'nav'                => false,
			'dots'               => true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true: false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true: false,
			'loop'               => ( $slider_loop === 'true' ) ? true: false,
			'margin'             => 20
		);

		switch ( $style ) {
			case 'style2':
			$owl_data['responsive'] = array(
				'0' => array( 'items' => 1 ),
			);
			$template = 'testimonial-2';
			break;
			default:
			$owl_data['responsive'] = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 1 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 2 ),
				'1200' => array( 'items' => 2 ),
			);
			$template = 'testimonial';
			break;
		}

		$owl_data = json_encode( $owl_data );
		$this->load_scripts();

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Testimonial;