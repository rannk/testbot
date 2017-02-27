<?php
namespace Codeception\Module;

// here you can define custom functions for SeleniumGuy 


class SeleniumHelper extends \Codeception\Module
{
    function seeTopOfPage($scroll_top) {
        $this->assertTrue($scroll_top == 50, "Scroll to top not found");
    }
    
    function matchLink($source, $match) {
        $this->assertTrue(($source == $match), $source . "As " . $match);
    }

    function checkLinkContainText($link, $text) {
        if(stripos($link, $text) === false) {
            $this->assertTrue(false, "The link contain the text");
        } else {
            $this->assertTrue(true, "The link contain the text");
        }
    }
}
