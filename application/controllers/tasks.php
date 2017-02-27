<?php

class tasks extends CI_Controller {
    public function index() {
        $this->load->view("tasks");
    }

    public function detail() {
        $data = $_REQUEST;
        if($_REQUEST['user'] == "auto" && $_REQUEST['status'] == "start") {
            $site_root_dir = __DIR__ . "/../../";
            exec("nohup php {$site_root_dir}index.php test/a1 > /dev/null 2>&1 &");
        }
        $this->load->view("task_detail", $data);
    }

    public function report() {
        $this->load->view("task_report");
    }
} 