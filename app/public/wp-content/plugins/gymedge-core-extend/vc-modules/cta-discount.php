<?php
class GymEdge_VC_CTA_Discount extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Call to Action - Discount", 'gymedge-core' );
		$this->base = 'gymedge-vc-cta-discount';
		$this->translate = array(
			'title'      => __( 'FITNESS CLASSES THIS SUMMER.', 'gymedge-core' ),
			'des'        => __( 'PAY NOW AND<br>GET <span class="gym-primary-color">$35</span> DISCOUNT', 'gymedge-core' ),
			'buttontext' => __( "BECOME A MEMBER", 'gymedge-core' ),
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
				'value' => $this->translate['title'],
			),
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "des",
				"value" => base64_encode( $this->translate['des'] ),
				"rows" => "1",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'gymedge-core' ),
				"param_name" => "buttontext",
				"value" => $this->translate['buttontext'],
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button URL", 'gymedge-core' ),
				"param_name" => "buttonurl",
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'title'      => $this->translate['title'],
			'des'        => base64_encode( $this->translate['des'] ),
			'buttontext' => $this->translate['buttontext'],
			'buttonurl'  => '',
			), $atts ) );

		$template = 'cta-discount';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_CTA_Discount;