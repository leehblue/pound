<?php

class Test_Group_Two extends LB_Test {

    public function test_ten_should_be_greater_than_five() {
        $ten = 10;
        $five = 5;
        $this->check( $ten > $five, "$ten should be greater than $five");
    }

    public function test_true_is_not_false() {
        $this->check( false !== false, 'True should not equal false');
    }

    public function _test_this_should_be_skipped() {
        $this->check(true, 'This test is skipped because the function name begins with _test');
    }
}

Test_Group_Two::run_tests();