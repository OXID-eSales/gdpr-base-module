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

class oeGdprBaseUserReviewAndRatingServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testReviewAndRatingListSorting()
    {
        $reviewAndRatingMergingServiceMock = $this
            ->getMockBuilder('oeGdprBaseReviewAndRatingMergingService')
            ->getMock();

        $reviewAndRatingMergingServiceMock
            ->method('mergeReviewAndRating')
            ->willReturn($this->getUnsortedReviewAndRatingList());

        $userReviewAndRatingService = new oeGdprBaseUserReviewAndRatingService(
            $this->getUserReviewServiceMock(),
            $this->getUserRatingServiceMock(),
            $reviewAndRatingMergingServiceMock
        );

        $this->assertEquals(
            $this->getSortedReviewAndRatingList(),
            $userReviewAndRatingService->getReviewAndRatingList(1)
        );
    }

    public function testReviewAndRatingListCount()
    {
        $reviewAndRatingMergingServiceMock = $this
            ->getMockBuilder('oeGdprBaseReviewAndRatingMergingService')
            ->getMock();

        $reviewAndRatingMergingServiceMock
            ->method('mergeReviewAndRating')
            ->willReturn($this->getUnsortedReviewAndRatingList());

        $userReviewAndRatingService = new oeGdprBaseUserReviewAndRatingService(
            $this->getUserReviewServiceMock(),
            $this->getUserRatingServiceMock(),
            $reviewAndRatingMergingServiceMock
        );

        $this->assertEquals(
            count($this->getSortedReviewAndRatingList()),
            $userReviewAndRatingService->getReviewAndRatingListCount(1)
        );
    }

    private function getUserReviewServiceMock()
    {
        $userReviewService = $this
            ->getMockBuilder('oeGdprBaseUserReviewService')
            ->disableOriginalConstructor()
            ->getMock();

        $userReviewService
            ->method('getReviews')
            ->willReturn(array());

        return $userReviewService;
    }

    private function getUserRatingServiceMock()
    {
        $userRatingService = $this
            ->getMockBuilder('oeGdprBaseUserRatingService')
            ->disableOriginalConstructor()
            ->getMock();

        $userRatingService
            ->method('getRatings')
            ->willReturn(array());

        return $userRatingService;
    }

    private function getUnsortedReviewAndRatingList()
    {
        return array(
            $this->getFirstReviewAndRating(),
            $this->getThirdReviewAndRating(),
            $this->getSecondReviewAndRating(),
        );
    }

    private function getSortedReviewAndRatingList()
    {
        return array(
            $this->getThirdReviewAndRating(),
            $this->getSecondReviewAndRating(),
            $this->getFirstReviewAndRating(),
        );
    }

    private function getFirstReviewAndRating()
    {
        $reviewAndRating = new oeGdprBaseReviewAndRating();
        $reviewAndRating->setCreatedAt('2011-02-16 15:21:20');

        return $reviewAndRating;
    }

    private function getSecondReviewAndRating()
    {
        $reviewAndRating = new oeGdprBaseReviewAndRating();
        $reviewAndRating->setCreatedAt('2017-02-16 15:21:20');

        return $reviewAndRating;
    }

    private function getThirdReviewAndRating()
    {
        $reviewAndRating = new oeGdprBaseReviewAndRating();
        $reviewAndRating->setCreatedAt('2018-02-16 15:21:20');

        return $reviewAndRating;
    }
}
