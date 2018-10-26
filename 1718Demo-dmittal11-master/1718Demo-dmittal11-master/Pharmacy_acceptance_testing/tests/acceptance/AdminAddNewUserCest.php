<?php


class AdminAddNewUserCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin');
      $I->fillField('email', 'admin@mailinator.com');
      $I->fillField('password', 'Fireboy1993');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }

    public function _after(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin/userlist');
      $I->see('teststatus123@mailinator.com');

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin/adduser');
      $I->selectOption('member_type', 'Employee');
      $I->fillField('firstname', 'teststatus123');
      $I->fillField('lastname', 'teststatus123');
      $I->fillField('password', 'Fireboy1993');
      $I->fillField('cpassword', 'Fireboy1993');
      $I->fillField('email', 'teststatus123@mailinator.com');
      $I->fillField('cemail', 'teststatus123@mailinator.com');
      $I->fillField('rood', 'The Knoll');
      $I->fillField('number', '10');
      $I->fillField('zip', 'LS28 5FB');
      $I->fillField('place', 'Leeds');
      $I->fillField('phone', '7732511703');
      $I->fillField('fax', '7732511703');
      $I->click('Save');



    }
}
