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

class oeGdprBaseOxreviewTest extends OxidTestCase
{
    public function testReviewAndRatingListByUserId()
    {
        $review = oxNew('oxReview');
        $review->setId('id1');
        $review->oxreviews__oxactive = new oxField(1);
        $review->oxreviews__oxuserid = new oxField('testUser');
        $review->oxreviews__oxobjectid = new oxField('xx1');
        $review->oxreviews__oxtype = new oxField('oxarticle');
        $review->oxreviews__oxtext = new oxField('revtext');
        $review->save();

        $review = oxNew('oxReview');
        $review->setId('id2');
        $review->oxreviews__oxactive = new oxField(1);
        $review->oxreviews__oxuserid = new oxField('testUser');
        $review->oxreviews__oxobjectid = new oxField('xx2');
        $review->oxreviews__oxtype = new oxField('oxrecommlist');
        $review->oxreviews__oxtext = new oxField('revtext');
        $review->save();

        $rating = oxNew('oxRating');
        $rating->oxratings__oxuserid = new oxField('testUser');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->save();

        $review = oxNew('oxReview');

        $reviewAndRatingList = $review->oeGdprBaseGetReviewAndRatingListByUserId('testUser');

        $this->assertEquals(
            3,
            count($reviewAndRatingList)
        );

        $this->assertInstanceOf(
            'oeGdprBaseReviewAndRating',
            $reviewAndRatingList[0]
        );
    }

    public function testReviewAndRatingListByUserIdWithWrongRatingType()
    {
        $this->setExpectedException('oeGdprBaseReviewAndRatingObjectTypeException');

        $rating = oxNew('oxRating');
        $rating->oxratings__oxuserid = new oxField('testUser');
        $rating->oxratings__oxtype = new oxField('wrong_type');
        $rating->save();

        $review = oxNew('oxReview');

        $review->oeGdprBaseGetReviewAndRatingListByUserId('testUser');
    }    
}
