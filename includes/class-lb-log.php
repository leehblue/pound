<?php

class LB_Log {

    public static function write($data) {
        $backtrace = debug_backtrace();
        $file = $backtrace[0]['file'];
        $line = $backtrace[0]['line'];
        $date = current_time('m/d/Y g:i:s A') . ' ' . get_option('timezone_string');
        $out = "========== $date ==========\nFile: $file" . ' :: Line: ' . $line . "\n$data";

        if(is_writable( LB_PATH )) {
            $filename = LB_PATH . 'log.txt';
            file_put_contents($filename, $out . "\n\n", FILE_APPEND);
        }
    }

}
