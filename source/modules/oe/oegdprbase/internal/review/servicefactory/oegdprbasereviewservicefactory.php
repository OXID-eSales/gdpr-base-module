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
class oeGdprBaseReviewServiceFactory
{
    /**
     * @var oeGdprBaseUserReviewAndRatingBridge
     */
    private $userReviewAndRatingBridge;

    /**
     * @var oeGdprBaseProductRatingBridge
     */
    private $productRatingBridge;

    /**
     * @var oeGdprBaseUserReviewBridge
     */
    private $userReviewBridge;

    /**
     * @var oeGdprBaseUserRatingBridge
     */
    private $userRatingBridge;

    /**
     * @var oeGdprBaseUserReviewAndRatingService
     */
    private $userReviewAndRatingService;

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
     * @var oeGdprBaseProductRatingService
     */
    private $productRatingService;

    /**
     * @var oeGdprBaseReviewDao
     */
    private $reviewDao;

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
     * @return oeGdprBaseUserReviewAndRatingBridge
     */
    public function getUserReviewAndRatingBridge()
    {
        if (!$this->userReviewAndRatingBridge) {
            $this->userReviewAndRatingBridge = new oeGdprBaseUserReviewAndRatingBridge(
                $this->getUserReviewAndRatingService()
            );
        }

        return $this->userReviewAndRatingBridge;
    }

    /**
     * @return oeGdprBaseProductRatingBridge
     */
    public function getProductRatingBridge()
    {
        if (!$this->productRatingBridge) {
            $this->productRatingBridge = new oeGdprBaseProductRatingBridge(
                $this->getProductRatingService()
            );
        }

        return $this->productRatingBridge;
    }

    /**
     * @return oeGdprBaseUserRatingBridge
     */
    public function getUserRatingBridge()
    {
        if (!$this->userRatingBridge) {
            $this->userRatingBridge = new oeGdprBaseUserRatingBridge(
                $this->getUserRatingService()
            );
        }

        return $this->userRatingBridge;
    }

    /**
     * @return oeGdprBaseUserReviewBridge
     */
    public function getUserReviewBridge()
    {
        if (!$this->userReviewBridge) {
            $this->userReviewBridge = new oeGdprBaseUserReviewBridge(
                $this->getUserReviewService()
            );
        }

        return $this->userReviewBridge;
    }

    /**
     * @return oeGdprBaseProductRatingService
     */
    private function getProductRatingService()
    {
        if (!$this->productRatingService) {
            $this->productRatingService = new oeGdprBaseProductRatingService(
                $this->getRatingDao(),
                $this->getProductRatingDao(),
                $this->getRatingCalculator()
            );
        }

        return $this->productRatingService;
    }

    /**
     * @return oeGdprBaseProductRatingDao
     */
    private function getProductRatingDao()
    {
        if (!$this->productRatingDao) {
            $this->productRatingDao = new oeGdprBaseProductRatingDao($this->getDatabase());
        }

        return $this->productRatingDao;
    }

    /**
     * @return oeGdprBaseRatingCalculatorService
     */
    private function getRatingCalculator()
    {
        if (!$this->ratingCalculator) {
            $this->ratingCalculator = new oeGdprBaseRatingCalculatorService();
        }

        return $this->ratingCalculator;
    }

    /**
     * @return oeGdprBaseUserReviewAndRatingService
     */
    private function getUserReviewAndRatingService()
    {
        if (!$this->userReviewAndRatingService) {
            $this->userReviewAndRatingService = new oeGdprBaseUserReviewAndRatingService(
                $this->getUserReviewService(),
                $this->getUserRatingService(),
                $this->getReviewAndRatingMergingService()
            );
        }

        return $this->userReviewAndRatingService;
    }

    /**
     * @return oeGdprBaseUserReviewService
     */
    private function getUserReviewService()
    {
        if (!$this->userReviewService) {
            $this->userReviewService = new oeGdprBaseUserReviewService(
                $this->getReviewDao()
            );
        }

        return $this->userReviewService;
    }

    /**
     * @return oeGdprBaseReviewDao
     */
    private function getReviewDao()
    {
        if (!$this->reviewDao) {
            $this->reviewDao = new oeGdprBaseReviewDao(
                $this->getDatabase()
            );
        }

        return $this->reviewDao;
    }

    /**
     * @return oeGdprBaseUserRatingService
     */
    private function getUserRatingService()
    {
        if (!$this->userRatingService) {
            $this->userRatingService = new oeGdprBaseUserRatingService(
                $this->getRatingDao()
            );
        }

        return $this->userRatingService;
    }

    /**
     * @return oeGdprBaseRatingDao
     */
    private function getRatingDao()
    {
        if (!$this->ratingDao) {
            $this->ratingDao = new oeGdprBaseRatingDao(
                $this->getDatabase()
            );
        }

        return $this->ratingDao;
    }

    /**
     * @return oeGdprBaseReviewAndRatingMergingService
     */
    private function getReviewAndRatingMergingService()
    {
        if (!$this->reviewAndRatingMergingService) {
            $this->reviewAndRatingMergingService = new oeGdprBaseReviewAndRatingMergingService();
        }

        return $this->reviewAndRatingMergingService;
    }

    /**
     * @return DatabaseInterface
     */
    private function getDatabase()
    {
        return oxDb::getDb();
    }
}
