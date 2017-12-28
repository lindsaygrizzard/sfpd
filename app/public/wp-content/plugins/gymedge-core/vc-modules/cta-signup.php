<?php
class GymEdge_VC_CTA_Signup extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Call to Action - Signup", 'gymedge-core' );
		$this->base = 'gymedge-vc-cta-signup';
		$this->translate = array(
			'title'      => __( 'BEING <span class="gym-primary-color">BODY</span>', 'gymedge-core' ),
			'subtitle'   => __( "BUILDERS", 'gymedge-core' ),
			'buttontext' => __( "SIGN UP", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				'value' => base64_encode( $this->translate['title'] ),
				"rows" => "1",
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" => $this->translate['subtitle'],
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
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content Left spacing", 'gymedge-core' ),
				"param_name" => "left",
				"value" => "-110",
				"description" => __( "Left spacing in px. Default: -110", 'gymedge-core' ),
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Image", 'gymedge-core' ),
				"param_name" => "image",
				),
			);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
		'title'      => base64_encode( $this->translate['title'] ),
		'subtitle'   => $this->translate['subtitle'],
		'buttontext' => $this->translate['buttontext'],
		'buttonurl'  => '',
		'left'       => '-110',
		'image'      => '',
			), $atts ) );

		// validation
		$left = (int) $left;

		$template = 'cta-signup';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_CTA_Signup;