<?php


class AddPatientCest
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
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/addpatients');
      $I->click('#checkbox1');
      $I->fillField('firstname', 'Dinesh');
      $I->fillField('lastname', 'Mittal');
      $I->fillField('nhs_number', '32423423423423');
      $I->fillField('password', 'Fireboy1993');
      $I->fillField('cpassword', 'Fireboy1993');
      $I->fillField('email', 'mittald123@hotmail.co.uk');
      $I->fillField('cemail', 'mittald123@hotmail.co.uk');
      $I->fillField('rood', 'The Knoll');
      $I->fillField('number', '10');
      $I->fillField('email', 'staff1@mailinator.com');
      $I->fillField('zip', 'LS28 5FB');
      $I->fillField('place', 'Leeds');
      $I->fillField('phone', '7732511703');
      $I->fillField('fax', '7732511703');
      $I->click('Save');
    }
}
