<?php
class GymEdge_VC_Info_Text extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Info Text", 'gymedge-core' );
		$this->base = 'gymedge-vc-infotext';
		$this->translate = array(
			'title' => __( "I am title", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Layout", 'gymedge-core' ),
				"param_name" => "layout",
				'value' => array( 
					__( "Layout 1", 'gymedge-core' ) => 'layout1',
					__( "Layout 2", 'gymedge-core' ) => 'layout2',
					__( "Layout 3", 'gymedge-core' ) => 'layout3',
					),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Alignment", 'gymedge-core' ),
				"param_name" => "alignment",
				'value' => array( 
					'Center' => 'center',
					'Left'   => 'left',
					),
				'dependency' => array(
					'element' => 'layout',
					'value'   => array( 'layout3' ),
					),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon Type", 'gymedge-core' ),
				"param_name" => "icontype",
				'value' => array( 
					__( "FontAwesome Icon", 'gymedge-core' ) => 'fontawesome',
					__( "Custom Image", 'gymedge-core' )     => 'custom',
					),
				),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'gymedge-core' ),
				'param_name' => 'icon',
				'value' => 'fa fa-wheelchair-alt',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
					),
				'description' => __( 'Select icon from library.', 'gymedge-core' ),
				'dependency' => array(
					'element' => 'icontype',
					'value'   => array( 'fontawesome' ),
					),
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Upload Image", 'gymedge-core' ),
				"param_name" => "image",
				'dependency' => array(
					'element' => 'icontype',
					'value'   => array( 'custom' ),
					),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Image Style", 'gymedge-core' ),
				"param_name" => "image_style",
				'value' => array( 
					'Default' => 'default',
					'Rounded' => 'rounded',
					),
				'dependency' => array(
					'element' => 'icontype',
					'value'   => array( 'custom' ),
					),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon size", 'gymedge-core' ),
				"param_name" => "size",
				'description' => __( 'Icon size in px', 'gymedge-core' ),
				'value' => '28',
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon Top/Bottom padding", 'gymedge-core' ),
				"param_name" => "padding_tb",
				'description' => __( "Icon top/bottom padding value in px. Default: 15. Doesn't work with custom image", 'gymedge-core' ),
				'value' => '15',
				'dependency' => array(
					'element' => 'layout',
					'value'   => array( 'layout2' ),
					),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon Left/Right padding", 'gymedge-core' ),
				"param_name" => "padding_lr",
				'description' => __( "Icon left/right padding value in px. Default: 18. Doesn't work with custom image", 'gymedge-core' ),
				'value' => '18',
				'dependency' => array(
					'element' => 'layout',
					'value'   => array( 'layout2' ),
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
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title Font Size", 'gymedge-core' ),
				"param_name" => "title_size",
				'value' => '',
				'description' => __( 'Title font size in px. If not defined, default h3 font size will be used', 'gymedge-core' ),
				),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'gymedge-core' ),
				"param_name" => "content",
				"value" => __( 'I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'gymedge-core' ),
				"rows" => "5",
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content Font Size", 'gymedge-core' ),
				"param_name" => "content_size",
				'value' => '',
				'description' => __( 'Content font size in px. If not defined, default body font size will be used', 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title URL", 'gymedge-core' ),
				"param_name" => "url",
				'description' => __( "keep this field empty if you don't want the title linkable", 'gymedge-core' ),
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Separator", 'gymedge-core' ),
				"param_name" => "separator",
				"value" => array( 
					__( "Enabled", 'gymedge-core' )  => 'true',
					__( "Disabled", 'gymedge-core' ) => 'false',
					),
				"description" => __( "Show or hide Separator. Default: Enable", 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Spacing", 'gymedge-core' ),
				"param_name" => "spacing",
				"value" => '30',
				"description" => __( "Spacing between title and content in px. Default: 30", 'gymedge-core' ),
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content Width", 'gymedge-core' ),
				"param_name" => "width",
				"value" => '',
				'description' => __( "Content maximum width in px. Keep this field empty if you want full width", 'gymedge-core' ),
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
			'layout'       => 'layout1',
			'alignment'    => 'center',
			'icontype'     => 'fontawesome',
			'icon'         => 'fa fa-wheelchair-alt',
			'image'        => '',
			'image_style'  => 'default',
			'size'         => '28',
			'padding_tb'   => '15',
			'padding_lr'   => '18',
			'title'        => $this->translate['title'],
			'title_size'   => '',
			'content_size' => '',
			'separator'    => 'true',
			'spacing'      => '30',
			'url'          => '',
			'width'        => '',
			
			'css'        => '',
			), $atts ) );

		// validation
		$size         = (int) $size;
		$padding_tb   = (int) $padding_tb;
		$padding_lr   = (int) $padding_lr;
		$width        = (int) $width;
		$spacing      = (int) $spacing;
		$spacing      = $spacing/2;

		switch ( $layout ) {
			case 'layout2':
			$template = 'info-text-2';
			break;
			case 'layout3':
			$template = 'info-text-3';
			break;
			default:
			$template = 'info-text-1';
			break;
		}

		$class = vc_shortcode_custom_css_class( $css );

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Info_Text;