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

use OxidEsales\Eshop\Core\Database\Adapter\ResultSetInterface;

/**
 * @internal
 */
class oeGdprBaseReviewDao
{
    /**
     * @var DatabaseInterface
     */
    private $database;

    /**
     * ReviewDao constructor.
     * @param DatabaseInterface $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * Returns User Reviews.
     *
     * @param string $userId
     *
     * @return array
     */
    public function getReviewsByUserId($userId)
    {
        $reviewsData = $this->getReviewsFromDatabaseByUserId($userId);

        return $this->mapReviews($reviewsData);
    }

    /**
     * @param oeGdprBaseReview $review
     */
    public function delete(oeGdprBaseReview $review)
    {
        $query = '
              DELETE 
              FROM 
                  oxreviews 
              WHERE 
                  oxid = ?
        ';

        $this->database->execute($query, array($review->getId()));
    }

    /**
     * Returns User Reviews from database.
     *
     * @param string $userId
     *
     * @return ResultSetInterface
     */
    private function getReviewsFromDatabaseByUserId($userId)
    {
        $this->database->setFetchMode(DatabaseInterface::FETCH_MODE_ASSOC);

        $query = '
              SELECT 
                  *
              FROM 
                  oxreviews 
              WHERE 
                  oxuserid = ? 
              ORDER BY 
                  oxcreate DESC
        ';

        return $this->database->select($query, array($userId));
    }

    /**
     * Maps rating data from database to Reviews array.
     *
     * @param ResultSetInterface $reviewsData
     *
     * @return array
     */
    private function mapReviews($reviewsData)
    {
        $reviews = array();

        foreach ($reviewsData as $reviewData) {
            $reviews[] = $this->mapReview($reviewData);
        }

        return $reviews;
    }

    /**
     * Maps data from database to Review.
     *
     * @param array $reviewData
     *
     * @return oeGdprBaseReview
     */
    private function mapReview($reviewData)
    {
        $review = new oeGdprBaseReview();
        $review
            ->setId($reviewData['OXID'])
            ->setRating($reviewData['OXRATING'])
            ->setText($reviewData['OXTEXT'])
            ->setObjectId($reviewData['OXOBJECTID'])
            ->setUserId($reviewData['OXUSERID'])
            ->setType($reviewData['OXTYPE'])
            ->setCreatedAt($reviewData['OXTIMESTAMP']);

        return $review;
    }
}
