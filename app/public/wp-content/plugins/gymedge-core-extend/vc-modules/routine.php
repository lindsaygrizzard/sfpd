<?php
class GymEdge_VC_Routine extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Routine", 'gymedge-core' );
		$this->base = 'gymedge-vc-routine';
		parent::__construct();
	}

	public function sort_by_time_as_key( $a, $b ) {
		return ( strtotime( $a ) > strtotime( $b ) );
	}

	public function sort_by_end_time( $a, $b ) {
		return ( strtotime( $a['end_time'] ) > strtotime( $b['end_time'] ) );
	}

	public function print_routine( $routine, $link, $trainer ) {
		usort( $routine, array( $this, 'sort_by_end_time' ) );
		$tag = ( $trainer == 'true' );
		?>
		<?php foreach ( $routine as $each_routine ): ?>
			<?php
			$class ='rt-item tab-pane fade in rt-routine-id-' . $each_routine['id'];
			if ( $link == 'true' ) {
				$permalink = get_the_permalink( $each_routine['id'] );
				$start_tag = '<a href="'.$permalink.'" class="'.$class.'">';
				$end_tag   = '</a>';
			}
			else {
				$start_tag = '<div class="'.$class.'">';
				$end_tag   = '</div>';
			}
			?>
			<?php echo $start_tag;?>
			<div class="rt-item-title"><?php echo esc_html( $each_routine['class'] );?></div>
			<div class="rt-item-time">
				<span><?php echo esc_html( $each_routine['start_time'] );?></span>
				<?php if ( !empty( $each_routine['end_time'] ) ): ?>
					<span>- <?php echo esc_html( $each_routine['end_time'] );?></span>
				<?php endif;?>
			</div>
			<?php if ( $trainer == 'true' ): ?>
				<div class="rt-item-trainer"><?php echo esc_html( $each_routine['trainer'] );?></div>
			<?php endif;?>
			<?php echo $end_tag;?>
		<?php endforeach; ?>
		<?php
	}	

	public function fields(){
		$terms = get_terms( array('taxonomy' => 'gym_class_category') );
		$category_dropdown = array( __( 'All Categories', 'gymedge-core' ) => '0' );

		foreach ( $terms as $category ) {
			$category_dropdown[$category->name] = $category->term_id;
		}

		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Theme", 'gymedge-core' ),
				"param_name" => "theme",
				"value" => array(
					__( 'Light (No Background)', 'gymedge-core' ) => 'light',
					__( 'Dark (Requires Dark Background)', 'gymedge-core' ) => 'dark',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Class Categories", 'gymedge-core' ),
				"param_name" => "cat",
				'value' => $category_dropdown,
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Linkable", 'gymedge-core' ),
				"param_name" => "link",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Trainer Display", 'gymedge-core' ),
				"param_name" => "trainer",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
				'description' => __( 'Show or Hide Trainer Name', 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Navigation Menu Display", 'gymedge-core' ),
				"param_name" => "nav",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
				'description' => __( 'Show or Hide Navigation Menu', 'gymedge-core' ),
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'theme'   => 'light',
			'cat'     => '',
			'link'    => 'false',
			'trainer' => 'false',
			'nav'     => 'false',
			), $atts ) );

		// week names array
		$weeknames = array(
			'mon' => __( 'Monday', 'gymedge-core' ),
			'tue' => __( 'Tuesday', 'gymedge-core' ),
			'wed' => __( 'Wednesday', 'gymedge-core' ),
			'thu' => __( 'Thursday', 'gymedge-core' ),
			'fri' => __( 'Friday', 'gymedge-core' ),
			'sat' => __( 'Saturday', 'gymedge-core' ),
			'sun' => __( 'Sunday', 'gymedge-core' ),
		);
		$weeknames = apply_filters( 'gym_weeknames', $weeknames );

		// class post types array
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'gym_class',
		);
		
		if ( !empty( $cat ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'gym_class_category',
					'field' => 'term_id',
					'terms' => $cat,
				)
			);
		}

		$classes = get_posts( $args );

		$template = 'routine';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Routine;