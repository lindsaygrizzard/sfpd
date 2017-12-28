<?php
if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$GymEdge_Postmeta = RT_Postmeta::getInstance();

///////////////////
// Page Settings //
///////////////////
$gym_nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$gym_nav_menus = array( 'default' => __( 'Default', 'gymedge-core' ) ) + $gym_nav_menus;

$GymEdge_Postmeta->add_meta_box( 'page_settings', __( 'Layout Settings', 'gymedge-core' ), array( 'page', 'post', 'gym_trainer', 'gym_class' ), '', '', 'high', array(
	'fields' => array(
		'gym_layout' => array(
			'label' => __( 'Layout', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default'       => __( 'Default', 'gymedge-core' ),
				'full-width'    => __( 'Full Width', 'gymedge-core' ),
				'left-sidebar'  => __( 'Left Sidebar', 'gymedge-core' ),
				'right-sidebar' => __( 'Right Sidebar', 'gymedge-core' ),
				),
			'default'  => 'default',
			),
		'gym_top_bar' => array(
			'label' => __( 'Top Bar', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'on'      => __( 'Enabled', 'gymedge-core' ),
				'off'     => __( 'Disabled', 'gymedge-core' ),
				),
			'default'  => 'default',
			),
		'gym_page_menu' => array(
			'label' => __( 'Main Menu', 'gymedge-core' ),
			'type'  => 'select',
			'options' => $gym_nav_menus,
			'default'  => 'default',
			),
		'gym_header' => array(
			'label' => __( 'Header Style', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'st1'     => __( 'Style 1', 'gymedge-core' ), // trheader off
				'st2'     => __( 'Style 2', 'gymedge-core' ), // trheader on
				),
			'default'  => 'default',
			),
		'gym_top_padding' => array(
			'label' => __( 'Content Padding Top', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'gym_bottom_padding' => array(
			'label' => __( 'Content Padding Bottom', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'0px'     => '0px',
				'10px'    => '10px',
				'20px'    => '20px',
				'30px'    => '30px',
				'40px'    => '40px',
				'50px'    => '50px',
				'60px'    => '60px',
				'70px'    => '70px',
				'80px'    => '80px',
				'90px'    => '90px',
				'100px'   => '100px',
				),
			'default'  => 'default',
			),
		'gym_banner' => array(
			'label' => __( 'Banner', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'on'    => __( 'Enable', 'gymedge-core' ),
				'off'  => __( 'Disable', 'gymedge-core' ),
				),
			'default'  => 'default',
			),
		'gym_breadcrumb' => array(
			'label' => __( 'Breadcrumb', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'on'    => __( 'Enable', 'gymedge-core' ),
				'off'  => __( 'Disable', 'gymedge-core' ),
				),
			'default'  => 'default',
			),
		'gym_banner_type' => array(
			'label' => __( 'Banner Background Type', 'gymedge-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'gymedge-core' ),
				'bgimg'    => __( 'Background Image', 'gymedge-core' ),
				'bgcolor'  => __( 'Background Color', 'gymedge-core' ),
				),
			'default'  => 'default',
			),
		'gym_banner_bgimg' => array(
			'label' => __( 'Banner Background Image', 'gymedge-core' ),
			'type'  => 'image',
			'desc'  => __( 'If not selected, default will be used', 'gymedge-core' ),
			),
		'gym_banner_bgcolor' => array(
			'label' => __( 'Banner Background Color', 'gymedge-core' ),
			'type'  => 'color_picker',
			'desc'  => __( 'If not selected, default will be used', 'gymedge-core' ),
			),
		),
	) );

//////////////
// Trainers //
//////////////
$gym_trainer_socials = array(
	'facebook' => array(
		'label' => __( 'Facebook', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-facebook',
		),
	'twitter' => array(
		'label' => __( 'Twitter', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-twitter',
		),
	'linkedin' => array(
		'label' => __( 'Linkedin', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-linkedin',
		),
	'gplus' => array(
		'label' => __( 'Google Plus', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-google-plus',
		),
	'skype' => array(
		'label' => __( 'Skype', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-skype',
		),
	'youtube' => array(
		'label' => __( 'Youtube', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-youtube-play',
		),
	'pinterest' => array(
		'label' => __( 'Pinterest', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-pinterest-p',
		),
	'instagram' => array(
		'label' => __( 'Instagram', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-instagram',
		),
	'github' => array(
		'label' => __( 'Github', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-github',
		),
	'stackoverflow' => array(
		'label' => __( 'Stackoverflow', 'gymedge-core' ),
		'type'  => 'text',
		'icon'  => 'fa-stack-overflow',
		),
	);

$gym_trainer_socials = apply_filters( 'trainer_socials', $gym_trainer_socials );

GymEdge::$trainer_social_fields = $gym_trainer_socials;

$GymEdge_Postmeta->add_meta_box( 'trainer_info', __( 'Trainer Info', 'gymedge-core' ), array( 'gym_trainer' ), '', '', 'high', array(
	'fields' => array(
		'gym_trainer_designation' => array(
			'label' => __( 'Designation', 'gymedge-core' ),
			'type'  => 'text',
			),
		'gym_trainer_experience' => array(
			'label' => __( 'Experience', 'gymedge-core' ),
			'type'  => 'text',
			),
		'gym_trainer_age' => array(
			'label' => __( 'Age', 'gymedge-core' ),
			'type'  => 'text',
			),
		'gym_trainer_weight' => array(
			'label' => __( 'Weight', 'gymedge-core' ),
			'type'  => 'text',
			),
		'gym_trainer_email' => array(
			'label' => __( 'Email', 'gymedge-core' ),
			'type'  => 'text',
			),
		'gym_trainer_phone' => array(
			'label' => __( 'Phone', 'gymedge-core' ),
			'type'  => 'text',
			),
		)
	) );

$GymEdge_Postmeta->add_meta_box( 'trainer_skills', __( 'Trainer Skills', 'gymedge-core' ), array( 'gym_trainer' ), '', '', 'high', array(
	'fields' => array(
		'gym_trainer_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'gymedge-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'gymedge-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Yoga', 'gymedge-core' ),
					),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'gymedge-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'gymedge-core' ),
					),
				)
			),
		)
	) );

$GymEdge_Postmeta->add_meta_box( 'trainer_socials', __( 'Trainer Socials', 'gymedge-core' ), array( 'gym_trainer' ), '', '', 'high', array(
	'fields' => array(
		'gym_trainer_socials_header' => array(
			'label' => __( 'Socials', 'gymedge-core' ),
			'type'  => 'header',
			'desc'  => __( 'Put your social links here', 'gymedge-core' ),
			),
		'gym_trainer_socials' => array(
			'type'  => 'group',
			'value'  => $gym_trainer_socials
			),
		)
	) );

///////////
// Class //
///////////
$time_picker_format = ( GymEdge::$options['class_time_format'] == 24 ) ? 'time_picker_24' : 'time_picker';
$GymEdge_Postmeta->add_meta_box( 'class_schedule', __( 'Schedule', 'gymedge-core' ), array( 'gym_class' ), '', '', 'high', array(
	'fields' => array(
		'gym_class_button_text' => array(
			'label' => __( 'Button Text', 'gymedge-core' ),
			'type'  => 'text',
			'desc'  => __( 'Enter button text eg. Join Now!', 'gymedge-core' ),
			),
		'gym_class_button_url' => array(
			'label' => __( 'Button URL', 'gymedge-core' ),
			'type'  => 'text',
			'desc'  => __( 'Enter button url', 'gymedge-core' ),
			),
		'gym_class_schedule' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Schedule', 'gymedge-core' ),
			'value'  => array(
				'trainer' => array(
					'label' => __( 'Trainer', 'gymedge-core' ),
					'type'  => 'select',
					'options' => GymEdge_Helper::get_trainers(),
					'default'  => 'default',
					),
				'week' => array(
					'label' => __( 'Weekday', 'gymedge-core' ),
					'type'  => 'select',
					'options' => array(
						'none' => __( 'Select a Weekday', 'gymedge-core' ),
						'mon'  => __( 'Monday', 'gymedge-core' ),
						'tue'  => __( 'Tuesday', 'gymedge-core' ),
						'wed'  => __( 'Wednesday', 'gymedge-core' ),
						'thu'  => __( 'Thursday', 'gymedge-core' ),
						'fri'  => __( 'Friday', 'gymedge-core' ),
						'sat'  => __( 'Saturday', 'gymedge-core' ),
						'sun'  => __( 'Sunday', 'gymedge-core' ),
						),
					),				
				'start_time' => array(
					'label' => __( 'Start Time', 'gymedge-core' ),
					'type'  => $time_picker_format,
					),
				'end_time' => array(
					'label' => __( 'End Time', 'gymedge-core' ),
					'type'  => $time_picker_format,
					),
				)
			),
		)
	) );

//////////////////
// Testimonials //
//////////////////
$GymEdge_Postmeta->add_meta_box( 'testimonial_info', __( 'Testimonial Info', 'gymedge-core' ), array( 'gym_testimonial' ), '', '', 'high', array(
	'fields' => array(
		'gym_tes_designation' => array(
			'label' => __( 'Designation', 'gymedge-core' ),
			'type'  => 'text',
			),
		)
	) );