<?php
$scenario->group('editor');
$scenario->group('bookcase');
$scenario->group('tt');

$I = new SeleniumGuy($scenario);

static $nid = '32194897';

$I->wantTo("Check Bookcase with node ID={$nid}");
$I->amOnPage('/' . $nid);

$I->seeElement('[data-nid="' . $nid . '"]');
$I->seeElement('.sales-bookcase-outer');
$I->seeElement('.sales-bookcase-outer .sales-bookcase-shelf');
$I->seeElement('.sales-bookcase-outer .sales-bookcase-shelf .sales-bookcase-book');
