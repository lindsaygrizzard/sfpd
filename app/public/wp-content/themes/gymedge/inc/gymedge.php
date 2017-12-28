<?php
if ( ! class_exists( 'GymEdge' ) ){
	class GymEdge {

		protected static $instance = null;
		public $slug = 'gymedge';
		public $prefix = 'gymedge_';

		// Sitewide static variables
		public static $options = null;
		public static $trainer_social_fields = null;

		// Template specific variables
		public static $layout = null;
		public static $top_bar = null;
		public static $header_style = null;
		public static $padding_top = null;
		public static $padding_bottom = null;
		public static $has_banner = null;
		public static $has_breadcrumb = null;
		public static $bgtype = null;
		public static $bgimg = null;
		public static $bgcolor = null;

		private function __construct() {
			$this->redux_init();
			$this->layerslider_init();
			add_action( 'layerslider_ready', array( $this, 'disable_layerslider_autoupdate' ) );
			add_action( 'after_setup_theme', array( $this, 'set_redux_option' ) );
			add_action( 'after_setup_theme', array( $this, 'set_redux_compability' ) );
			add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		}

		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function redux_init() {
			add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 );
			add_filter( 'redux/gymedge/aURL_filter', '__return_empty_string' ); // Remove Redux Ads
			add_action( 'redux/options/gymedge/saved', array( $this, 'flush_redux_saved' ), 10, 2 );
			add_action( 'redux/options/gymedge/section/reset', array( $this, 'flush_redux_reset' ));
			add_action( 'redux/options/gymedge/reset', array( $this, 'flush_redux_reset' ) );
		}

		public function layerslider_init() {
			if ( !is_admin() || !apply_filters( 'gymedge_disable_layerslider_autoupdate', true ) || get_option( 'layerslider-authorized-site' ) ) return;

			// Remove LayerSlider purchase notice from plugins page
			if ( defined( 'LS_PLUGIN_BASE' ) ) {
				remove_action('after_plugin_row_'.LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice', 10, 3 );
			}

			// Fix issue of Layerslider update via TGM. Side effect: autoupdate disabled permanently
			global $LS_AutoUpdate;
			if ( isset( $LS_AutoUpdate ) && defined( 'LS_ROOT_FILE' ) ) {
				remove_filter( 'pre_set_site_transient_update_plugins', array( $LS_AutoUpdate, 'set_update_transient' ) );
				remove_filter( 'plugins_api', array( $LS_AutoUpdate, 'set_updates_api_results'), 10, 3 );
				remove_filter( 'upgrader_pre_download', array( $LS_AutoUpdate, 'pre_download_filter' ), 10, 4 );
				remove_filter( 'in_plugin_update_message-'.plugin_basename( LS_ROOT_FILE ), array( $LS_AutoUpdate, 'update_message' ) );
				remove_filter( 'wp_ajax_layerslider_authorize_site', array( $LS_AutoUpdate, 'handleActivation' ) );
				remove_filter( 'wp_ajax_layerslider_deauthorize_site', array( $LS_AutoUpdate, 'handleDeactivation' ) );
			}
		}

		public function disable_layerslider_autoupdate() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		public function set_redux_option(){
			if ( ! class_exists( 'Redux' ) ) {
				include GYMEDGE_INC_DIR . 'redux-data.php';
				self::$options = json_decode( $gym_redux_data, true );
				return;
			}		
			global $gymedge;
			self::$options = $gymedge;

			// Prevent Redux first activation error on admin
			if ( is_admin() && count( self::$options ) < 3 ) {
				include GYMEDGE_INC_DIR . 'redux-data.php';
				self::$options = json_decode( $gym_redux_data, true );
			}
		}

		// Backward compability for newly added options
		public function set_redux_compability(){
			$new_options = array(
				'logo_width'        => 2,
				'class_time_format' => 12,
				'top_bar_bgcolor'   => '#222222',
				'top_bar_color'     => '#ffffff',
				'logo_fixed_height' => true,
				'logo_fixed_height_sticky' => true,
				'post_date' => true,
				'post_author_name' => true,
				'post_cats' => true,
				'post_comment_num' => true,
				'post_tags' => true,
			);
			foreach ( $new_options as $key => $value ) {
				if ( !isset( self::$options[$key] ) ) {
					self::$options[$key] = $value;
				}	    	
			}
		}

		public function remove_redux_menu() {
			remove_submenu_page('tools.php','redux-about');
		}

		// Flush rewrites
		public function flush_redux_saved( $saved_options, $changed_options ){
			if ( empty( $changed_options ) ) {
				return;
			}
			$flush = false;
			$slugs = array( 'trainer_slug', 'class_slug' );
			foreach ( $slugs as $slug ) {
				if ( array_key_exists( $slug, $changed_options ) ) {
					$flush = true;
				}
			}

			if ( $flush ) {
				update_option( 'gymedge_rewrite_flash', true );
			}
		}

		public function flush_redux_reset(){
			update_option( 'gymedge_rewrite_flash', true );
		}

		public function rewrite_flush_check() {
			if ( get_option('gymedge_rewrite_flash') == true ) {
				flush_rewrite_rules();
				update_option( 'gymedge_rewrite_flash', false );
			}
		}
	}
}

GymEdge::instance();

// Remove Redux NewsFlash
if ( ! class_exists( 'reduxNewsflash' ) ){
	class reduxNewsflash {
		public function __construct( $parent, $params ) {}
	}
}