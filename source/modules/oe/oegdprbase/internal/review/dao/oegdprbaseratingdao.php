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
class oeGdprBaseRatingDao
{
    /**
     * @var DatabaseInterface
     */
    private $database;

    /**
     * RatingDao constructor.
     *
     * @param DatabaseInterface $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * Returns User Ratings.
     *
     * @param string $userId
     *
     * @return array
     */
    public function getRatingsByUserId($userId)
    {
        $ratingsData = $this->getRatingsFromDatabaseByUserId($userId);

        return $this->mapRatings($ratingsData);
    }

    /**
     * @param oeGdprBaseRating $rating
     */
    public function delete(oeGdprBaseRating $rating)
    {
        $query = '
              DELETE 
              FROM 
                  oxratings 
              WHERE 
                  oxid = ?
        ';

        $this->database->execute($query, array($rating->getId()));
    }

    /**
     * Returns Ratings for a product.
     *
     * @param string $productId
     *
     * @return array
     */
    public function getRatingsByProductId($productId)
    {
        $ratingsData = $this->getRatingsFromDatabaseByProductId($productId);

        return $this->mapRatings($ratingsData);
    }

    /**
     * Returns User rating data from database.
     *
     * @param string $userId
     *
     * @return ResultSetInterface
     */
    private function getRatingsFromDatabaseByUserId($userId)
    {
        $this->database->setFetchMode(DatabaseInterface::FETCH_MODE_ASSOC);

        $query = '
              SELECT 
                  *
              FROM 
                  oxratings 
              WHERE 
                  oxuserid = ? 
              ORDER BY 
                  oxtimestamp DESC
        ';

        return $this->database->select($query, array($userId));
    }

    /**
     * Returns Ratings data for a product from database.
     *
     * @param string $productId
     *
     * @return ResultSetInterface
     */
    private function getRatingsFromDatabaseByProductId($productId)
    {
        $this->database->setFetchMode(DatabaseInterface::FETCH_MODE_ASSOC);

        $query = "
              SELECT 
                  *
              FROM 
                  oxratings 
              WHERE 
                  oxobjectid = ?
                  AND oxtype = 'oxarticle' 
              ORDER BY 
                  oxtimestamp DESC
        ";

        return $this->database->select($query, array($productId));
    }

    /**
     * Maps rating data from database to Ratings array.
     *
     * @param ResultSetInterface $ratingsData
     *
     * @return array
     */
    private function mapRatings($ratingsData)
    {
        $ratings = array();

        foreach ($ratingsData as $ratingData) {
            $ratings[] = $this->mapRating($ratingData);
        }

        return $ratings;
    }

    /**
     * Maps data from database to Rating.
     *
     * @param array $ratingData
     *
     * @return oeGdprBaseRating
     */
    private function mapRating($ratingData)
    {
        $rating = new oeGdprBaseRating();
        $rating
            ->setId($ratingData['OXID'])
            ->setRating($ratingData['OXRATING'])
            ->setObjectId($ratingData['OXOBJECTID'])
            ->setUserId($ratingData['OXUSERID'])
            ->setType($ratingData['OXTYPE'])
            ->setCreatedAt($ratingData['OXTIMESTAMP']);

        return $rating;
    }
}
