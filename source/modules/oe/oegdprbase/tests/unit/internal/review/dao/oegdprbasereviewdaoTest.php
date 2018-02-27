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

class oeGdprBaseReviewDaoTest extends \PHPUnit_Framework_TestCase
{
    public function testGetReviewsByUserIdReturnType()
    {
        $reviewDao = new oeGdprBaseReviewDao($this->getDatabaseMock());
        $reviews = $reviewDao->getReviewsByUserId(1);

        $this->assertInternalType(
            'array',
            $reviews
        );
    }

    public function testGetReviewsByUserIdReturnsCorrectAmountOfEntities()
    {
        $reviewDao = new oeGdprBaseReviewDao($this->getDatabaseMock());
        $reviews = $reviewDao->getReviewsByUserId(1);

        $this->assertCount(2, $reviews);
    }

    public function testGetReviewsByUserIdReturnsMappedReviews()
    {
        $reviewDao = new oeGdprBaseReviewDao($this->getDatabaseMock());
        $reviews = $reviewDao->getReviewsByUserId(1);

        $this->assertEquals(
            $this->getTestMappedReview(),
            $reviews[0]
        );
    }

    private function getDatabaseMock()
    {
        $database = $this
            ->getMockBuilder('oxLegacyDb')
            ->getMock();

        $database
            ->method('select')
            ->willReturn($this->getTestReviewsDatabaseData());

        return $database;
    }

    private function getTestReviewsDatabaseData()
    {
        return array(
            array(
                'OXID'          => '1',
                'OXRATING'      => '5',
                'OXOBJECTID'    => '1',
                'OXUSERID'      => '1',
                'OXTEXT'        => 'Test text',
                'OXTYPE'        => 'article',
                'OXTIMESTAMP'   => '2018-03-06 11:48:47',
            ),
            array(
                'OXID'          => '2',
                'OXRATING'      => '4',
                'OXOBJECTID'    => '2',
                'OXTEXT'        => 'Test text',
                'OXUSERID'      => '1',
                'OXTYPE'        => 'article',
                'OXTIMESTAMP'   => '2018-03-06 11:48:48',
            ),
        );
    }

    public function getTestMappedReview()
    {
        $review = new oeGdprBaseReview();
        $review
            ->setId(1)
            ->setRating(5)
            ->setObjectId(1)
            ->setUserId(1)
            ->setText('Test text')
            ->setType('article')
            ->setCreatedAt('2018-03-06 11:48:47');

        return $review;
    }
}
