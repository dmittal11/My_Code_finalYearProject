<?php


class AddMedicationCest
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
        $I->amOnPage('/Pharmacy/addmedication');
        $I->fillField('medication_name', 'Amitriptyline');
        $I->fillField('quantity', '28');
        $I->fillField('dosage', '5mg');
        $I->click('Save');
    }
}
