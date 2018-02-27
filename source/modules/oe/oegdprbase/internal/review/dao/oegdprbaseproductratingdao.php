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
class oeGdprBaseProductRatingDao
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
     * @param oeGdprBaseProductRating $productRating
     */
    public function update(oeGdprBaseProductRating $productRating)
    {
        $query = '
            UPDATE
                oxarticles
            SET
                OXRATING = ?,
                OXRATINGCNT = ?
            WHERE 
                OXID = ?
        ';

        $this->database->execute($query, array(
            $productRating->getRatingAverage(),
            $productRating->getRatingCount(),
            $productRating->getProductId(),
        ));
    }

    /**
     * @param string $productId
     *
     * @return oeGdprBaseProductRating
     */
    public function getProductRatingById($productId)
    {
        $this->validateProductId($productId);

        $productRatingData = $this->getProductRatingDataById($productId);

        return $this->mapProductRating($productRatingData);
    }

    /**
     * @param string $productId
     *
     * @return array
     */
    private function getProductRatingDataById($productId)
    {
        $this->database->setFetchMode(DatabaseInterface::FETCH_MODE_ASSOC);

        $query = '
              SELECT
                  OXID,
                  OXRATING,
                  OXRATINGCNT
              FROM 
                  oxarticles 
              WHERE 
                  oxid = ? 
              LIMIT 1
        ';

        return $this->database->getRow($query, array($productId));
    }

    /**
     * @param array $productRatingData
     *
     * @return oeGdprBaseProductRating
     */
    private function mapProductRating($productRatingData)
    {
        $productRating = new oeGdprBaseProductRating();
        $productRating
            ->setProductId($productRatingData['OXID'])
            ->setRatingAverage($productRatingData['OXRATING'])
            ->setRatingCount($productRatingData['OXRATINGCNT']);

        return $productRating;
    }

    /**
     * @param string $productId
     *
     * @throws oeGdprBaseInvalidObjectIdDaoException
     */
    private function validateProductId($productId)
    {
        if (empty($productId) || !is_string($productId)) {
            throw new oeGdprBaseInvalidObjectIdDaoException();
        }
    }
}
