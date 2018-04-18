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

class oeGdprBaseOxUserTest extends OxidTestCase
{
    protected $createdUsers = array();

    public function testDelete()
    {
        $database = $this->getDb();

        $user = $this->createUser();
        $userId = $user->getId();

        $user = oxNew('oxUser');
        $user->load($userId);
        $bSuccess = $user->delete();

        $this->assertEquals(true, $bSuccess);

        $what = array('oxuser'            => 'oxid',
                      'oxaddress'         => 'oxuserid',
                      'oxuserbaskets'     => 'oxuserid',
                      'oxnewssubscribed'  => 'oxuserid',
                      'oxrecommlists'     => 'oxuserid',
                      'oxreviews'         => 'oxuserid',
                      'oxratings'         => 'oxuserid',
                      'oxpricealarm'      => 'oxuserid',
                      'oxacceptedterms'   => 'oxuserid',
                      'oxobject2delivery' => 'oxobjectid',
                      'oxobject2discount' => 'oxobjectid',
                      'oxobject2group'    => 'oxobjectid',
                      'oxobject2payment'  => 'oxobjectid',
                      'oxremark'          => 'oxparentid',
        );

        // now checking if all related records were deleted
        foreach ($what as $table => $field) {
            $query = "SELECT count(*) FROM $table WHERE $field = ?";

            if ($table == 'oxremark') {
                $query .= " AND oxtype !='o'";
            }

            $recordCount = $database->getOne($query, array($userId), false);
            if ($recordCount > 0) {
                $this->fail($recordCount . ' records were not deleted from "' . $table . '" table');
            }
        }
    }

    public function testOrderRelatedEntriesAreNotDeleted()
    {
        $database = $this->getDb();

        $user = $this->createUser();
        $userId = $user->getId();

        $user = oxNew('oxUser');
        $user->load($userId);
        $bSuccess = $user->delete();

        $what = array(
            'oxorder'        => 'oxuserid',
            'oxuserpayments' => 'oxuserid',
            'oxremark'       => 'oxparentid',
        );

        // now checking if all related records were deleted
        foreach ($what as $table => $field) {
            $query = "SELECT count(*) FROM $table WHERE $field = ?";
            if ($table == 'oxremark') {
                $query .= " AND oxtype = 'o'";
            }

            $recordCount = $database->getOne($query, array($userId), false);
            if (1 !== (int) $recordCount) {
                $this->fail('Order related records were deleted from table ' . $table . ' Record count: ' . $recordCount . ' query: ' . $query);

            }
        }
    }

    /**
     * Calling \oxBase::delete sets the MySQL FETCH_MODE of the current connection to oxDb::FETCH_MODE_ASSOC
     * The implementation of this module resets it to the default as used in the shop.
     */
    public function testFetchModeIsReset()
    {
        $database = oxDb::getDb();
        $query = 'SELECT 1 AS oxid';
        $result = $database->getRow($query);
        $this->assertArrayHasKey(0, $result);

        $user = $this->createUser();
        $userId = $user->getId();

        $user = oxNew('oxUser');
        $user->load($userId);
        $user->delete();

        $database = oxDb::getDb();
        $query = 'SELECT 1 AS oxid';
        $result = $database->getRow($query);
        $this->assertArrayHasKey(0, $result);
    }

    /**
     * Calling \oxBase::delete sets the MySQL FETCH_MODE of the current connection to oxDb::FETCH_MODE_ASSOC
     * The implementation of this module resets it to the default as used in the shop.
     * This should work even in case an exception was thrown.
     */
    public function testFetchModeIsResetAfterException()
    {
        $database = oxDb::getDb();
        $query = 'SELECT 1 AS oxid';
        $result = $database->getRow($query);
        $this->assertArrayHasKey(0, $result);

        $user = $this->createUser();
        $userId = $user->getId();

        try {
            $userMock = $this->getMock('oxUser', array('oeGdprBaseDeleteRecommendationLists'));
            $userMock
                ->expects($this->any())
                ->method('oeGdprBaseDeleteRecommendationLists')
                ->will($this->throwException(new Exception('testFetchModeIsResetAfterException')));
            $userMock->load($userId);
            $userMock->delete();
        } catch (Exception $exception) {

        }

        $database = oxDb::getDb();
        $query = 'SELECT 1 AS oxid';
        $result = $database->getRow($query);
        $this->assertArrayHasKey(0, $result);
    }

    /**
     * Creates user.
     *
     * @param string $userName
     * @param int    $isActive
     * @param string $rights either user or malladmin
     * @param int    $shopId User shop ID
     *
     * @return oxUser
     */
    protected function createUser($userName = null, $isActive = 1, $rights = 'user', $shopId = null)
    {
        $database = $this->getDb();

        $nextUserNumber = count($this->createdUsers) + 1;

        if (is_null($shopId)) {
            $shopId = $this->getConfig()->getShopId();
        }

        $userId = substr('_testUser' . oxUtilsObject::getInstance()->generateUID(), 0, 32);
        $user = oxNew('oxUser');
        $user->setId($userId);
        $user->oxuser__oxshopid = new oxField($shopId, oxField::T_RAW);
        $user->oxuser__oxactive = new oxField($isActive, oxField::T_RAW);
        $user->oxuser__oxrights = new oxField($rights, oxField::T_RAW);

        $userName = $userName ? $userName : 'test' . $nextUserNumber . '@oxid-esales.com';
        $user->oxuser__oxusername = new oxField($userName, oxField::T_RAW);
        $user->oxuser__oxpassword = new oxField(crc32($userName), oxField::T_RAW);
        $user->oxuser__oxcountryid = new oxField("testCountry", oxField::T_RAW);
        $user->save();

        $groupId = $database->getOne("SELECT oxid FROM oxgroups ORDER BY rand()");
        $query = 'REPLACE INTO oxobject2group (oxid, oxshopid, oxobjectid, oxgroupsid) VALUES (?, ?, ?, ?)';
        $database->execute($query, array($userId, $shopId, $userId, $groupId));

        $query = "INSERT INTO oxuserbaskets ( oxid, oxuserid, oxtitle ) VALUES (?, ?, 'oxtest')";
        $database->execute($query, array($userId, $userId));

        $articleId = $database->getOne('SELECT oxid FROM oxarticles ORDER BY rand() ');
        $query = "INSERT INTO oxuserbasketitems ( oxid, oxbasketid, oxartid, oxamount ) VALUES (?, ?,  ?, '1')";
        $database->execute($query, array($userId, $userId, $articleId));

        $addressId = 'test_user' . $nextUserNumber;
        $countryId = $database->getOne("SELECT oxid FROM oxcountry WHERE oxactive = '1'");
        $query = "INSERT INTO oxaddress ( oxid, oxuserid, oxaddressuserid, oxcountryid ) VALUES (? ,?, ?, ?)";
        $database->execute($query, array($addressId, $userId, $userId, $countryId));

        $database->execute("INSERT INTO oxacceptedterms (oxuserid) VALUES(?)", array($userId));

        $address = oxNew('oxAddress');
        $address->setId("_testAddress");
        $address->oxaddress__oxuserid = new oxField($userId);
        $address->save();

        $groupMemberShip = oxNew('oxBase');
        $groupMemberShip->init("oxobject2group");
        $groupMemberShip->setId("_testO2G");
        $groupMemberShip->oxobject2group__oxobjectid = new oxField($userId);
        $groupMemberShip->oxobject2group__oxgroupsid = new oxField($userId);
        $groupMemberShip->save();

        $userBaskets = oxNew('oxBase');
        $userBaskets->init("oxuserbaskets");
        $userBaskets->setId("_testU2B");
        $userBaskets->oxuserbaskets__oxuserid = new oxField($userId);
        $userBaskets->save();

        $newsletterSubscriptions = oxNew('oxBase');
        $newsletterSubscriptions->init("oxnewssubscribed");
        $newsletterSubscriptions->setId("_testNewsSubs");
        $newsletterSubscriptions->oxnewssubscribed__oxemail = new oxField($userId);
        $newsletterSubscriptions->oxnewssubscribed__oxuserid = new oxField($userId);
        $newsletterSubscriptions->save();

        $delivery = oxNew('oxBase');
        $delivery->init("oxobject2delivery");
        $delivery->setId("_testo2d");
        $delivery->oxobject2delivery__oxobjectid = new oxField($userId);
        $delivery->oxobject2delivery__oxdeliveryid = new oxField($userId);
        $delivery->save();

        $discount = oxNew('oxBase');
        $discount->init("oxobject2discount");
        $discount->setId("_testo2d");
        $discount->oxobject2discount__oxobjectid = new oxField($userId);
        $discount->oxobject2discount__oxdiscountid = new oxField($userId);
        $discount->save();

        $remark = oxNew('oxRemark');
        $remark->setId("_testRemark");
        $remark->oxremark__oxparentid = new oxField($userId);
        $remark->oxremark__oxtype = new oxField('r');
        $remark->save();

        $recommendationList = oxNew('oxrecommlist');
        $recommendationList->setId("_testRecommendationList");
        $recommendationList->oxrecommlists__oxuserid = new oxField($userId);
        $recommendationList->oxrecommlists__oxshopid = new oxField($this->getShopId());
        $recommendationList->oxrecommlists__oxtitle = new oxField("Test title");
        $recommendationList->save();

        $rating = oxNew('oxRating');
        $rating->setId("_testRating");
        $rating->oxratings__oxuserid = new oxField($userId);
        $rating->oxratings__oxrating = new oxField(5);
        $rating->save();

        $review = oxNew('oxReview');
        $review->setId("_testReview");
        $review->oxreviews__oxuserid = new oxField($userId);
        $review->oxreviews__oxtext = new oxField("Supergood");
        $review->save();

        $priceAlarm = oxNew('oxPricealarm');
        $priceAlarm->setId("_testPriceAlarm");
        $priceAlarm->oxpricealarm__oxuserid = new oxField($userId);
        $priceAlarm->save();

        // order information, which MUST NOT be deleted
        $order = oxNew('oxOrder');
        $order->setId('_testOrder');
        $order->oxorder__oxuserid = new oxField($userId);
        $order->save();

        $remark = oxNew('oxRemark');
        $remark->setId("_testRemark");
        $remark->oxremark__oxparentid = new oxField($userId);
        $remark->oxremark__oxtype = new oxField('o');
        $remark->save();

        $userPayment = oxNew('oxUserPayment');
        $userPayment->setId("_testUserPayment");
        $userPayment->oxuserpayments__oxuserid = new oxField($userId);
        $userPayment->save();

        $this->createdUsers[$userId] = $user;

        return $user;
    }
}
