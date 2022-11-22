<?php

/**
 * Plugin Name: Elecsen Core
 * Plugin URI: https://themeforest.net/user/loyalcoders/portfolio
 * Description: This plugin adds the core features to the Quax WordPress theme. You must have to install this plugin to get all the features included with the Quax theme.
 * Version: 1.0.0
 * Author: loyalcoders
 * Author URI: https://themeforest.net/user/loyalcoders/portfolio
 * Text domain: elecsen-core
 */

if (!defined('ABSPATH'))
	die('-1');

// Quax Core Directories
define('ELECSEN_CORE_VERSION', '1.0.0');
define('ELECSEN_CORE__FILE__', __FILE__);
define('ELECSEN_CORE_DIR_PATH', plugin_dir_path(QUAX_CORE__FILE__));
define('ELECSEN_CORE_IMAGES', plugins_url('assets/images/', __FILE__));
define('ELECSEN_CORE_DIR_CSS', plugins_url('assets/css/', __FILE__));
define('ELECSEN_CORE_DIR_JS', plugins_url('assets/js/', __FILE__));
define('ELECSEN_CORE_DIR_VEND', plugins_url('assets/vendors/', __FILE__));

define('ELECSEN_PLUGIN_URL', plugins_url() . '/quax-core/');
define('ELECSEN_CORE_DIR', plugin_dir_path(__FILE__));

// Make sure the same class is not loaded twice in free/premium versions.
if (!class_exists('Quax_core')) {
	/**
	 * Main Quax Core Class
	 *
	 * The main class that initiates and runs the Quax Core plugin.
	 *
	 * @since 1.7.0
	 */
	class Elecsen_core
	{
		/**
		 * Quax Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0';
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4';
		/**
		 * Plugin's directory paths
		 * @since 1.0
		 */
		const CSS = null;
		const JS = null;
		const IMG = null;
		const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Quax_Core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Quax_Core A single instance of the class.
		 */
		private static  $_instance = null;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Elecsen_Core An instance of the class.
		 */
		public static function instance()
		{
			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone()
		{
			// Cloning instances of the class is forbidden
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'elecsen-core'), '1.7.0');
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup()
		{
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'elecsen-core'), '1.7.0');
		}

		/**
		 * Constructor
		 *
		 * Initialize the Quax Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct()
		{
			$this->init_hooks();
			$this->core_includes();
			do_action('quax_core_loaded');
		}



		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @access public
		 */
		public function core_includes()
		{
			// Extra functions
			require_once __DIR__ . '/inc/extra.php';
			
			// Custom Post Type
			require_once __DIR__ . '/post-type/Team.php';

			// Custom Post Type
			require_once __DIR__ . '/post-type/Service.php';


			require_once __DIR__ . '/post-type/portfolio.php';
			

			require_once __DIR__ . '/post-type/Footer.php';

			// Demo Data Config
			require_once __DIR__ . '/inc/demo-config.php';


			/**
			 * Register widget area.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
			 */
			require_once __DIR__ . '/wp-widgets/widgets.php';

		
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @access private
		 */
		private function init_hooks()
		{
			add_action('init', [$this, 'i18n']);
			add_action('plugins_loaded', [$this, 'init']);
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @access public
		 */
		public function i18n()
		{
			load_plugin_textdomain('elecsen-core', false, plugin_basename(dirname(__FILE__)) . '/languages');
		}


		/**
		 * Init Quax Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @access public
		 */
		public function init() {

			if (!did_action('elementor/loaded')) {
				add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
				return;
			}

			// Check for required Elementor version

			if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
				return;
			}

			// Check for required PHP version

			if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
				return;
			}

			// Add new Elementor Categories
			add_action('elementor/init', [$this, 'add_elementor_category']);

			// Enqueue Widgets Script
			add_action('elementor/editor/after_enqueue_scripts', [$this, 'enqueue_elementor_scripts'], 5);
			add_action('elementor/frontend/after_enqueue_scripts', [$this, 'enqueue_elementor_scripts'], 5);

			// Register Widget Scripts
			add_action('elementor/frontend/after_register_scripts', [$this, 'register_widget_scripts']);
			add_action('elementor/editor/before_enqueue_scripts', [$this, 'register_widget_scripts']);
			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);

			// Register Widget Scripts
			add_action('elementor/editor/before_enqueue_scripts', [$this, 'enqueue_elementor_editor_styles']);
			add_action('elementor/frontend/after_enqueue_styles', [$this, 'enqueue_widget_styles']);

			// Register New Widgets
			add_action('elementor/widgets/widgets_registered', [$this, 'on_widgets_registered']);
		}


		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin()
		{
			$message = sprintf(
				/* translators: 1: Quax Core 2: Elementor */
				esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elecsen-core'),
				'<strong>' . esc_html__('Quax core', 'elecsen-core') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'elecsen-core') . '</strong>'
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version()
		{
			$message = sprintf(
				/* translators: 1: Quax Core 2: Elementor 3: Required Elementor version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elecsen-core'),
				'<strong>' . esc_html__('Quax Core', 'elecsen-core') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'elecsen-core') . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version()
		{
			$message = sprintf(
				/* translators: 1: Quax Core 2: PHP 3: Required PHP version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elecsen-core'),
				'<strong>' . esc_html__('Quax Core', 'elecsen-core') . '</strong>',
				'<strong>' . esc_html__('PHP', 'elecsen-core') . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Quax Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category()
		{
			\Elementor\Plugin::instance()->elements_manager->add_category('quax-elements', [
				'title' => __('Quax Elements', 'elecsen-core'),
			], 1);
		}

		/**
		 * Enqueue and dequeue scripts and styles
		 */
		public function enqueue_elementor_scripts()
		{
			wp_enqueue_script( 'quax-elementor', QUAX_CORE_DIR_JS . 'quax-elementor.js', ['jquery', 'elementor-frontend'], QUAX_CORE_VERSION, true);
		}

		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Quax Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts()
		{

			wp_register_script('magnific-popup', plugins_url('assets/vendors/magnific-popup/jquery.magnific-popup.min.js', __FILE__), array('jquery'), '1.1.0', true);

			wp_register_script('slick', plugins_url('assets/vendors/slick/slick.min.js', __FILE__), array('jquery'), '1.8.1', true);

			wp_register_script( 'ajax-chimp', plugins_url( 'assets/js/ajax-chimp.js', __FILE__ ), array('jquery'), '1.0', true );

			wp_register_script( 'quax-custom', plugins_url( 'assets/js/quax-custom.js', __FILE__ ), array('jquery'), '1.0', true );
			
		}

		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Quax Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */

		public function enqueue_widget_styles()
		{
			wp_register_style( 'magnific-popup', plugins_url( 'assets/vendors/magnific-popup/magnific-popup.css', __FILE__) );
			wp_register_style('slick', plugins_url('assets/vendors/slick/slick.css', __FILE__));

		}

		public function enqueue_elementor_editor_styles()
		{
			// wp_enqueue_style('themfiy-icons', plugins_url('assets/vendors/themfiy/themify-icons.css', __FILE__));
			// wp_enqueue_style('quax-elementor-editor', plugins_url('assets/css/quax-elementor-editor.css', __FILE__));
		}

		public function enqueue_scripts() {
			
			
		}




		/*public function register_admin_styles() {
            wp_enqueue_style( 'quax_core_admin', plugins_url( 'assets/css/quax-core-admin.css', __FILE__ ) );
        }*/

		/**
		 * Register New Widgets
		 *
		 * Include Quax Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered()
		{
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Quax Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets()
		{
			require_once __DIR__ . '/widgets/Quax_heading.php';
			require_once __DIR__ . '/widgets/Quax_hero.php';
			require_once __DIR__ . '/widgets/Quax_image.php';
			require_once __DIR__ . '/widgets/Quax_video.php';
			require_once __DIR__ . '/widgets/Quax_testimonials.php';
			require_once __DIR__ . '/widgets/Quax_blog.php';
			require_once __DIR__ . '/widgets/Quax_tabs.php';
			require_once __DIR__ . '/widgets/Quax_team.php';
			require_once __DIR__ . '/widgets/Quax_subscribe_form.php';
			require_once __DIR__ . '/widgets/Quax_services.php';
			require_once __DIR__ . '/widgets/Quax_portfolio.php';
			require_once __DIR__ . '/widgets/Quax_icon_box.php';
			require_once __DIR__ . '/widgets/Quax_price_list.php';

		
		}

		/**
		 * Register Widgets
		 *
		 * Register Quax Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets()
		{
			// Site Elements
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_Heading() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_hero() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_image() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_video() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_testimonials() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_blog() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_tabs() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_team() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_subscribe_form() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_services() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_portfolio() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_icon_box() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \QuaxCore\Widgets\Quax_price_list() );

			
		}
	}
}
// Make sure the same function is not loaded twice in free/premium versions.

if (!function_exists('quax_core_load')) {
	/**
	 * Load Quax Core
	 *
	 * Main instance of Quax_Core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function quax_core_load()
	{
		return Quax_core::instance();
	}

	// Run Quax Core
	quax_core_load();
}
