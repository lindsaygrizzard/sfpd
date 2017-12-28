<?php
class GymEdge_BMI_Calculator extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: BMI Calculator", 'gymedge-core' );
		$this->base = 'gymedge-vc-bmi-calculator';
		$this->translate = array(
			'title'      => __( 'CALCULATE YOUR BMI', 'gymedge-core' ),
			'subtitle'   => 'Lorem ipsum dolor sit amet, consectet ad elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaLorem ipsum dolor sit amet',
			'buttontext' => __( "CALCULATE", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Theme", 'gymedge-core' ),
				"param_name" => "theme",
				"value" => array(
					__( 'Light (No Background)', 'gymedge-core' ) => 'light',
					__( 'Dark (Requires Dark Background)', 'gymedge-core' ) => 'dark',
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" =>  $this->translate['title'],
				"rows" => "1",
			),
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" => base64_encode( $this->translate['subtitle'] ),
				"rows" => "1",
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Default Calculation Unit", 'gymedge-core' ),
				"param_name" => "unit_default",
				"value" => array(
					__( 'Metric', 'gymedge-core' )   => 'metric',
					__( 'Imperial', 'gymedge-core' ) => 'imperial',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Allow users to change between Calculation Units", 'gymedge-core' ),
				"param_name" => "unit_display",
				"value" => array( 
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'gymedge-core' ),
				"param_name" => "buttontext",
				"value" => $this->translate['buttontext'],
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'theme'        => 'light',
			'title'        => $this->translate['title'],
			'subtitle'     => base64_encode( $this->translate['subtitle'] ),
			'unit_default' => 'metric',
			'unit_display' => 'true',
			'buttontext'   => $this->translate['buttontext'],
			), $atts ) );

		$template = 'bmi-calculator';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_BMI_Calculator;