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
class oeGdprBaseProductRatingService
{
    /**
     * @var oeGdprBaseRatingDao
     */
    private $ratingDao;

    /**
     * @var oeGdprBaseProductRatingDao
     */
    private $productRatingDao;

    /**
     * @var oeGdprBaseRatingCalculatorService
     */
    private $ratingCalculator;

    /**
     * oeGdprBaseProductRatingService constructor.
     *
     * @param oeGdprBaseRatingDao               $ratingDao
     * @param oeGdprBaseProductRatingDao        $productRatingDao
     * @param oeGdprBaseRatingCalculatorService $ratingCalculator
     */
    public function __construct(
        oeGdprBaseRatingDao                  $ratingDao,
        oeGdprBaseProductRatingDao           $productRatingDao,
        oeGdprBaseRatingCalculatorService    $ratingCalculator
    ) {
        $this->ratingDao = $ratingDao;
        $this->productRatingDao = $productRatingDao;
        $this->ratingCalculator = $ratingCalculator;
    }

    /**
     * @param string $productId
     */
    public function updateProductRating($productId)
    {
        $ratings = $this
            ->ratingDao
            ->getRatingsByProductId($productId);

        $ratingAverage = $this
            ->ratingCalculator
            ->getAverage($ratings);

        $ratingCount = count($ratings);

        $productRating = $this->productRatingDao->getProductRatingById($productId);
        $productRating
            ->setRatingAverage($ratingAverage)
            ->setRatingCount($ratingCount);

        $this->productRatingDao->update($productRating);
    }
}
