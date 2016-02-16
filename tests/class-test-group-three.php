<?php

class Test_Group_Three extends LB_Test {

    public function test_age_is_greater_than_18() {
        $age = 21;
        $min_age = 18;
        $this->check($age > $min_age, "The age should be greater than $min_age but was $age");
    }

}

Test_Group_Three::run_tests();
