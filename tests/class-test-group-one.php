<?php

class Test_Group_One extends LB_Test {

    public function test_sentence_should_start_with_Pound() {
        $haystack = 'Pound helps me write tests for my plugin';
        $result = LB_Should::start_with($haystack, 'Pound');
        $this->check( $result );
    }

    public function test_sentence_should_end_with_plugin() {
        $haystack = 'Pound helps me write tests for my plugin';
        $result = LB_Should::end_with($haystack, 'plugin');
        $this->check( $result );
    }

}

Test_Group_One::run_tests();
