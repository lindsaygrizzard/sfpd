<?php
if ( !class_exists( 'RDTheme_VC_Button' ) ) {

	class RDTheme_VC_Button extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "GymEdge: Button", 'gymedge-core' );
			$this->base = 'gymedge-vc-button';
			$this->translate = array(
				'buttontext' => __( "Get It Now", 'gymedge-core' ),
			);
			parent::__construct();
		}

		public function fields(){
			$fields = array(
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
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Alignment", 'gymedge-core' ),
					"param_name" => "btnalign",
					'value' => array( 
						__( 'Left', 'gymedge-core' )   => 'left',
						__( 'Center', 'gymedge-core' ) => 'center',
						__( 'Right', 'gymedge-core' )  => 'right',
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Text Color", 'gymedge-core' ),
					"param_name" => "txtcolor",
					'value' => "#fff",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Text Hover Color", 'gymedge-core' ),
					"param_name" => "txthovercolor",
					'value' => "#fff",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Color", 'gymedge-core' ),
					"param_name" => "bgcolor",
					'value' => "#fb5b21",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Background Hover Color", 'gymedge-core' ),
					"param_name" => "bghovercolor",
					'value' => "#b0360a",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Border Color", 'gymedge-core' ),
					"param_name" => "bdrcolor",
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
				'buttontext'    => $this->translate['buttontext'],
				'buttonurl'     => '',
				'btnalign'      => 'left',
				'txtcolor'      => '#fff',
				'txthovercolor' => '#fff',
				'bgcolor'       => '#fb5b21',
				'bghovercolor'  => '#b0360a',
				'bdrcolor'      => '',
				'css'           => '',
				), $atts ) );

			$template = 'button';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Button;