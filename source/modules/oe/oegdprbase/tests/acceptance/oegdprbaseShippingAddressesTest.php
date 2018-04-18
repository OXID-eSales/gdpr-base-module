<?php
/**
 * This file is part of OXID eSales GDPR base module.
 *
 * OXID eSales GDPR base module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales GDPR base module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales GDPR base module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link          http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2018
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'oegdprbaseFrontendBaseTestCase.php';

/**
 * Class oegdprbaseShippingAddressesTest
 */
class oegdprbaseShippingAddressesTest extends oegdprbaseFrontendBaseTestCase
{
    /**
     * Test that a user can delete shipping addresses in MyAccount and checkout step2.
     */
    public function testDeleteShippingAddress()
    {
        $this->openShop();
        $this->loginInFrontend(
            'testing_account@oxid-esales.dev',
            'useruser'
        );
        $this->openMyAddressesPage();
        $this->showShippingAddresses();
        $this->clickAndWait('//*[@id="accUserSaveTop"]');
        $this->assertNumberOfShippingAddresses(3);
        $this->deleteFirstShippingAddress();
        $this->assertNumberOfShippingAddresses(2);
        $this->addToBasket('oegdprbasetestproduct1', 1);
        $this->clickNextStep();
        $this->assertNumberOfShippingAddresses(2);
        $this->deleteFirstShippingAddress();
        $this->assertNumberOfShippingAddresses(1);
    }

    /**
     * Assert that a given number of shipping addresses is visible.
     *
     * @param integer $expectedNumberOfShippingAddresses NUmber of shipping addresses to be shown
     */
    private function assertNumberOfShippingAddresses($expectedNumberOfShippingAddresses)
    {
        // "add new address" is also one box but should not be counted
        $actualNumberOfShippingAddresses =
            $this->getXpathCount("//div[contains(@class, 'dd-available-addresses')]/div") - 1;
        $this->assertEquals(
            $expectedNumberOfShippingAddresses,
            $actualNumberOfShippingAddresses,
            "Expected to see $expectedNumberOfShippingAddresses shipping addresses but 
            $actualNumberOfShippingAddresses shipping addresses are shown."
        );
    }

    /**
     * Open addresses section.
     */
    private function openMyAddressesPage()
    {
        $this->openMyAccountPage();
        $this->clickAndWait("//a[@title='%BILLING_SHIPPING_SETTINGS%']");
    }

    /**
     * Show shipping addresses.
     */
    private function showShippingAddresses()
    {
        $this->click("//input[@id='showShipAddress']");
    }

    /**
     * Delete first shipping address.
     */
    private function deleteFirstShippingAddress()
    {
        $this->click("//button[contains(@class,'oegdprbase-delete-shipping-address-button')][1]");
        $this->clickAndWait("//div[contains(@class,'modal-dialog')][1]//button[contains(@class, 'btn-danger')]");
    }

    /**
     * Click 'next' button.
     */
    private function clickNextStep()
    {
        $this->clickAndWait("//button[contains(@class,'nextStep')]");
    }
}
