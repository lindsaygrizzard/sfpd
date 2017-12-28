<?php
class GymEdge_VC_About extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: About", 'gymedge-core' );
		$this->base = 'gymedge-vc-about';
		$this->translate = array(
			'title'      => __( 'All About', 'gymedge-core' ),
			'subtitle'   => __( '<span class="gym-primary-color">GYM</span> FITNESS', 'gymedge-core' ),
			'buttontext' => __( "SIGN UP", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", 'gymedge-core' ),
				"param_name" => "style",
				"value" => array( 
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2 (Requires Dark Background)", 'gymedge-core' ) => 'style2',
					__( "Style 3 (Requires Dark Background)", 'gymedge-core' ) => 'style3',
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => $this->translate['title'],
			),
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" => base64_encode( $this->translate['subtitle'] ),
				"rows" => "1",
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Description", 'gymedge-core' ),
				"param_name" => "content",
				"value" => __( "I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.", 'gymedge-core' ),
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
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Image", 'gymedge-core' ),
				"param_name" => "image",
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1', 'style2' ),
				),
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'      => 'style1',
			'title'      => $this->translate['title'],
			'subtitle'   => base64_encode( $this->translate['subtitle'] ),
			'buttontext' => $this->translate['buttontext'],
			'buttonurl'  => '',
			'image'      => '',
			), $atts ) );

		switch ( $style ) {
			case 'style2':
			$template = 'about-2';
			break;
			case 'style3':
			$template = 'about-3';
			break;
			default:
			$template = 'about-1';
			break;
		}

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_About;