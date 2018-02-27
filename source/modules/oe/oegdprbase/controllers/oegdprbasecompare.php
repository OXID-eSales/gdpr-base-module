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
 * Class oeGdprBaseCompare
 *
 * Extends Compare.
 *
 * @see Compare
 */
class oeGdprBaseCompare extends oeGdprBaseCompare_parent
{
    /**
     * Return true, if the review manager should be shown.
     *
     * @return bool
     */
    public function oeGdprBaseIsUserAllowedToManageOwnReviews()
    {
        return (bool) $this
            ->getConfig()
            ->getConfigParam('blOeGdprBaseAllowUsersToManageReviews');
    }

    /**
     * Get the total number of reviews for the active user.
     *
     * @return integer Number of reviews
     */
    public function oeGdprBaseGetReviewAndRatingItemsCount()
    {
        $user = $this->getUser();
        $count = 0;
        if ($user) {
            $count = $this
                ->oeGdprBaseGetContainer()
                ->getUserReviewAndRatingBridge()
                ->getReviewAndRatingListCount($user->getId());
        }

        return $count;
    }

    /**
     * @return oeGdprBaseContainer
     */
    private function oeGdprBaseGetContainer()
    {
        return oeGdprBaseContainer::getInstance();
    }
}
