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

/**
 * @internal
 */
class oeGdprBaseUserReviewAndRatingService
{
    /**
     * @var oeGdprBaseUserReviewService
     */
    private $userReviewService;

    /**
     * @var oeGdprBaseUserRatingService
     */
    private $userRatingService;

    /**
     * @var oeGdprBaseReviewAndRatingMergingService
     */
    private $reviewAndRatingMergingService;

    /**
     * UserReviewAndRatingBridge constructor.
     *
     * @param oeGdprBaseUserReviewService             $userReviewService
     * @param oeGdprBaseUserRatingService             $userRatingService
     * @param oeGdprBaseReviewAndRatingMergingService $reviewAndRatingMergingService
     */
    public function __construct(
        oeGdprBaseUserReviewService              $userReviewService,
        oeGdprBaseUserRatingService              $userRatingService,
        oeGdprBaseReviewAndRatingMergingService  $reviewAndRatingMergingService
    ) {
        $this->userReviewService = $userReviewService;
        $this->userRatingService = $userRatingService;
        $this->reviewAndRatingMergingService = $reviewAndRatingMergingService;
    }

    /**
     * Get number of reviews by given user.
     *
     * @param string $userId
     *
     * @return int
     */
    public function getReviewAndRatingListCount($userId)
    {
        return count($this->getMergedReviewAndRatingList($userId));
    }

    /**
     * Returns array of User Ratings and Reviews.
     *
     * @param string $userId
     *
     * @return array
     */
    public function getReviewAndRatingList($userId)
    {
        $reviewAndRatingList = $this->getMergedReviewAndRatingList($userId);
        $reviewAndRatingList = $this->sortReviewAndRatingList($reviewAndRatingList);

        return $reviewAndRatingList;
    }

    /**
     * Returns merged Rating and Review.
     *
     * @param string $userId
     *
     * @return array
     */
    private function getMergedReviewAndRatingList($userId)
    {
        $reviews = $this->userReviewService->getReviews($userId);
        $ratings = $this->userRatingService->getRatings($userId);

        return $this
            ->reviewAndRatingMergingService
            ->mergeReviewAndRating($reviews, $ratings);
    }

    /**
     * Sorts oeGdprBaseReviewAndRating list.
     *
     * @param array $reviewAndRatingListArray
     *
     * @return array
     */
    private function sortReviewAndRatingList($reviewAndRatingListArray)
    {
        usort($reviewAndRatingListArray, function (oeGdprBaseReviewAndRating $first, oeGdprBaseReviewAndRating $second) {
            return $first->getCreatedAt() < $second->getCreatedAt() ? 1 : -1;
        });

        return $reviewAndRatingListArray;
    }
}
