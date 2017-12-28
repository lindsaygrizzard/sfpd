<?php
class GymEdge_About_Fitness extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: About Fitness", 'gymedge-core' );
		$this->base = 'gymedge-vc-about-fitness';
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Image", 'gymedge-core' ),
				"param_name" => "image",
				),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "content",
				"value" =>  __( 'All <span style="font-weight: 600;">About</span><br/>Fitness', 'gymedge-core' ),
				"rows" => "1",
				),
			);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'image' => '',
			), $atts ) );

		$template = 'about-fitness';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_About_Fitness;