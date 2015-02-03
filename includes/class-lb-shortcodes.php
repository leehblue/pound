<?php
class LB_Shortcodes {

    public static function init() {
        add_shortcode('pound', array( 'LB_Shortcodes', 'run_unit_tests' ) );
    }

    /**
     * Run the tests located in the test directory that start with "test_"
     *
     * The $args array may contain the following keys:
     *
     * plugin: (Required) The name of the plugin to test. This is the directory name where the plugin is installed.
     * dir:    (Optional) The relative path to the tests directory from the plugin root
     * file:   (Optional) The file name containing the tests
     *
     * Default values for the $args array
     *
     * array(
     *     'plugin' => null
     *     'dir'    => 'tests'
     *     'file'   => 'test-all.php';
     * )
     *
     * @param array $args
     */
    public static function run_unit_tests( $args ) {

        // $args['plugin'] is required
        if ( !isset($args['plugin'] ) ) {
            return;
        }

        $test_dir = isset( $args['dir'] ) ? $args['dir'] : 'tests';
        $test_file = isset( $args['file'] ) ? $args['file'] : 'test-all.php';
        $base = dirname( LB_PATH );
        $path = $base . '/' . $args['plugin'] . '/' . $test_dir . '/' . $test_file;
        //LB_Log::write( "Running file: $path" );

        include $path;

    }
}
