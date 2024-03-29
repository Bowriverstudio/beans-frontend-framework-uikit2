<?php
/**
 * Beans Frontend Framework, using UiKit2.
 *
 * https://getuikit.com/v2/
 *
 * @package    Beans_Frontend_Framework_UiKit2
 * @since      1.0.0
 * @author     Maurice Tadros, Yaidel Ferralize
 * @link       https://bowriverstudio.com
 * @license    GNU-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:     Beans Frontend Framework UiKit2
 * Description:      Use uikit 2 as the frontend framework.
 * Version:         0.9
 * Requires PHP:    7.0.x
 *
 * In-progress:
 *  - Add support for plugin to be activated deactivated.
 *  - Add Unit Tests
 *  - Clean up TODOs
 *  - Test on a few different sites.
 *  - Add Breakpoint to Admin Menu.
 *  - Create a Page in Admin system with some uikit documentation.
 */
namespace Beans_Frontend_Framework_UiKit2;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Hello, Hello, Hello, what\'s going on here then?' );
}

add_action( 'beans_init', __NAMESPACE__.'\beans_includes_assets' );
/**
 * Include framework files.
 *
 * @since 1.0.0
 * @ignore
 *
 * @return void
 */
function beans_includes_assets() {
    $uikit_api_path = ABSPATH . 'wp-content/plugins/beans-uikit2/assets/';
    require_once plugin_dir_path(__FILE__) . 'assets/assets.php';
}

add_action( 'plugin_loaded', __NAMESPACE__.'\define_constants');
/**
 * Define constants, used in this plugin and Bean's Framework.
 *
 * @since 1.0.0
 *
 * @return null
 */
function define_constants() {

    if (!defined('BEANS_FRONTEND_FRAMEWORK')) {
        // Required to ensure a frontend framework is loaded.
        define( 'BEANS_FRONTEND_FRAMEWORK', 'uikit2' );
        define( 'BEANS_FRONTEND_FRAMEWORK_BASE_URL', plugin_dir_url(__FILE__) );

        // Used by the Beans Framework.
        define( 'BEANS_RENDER_PATH', plugin_dir_path(__FILE__) . 'lib/render/' );
        define( 'BEANS_TEMPLATES_PATH', plugin_dir_path(__FILE__) . 'lib/templates/' );

        // Used Internally within this plugin
        define( 'BEANS_CSSFRAMEWORK_PATH', plugin_dir_path(__FILE__) . 'lib/api/uikit/' );


        define( 'BEANS_ASSETS_URL', BEANS_FRONTEND_FRAMEWORK_BASE_URL . 'assets/' );
        define( 'BEANS_LESS_URL', BEANS_ASSETS_URL . 'less/' );
        define( 'BEANS_JS_URL', BEANS_ASSETS_URL . 'js/' );
        define( 'BEANS_IMAGE_URL', BEANS_ASSETS_URL . 'images/' );

    }

}


add_action( 'beans_init', __NAMESPACE__.'\beans_includes' );
/**
 * Include framework files.
 *
 * @modified 2.0.0 - removed hard dependency on uikit2
 * @since 1.0.0
 * @ignore
 *
 * @return void
 */
function beans_includes()
{
// Include renderers.
    require_once BEANS_RENDER_PATH . 'template-parts.php';
    require_once BEANS_RENDER_PATH . 'fragments.php';
    require_once BEANS_RENDER_PATH . 'widget-area.php';
    require_once BEANS_RENDER_PATH . 'walker.php';
    require_once BEANS_RENDER_PATH . 'menu.php';
}

add_action('beans_after_load_api', __NAMESPACE__.'\add_custom_css_framework');
/**
 * Load css framework dependencies.
 *
 * @since 1.0.0
 *
 * @return null
 */
function add_custom_css_framework(){
    require_once plugin_dir_path(__FILE__).'lib/api/layout/functions.php';
    require_once plugin_dir_path(__FILE__).'lib/api/uikit/class-beans-uikit.php';
    require_once plugin_dir_path(__FILE__).'lib/api/uikit/functions.php';
}