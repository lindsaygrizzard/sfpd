<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "gymedge";

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'GymEdge Options', 'gymedge' ),
    'page_title'           => __( 'GymEdge Options', 'gymedge' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'gymedge-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'gymedge' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Primary Color', 'gymedge' ),
            'default'  => '#fb5b21',
        ), 
        array(
            'id'       => 'secondery_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Secondery/Hover Color', 'gymedge' ),
            'default'  => '#b0360a',
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => __( 'Back to Top Arrow', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ),
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'gymedge' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => __( 'Main Logo (Dark)', 'gymedge' ),
            'default'  => array(
                'url'=> GYMEDGE_IMG_URL . 'logo.png'
            ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => __( 'Light Logo', 'gymedge' ),
            'default'  => array(
                'url'=> GYMEDGE_IMG_URL . 'logo2.png'
            ),
            'subtitle' => __( 'Mainly used in 2nd Header Style', 'gymedge' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => __( 'Logo Area Width', 'gymedge'), 
            'subtitle' => __( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'gymedge' ),
            'options'  => array(
                '1' => __('1 Column', 'gymedge'),
                '2' => __('2 Column', 'gymedge'),
                '3' => __('3 Column', 'gymedge'),
                '4' => __('4 Column', 'gymedge'),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'logo_fixed_height',
            'type'     => 'switch',
            'title'    => __( 'Fixed Height Logo', 'gymedge'), 
            'subtitle' => __( "Disable only if you want to display the same logo size you uploaded. If you are going to disable it, it's recommended that you upload a logo which height is less than 60px", 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'logo_fixed_height_sticky',
            'type'     => 'switch',
            'title'    => __( 'Fixed Height Logo (in sticky menu)', 'gymedge'), 
            'subtitle' => __( "Disable only if you want to display the same logo size you uploaded. If you are going to disable it, it's recommended that you upload a logo which height is less than 60px", 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => __( 'Search Icon', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => __( 'Cart Icon', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'section-topbar',
            'type'     => 'section',
            'title'    => __( 'Top Bar Section', 'gymedge' ),
            'indent'   => true,
            'subtitle' => __( 'If you want to hide any field simply keep it empty', 'gymedge' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => __( 'Display on Top', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => false,
        ),
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Background Color', 'gymedge' ),
            'default'  => '#222222',
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Text Color', 'gymedge' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'top_phone',
            'type'     => 'text',
            'title'    => __( 'Phone', 'gymedge' ),
        ),
        array(
            'id'       => 'top_email',
            'type'     => 'text',
            'title'    => __( 'Email', 'gymedge' ),
            'validate' => 'email',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'gymedge' ),
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'gymedge' ),
        ),
        array(
            'id'       => 'social_gplus',
            'type'     => 'text',
            'title'    => __( 'Google Plus', 'gymedge' ),
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => __( 'Linkedin', 'gymedge' ),
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => __( 'Youtube', 'gymedge' ),
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => __( 'Pinterest', 'gymedge' ),
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => __( 'Instagram', 'gymedge' ),
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => __( 'Skype', 'gymedge' ),
        ),

    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Main Menu', 'gymedge' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => __( 'Sticky Menu', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => __( 'Menu Font', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Open Sans',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '600',
                'line-height' => '21px',
            ),
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Menu Color', 'gymedge' ),
            'default'  => '#333333',
        ), 
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Menu Hover Color', 'gymedge' ),
            'default'  => '#fb5b21',
        ), 
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Color', 'gymedge' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Background Color', 'gymedge' ),
            'default'  => '#fb5b21',
        ),  
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Submenu Hover Background Color', 'gymedge' ),
            'default'  => '#b0360a',
        ),          
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'gymedge' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Background Color', 'gymedge' ),
            'default'  => '#121212',
        ), 
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Title Text Color', 'gymedge' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Footer Body Text Color', 'gymedge' ),
            'default'  => '#b3b3b3',
        ), 
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Background Color', 'gymedge' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Text Color', 'gymedge' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => __( 'Copyright Text', 'gymedge' ),
            'default'  => '&copy; Copyright GymEdge 2017. All Right Reserved. Designed and Developed by <a target="_blank" href="' . GYMEDGE_THEME_AUTHOR_URI . '">RadiusTheme</a>',
        ),  
    )            
    ) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Typography', 'gymedge' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => __( 'Body', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Open Sans',
                'google'      => true,
                'font-size'   => '15px',
                'line-height'   => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => __( 'Header h1', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '40px',
                'line-height'   => '44px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => __( 'Header h2', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '28px',
                'line-height' => '31px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => __( 'Header h3', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '20px',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => __( 'Header h4', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '18px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => __( 'Header h5', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '14px',
                'line-height' => '16px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => __( 'Header h6', 'gymedge' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Helvetica',
                'google'      => true,
                'font-size'   => '12px',
                'line-height' => '14px',
            ),
        ),
    )            
) );

// Generate Common post type fields
function gym_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => __( 'Layout', 'gymedge' ),
            'options'  => array(
                'left-sidebar'  => __( 'Left Sidebar', 'gymedge' ),
                'full-width'    => __( 'Full Width', 'gymedge' ),
                'right-sidebar' => __( 'Right Sidebar', 'gymedge' ),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => $prefix. '_header',
            'type'     => 'image_select',
            'title'    => __( 'Header Style', 'gymedge' ),
            'default'  => 'st1',
            'options' => array(
                'st1' => array(
                    'title' => '<b>'. __( 'Style 1', 'gymedge' ) . '</b>',
                    'img' => GYMEDGE_IMG_URL . 'header1.jpg',
                ),
                'st2' => array(
                    'title' => '<b>'. __( 'Style 2', 'gymedge' ) . '</b>',
                    'img' => GYMEDGE_IMG_URL . 'header2.jpg',
                ),
            ),
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => __( 'Content Padding Top', 'gymedge' ),
            'validate'  => 'numeric',
            'default' => '80',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => __( 'Content Padding Bottom', 'gymedge' ),
            'validate'  => 'numeric',
            'default' => '80'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => __( 'Banner', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => __( 'Breadcrumb', 'gymedge' ),
            'on'       => __( 'Enabled', 'gymedge' ),
            'off'      => __( 'Disabled', 'gymedge' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => __( 'Banner Background Type', 'gymedge' ),
            'options'  => array(
                'bgimg'    => __( 'Background Image', 'gymedge' ),
                'bgcolor'  => __( 'Background Color', 'gymedge' ),
            ),
            'default' => 'bgimg',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => __( 'Banner Background Image', 'gymedge' ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ), 
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => __('Banner Background Color', 'gymedge'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => __( 'Layout Defaults', 'gymedge' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$gym_page_fields = gym_redux_post_type_fields( 'page' );
$gym_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'            => __( 'Page', 'gymedge' ),
    'id'               => 'pages_section',
    'subsection' => true,
    'fields' => $gym_page_fields     
    ) );


//Post Archive
$gym_post_archive_fields = gym_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog / Archive', 'gymedge' ),
    'id'               => 'blog_section',
    'subsection' => true,
    'fields' => $gym_post_archive_fields
    ) );


// Single Post
$gym_single_post_fields = gym_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Post Single', 'gymedge' ),
    'id'               => 'single_post_section',
    'subsection' => true,
    'fields' => $gym_single_post_fields           
    ) );


// Trainer Single
$gym_fields1 = array(
    array(
        'id'       => 'trainer_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'gymedge' ),
        'default'  => 'trainer',
    )
);
$gym_fields2 = gym_redux_post_type_fields( 'trainer' );
$gym_fields2[0]['default'] = 'full-width';
$gym_trainer_fields = array_merge( $gym_fields1, $gym_fields2 );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Trainer Single', 'gymedge' ),
    'id'               => 'trainer_section',
    'subsection' => true,
    'fields' => $gym_trainer_fields            
    ) );


// Class Single
$gym_fields1 = array(
    array(
        'id'       => 'class_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'gymedge' ),
        'default'  => 'class',
    ),
    array(
        'id'       => 'class_time_format',
        'type'     => 'radio',
        'title'    => __( 'Schedule Time Format', 'gymedge'), 
        'options'  => array(
            '12' => __( '12-hour', 'gymedge' ),
            '24' => __( '24-hour', 'gymedge' ),
        ),
        'default'  => '12',
    )
);
$gym_fields2 = gym_redux_post_type_fields( 'class' );
$gym_service_fields = array_merge( $gym_fields1, $gym_fields2 );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Class Single', 'gymedge' ),
    'id'               => 'class_section',
    'subsection' => true,
    'fields' => $gym_service_fields            
    ) );

// Search
$gym_search_fields = gym_redux_post_type_fields( 'search' );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Search Layout', 'gymedge' ),
    'id'               => 'search_section',
    'heading'          => '',
    'subsection' => true,
    'fields' => $gym_search_fields            
) 
);

// Error 404 Layout
$gym_search_fields = gym_redux_post_type_fields( 'error' );
$gym_search_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error 404 Layout', 'gymedge' ),
    'id'      => 'error_section',
    'heading' => '',
    'subsection' => true,
    'fields'  => $gym_search_fields           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $gym_shop_archive_fields = gym_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Shop Archive', 'gymedge' ),
        'id'               => 'shop_section',
        'subsection' => true,
        'fields' => $gym_shop_archive_fields
        ) );

    // Woocommerce Product
    $gym_product_fields = gym_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Product Single', 'gymedge' ),
        'id'               => 'product_section',
        'subsection' => true,
        'fields' => $gym_product_fields
        ) );
}

// Error
$gym_fields2 = array( 
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => __( 'Page Title', 'gymedge' ),
        'default'  => __( 'Error 404', 'gymedge' ),
    ), 
    array(
        'id'       => 'error_bodybg',
        'type'     => 'media',
        'title'    => __( 'Body Background Image', 'gymedge' ),
        'default'  => array(
            'url'=> GYMEDGE_IMG_URL . 'error.jpg'
        ),
    ), 
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => __( 'Body Text 1', 'gymedge' ),
        'default'  => __( '404', 'gymedge' ),
    ),    
    array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => __( 'Body Text 2', 'gymedge' ),
        'default'  => __( 'Page not Found', 'gymedge' ),
    ),
    array(
        'id'       => 'error_text3',
        'type'     => 'text',
        'title'    => __( 'Body Text 3', 'gymedge' ),
        'default'  => __( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'gymedge' ),
    ),
    array(
        'id'       => 'error_text12_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => __( 'Body Text 1,2 Color', 'gymedge' ),
        'default'  => '#ffffff',
    ),    
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => __( 'Button Text', 'gymedge' ),
        'default'  => __( 'Go to Home Page', 'gymedge' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error Page Settings', 'gymedge' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $gym_fields2           
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => __( 'Post Settings', 'gymedge' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => __( 'Show Post Date', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => __( 'Show Author Name', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => __( 'Show Categories', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => __( 'Show Comment Number', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => __( 'Show Tags', 'gymedge' ),
            'on'       => __( 'On', 'gymedge' ),
            'off'      => __( 'Off', 'gymedge' ),
            'default'  => true,
        ),
    )            
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => __( 'WooCommerce', 'gymedge' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => __( 'General', 'gymedge' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => __( 'Number of Products Per Page', 'gymedge' ),
                'default'  => '9',
            ),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => __( 'Product Hover Effect', 'gymedge' ),
                'on'       => __( 'Enabled', 'gymedge' ),
                'off'      => __( 'Disabled', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => __( 'Product Add to Wishlist Icon', 'gymedge' ),
                'on'       => __( 'Enabled', 'gymedge' ),
                'off'      => __( 'Disabled', 'gymedge' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => __( 'Product Quickview Icon', 'gymedge' ),
                'on'       => __( 'Enabled', 'gymedge' ),
                'off'      => __( 'Disabled', 'gymedge' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => __( 'Product Single Page', 'gymedge' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => __( "Show excerpt when short description doesn't exist", 'gymedge' ),
                'on'       => __( 'Enabled', 'gymedge' ),
                'off'      => __( 'Disabled', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => __( 'Related Products', 'gymedge' ),
                'on'       => __( 'Show', 'gymedge' ),
                'off'      => __( 'Hide', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => __( 'Description Tab', 'gymedge' ),
                'on'       => __( 'Show', 'gymedge' ),
                'off'      => __( 'Hide', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => __( 'Reviews Tab', 'gymedge' ),
                'on'       => __( 'Show', 'gymedge' ),
                'off'      => __( 'Hide', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => __( 'Additional Information Tab', 'gymedge' ),
                'on'       => __( 'Show', 'gymedge' ),
                'off'      => __( 'Hide', 'gymedge' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => __( 'Cart Page', 'gymedge' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => __( 'Cross Sell Products', 'gymedge' ),
                'on'       => __( 'Show', 'gymedge' ),
                'off'      => __( 'Hide', 'gymedge' ),
                'default'  => true,
            ),
        )
    ) 
);
}

Redux::setSection( $opt_name, array(
    'title'   => __( 'Advanced', 'gymedge' ),
    'id'      => 'advanced_section',
    'heading' => '',
    'icon'    => 'el el-css',
    'fields'  => array(
        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom CSS', 'gymedge' ),
            'subtitle' => __( 'Paste your CSS code here.', 'gymedge' ),
            'mode'     => 'css',
            'theme'    => 'chrome',
            'default'  => "body{\n   margin: 0 auto;\n}",
            'options'    => array('minLines' => 30)
        ),
    )
) 
);

// -> END Fields


// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'gymedge_remove_demo' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'gymedge_remove_demo' ) ) {
    function gymedge_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
                ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}