<?php
class DbObjectModel
{
    protected $vars;

    protected $is_active = FALSE;

    protected $table;

    protected $keyname;
    
    private $db;

    function __construct($db, $table, $keyname, $id = "") {
        $this->db = $db;
        $this->table = $table;
        $this->keyname = $keyname;
        $this->loadDBObj($this->table, $this->keyname);
        if($id) {
            $this->resetById($id);
        }
    }

    protected function loadDBObj($table_name, $keyname) {
        $this->table = $table_name;
        $this->keyname = $keyname;

        $sql = 'SHOW COLUMNS FROM ' . $this->table;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $this->vars[$row->Field]['type'] = $row->Type;
                $this->vars[$row->Field]['null'] = $row->Null;
                $this->vars[$row->Field]['value'] = '::skip::';
            }
        }
    }

    /**
     * @param    int $id
     * @return   boolean
     */
    public function resetById($id) {
        if (!$this->table || !$this->keyname)
            return FALSE;

        $this->is_active = FALSE;

        $id = ceil($id);

        if ($id > 0) {
            $sql = "select * from " . $this->table . " where `" . $this->keyname . "`='" . addslashes($id) . "'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $vars = $query->row_array();
                foreach($this->vars as $k => $v)
                    $this->vars[$k]['value'] = $vars[$k];
                $this->is_active = true;
                return true;
            }
        }

        return false;
    }
    public function insert() {            
        $data = array();
        foreach($this->vars as $k => $v) {
            if($k == $this->keyname && $v['value'] === "::skip::")
                continue;
            
            if($this->isInt($v['type'])) {
                if($v['value'] === "::skip::" && $v['null'] == "YES") {
                    continue;
                }

                if($v['value'] == "::skip::") {
                    $v['value'] = 0;
                }
            }

            if($v['value'] === "::skip::") {
                continue;
            }

            $data[$k] = $v['value'];
        }

        if($this->db->insert($this->table, $data)) {
            $this->vars[$this->keyname]['value'] = $this->db->insert_id();
            $this->is_active = TRUE;
        }        
    }
    
    public function update () {
        if(!$this->is_active)
            return;
            
        foreach($this->vars as $k => $v) {
             if($k == $this->keyname || $v['value'] == "::skip::")
                 continue;
                 
             $data[$k] = $v['value'];
        }
        
        $this->db->where($this->keyname, $this->getKeyId());
        return $this->db->update($this->table, $data);
    }

    public function delete() {
        if($this->is_active) {
            $this->db->where($this->keyname, $this->getKeyId());
            $this->db->delete($this->table);
            $this->is_active = FALSE;
            return TRUE;
        }
        return FALSE;
    }
    
    public function is_actived () {
        return $this->is_active;
    }
    
    public function getObjInfo () {
        if(count($this->vars) > 0) {
            foreach($this->vars as $k => $v) {
                if($v['value'] == "::skip::")
                    continue;
                $vars[$k] = $v['value'];
            }
            return $vars;
        }
    }
    
    public function setVars($arr) {
        if(is_array($arr) && count($arr) > 0) {
            if(count($this->vars) > 0) {
                foreach($this->vars as $k => $v) {
                    foreach($arr as $kk => $vv) {
                        if($k == $kk) {
                            $this->vars[$k]['value'] = $vv;
                            break;
                        }
                    }
                }
            }
        }
    }

    public function setVar($key, $value) {
        foreach($this->vars as $k => $v) {
            if($k == $key) {
                $this->vars[$k]['value'] = $value;
                break;
            }
        }
    }
    
    private function isInt($str) {
        if($str) {
            if(!(stripos($str, "int") === FALSE))
                return TRUE;
        }
        
        return FALSE;
    }
    
    public function getKeyId() {
        if($this->is_active)
            return $this->vars[$this->keyname]['value'];
    }
}
