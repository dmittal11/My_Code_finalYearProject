<?php


class AdminLoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin/dashboard');
      $I->see('DASHBOARD');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/admin');
      $I->fillField('email', 'admin@mailinator.com');
      $I->fillField('password', '123456');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
    }
}
