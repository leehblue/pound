<?php
class LB_Test {

    private $test_group = '';
    private $test_results = array();
    private $skipped = array();

    public static function run_tests() {
        $class_name = get_called_class();
        $test = new $class_name;
        echo $test->run();
    }

    public function check($condition, $error_message=null) {
        $trace = debug_backtrace();
        $func = $trace[1]['function'];
        $line = $trace[0]['line'];
        $file = $trace[0]['file'];

        $spec = str_replace('test_', '', $func);
        $message = ucfirst(str_replace('_', ' ', $spec));
        if(!$condition && isset($error_message) && !empty($error_message)) $message .= ' :: ' . $error_message;
        $message = $condition ? 'Passed: ' . $message : 'Failed: ' . $message . "\n$file :: line #$line";

        $result = new stdClass();
        $result->passed = $condition;
        $result->message = $message;
        $this->test_results[] = $result;
    }

    public function run() {
        $title = str_replace('_', ' ', get_class($this));

        // Look for setup hook to run before tests
        if(method_exists($this, 'before_tests')) {
          $this->before_tests();
        }

        $methods = get_class_methods($this);
        foreach($methods as $name) {
            $prefix = 'test';
            $length = strlen($prefix);
            if(substr($name, 0, $length) == $prefix) {

                if( method_exists( $this, 'before_each_test' ) ) {
                    $this->before_each_test();
                }

                $this->$name();

                if( method_exists( $this, 'after_each_test' ) ) {
                    $this->after_each_test();
                }

            }
            else {
                $prefix = '_test';
                $length = strlen($prefix);
                if(substr($name, 0, $length) == $prefix) {
                    $name = str_replace('_test_', '', $name);
                    $this->skipped[] = 'Skipped: ' . ucfirst(str_replace('_', ' ', ltrim($name, '_')));
                }
            }
        }

        // Look for clean up hook to run after tests
        if(method_exists($this, 'after_tests')) {
            $this->after_tests();
        }

        return $this->html_results( $title );
    }

    public function html_results( $title ) {
        $results = $this->results();
        return LB_View::get( LB_PATH . 'views/html-test-results.php', array( 'title' => $title, 'results' => $results ) );
    }

    public function results() {
        $results                   = new stdClass();
        $results->passed           = 0;
        $results->failed           = 0;
        $results->passed_messages  = array();
        $results->failed_messages  = array();
        $results->skipped_messages = array();
        $results->summary          = array();

        foreach($this->test_results as $result) {
            if($result->passed) {
                $results->passed++;
                $results->passed_messages[] = $result->message;
            }
            else {
                $results->failed++;
                $results->failed_messages[] = $result->message;
            }
        }

        if($results->passed > 0) {
            $results->summary[] = "Passed: $results->passed";
        }

        if($results->failed > 0) {
            $results->summary[] = "Failed: $results->failed";
        }

        if(count($this->skipped)) {
            $results->summary[] = 'Skipped: ' . count($this->skipped);
            $results->skipped_messages = $this->skipped;
        }

        return $results;
    }


}
