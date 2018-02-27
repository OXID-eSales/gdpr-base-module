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
class oeGdprBaseUserReviewBridge
{
    /**
     * @var oeGdprBaseUserReviewService
     */
    private $userReviewService;

    /**
     * UserReviewBridge constructor.
     *
     * @param oeGdprBaseUserReviewService $userReviewService
     */
    public function __construct(
        oeGdprBaseUserReviewService $userReviewService
    ) {
        $this->userReviewService = $userReviewService;
    }

    /**
     * Delete a Review.
     *
     * @param string $userId
     * @param string $reviewId
     */
    public function deleteReview($userId, $reviewId)
    {
        $review = $this->getReviewById($reviewId);

        $this->verifyUserPermissionsToManageReview($review, $userId);

        $review->delete();
    }

    /**
     * @param oxReview $review
     * @param string $userId
     *
     * @throws oeGdprBaseReviewPermissionException
     */
    private function verifyUserPermissionsToManageReview(oxReview $review, $userId)
    {
        if ($review->oxreviews__oxuserid->value !== $userId) {
            throw new oeGdprBaseReviewPermissionException();
        }
    }

    /**
     * @param string $reviewId
     *
     * @return oxReview
     * @throws oeGdprBaseEntryDoesNotExistDaoException
     */
    private function getReviewById($reviewId)
    {
        $review = oxNew('oxReview');
        $doesReviewExist = $review->load($reviewId);

        if (!$doesReviewExist) {
            throw new oeGdprBaseEntryDoesNotExistDaoException();
        }

        return $review;
    }
}
