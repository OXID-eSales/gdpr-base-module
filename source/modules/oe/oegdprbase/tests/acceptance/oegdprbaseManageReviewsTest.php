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
 * Class oegdprbaseManageReviewsTest
 */
class oegdprbaseManageReviewsTest extends oegdprbaseFrontendBaseTestCase
{

    /**
     * Test the administration of reviews and ratings in the 'My Account' dashboard.
     */
    public function testMyAccountReviews()
    {
        $this->openReviewsPage();
        $this->assertReviewListCount(10);
        $this->assertReviewMenuCount(11);
        $this->clickNextPaginationPage();
        $this->deleteFirstReview();
        $this->assertReviewMenuCount(10);
        $this->assertReviewListCount(10);
    }

    /**
     * Assert a given number of reviews to be visible in the reviews list.
     *
     * @param integer $expectedReviewsCount
     */
    private function assertReviewListCount($expectedReviewsCount)
    {
        $reviewsCount = $this->getXpathCount("//div[starts-with(@id,'reviewName_')]");

        $this->assertEquals(
            $expectedReviewsCount,
            $reviewsCount,
            'Expected to see ' . $expectedReviewsCount . ' reviews but only ' . $reviewsCount . ' reviews are shown.'
        );
    }

    /**
     * Assert a that a given number of reviews is displayed in the reviews badge in the 'My account' dashboard menu.
     *
     * @param integer $expectedReviewsCount
     */
    private function assertReviewMenuCount($expectedReviewsCount)
    {
        $actualReviewsCount = $this->getText("//nav[@id='account_menu']//span[@class='badge']");

        $this->assertEquals(
            $expectedReviewsCount,
            $actualReviewsCount,
            "Expected to see the number $expectedReviewsCount in the menu but the number $actualReviewsCount is shown."
        );
    }

    /**
     * Delete first review.
     */
    private function deleteFirstReview()
    {
        $this->clickAndWait("//button[@data-target='#delete_review_1']");
        $this->clickAndWait("//form[@id='remove_review_1']//button[@type='submit']");
    }

    /**
     * Open the 'My reviews' section in the 'My Account' dashboard.
     */
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
     * Enable the administration of reviews and ratings in the module.
     */
    private function setConfigToAllowUserManageOwnReviews()
    {
        $this->callShopSC(
            "oxConfig",
            null,
            null,
            array(
                'blOeGdprBaseAllowUsersToManageReviews' => array(
                    'type'   => 'bool',
                    'value'  => true,
                    'module' => 'module:oegdprbase'
                )
            )
        );
    }

    /**
     * Click 'Next' button in pagination
     */
    private function clickNextPaginationPage()
    {
        $paginationLocator = "//ol[contains(@class,'pagination')]";
        $this->assertElementPresent($paginationLocator);
        $this->click($paginationLocator . "/li[@class='next']/a");
    }
}
