<?php
if ( !class_exists( 'RT_Posts' ) ) {
	return;
}
$gym_post_types = array(
	'gym_trainer'     => array(
		'title'        => __( 'Trainer', 'gymedge-core' ),
		'plural_title' => __( 'Trainers', 'gymedge-core' ),
		'menu_icon'    => 'dashicons-businessman',
		'rewrite'      => GymEdge::$options['trainer_slug'],
		'supports'     => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
	'gym_class'     => array(
		'title'        => __( 'Class', 'gymedge-core' ),
		'plural_title' => __( 'Classes', 'gymedge-core' ),
		'menu_icon'    => 'dashicons-portfolio',
		'rewrite'      => GymEdge::$options['class_slug'],
		'supports'     => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
	'gym_testimonial'     => array(
		'title'        => __( 'Testimonial', 'gymedge-core' ),
		'plural_title' => __( 'Testimonials', 'gymedge-core' ),
		'menu_icon'    => 'dashicons-awards',
		'rewrite'      => false,
		'supports'     => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
	'gym_gallery'     => array(
		'title'        => __( 'Gallery', 'gymedge-core' ),
		'plural_title' => __( 'Galleries', 'gymedge-core' ),
		'menu_icon'    => 'dashicons-media-archive',
		'rewrite'      => false,
		'supports'     => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
);

$gym_taxonomies = array(
	'gym_team_category'       => array(
		'title'        => __( 'Trainer Category', 'gymedge-core' ),
		'plural_title' => __( 'Trainer Categories', 'gymedge-core' ),
		'post_types'   => 'gym_trainer',
	),
	'gym_class_category'       => array(
		'title'        => __( 'Class Category', 'gymedge-core' ),
		'plural_title' => __( 'Class Categories', 'gymedge-core' ),
		'post_types'   => 'gym_class',
	),
	'gym_testimonial_category' => array(
		'title'        => __( 'Testimonial Category', 'gymedge-core' ),
		'plural_title' => __( 'Testimonial Categories', 'gymedge-core' ),
		'post_types'   => 'gym_testimonial',
	),
	'gym_gallery_category'     => array(
		'title'        => __( 'Gallery Category', 'gymedge-core' ),
		'plural_title' => __( 'Gallery Categories', 'gymedge-core' ),
		'post_types'   => 'gym_gallery',
	),
);

$Gymedge_Posts = RT_Posts::getInstance();
$Gymedge_Posts->add_post_types( $gym_post_types );
$Gymedge_Posts->add_taxonomies( $gym_taxonomies );