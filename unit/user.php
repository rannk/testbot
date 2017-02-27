<?php
require_once"unit_test.php";

class User extends Unit_test{
    public function run() {
        $this->CI->load->library("UserClass");
        $this->CI->load->model("Activities_data");
        $this->CI->load->model("users_data");

        $obj = $this->CI->Activities_data->instanceObj(20);
        $uObj= $this->CI->users_data->instanceObj(13);

        $this->unit->run($this->CI->userclass->userActivitiesOpAuth($uObj, $obj), true, "check user activities op auth is true");

        $obj = $this->CI->Activities_data->instanceObj(7);
        $this->unit->run($this->CI->userclass->userActivitiesOpAuth($uObj, $obj), false, "check user activities op auth is false");
        echo $this->unit->report();

    }
} 