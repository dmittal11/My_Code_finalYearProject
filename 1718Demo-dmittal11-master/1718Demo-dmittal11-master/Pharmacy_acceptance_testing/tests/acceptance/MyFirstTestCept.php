<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/Pharmacy');
$I->fillField('email', 'staff1@mailinator.com');
$I->fillField('password', 'staff1');
$I->checkOption('#checkbox1');
$I->click('LOGIN');
