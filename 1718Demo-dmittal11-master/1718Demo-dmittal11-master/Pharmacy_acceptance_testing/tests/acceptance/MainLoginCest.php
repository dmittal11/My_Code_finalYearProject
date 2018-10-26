<?php


class MainLoginCest
{
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy');
    }

    public function _after(AcceptanceTester $I)
    {
      $I->seeInCurrentUrl('Pharmacy/dashboard');
      $I->see('Medication');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

      $I->fillField('email', 'staff1@mailinator.com');
      $I->fillField('password', 'staff1');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }
}
