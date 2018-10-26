<?php


class AdminProfileUpdateCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin');
      $I->fillField('email', 'admin@mailinator.com');
      $I->fillField('password', '123456');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Pharmacy/admin/updateprofile');
        $I->fillField('firstname', 'admin');
        $I->fillField('lastname', 'admin');
        $I->fillField('password', 'Fireboy1993');
        $I->fillField('cpassword', 'Fireboy1993');
        $I->fillField('email', 'admin@mailinator.com');
        $I->fillField('cemail', 'admin@mailinator.com');
        $I->fillField('rood', 'test_Updated');
        $I->fillField('number', '113');
        $I->fillField('zip', 'LS28 5FB');
        $I->fillField('place', 'Leeds');
        $I->fillField('phone', '1234567890');
        $I->fillField('fax', '1234567896');
        $I->click('Update Profile');

    }
}
