<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link          http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2018
 * @version       OXID eShop CE
 */

class oeGdprBaseOxratingTest extends OxidTestCase
{
    public function testUpdateProductRatingOnRatingDelete()
    {
        $this->createTestProduct();
        $this->createTestRatings();

        $rating = oxNew('oxRating');
        $rating->load('id3');
        $rating->delete();

        $product = oxNew('oxArticle');
        $product->load('testId');

        $this->assertEquals(
            2,
            $product->oxarticles__oxratingcnt->value
        );

        $this->assertEquals(
            1.5,
            $product->oxarticles__oxrating->value
        );
    }

    public function testUpdateProductRatingOnRatingDeleteWhenAllRatingsForProductAreDeleted()
    {
        $this->createTestProduct();
        $this->createTestRatings();

        $rating = oxNew('oxRating');

        $rating->load('id1');
        $rating->delete();

        $rating->load('id2');
        $rating->delete();

        $rating->load('id3');
        $rating->delete();

        $product = oxNew('oxArticle');
        $product->load('testId');

        $this->assertEquals(
            0,
            $product->oxarticles__oxratingcnt->value
        );

        $this->assertEquals(
            0,
            $product->oxarticles__oxrating->value
        );
    }

    private function createTestProduct()
    {
        $product = oxNew('oxArticle');
        $product->setId('testId');
        $product->oxarticles__oxrating = new oxField(2);
        $product->oxarticles__oxratingcnt = new oxField(3);
        $product->save();
    }

    private function createTestRatings()
    {
        $rating = oxNew('oxRating');
        $rating->setId('id1');
        $rating->oxratings__oxobjectid = new oxField('testId');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->oxratings__oxrating = new oxField(1);
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id2');
        $rating->oxratings__oxobjectid = new oxField('testId');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->oxratings__oxrating = new oxField(2);
        $rating->save();

        $rating = oxNew('oxRating');
        $rating->setId('id3');
        $rating->oxratings__oxobjectid = new oxField('testId');
        $rating->oxratings__oxtype = new oxField('oxarticle');
        $rating->oxratings__oxrating = new oxField(3);
        $rating->save();
    }
}
