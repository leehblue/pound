<?php

class Test_Group_One extends LB_Test {

    public function test_ten_should_be_greater_than_five() {
        $ten = 10;
        $five = 5;
        $this->check( $ten > $five, "$ten should be greater than $five");
    }

    public function test_five_should_be_greater_than_three() {
        $five = 5;
        $three = 3;
        $this->check( $five > $three, "$five should be greater than $three");
    }

    public function test_number_of_choices_should_be_fewer_than_three() {
        $choices = array(
            'technology',
            'marketing',
            'social media',
            'business development'
        );

        $count = count($choices);
        $this->check( $count < 3, "Number of choices was $count");
    }

    public function test_five_equals_three() {
        $this->check( 5 == 3, '5 should not equal 3');
    }

    public function _test_this_should_be_skipped() {
        $this->check(true, 'This test is skipped because the function name begins with _test');
    }

}

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

class Test_Group_Three extends LB_Test {

    public function test_age_is_greater_than_20() {
        $age = 18;
        $this->check($age > 20, "The age should be greater than 20 but was $age");
    }

}

Test_Group_One::run_tests();
Test_Group_Two::run_tests();
Test_Group_Three::run_tests();