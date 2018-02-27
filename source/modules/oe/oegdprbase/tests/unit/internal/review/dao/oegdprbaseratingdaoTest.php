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

class oeGdprBaseRatingDaoTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRatingsByUserIdReturnType()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByUserId(1);

        $this->assertInternalType(
            'array',
            $ratings
        );
    }

    public function testGetRatingsByUserIdReturnsCorrectAmountOfEntities()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByUserId(1);

        $this->assertCount(2, $ratings);
    }

    public function testGetRatingsByUserIdReturnsMappedRatings()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByUserId(1);

        $this->assertEquals(
            $this->getTestMappedRating(),
            $ratings[0]
        );
    }

    public function testGetRatingsByProductIdReturnType()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByProductId(1);

        $this->assertInternalType(
            'array',
            $ratings
        );
    }

    public function testGetRatingsByProductIdReturnsCorrectAmountOfEntities()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByProductId(1);

        $this->assertCount(2, $ratings);
    }

    public function testGetRatingsByProductIdReturnsMappedRatings()
    {
        $ratingDao = new oeGdprBaseRatingDao($this->getDatabaseMock());
        $ratings = $ratingDao->getRatingsByProductId(1);

        $this->assertEquals(
            $this->getTestMappedRating(),
            $ratings[0]
        );
    }

    private function getDatabaseMock()
    {
        $database = $this
            ->getMockBuilder('oxLegacyDb')
            ->getMock();

        $database
            ->method('select')
            ->willReturn($this->getTestRatingsDatabaseData());

        return $database;
    }

    private function getTestRatingsDatabaseData()
    {
        return array(
            array(
                'OXID'          => '1',
                'OXRATING'      => '5',
                'OXOBJECTID'    => '1',
                'OXUSERID'      => '1',
                'OXTYPE'        => 'article',
                'OXTIMESTAMP'   => '2018-03-06 11:48:47',
            ),
            array(
                'OXID'          => '2',
                'OXRATING'      => '4',
                'OXOBJECTID'    => '2',
                'OXUSERID'      => '1',
                'OXTYPE'        => 'article',
                'OXTIMESTAMP'   => '2018-03-06 11:48:48',
            ),
        );
    }

    public function getTestMappedRating()
    {
        $rating = new oeGdprBaseRating();
        $rating
            ->setId(1)
            ->setRating(5)
            ->setObjectId(1)
            ->setUserId(1)
            ->setType('article')
            ->setCreatedAt('2018-03-06 11:48:47');

        return $rating;
    }
}
