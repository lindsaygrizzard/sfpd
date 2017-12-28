<?php
class GymEdge_VC_Upcoming_Class extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Upcoming Class", 'gymedge-core' );
		$this->base = 'gymedge-vc-upcoming-class';
		$this->translate = array(
			'title'    => __( "UPCOMIONG CLASSES", 'gymedge-core' ),
			'subtitle' => 'Lorem ipsum dolor sit amet, consectet ad elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaLorem ipsum dolor sit amet',
		);
		parent::__construct();
	}
	
	public function load_scripts(){
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function sort_by_time( $a, $b ) {
		return $a['timestamp'] - $b['timestamp'];
	}

	public function get_schedule( $number ) {
		$weeknames = array(
			'mon' => __( 'Monday', 'gymedge-core' ),
			'tue' => __( 'Tuesday', 'gymedge-core' ),
			'wed' => __( 'Wednesday', 'gymedge-core' ),
			'thu' => __( 'Thursday', 'gymedge-core' ),
			'fri' => __( 'Friday', 'gymedge-core' ),
			'sat' => __( 'Saturday', 'gymedge-core' ),
			'sun' => __( 'Sunday', 'gymedge-core' ),
		);

		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'gym_class',
		);
		$classes = get_posts( $args );

		$schedule = array();

		$time = current_time( 'timestamp' );

		foreach ( $classes as $class ) {
			$metas = get_post_meta( $class->ID, 'gym_class_schedule', true );
			$metas = ( $metas != '' ) ? $metas : array();

			foreach ( $metas as $meta ) {
				if ( empty( $meta['week'] ) || empty( $meta['start_time'] ) ) {
					continue;
				}

				$timestamp = $meta['week'] . ' ' . $meta['start_time'];
				$timestamp = strtotime( $timestamp);

				if ( $timestamp < $time ) {
					$timestamp = $timestamp + $time;
				}

				$start_time = strtotime( $meta['start_time'] );
				$end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

				if ( GymEdge::$options['class_time_format'] == '24' ) {
					$start_time = date( "H:i", $start_time );
					$end_time   = $end_time ? date( "H:i", $end_time ) : '';
				}
				else {
					$start_time = date( "g:ia", $start_time );
					$end_time   = $end_time ? date( "g:ia", $end_time ) : '';
				}

				$schedule[] = array(
					'class'      => $class->post_title,
					'week'       => $meta['week'],
					'weekname'   => $weeknames[$meta['week']],
					'start_time' => $start_time,
					'end_time'   => $end_time,
					'timestamp'  => $timestamp,
				);
			}
		}

		usort( $schedule, array( $this, 'sort_by_time' ) );

		return array_slice( $schedule, 0, $number );
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => base64_encode( $this->translate['title'] ),
				"rows" => "1",
			),
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" =>  base64_encode( $this->translate['subtitle'] ),
				"rows" => "1",
				'dependency' => array(
					'element' => 'style',
					'value' => array( 'style2' ),
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Slider", 'gymedge-core' ),
				"param_name" => "slider",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Maximum number of slider items", 'gymedge-core' ),
				"param_name" => "number",
				"value" => 10,
				'dependency' => array(
					'element' => 'slider',
					'value' => array( 'true' ),
				),
			),
		);

		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'title'    => base64_encode( $this->translate['title'] ),
			'subtitle' => base64_encode( $this->translate['subtitle'] ),
			'slider'   => 'true',
			'number'   => '10',
			), $atts ) );

		// validation
		$number = intval( $number );

		$schedule = $this->get_schedule( $number );
		
		$owl_data = array( 
			'nav'         => false,
			'dots'        => false,
			'autoplay'    => false,
			'loop'        => false,
			'margin'      => 0,
			'responsive'  => array(
				'0'    => array( 'items' => 1 ),
				'500'  => array( 'items' => 2 ),
				'1300' => array( 'items' => 3 ),
				'1500' => array( 'items' => 4 ),
				'1800' => array( 'items' => 5 ),
			)
		);

		$template = 'class-upcoming';

		$this->load_scripts();
		$owl_data = json_encode( $owl_data );

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Upcoming_Class;