<?php


class PatientUpdateProfileCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy');
      $I->fillField('email', 'patient1@mailinator.com');
      $I->fillField('password', 'patient1');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/updateprofile');
      $I->fillField('firstname', 'patient1');
      $I->fillField('lastname', 'patient1');
      $I->fillField('nhs_number', '2343423432');
      $I->fillField('password', 'patient1');
      $I->fillField('cpassword', 'patient1');
      $I->fillField('email', 'patient1@mailinator.com');
      $I->fillField('cemail', 'patient1@mailinator.com');
      $I->fillField('rood', 'test_updated');
      $I->fillField('number', '12');
      $I->fillField('zip', 'LS28 5FB');
      $I->fillField('place', 'Leeds');
      $I->fillField('phone', '12345678');
      $I->fillField('fax', '1234567896');
      $I->click('Save');
    }
}
