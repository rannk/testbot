<?php $I = new SeleniumGuy($scenario);$I->expect("step id is 7481ced5d80380bedada071d852bd596");
$I->amOnUrl("http://www.baidu.com");
$I->expect("step id is 5ccec6b85e1e740e3fe5ab297659da3e");
$I->canSeeElement("#su");
