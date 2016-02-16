<?php
/**
 * Helper functions for quickly checking certain common conditions.
 *
 * All functions return a boolean value:
 *   - True if the conditions resolves as it should
 *   - False if the condition is not what is expected
 */
class LB_Should {

    /**
     * Check if the $haystack starts with the $needle
     *
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    public static function start_with( $haystack, $needle ) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * Check if the $haystack ends with the $needle
     *
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    public static function end_with( $haystack, $needle ) {
        // search forward starting from end minus needle length characters
        $offset = strlen( $haystack ) - strlen( $needle );
        return $needle === "" || strpos( $haystack, $needle, $offset ) !== FALSE;
    }


}
