<?php

class steps extends CI_Controller {
    public function manage() {
        $this->load->view("steps_manage");
    }

    public function test() {
        $this->load->view("steps_test");
    }

    public function suggestion() {
        require_once(__DIR__ . "/../../steps_lib/steps_def.php");

        for($i=0; $i<count($steps);$i++) {
            $v = $steps[$i];
            if(!(stripos($v[0], $_REQUEST['chars']) === false)) {
                $data[] = array("id"=>$i, "data"=>$v[0], "description" => $v[1]);
            }
        }

        echo json_encode($data);
    }
} 