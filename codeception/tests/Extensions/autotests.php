<?php
use Codeception\Event\SuiteEvent;
use Codeception\Event\FailEvent;
use Codeception\Events;
use Codeception\SuiteManager;

class autotests extends \Codeception\Platform\Extension
{
    // list events to listen to
    static $events = [
        Events::TEST_FAIL => 'afterFailed',
        Events::TEST_ERROR => 'afterFailed',
        Events::SUITE_BEFORE => 'beforeSuite'
    ];

    var $failedNumber = 1;
    var $webDriver;

    public function beforeSuite(SuiteEvent $e) {
        $this->webDriver = null;
        if (!$this->hasModule("WebDriver")) {
            return;
        }

        $this->webDriver = $this->getModule("WebDriver");
    }

    public function afterFailed(FailEvent $e) {
        if (!$this->webDriver) {
            return;
        }


        $dir = codecept_output_dir();
        $filename = $e->getTest()->getName() . '.'.$this->failedNumber.'.png';
        $log_filename = $e->getTest()->getName() . '.'.$this->failedNumber.'.log';

        $this->webDriver->_saveScreenshot($dir . DIRECTORY_SEPARATOR . $filename);
        $fp = fopen($dir . DIRECTORY_SEPARATOR . $log_filename, "w");
        fwrite($fp, $e->getFail()->getMessage());
        fclose($fp);

        $this->failedNumber++;
    }
}
