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
 * Class oegdprbaseDeleteOwnAccountTest
 */
class oegdprbaseDeleteOwnAccountTest extends oegdprbaseFrontendBaseTestCase
{

    /**
     * Skip test, if edition of OXID eShop is CE or PE.
     */
    public function setUp()
    {
        parent::setUp();
        $config = oxNew('oxConfig');
    }

    /**
     * It should be possible for mall users to delete their account in any shop.
     */
    public function testDeleteMyAccount()
    {
        $this->setConfigToAllowUsersDeleteTheirAccount();
        $this->openShop();
        $this->loginInFrontend(
            'testing_account@oxid-esales.dev',
            'useruser'
        );
        $this->openMyAccountPage();
        $this->clickDeleteAccount();
        $this->assertDeletionOfAccountWasSuccessful();
    }

    /**
     * Helper method for account deletion.
     */
    private function clickDeleteAccount()
    {
        $this->assertDeleteButtonPresent();
        $this->clickDeleteButton();
        $this->clickConfirmDeleteAccountButton();
    }

    /**
     * Assert that delete button is present.
     */
    private function assertDeleteButtonPresent()
    {
        $this->assertElementPresent('//button[@data-target="#oegdprbase_delete_my_account_confirmation"]');
    }

    /**
     * Assert successful account deletion
     */
    private function assertDeletionOfAccountWasSuccessful()
    {
        $this->assertElementPresent("//form[@name='login']", "Deletion of account was not successful");
        $this->assertTextPresent('%OEGDPRBASE_SUCCESS_ACCOUNT_DELETED%');
        $this->loginInFrontend('account@oxid-esales.dev', 'useruser', false);
        $this->assertElementPresent("//form[@name='login']", "Deletion of account was not successful");
    }

    /**
     * Click delete button.
     */
    private function clickDeleteButton()
    {
        $this->click("//button[@data-target='#oegdprbase_delete_my_account_confirmation']");
    }

    /**
     * Click confirm account delete button.
     */
    private function clickConfirmDeleteAccountButton()
    {
        $this->waitForItemAppear("//div[@id='oegdprbase_delete_my_account_confirmation']");
        $this->clickAndWait("//form[@name='delete_my_account']/button[@class='btn btn-danger']");
    }

    /**
     * Enable account deletion in the module.
     */
    private function setConfigToAllowUsersDeleteTheirAccount()
    {
        $this->callShopSC(
            "oxConfig",
            null,
            null,
            array(
                'blOeGdprBaseAllowUsersToDeleteTheirAccount' => array(
                    "type"   => "bool",
                    "value"  => true,
                    'module' => 'module:oegdprbase'
                ),
            )
        );
    }
}
