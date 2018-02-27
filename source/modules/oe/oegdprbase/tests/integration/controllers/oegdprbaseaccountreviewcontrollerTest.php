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

class oeGdprBaseAccountReviewControllerTest extends OxidTestCase
{

    const TESTUSER_ID = 'AccountReviewControllerTest';

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->createUser(self::TESTUSER_ID);
    }

    /**
     * @inheritdoc
     *
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->getUser(self::TESTUSER_ID)->delete();

        parent::tearDown();
    }

    public function testDeleteReviewAndRating()
    {
        $this->createTestDataForDeleteReviewAndRating();
        $this->setSessionChallenge();

        $this->doDeleteReviewAndRatingRequest();

        $this->assertFalse($this->reviewToDeleteExists());
        $this->assertFalse($this->ratingToDeleteExists());
    }

    public function testDeleteReviewAndRatingDoNotDeleteWithInvalidSessionChallenge()
    {
        $this->createTestDataForDeleteReviewAndRating();

        $this->setInvalidSessionChallenge();

        $this->doDeleteReviewAndRatingRequest();

        $this->assertTrue($this->reviewToDeleteExists());
        $this->assertTrue($this->ratingToDeleteExists());
    }

    public function testReviewAndRatingListPaginationItemsPerPage()
    {
        $accountReviewController = oxNew('oegdprbaseaccountreviewcontroller');
        $itemsPerPage = $accountReviewController->oeGdprBaseGetItemsPerPage();

        $this->assertEquals(
            10,
            $itemsPerPage
        );
    }

    public function testReviewAndRatingListIsAnEmptyArrayOnNoRatingsAndReviews()
    {
        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $this->assertSame(
            array(),
            $accountReviewControllerStub->oeGdprBaseGetReviewList()
        );
    }

    public function testReviewAndRatingListPagination()
    {
        $this->createTestDataForReviewAndRatingList();

        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $displayedReviews = count($accountReviewControllerStub->oeGdprBaseGetReviewList());

        $this->assertSame(
            $accountReviewControllerStub->oeGdprBaseGetItemsPerPage(),
            $displayedReviews
        );
    }

    public function testInitDoesNotRedirect()
    {
        $this->setConfigParam('blOeGdprBaseAllowUsersToManageReviews', true);
        $this->createTestDataForReviewAndRatingList();

        $utilsStub = $this->getMockBuilder('oxUtils')->getMock();
        $utilsStub->expects($this->never())->method('redirect');
        oxRegistry::set('oxUtils', $utilsStub);

        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $accountReviewControllerStub->init();
    }

    public function testInitRedirectsIfFeatureIsDisabled()
    {
        $this->setConfigParam('blOeGdprBaseAllowUsersToManageReviews', false);
        $this->createTestDataForReviewAndRatingList();

        $utilsStub = $this->getMockBuilder('oxUtils')->getMock();
        $utilsStub->expects($this->once())->method('redirect');
        oxRegistry::set('oxUtils', $utilsStub);

        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $accountReviewControllerStub->init();
    }

    public function testInitRedirectsIfUserIsNotLogged()
    {
        $this->setConfigParam('blOeGdprBaseAllowUsersToManageReviews', true);
        $this->createTestDataForReviewAndRatingList();

        $utilsStub = $this->getMockBuilder('oxUtils')->getMock();
        $utilsStub->expects($this->once())->method('redirect');
        oxRegistry::set('oxUtils', $utilsStub);


        $accountReviewController = oxNew('oegdprbaseaccountreviewcontroller');
        $accountReviewController->init();
    }

    public function testReviewAndRatingListCount()
    {
        $this->createTestDataForReviewAndRatingList();

        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $this->assertSame(
            20,
            $accountReviewControllerStub->oeGdprBaseGetReviewAndRatingItemsCount()
        );
    }

    private function createTestDataForReviewAndRatingList()
    {
        for ($i = 0; $i < 10; $i++) {
            $review = oxNew('oxReview');
            $review->oxreviews__oxuserid = new oxField(self::TESTUSER_ID, oxField::T_RAW);
            $review->oxreviews__oxtype = new oxField('oxarticle', oxField::T_RAW);
            $review->oxreviews__oxobjectid = new oxField('testArticle', oxField::T_RAW);
            $review->oxreviews__oxrating = new oxField(2, oxField::T_RAW);
            $review->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $rating = oxNew('oxRating');
            $rating->oxratings__oxshopid = new oxField(1, oxField::T_RAW);
            $rating->oxratings__oxuserid = new oxField(self::TESTUSER_ID, oxField::T_RAW);
            $rating->oxratings__oxtype = new oxField('oxrecommlist', oxField::T_RAW);
            $rating->oxratings__oxobjectid = new oxField('testArticle', oxField::T_RAW);
            $rating->oxratings__oxrating = new oxField(4, oxField::T_RAW);
            $rating->save();
        }
    }

    private function createTestDataForDeleteReviewAndRating()
    {
        $review = oxNew('oxReview');
        $review->setId('testReviewToDelete');
        $review->oxreviews__oxuserid = new oxField(self::TESTUSER_ID, oxField::T_RAW);
        $review->oxreviews__oxtype = new oxField('oxarticle', oxField::T_RAW);
        $review->oxreviews__oxobjectid = new oxField('testArticle', oxField::T_RAW);
        $review->oxreviews__oxrating = new oxField(2, oxField::T_RAW);
        $review->save();

        $rating = oxNew('oxRating');
        $rating->setId('testRatingToDelete');
        $rating->oxratings__oxshopid = new oxField(1, oxField::T_RAW);
        $rating->oxratings__oxuserid = new oxField(self::TESTUSER_ID, oxField::T_RAW);
        $rating->oxratings__oxtype = new oxField('oxrecommlist', oxField::T_RAW);
        $rating->oxratings__oxobjectid = new oxField('testArticle', oxField::T_RAW);
        $rating->oxratings__oxrating = new oxField(4, oxField::T_RAW);
        $rating->save();
    }

    private function setSessionChallenge()
    {
        $this->getSession()->setVariable('sess_stoken', 'token');
        $this->setRequestParam('stoken', 'token');
    }

    private function setInvalidSessionChallenge()
    {
        $this->getSession()->setVariable('sess_stoken', 'token');
        $this->setRequestParam('stoken', 'invalid_token');
    }

    private function doDeleteReviewAndRatingRequest()
    {
        $this->setRequestParam('reviewId', 'testReviewToDelete');
        $this->setRequestParam('ratingId', 'testRatingToDelete');

        $accountReviewControllerStub = $this->getAccountReviewControllerStub();

        $accountReviewControllerStub->oeGdprBaseDeleteReviewAndRating();
    }

    private function reviewToDeleteExists()
    {
        $review = oxNew('oxReview');
        $exists = $review->load('testReviewToDelete');

        return $exists;
    }

    private function ratingToDeleteExists()
    {
        $rating = oxNew('oxRating');
        $exists = $rating->load('testRatingToDelete');

        return $exists;
    }

    protected function getUser($userId)
    {
        $user = oxNew('oxUser');
        if (!$user->load($userId)) {
            throw new \Exception('User ' . $userId . ' could not be loaded');
        }

        return $user;
    }

    protected function createUser($userId)
    {
        $user = oxNew('oxUser');
        $user->setId($userId);
        $user->oxuser__oxactive = new oxField(1, oxField::T_RAW);
        $user->save();

        return $user;
    }

    /**
     * @throws Exception
     *
     * @return PHPUnit_Framework_MockObject_MockObject|oeGdprBaseAccountReviewController
     */
    private function getAccountReviewControllerStub()
    {
        $user = $this->getUser(self::TESTUSER_ID);
        $accountReviewControllerStub = $this
            ->getMockBuilder('oegdprbaseaccountreviewcontroller')
            ->setMethods(array('getUser'))
            ->getMock();
        $accountReviewControllerStub
            ->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue($user));

        return $accountReviewControllerStub;
    }

}
