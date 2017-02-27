<?php

class case_data extends MY_Model{
    function __construct()
    {
        parent::__construct();
        $this->table = "test_case";
        $this->keyname = "case_id";
    }
} 