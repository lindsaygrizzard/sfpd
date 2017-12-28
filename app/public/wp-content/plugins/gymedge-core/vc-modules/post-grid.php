<?php
class GymEdge_VC_Post_Grid extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Post Grid", 'gymedge-core' );
		$this->base = 'gymedge-vc-post-grid';
		parent::__construct();
	}

	public function fields(){
		$categories = get_categories();
		$category_dropdown = array( __( 'All Categories', 'gymedge-core' ) => '0' );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->name] = $category->term_id;
		}

		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Category", 'gymedge-core' ),
				"param_name" => "cat",
				'value' => $category_dropdown,
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Order By", 'gymedge-core' ),
				"param_name" => "orderby",
				"value" => array(
					__( 'Date (Recents comes first)', 'gymedge-core' )  => 'date',
					__( 'Title', 'gymedge-core' ) => 'title',
					__( 'Custom Order (Available via Order field inside Page Attributes box)', 'gymedge-core' ) => 'menu_order',
				),
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'cat'      => '',
			'orderby'  => 'date',
			), $atts ) );

		// validation
		$cat = empty( $cat ) ? '' : (int) $cat;

		$template = 'post-grid';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Post_Grid;