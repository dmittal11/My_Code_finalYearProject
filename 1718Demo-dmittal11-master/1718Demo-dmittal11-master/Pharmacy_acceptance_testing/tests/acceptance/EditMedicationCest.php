<?php


class EditMedicationCest
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
      $I->amOnPage('/Pharmacy/medication');
      $I->see('Amitriptyline_Updated');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Pharmacy/updatemedication/13');
      $I->fillField('medication_name', 'Amitriptyline_Updated');
      $I->fillField('quantity', '28');
      $I->fillField('dosage', '5mg');
      $I->click('Save');

    }
}
