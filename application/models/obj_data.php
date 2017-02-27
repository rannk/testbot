<?php
class obj_data extends MY_Model{
    function __construct() {
        parent::__construct();
    }

    function instanceDbObj($table, $key, $id = "") {
        $this->table = $table;
        $this->keyname = $key;
        return $this->instanceObj($id);
    }
} 