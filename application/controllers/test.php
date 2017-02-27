<?php

class test extends CI_Controller {

    public function a1() {
        $this->load->library("AutoTestsClass");
        $steps[] = array("step_id"=>1, "step_desc" => "我能打开页面 http://www.baidu.com");
        $steps[] = array("step_id"=>2, "step_desc" => "我能看到文字 我的关注");
        $steps[] = array("step_id"=>3, "step_desc" => "我能在表单元素 #kw 中输入 百度");
        $steps[] = array("step_id"=>4, "step_desc" => "我点击 百度一下");
        //$steps[] = array("step_id"=>2, "step_desc" => "我能看到文字 我的关注");
        $steps[] = array("step_id"=>5, "step_desc" => "我要等待 1 秒");
        print_r($this->autotestsclass->runTests(time(), $steps));
    }
} 