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

class oeGdprBaseReviewDaoInternalTest extends OxidTestCase
{
    public function testGetReviewsByUserId()
    {
        $this->createTestReviewsForGetRatingsByUserIdTest();

        $reviewDao = $this->getReviewDao();
        $reviews = $reviewDao->getReviewsByUserId('user1');

        $this->assertCount(2, $reviews);
    }

    public function testDeleteReview()
    {
        $this->createTestReviewsForDeleteReviewTest();

        $reviewDao = $this->getReviewDao();

        $reviewsBeforeDeletion = $reviewDao->getReviewsByUserId('user1');
        $reviewToDelete = $reviewsBeforeDeletion[0];

        $reviewDao->delete($reviewToDelete);

        $reviewsAfterDeletion = $reviewDao->getReviewsByUserId('user1');

        $this->assertNotContains(
            $reviewToDelete,
            $reviewsAfterDeletion
        );
    }

    private function createTestReviewsForDeleteReviewTest()
    {
        $review = oxNew('oxReview');
        $review->setId('id1');
        $review->oxreviews__oxuserid = new oxField('user1');
        $review->save();

        $review = oxNew('oxReview');
        $review->setId('id2');
        $review->oxreviews__oxuserid = new oxField('user1');
        $review->save();
    }

    private function createTestReviewsForGetRatingsByUserIdTest()
    {
        $review = oxNew('oxReview');
        $review->setId('id1');
        $review->oxreviews__oxuserid = new oxField('user1');
        $review->save();

        $review = oxNew('oxReview');
        $review->setId('id2');
        $review->oxreviews__oxuserid = new oxField('user1');
        $review->save();

        $review = oxNew('oxReview');
        $review->setId('id3');
        $review->oxreviews__oxuserid = new oxField('userNotMatched');
        $review->save();
    }

    private function getReviewDao()
    {
        return new oeGdprBaseReviewDao(
            $this->getDatabase()
        );
    }

    /**
     * @return DatabaseInterface
     */
    private function getDatabase()
    {
        return oxDb::getDb();
    }
}
