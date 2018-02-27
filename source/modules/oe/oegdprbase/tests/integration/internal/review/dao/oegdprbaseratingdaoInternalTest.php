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

class oeGdprBaseRatingDaoInternalTest extends OxidTestCase
{
    public function testGetRatingsByUserId()
    {
        $ratingDao = $this->getRatingDao();

        $this->createTestRatingsForGetRatingsByUserIdTest();

        $ratings = $ratingDao->getRatingsByUserId('user1');

        $this->assertCount(2, $ratings);
    }

    public function testGetRatingsByProductId()
    {
        $ratingDao = $this->getRatingDao();

        $this->createTestRatingsForGetRatingsByProductIdTest();

        $ratings = $ratingDao->getRatingsByProductId('product1');

        $this->assertCount(2, $ratings);
    }

    public function testDeleteRating()
    {
        $this->createTestRatingsForDeleteRatingTest();

        $ratingDao = $this->getRatingDao();

        $ratingsBeforeDeletion = $ratingDao->getRatingsByUserId('user1');
        $ratingToDelete = $ratingsBeforeDeletion[0];

        $ratingDao->delete($ratingToDelete);

        $ratingsAfterDeletion = $ratingDao->getRatingsByUserId('user1');

        $this->assertNotContains(
            $ratingToDelete,
            $ratingsAfterDeletion
        );
    }

    private function createTestRatingsForDeleteRatingTest()
    {
        $rating = oxNew('oxRating');
        $rating->setId('id1');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id2');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->save();
    }

    private function createTestRatingsForGetRatingsByUserIdTest()
    {
        $rating = oxNew('oxRating');
        $rating->setId('id1');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id2');
        $rating->oxratings__oxuserid = new oxField('user1');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id3');
        $rating->oxratings__oxuserid = new oxField('userNotMatched');
        $rating->save();
    }

    private function createTestRatingsForGetRatingsByProductIdTest()
    {
        $rating = oxNew('oxRating');
        $rating->setId('id1');
        $rating->oxratings__oxobjectid = new oxField('product1');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id2');
        $rating->oxratings__oxobjectid = new oxField('product1');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id3');
        $rating->oxratings__oxobjectid = new oxField('productNotMatched');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id4');
        $rating->oxratings__oxobjectid = new oxField('product1');
        $rating->oxratings__oxtype = new oxField('oxrecommlist');
        $rating->save();

    }

    private function getRatingDao()
    {
        return new oeGdprBaseRatingDao(
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
