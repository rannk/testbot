<?php
class Unit_test {
    protected  $unit;
    protected  $CI;

    public function __construct($unit) {
        $this->CI =& get_instance();
        $this->unit = $unit;
    }

    public function report() {
        echo $this->unit->report();
    }

}