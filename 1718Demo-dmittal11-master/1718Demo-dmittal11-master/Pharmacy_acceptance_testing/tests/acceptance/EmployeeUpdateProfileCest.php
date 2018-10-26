<?php


class EmployeeUpdateProfileCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy');
      $I->fillField('email', 'staff1@mailinator.com');
      $I->fillField('password', 'staff1');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }

    public function _after(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/updateprofile/107');
      $I->see('test_updated');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/updateprofile/107');
      $I->fillField('firstname', 'Dinesh');
      $I->fillField('lastname', 'Mittal');
      $I->fillField('nhs_number', '2343423432');
      $I->fillField('password', 'staff1');
      $I->fillField('cpassword', 'staff1');
      $I->fillField('password', 'staff1');
      $I->fillField('email', 'staff1@mailinator.com');
      $I->fillField('cemail', 'staff1@mailinator.com');
      $I->fillField('rood', 'test_updated');
      $I->fillField('number', '113');
      $I->fillField('zip', 'LS28 5FB');
      $I->fillField('password', 'staff1');
      $I->fillField('place', 'Leeds');
      $I->fillField('phone', '2147483647');
      $I->fillField('fax', '1234567896');
      $I->click('Save');
    }
}
