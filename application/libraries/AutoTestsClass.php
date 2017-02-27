<?php

class AutoTestsClass {
    var $steps_def = array();
    var $CI;
    var $codecept_dir;
    public function __construct() {
        $this->CI = & get_instance();
        require_once(__DIR__ . "/../../steps_lib/steps_def.php");
        $this->steps_def = $steps;
        $this->codecept_dir  = __DIR__ . "/../../";
    }
    /**
     * 分析给定文字，转换成相应步骤
     */
    public function convertStep($string) {
        $steps = $this->steps_def;

        foreach($steps as $v) {
            preg_match($v[2], $string, $matches);
            if(count($matches) > 0) {
                for($i=1;$i<count($matches);$i++) {
                    $v[3] = str_replace("%s".$i, $matches[$i], $v[3]);
                }
                return $v[3];
                break;
            }
        }
    }

    public function runTests($unique_id, $realSteps) {
        if(!is_array($realSteps) || count($realSteps) == 0)
            return;

        foreach($realSteps as $v) {
            $step_id = $v['step_id'];
            $step_string = $v['step_desc'];

            $c_step = $this->convertStep($step_string);
            if($c_step) {
                $st[] = '$I->expect("step id is '.$step_id.'")';
                $st[] = $c_step;
            }
        }

        $codecept_dir = $this->codecept_dir;
        $fp = fopen($codecept_dir . "codeception/tests/selenium/{$unique_id}Cept.php", "w");
        $content = '<?php $I = new SeleniumGuy($scenario);';
        fwrite($fp, $content);
        for($i=0;$i<count($st);$i++) {
            fwrite($fp, $st[$i] . ";\n");
        }
        fclose($fp);

        // 执行codecept，运行自动测试

        exec("codecept run selenium {$unique_id}Cept.php -c {$codecept_dir}codeception --steps 2>&1", $output, $re_var);

        $anay_start = false;
        $run_re = array();
        for($i=0;$i<count($output);$i++){
            $v = $output[$i];
            $v = trim($v);
            if($v == "Scenario:") {
                $anay_start = true;
                continue;
            }

            if($anay_start) {
                preg_match("/^\* I expect step id is (.*)$/", $v, $matches);
                if(count($matches) > 0) {
                    $key_str = trim($output[$i+2]);
                    if($key_str == '[37;41m FAIL [39;49m') {
                        $run_re[$matches[1]] = "fail";
                        $i = $i + 2;
                    }else {
                        $run_re[$matches[1]] = "pass";
                        $i++;
                    }
                }
            }
        }

        $this->clearCept($unique_id);

        return $run_re;
    }

    public function clearCept($unique) {
        if(file_exists($this->codecept_dir . "codeception/tests/selenium/" . $unique . "Cept.php")) {
            unlink($this->codecept_dir . "codeception/tests/selenium/" . $unique . "Cept.php");
        }

        exec("rm -fR " . $this->codecept_dir ."codeception/tests/_log/" . $unique . "Cept.*");
    }

} 