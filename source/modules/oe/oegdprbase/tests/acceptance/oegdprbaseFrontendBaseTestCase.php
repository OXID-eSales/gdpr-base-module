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

class oegdprbaseFrontendBaseTestCase extends oxTestCase
{

    /**
     * Login in Frontend.
     *
     * @param string $userName     User name (email).
     * @param string $userPass     User password.
     * @param bool   $waitForLogin
     */
    public function loginInFrontend($userName, $userPass, $waitForLogin = true)
    {
        $this->click("//div[contains(@class, 'showLogin')]/button");
        $this->waitForItemAppear("loginBox");

        $this->type("loginEmail", $userName);
        $this->type("loginPasword", $userPass);

        $this->clickAndWait("//div[@id='loginBox']/button");

        if ($waitForLogin) {
            $this->waitForTextDisappear('%LOGIN%');
        }
    }

    /**
     * Open 'My Account' dashboard.
     */
    protected function openMyAccountPage()
    {
        $this->click("//div[contains(@class, 'service-menu')]/button");
        $this->waitForItemAppear("services");
        $this->clickAndWait("//ul[@id='services']/li/a");
    }
}
