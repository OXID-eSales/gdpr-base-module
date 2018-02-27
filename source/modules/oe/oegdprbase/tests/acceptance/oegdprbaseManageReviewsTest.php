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
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2018
 */

class oegdprbaseTest extends oxTestCase
{
    public function testMyAccountReviews()
    {
        $this->openReviewsPage();
        $this->checkReviewListCount(10);

        $this->deleteReview();
        $this->checkReviewListCount(9);
    }

    private function checkReviewListCount($expectedReviewsCount)
    {
        $reviewsCount = $this->getXpathCount("//div[starts-with(@id,'reviewName_')]");

        $this->assertEquals(
            $expectedReviewsCount,
            $reviewsCount,
            'Expected to see ' . $expectedReviewsCount . ' reviews but only ' . $reviewsCount . ' reviews are shown.'
        );
    }

    private function deleteReview()
    {
        $this->click("//button[@data-target='#delete_review_1']");
        $this->waitForItemAppear("remove_review_1");
        $this->clickAndWait("//form[@id='remove_review_1']//button[@type='submit']");
    }

    private function openReviewsPage()
    {
        $this->setConfigToAllowUserManageOwnReviews();
        $this->openShop();
        $this->loginInFrontend(
            'testing_account@oxid-esales.dev',
            'useruser'
        );

        $this->openMyAccountPage();
        $this->clickAndWait("//a[@title='%OEGDPRBASE_MY_REVIEWS%']");
    }

    /**
     * oxAccepetanceTestCase::loginInFrontend is designed for the azure theme. We want to use the flow theme.
     *
     * @param string $userName User name (email).
     * @param string $userPass User password.
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

    private function openMyAccountPage()
    {
        $this->click("//div[contains(@class, 'service-menu')]/button");
        $this->waitForItemAppear("services");
        $this->clickAndWait("//ul[@id='services']/li/a");
    }

    private function setConfigToAllowUserManageOwnReviews()
    {
        $this->callShopSC(
            "oxConfig", null, null, array(
                'blOeGdprBaseAllowUsersToManageReviews' => array(
                    'type'   => 'bool',
                    'value'  => 1,
                    'module' => 'module:oegdprbase'
                )
            )
        );
    }
}
