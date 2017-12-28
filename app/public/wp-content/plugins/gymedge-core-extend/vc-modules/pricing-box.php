<?php
class GymEdge_VC_Pricing_Box extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Pricing Box", 'gymedge-core' );
		$this->base = 'gymedge-vc-pricing';
		$this->translate = array(
			'title'   => __( "STANDARD", 'gymedge-core' ),
			'price'   => __( "$199", 'gymedge-core' ),
			'unit'    => __( "month", 'gymedge-core' ),
			'btntext' => __( "DETAILS", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => $this->translate['title'],
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Price", 'gymedge-core' ),
				"param_name" => "price",
				"value" => $this->translate['price'],
				"description" => __( "Including currency sign eg. $199", 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Unit Name", 'gymedge-core' ),
				"param_name" => "unit",
				"value" => $this->translate['unit'],
				"description" => __( "eg. month or year", 'gymedge-core' ),
				),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Features", 'gymedge-core' ),
				"param_name" => "features",
				"value" => "",
				"description" => __( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Free Hand<br/>Gym Fitness<br/>BLANK", 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'gymedge-core' ),
				"param_name" => "btntext",
				"value" => $this->translate['btntext'],
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button URL", 'gymedge-core' ),
				"param_name" => "btnurl",
				"value" => "",
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Maximum width", 'gymedge-core' ),
				"param_name" => "maxwidth",
				"value" => "360",
				"description" => __( "Maximum width in px. Keep empty if you want full width. eg. 300", 'gymedge-core' ),
				),
			);
		return $fields;
	}

	private function validate( $str ){
		$str = trim( $str );
		// replace EMPTY keyword
		if ( strtolower( $str ) == 'blank'  ) {
			return '&nbsp;';
		}
		return $str;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'title'    => $this->translate['title'],
			'price'    => $this->translate['price'],		
			'unit'     => $this->translate['unit'],
			'features' => '',
			'btntext'  => $this->translate['btntext'],
			'btnurl'   => '',
			'maxwidth' => '360',
			), $atts ) );

		$maxwidth = (int) $maxwidth;

		$features = strip_tags( $features ); // remove tags
		$features = preg_split( "/\R/", $features ); // string to array
		$features = array_map( array( $this, 'validate' ), $features ); // validate
		
		$template = 'pricing-box';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Pricing_Box;