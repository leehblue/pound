<?php

class Test_Group_Three extends LB_Test {

    public function test_age_is_greater_than_20() {
        $age = 18;
        $this->check($age > 20, "The age should be greater than 20 but was $age");
    }

}

Test_Group_Three::run_tests();