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
class oeGdprBaseReviewAndRatingMergingService
{
    /**
     * Merges oeGdprBaseReviews and oeGdprBaseRatings to array of oeGdprBaseReviewAndRating view objects.
     *
     * @param array $reviews
     * @param array $ratings
     *
     * @return array
     */
    public function mergeReviewAndRating($reviews, $ratings)
    {
        $ratingAndReviewList = array_merge(
            $this->getReviewDataWithRating($reviews, $ratings),
            $this->getRatingWithoutReviewData($reviews, $ratings)
        );

        return $this->mapReviewAndRatingList($ratingAndReviewList);
    }

    /**
     * @param array $reviews
     * @param array $ratings
     *
     * @return array
     */
    private function getReviewDataWithRating($reviews, $ratings)
    {
        $reviewList = array();

        foreach ($reviews as $review) {
            $ratingAndReview = array(
                'reviewId'      => $review->getId(),
                'text'          => $review->getText(),
                'createdAt'     => $review->getCreatedAt(),
                'objectId'      => $review->getObjectId(),
                'objectType'    => $review->getType(),
                'rating'        => false,
                'ratingId'      => false,
            );

            foreach ($ratings as $rating) {
                if ($this->isReviewRating($review, $rating)) {
                    $ratingAndReview['rating'] = $rating->getRating();
                    $ratingAndReview['ratingId'] = $rating->getId();

                    break;
                }
            }

            $reviewList[] = $ratingAndReview;
        }

        return $reviewList;
    }

    /**
     * @param array $reviews
     * @param array $ratings
     *
     * @return array
     */
    private function getRatingWithoutReviewData($reviews, $ratings)
    {
        $ratingList = array();

        foreach ($ratings as $rating) {
            if ($this->isRatingWithoutReview($rating, $reviews)) {
                $ratingList[] = array(
                    'ratingId'      => $rating->getId(),
                    'reviewId'      => false,
                    'rating'        => $rating->getRating(),
                    'text'          => false,
                    'objectId'      => $rating->getObjectId(),
                    'objectType'    => $rating->getType(),
                    'createdAt'     => $rating->getCreatedAt(),
                );
            }
        }

        return $ratingList;
    }

    /**
     * Returns true if Rating doesn't belong to any review.
     *
     * @param oeGdprBaseRating $rating
     * @param array            $reviews
     *
     * @return bool
     */
    private function isRatingWithoutReview(oeGdprBaseRating $rating, array $reviews)
    {
        $withoutReview = true;

        foreach ($reviews as $review) {
            if ($this->isReviewRating($review, $rating)) {
                $withoutReview = false;
                break;
            }
        }

        return $withoutReview;
    }

    /**
     * Returns true if Rating belongs to Review.
     *
     * @param oeGdprBaseReview $review
     * @param oeGdprBaseRating $rating
     *
     * @return bool
     */
    private function isReviewRating(oeGdprBaseReview $review, oeGdprBaseRating $rating)
    {
        return $rating->getType() === $review->getType()
            && $rating->getObjectId() === $review->getObjectId()
            && $rating->getRating() === $review->getRating()
            && $rating->getUserId() === $review->getUserId();
    }

    /**
     * Maps Reviews and Ratings data to array of oeGdprBaseReviewAndRating view objects.
     *
     * @param array $reviewAndRatingDataList
     *
     * @return array
     */
    private function mapReviewAndRatingList($reviewAndRatingDataList)
    {
        $mappedReviewAndRating = array();

        foreach ($reviewAndRatingDataList as $reviewAndRatingData) {
            $mappedReviewAndRating[] = $this->mapReviewAndRating($reviewAndRatingData);
        }

        return $mappedReviewAndRating;
    }

    /**
     * Maps Review and Rating data to oeGdprBaseReviewAndRating view object.
     *
     * @param array $reviewAndRatingData
     *
     * @return oeGdprBaseReviewAndRating
     */
    private function mapReviewAndRating($reviewAndRatingData)
    {
        $reviewAndRating = new oeGdprBaseReviewAndRating();
        $reviewAndRating
            ->setReviewId($reviewAndRatingData['reviewId'])
            ->setRatingId($reviewAndRatingData['ratingId'])
            ->setRating($reviewAndRatingData['rating'])
            ->setReviewText($reviewAndRatingData['text'])
            ->setObjectId($reviewAndRatingData['objectId'])
            ->setObjectType($reviewAndRatingData['objectType'])
            ->setCreatedAt($reviewAndRatingData['createdAt']);

        return $reviewAndRating;
    }
}
