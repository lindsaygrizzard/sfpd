<?php
class GymEdge_VC_Counter extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Counter", 'gymedge-core' );
		$this->base = 'gymedge-vc-counter';
		$this->translate = array(
			'title'    => __( "500+", 'gymedge-core' ),
			'subtitle' => __( "Subscribers", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'gymedge-core' ),
				'param_name' => 'icon',
				'value' => 'fa fa-user',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
					),
				'description' => __( 'Select icon from library.', 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon size", 'gymedge-core' ),
				"param_name" => "size",
				'description' => __( 'Icon size in px', 'gymedge-core' ),
				'value' => '20',
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon Top/Bottom padding", 'gymedge-core' ),
				"param_name" => "padding_tb",
				'description' => __( 'Icon top/bottom padding value in px. Default: 15', 'gymedge-core' ),
				'value' => '13',
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon Left/Right padding", 'gymedge-core' ),
				"param_name" => "padding_lr",
				'description' => __( 'Icon left/right padding value in px. Default: 18', 'gymedge-core' ),
				'value' => '15',
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
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" => $this->translate['subtitle'],
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Width", 'gymedge-core' ),
				"param_name" => "width",
				"value" => '300',
				'description' => __( "Maximum width in px. Keep this field empty if you want full width", 'gymedge-core' ),
				),
			array(
				'type' => 'css_editor',
				'heading' => __( 'Css', 'gymedge-core' ),
				'param_name' => 'css',
				'group' => __( 'Design options', 'gymedge-core' ),
				'edit_field_class' => 'vc-no-bg vc-no-border',
				),
			);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'icon'       => 'fa fa-user',
			'size'       => '20',
			'padding_tb' => '13',
			'padding_lr' => '15',
			'title'      => $this->translate['title'],
			'subtitle'   => $this->translate['subtitle'],
			'width'      => '300',
			'css'        => '',
			), $atts ) );

		// validation
		$size        = intval( $size );
		$padding_tb  = intval( $padding_tb );
		$padding_lr  = intval( $padding_lr );
		$width       = intval( $width );
		$class       = vc_shortcode_custom_css_class( $css );

		$template = 'counter';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Counter;