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
class oeGdprBaseReviewAndRating
{
    /**
     * @var string
     */
    private $reviewId;

    /**
     * @var string
     */
    private $ratingId;

    /**
     * @var int
     */
    private $rating;

    /**
     * @var string
     */
    private $reviewText;

    /**
     * @var string
     */
    private $objectId;

    /**
     * @var string
     */
    private $objectType;

    /**
     * @var string
     */
    private $objectTitle;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setReviewId($id)
    {
        $this->reviewId = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getReviewId()
    {
        return $this->reviewId;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setRatingId($id)
    {
        $this->ratingId = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getRatingId()
    {
        return $this->ratingId;
    }

    /**
     * @param int $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $reviewText
     *
     * @return $this
     */
    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;

        return $this;
    }

    /**
     * @return string
     */
    public function getReviewText()
    {
        return $this->reviewText;
    }

    /**
     * @param string $objectId
     *
     * @return $this
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param string $objectType
     *
     * @return $this
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param string $objectTitle
     *
     * @return $this
     */
    public function setObjectTitle($objectTitle)
    {
        $this->objectTitle = $objectTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getObjectTitle()
    {
        return $this->objectTitle;
    }

    /**
     * @param string $date
     *
     * @return $this
     */
    public function setCreatedAt($date)
    {
        $this->createdAt = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
