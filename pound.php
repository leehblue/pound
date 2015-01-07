<?php
/*
Plugin Name: Pound Unit Tests
Plugin URI: http://leehblue.com
Description: Easily run unit tests for plugins
Version: 1.0
Author: Lee Blue
Author URI: http://leehblue.com

-------------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists('LB_Unit_Tests') ) {

    $plugin_file = __FILE__;
    if(isset($plugin)) { $plugin_file = $plugin; }
    elseif (isset($mu_plugin)) { $plugin_file = $mu_plugin; }
    elseif (isset($network_plugin)) { $plugin_file = $network_plugin; }

    define( 'LB_PLUGIN_FILE', $plugin_file );
    define( 'LB_PATH', WP_PLUGIN_DIR . '/' . basename(dirname($plugin_file)) . '/' );
    define( 'LB_URL',  WP_PLUGIN_URL . '/' . basename(dirname($plugin_file)) . '/' );
    define( 'LB_DEBUG', true );

    /**
     * Unit Tests main class
     *
     * The main Unit Tests class should not be extended
     */
    final class LB_Unit_Tests {

        protected static $instance;

        /**
         * LB_Unit_Tests should only be loaded one time
         *
         * @since 1.0
         * @static
         * @return Cart66 instance
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            // Define constants
            define( 'LB_VERSION_NUMBER', $this->version_number() );

            // Register autoloader
            spl_autoload_register( array( $this, 'class_loader' ) );

            // Register hooks
            add_action( 'init', array( $this, 'init' ), 0 );
        }

        public function init() {
            LB_Shortcodes::init();

            if ( !is_admin() ) {
                wp_enqueue_style( 'lb-unit-test-styles', LB_URL . 'assets/styles.css' );
            }
        }

        public static function class_loader($class) {
            if(self::starts_with($class, 'LB_')) {
                $class = strtolower($class);
                $file = 'class-' . str_replace( '_', '-', $class ) . '.php';
                $root = LB_PATH;
                include_once $root . 'includes/' . $file;
            }
        }

        /********************************************************
         * Helper functions
         ********************************************************/

        /**
         * Check to see if the given haystack starts with the needle.
         *
         * @param string $haystack
         * @param string $needle
         * @return boolean True if $haystack starts with $needle
         */
        public static function starts_with( $haystack, $needle ) {
            $length = strlen($needle);
            return (substr($haystack, 0, $length) === $needle);
        }

        /**
         * Get the plugin url
         *
         * @return string
         */
        public function plugin_url() {
            return LB_URL;
        }

        /**
         * Get the plugin path
         *
         * @return string
         */
        public function plugin_path() {
            return LB_PATH;
        }

        /**
         * Get the plugin version number from the header comments
         *
         * @return string
         */
        public function version_number() {
            if(!function_exists('get_plugin_data')) {
              require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }

            $plugin_data = get_plugin_data(LB_PLUGIN_FILE);
            return $plugin_data['Version'];
        }

    }

}

LB_Unit_Tests::instance();
