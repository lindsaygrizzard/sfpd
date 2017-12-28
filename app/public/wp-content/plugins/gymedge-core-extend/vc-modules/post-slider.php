<?php
class GymEdge_VC_Post_Slider extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Post Slider", 'gymedge-core' );
		$this->base = 'gymedge-vc-post-slider';
		$this->translate = array(
			'title' => __( "LATEST POSTS ", 'gymedge-core' ),
			'cols'  => array( 
				__( '1 col', 'gymedge-core' ) => '12',
				__( '2 col', 'gymedge-core' ) => '6',
				__( '3 col', 'gymedge-core' ) => '4',
				__( '4 col', 'gymedge-core' ) => '3',
				__( '6 col', 'gymedge-core' ) => '2',
			),
		);
		parent::__construct();
	}
	
	public function load_scripts(){
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function fields(){
		$categories = get_categories();
		$category_dropdown = array( __( 'All Categories', 'gymedge-core' ) => '0' );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->name] = $category->term_id;
		}

		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Slider Style", 'gymedge-core' ),
				"param_name" => "slider_style",
				"value" => array( 
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
					__( "Style 3", 'gymedge-core' ) => 'style3',
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
					'element' => 'slider_style',
					'value'   => array( 'style1' ),
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
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Total number of posts", 'gymedge-core' ),
				"param_name" => "number",
				"value" => 6,
				'description' => __( 'Write -1 to show all', 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Word count", 'gymedge-core' ),
				"param_name" => "count",
				"value" => 35,
				'description' => __( 'Maximum number of words', 'gymedge-core' ),
				),
			// Responsive Columns
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number of columns ( Desktops > 1199px )", 'gymedge-core' ),
				"param_name" => "col_lg",
				"value" => $this->translate['cols'],
				"std" => "4",
				"group" => __( "Responsive Columns", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number of columns ( Desktops > 991px )", 'gymedge-core' ),
				"param_name" => "col_md",
				"value" => $this->translate['cols'],
				"std" => "4",
				"group" => __( "Responsive Columns", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number of columns ( Tablets > 767px )", 'gymedge-core' ),
				"param_name" => "col_sm",
				"value" => $this->translate['cols'],
				"std" => "6",
				"group" => __( "Responsive Columns", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number of columns ( Phones < 768px )", 'gymedge-core' ),
				"param_name" => "col_xs",
				"value" => $this->translate['cols'],
				"std" => "6",
				"group" => __( "Responsive Columns", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number of columns ( Small Phones < 480px )", 'gymedge-core' ),
				"param_name" => "col_mobile",
				"value" => $this->translate['cols'],
				"std" => "12",
				"group" => __( "Responsive Columns", 'gymedge-core' ),
				),
			// Slider options
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Navigation Arrow", 'gymedge-core' ),
				"param_name" => "slider_nav",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
					),
				"description" => __( "Enable or disable navigation arrow. Default: Enable", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Navigation Dots", 'gymedge-core' ),
				"param_name" => "slider_dots",
				"value" => array( 
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
					),
				"description" => __( "Enable or disable navigation dots. Default: Disable", 'gymedge-core' ),
				"group" => __( "Slider Options", 'gymedge-core' ),
				),
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
			'title'                 => $this->translate['title'],
			'slider_style'          => 'style1',
			'number'                => '6',
			'count'                 => '35',
			'cat'                   => '',
			'orderby'               => 'date',
			// responsive
			'col_lg'                => '4',
			'col_md'                => '4',
			'col_sm'                => '6',
			'col_xs'                => '6',
			'col_mobile'            => '12',
			// slider
			'slider_nav'            => 'true',
			'slider_dots'           => 'false',
			'slider_autoplay'       => 'true',
			'slider_stop_on_hover'  => 'true',
			'slider_interval'       => '5000',
			'slider_autoplay_speed' => '200',
			'slider_loop'           => 'true',
			), $atts ) );

		// validation
		$number                = intval( $number );
		$count                 = intval( $count );
		$cat                   = empty( $cat ) ? '' : (int) $cat;

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'true' ) ? true : false,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true: false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true: false,
			'loop'               => ( $slider_loop === 'true' ) ? true: false,
			'margin'             => 20,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $col_mobile ),
				'480'  => array( 'items' => 12 / $col_xs ),
				'768'  => array( 'items' => 12 / $col_sm ),
				'992'  => array( 'items' => 12 / $col_md ),
				'1200' => array( 'items' => 12 / $col_lg ),
				)
			);

		switch ( $slider_style ) {
			case 'style2':
				$template = 'post-slider-2';
				break;
			case 'style3':
				$template = 'post-slider-3';
				break;
			default:
				$owl_data['nav'] = false;
				$template = 'post-slider-1';
				break;
		}

		$owl_data = json_encode( $owl_data );
		$this->load_scripts();

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Post_Slider;