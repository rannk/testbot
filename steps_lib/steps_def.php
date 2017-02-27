<?php
$steps[0][] = "我能打开页面 URL_VALUE";
$steps[0][] = "能正常打开指定的页面，不会出现页面无法打开的状况";
$steps[0][] = "/^我能打开页面 (.*)$/";
$steps[0][] = '$I->amOnUrl("%s1")';

$steps[1][] = "我能看到文字 STRING_VALUE";
$steps[1][] = "在页面上我能看到指定文字";
$steps[1][] = "/^我能看到文字 (.*)$/";
$steps[1][] = '$I->canSee("%s1")';

$steps[2][] = "我在元素 CSS_STRING_VALUE 上看到文字 STRING_VALUE";
$steps[2][] = "我能通过CSS或者XPATH在当前打开的页面上搜索到该元素，并在该元素上看到指定的文字.";
$steps[2][] = "/^我在元素 (.*) 上看到文字 (.*)$/";
$steps[2][] = '$I->see("%s2", "%s1")';

$steps[3][] = "我能看到元素 CSS_STRING_VALUE";
$steps[3][] = "我能通过CSS或者XPATH在当前页面上搜索到该元素";
$steps[3][] = "/^我能看到元素 (.*)$/";
$steps[3][] = '$I->canSeeElement("%s1")';

$steps[] = array("我点击 CSS_STRING_VALUE", "我能在当前打开的页面上点击指定的元素，该元素可以被点击", "/^我点击 (.*)$/", '$I->click("%s1")');
$steps[] = array("我能在表单元素 CSS_STRING_VALUE 中输入 STRING_VALUE", "在指定的表单元素中可以输入给定的文字", "/^我能在表单元素 (.*) 中输入 (.*)$/", '$I->fillField("%s1", "%s2")');
$steps[] = array("我要等待 NUMBER 秒", "我在当前页面上等待一定的时间", "/^我要等待 (.*) 秒$/", '$I->wait("%s1")');


