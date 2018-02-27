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

class oeGdprBaseUserReviewBridgeInternalTest extends OxidTestCase
{
    public function testDeleteReview()
    {
        $userReviewBridge = $this->getUserReviewBridge();
        $database = oxDb::getDb();

        $sql = "select oxid from oxreviews where oxid = 'id1'";

        $this->createTestReview();
        $this->assertEquals('id1', $database->getOne($sql));

        $userReviewBridge->deleteReview('user1', 'id1');
        $this->assertFalse($database->getOne($sql));
    }

    public function testDeleteReviewWithNonExistentReviewId()
    {
        $this->setExpectedException('oeGdprBaseEntryDoesNotExistDaoException');

        $userReviewBridge = $this->getUserReviewBridge();
        $userReviewBridge->deleteReview('user1', 'nonExistentId');
    }

    public function testDeleteRatingWithWrongUserId()
    {
        $this->setExpectedException('oeGdprBaseReviewPermissionException');

        $userReviewBridge = $this->getUserReviewBridge();
        $database = oxDb::getDb();

        $sql = "select oxid from oxreviews where oxid = 'id1'";

        $this->createTestReview();
        $this->assertEquals('id1', $database->getOne($sql));

        $userReviewBridge->deleteReview('userWithWrongId', 'id1');
    }

    private function getUserReviewBridge()
    {
        return new oeGdprBaseUserReviewBridge(
            $this->getUserReviewServiceMock()
        );
    }

    private function getUserReviewServiceMock()
    {
        $userReviewServiceMock = $this->getMockBuilder('oeGdprBaseUserReviewService')
            ->disableOriginalConstructor()
            ->getMock();
        return $userReviewServiceMock;
    }

    private function createTestReview()
    {
        $review = oxNew('oxReview');
        $review->setId('id1');
        $review->oxreviews__oxuserid = new oxField('user1');
        $review->save();
    }
}
