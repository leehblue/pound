<?php

class Test_Should extends LB_Test {

    public function test_should_start_with_Pound() {
        $haystack = 'Pound helps me write tests for my plugin';
        $result = LB_Should::start_with($haystack, 'Pound');
        $this->check( $result );
    }

    public function test_should_end_with_plugin() {
        $haystack = 'Pound helps me write tests for my plugin';
        $result = LB_Should::end_with($haystack, 'plugin');
        $this->check( $result );
    }

}

Test_Should::run_tests();