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

class oeGdprBaseUserRatingBridgeInternalTest extends OxidTestCase
{
    public function testDeleteRating()
    {
        $userRatingBridge = $this->getUserRatingBridge();
        $database = oxDb::getDb();

        $sql = "select oxid from oxratings where oxid = 'id1'";

        $this->createTestRating();
        $this->assertEquals('id1', $database->getOne($sql));

        $userRatingBridge->deleteRating('user1', 'id1');
        $this->assertFalse($database->getOne($sql));
    }

    public function testDeleteRatingForSubShop()
    {
        $userRatingBridge = $this->getUserRatingBridge();
        $database = oxDb::getDb();

        $sql = "select oxid from oxratings where oxid = 'testSubShopRatingId'";

        $this->createTestRatingForSubShop();
        $this->assertEquals('testSubShopRatingId', $database->getOne($sql));

        $userRatingBridge->deleteRating('user1', 'testSubShopRatingId');
        $this->assertFalse($database->getOne($sql));
    }

    public function testDeleteRatingWithNonExistentRatingId()
    {
        $this->setExpectedException('oeGdprBaseEntryDoesNotExistDaoException');

        $userRatingBridge = $this->getUserRatingBridge();
        $userRatingBridge->deleteRating('user1', 'nonExistentId');
    }

    public function testDeleteRatingWithWrongUserId()
    {
        $this->setExpectedException('oeGdprBaseRatingPermissionException');

        $userRatingBridge = $this->getUserRatingBridge();
        $database = oxDb::getDb();

        $sql = "select oxid from oxratings where oxid = 'id1'";

        $this->createTestRating();
        $this->assertEquals('id1', $database->getOne($sql));

        $userRatingBridge->deleteRating('userWithWrongId', 'id1');
    }

    private function getUserRatingBridge()
    {
        return new oeGdprBaseUserRatingBridge(
            $this->getUserRatingServiceMock()
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|UserRatingServiceInterface
     */
    private function getUserRatingServiceMock()
    {
        $userRatingServiceMock = $this->getMockBuilder('oeGdprBaseUserRatingService')
            ->disableOriginalConstructor()
            ->getMock();
        return $userRatingServiceMock;
    }

    private function createTestRating()
    {
        $rating = oxNew('oxRating');
        $rating->setId('id1');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->save();
    }

    private function createTestRatingForSubShop()
    {
        $rating = oxNew('oxRating');
        $rating->setId('testSubShopRatingId');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->oxratings__oxshopid = new oxField(5);
        $rating->save();
    }
}
