<?php
require_once('dbObjectModel.php');

class MY_Model extends CI_Model
{
    protected $table;

    protected $keyname;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }



    /**
     * @param    int $id
     */
    public function instanceObj($id = "") {
        if (!$this->table || !$this->keyname)
            return FALSE;

        $obj = new DbObjectModel($this->db, $this->table, $this->keyname, $id);

        return $obj;
    }
}
