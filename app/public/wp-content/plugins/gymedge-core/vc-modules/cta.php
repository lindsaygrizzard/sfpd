<?php
if ( !class_exists( 'RDTheme_VC_CTA' ) ) {

	class RDTheme_VC_CTA extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "GymEdge: Call To Action", 'gymedge-core' );
			$this->base = 'gymedge-vc-cta';
			$this->translate = array(
				'title'      => __( "Ready To Change Your Physique, But Can't Work Out?", 'gymedge-core' ),
				'buttontext' => __( "Get It Now", 'gymedge-core' ),
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
					'value' => array( 
						'Default' => 'default',
						'Light'   => 'light',
						'Dark'    => 'dark',
					),
				),
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
					"value" => "",
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
					'type' => 'css_editor',
					'heading' => __( 'Css', 'gymedge-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'gymedge-core' ),
					),
			);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'theme'      => "default",
				'title'      => base64_encode( $this->translate['title'] ),
				'subtitle'   => "",
				'buttontext' => $this->translate['buttontext'],
				'buttonurl'  => '',
				'css'        => '',
				), $atts ) );

			$subtitle = trim( $subtitle );

			$template = 'cta';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_CTA;