<?php


class MainPatientLoginCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy');
    }

    public function _after(AcceptanceTester $I)
    {
      $I->seeInCurrentUrl('Pharmacy/dashboard');
      $I->see('HELLO PATIENT1 PATIENT1!');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->fillField('email', 'patient1@mailinator.com');
      $I->fillField('password', 'patient1');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }
}
