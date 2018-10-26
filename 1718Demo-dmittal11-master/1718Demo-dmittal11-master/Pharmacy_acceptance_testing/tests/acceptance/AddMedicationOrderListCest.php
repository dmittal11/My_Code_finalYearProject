<?php


class AddMedicationOrderListCest
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
      $I->amOnPage('/Pharmacy');
      $I->fillField('email', 'staff1@mailinator.com');
      $I->fillField('password', 'staff1');
      $I->checkOption('#checkbox1');
      $I->click('LOGIN');
      $I->amOnPage('Pharmacy/medicationstock');
      $I->see('Amlodipine');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/addmymedication');
      $I->fillField('medication_name', 'Amlodipine');
      $I->fillField('quantity', '28');
      $I->fillField('dosage', '25mg');
      $I->fillField('timeduration', '2 months');
      $I->selectOption('shipping_method', '2');
      $I->click('Save');
      $I->click('Logout');

    }
}
