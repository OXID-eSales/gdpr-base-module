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
 * @see oxUser
 */
class oeGdprBaseOxuser extends oeGdprBaseOxuser_parent
{
    /**
     * Returns true if User is mall admin.
     *
     * @return bool
     */
    public function oeGdprBaseIsMallAdmin()
    {
        return 'malladmin' === $this->oxuser__oxrights->value;
    }

    /**
     * Additionally deletes recommendations and reviews when user is deleted.
     *
     * @param string $id
     *
     * @throws Exception exceptions are re-thrown
     *
     * @return bool
     */
    public function delete($id = null)
    {
        try {
            $isDeleted = parent::delete($id);
            if ($isDeleted) {
                $database = oxDb::getDb();
                $this->oeGdprBaseDeleteRecommendationLists($database);
                $this->oeGdprBaseDeleteReviews($database);
                $this->oeGdprBaseDeleteRatings($database);
                $this->oeGdprBaseDeletePriceAlarms($database);
                $this->oeGdprBaseDeleteAcceptedTerms($database);
                $this->oeGdprBaseResetFetchModeToDefault();
            }
        } catch (Exception $exception) {
            $this->oeGdprBaseResetFetchModeToDefault();
            throw $exception;
        }

        return $isDeleted;
    }

    /**
     * Deletes recommendation lists.
     *
     * @param DatabaseInterface $database
     */
    protected function oeGdprBaseDeleteRecommendationLists($database)
    {
        $ids = $database->getCol(
            'SELECT oxid FROM oxrecommlists WHERE oxuserid = ? ',
            array($this->getId())
        );
        array_walk($ids, array($this, 'oeGdprBaseDeleteItemById'), 'oxrecommlist');
    }

    /**
     * Deletes User reviews.
     *
     * @param DatabaseInterface $database
     */
    protected function oeGdprBaseDeleteReviews(DatabaseInterface $database)
    {
        $ids = $database->getCol(
            'SELECT oxid FROM oxreviews WHERE oxuserid = ?',
            array($this->getId())
        );
        array_walk($ids, array($this, 'oeGdprBaseDeleteItemById'), 'oxreview');
    }

    /**
     * Deletes User ratings.
     *
     * @param DatabaseInterface $database
     */
    protected function oeGdprBaseDeleteRatings(DatabaseInterface $database)
    {
        $ids = $database->getCol(
            'SELECT oxid FROM oxratings WHERE oxuserid = ?',
            array($this->getId())
        );
        array_walk($ids, array($this, 'oeGdprBaseDeleteItemById'), 'oxrating');
    }

    /**
     * Deletes price alarms.
     *
     * @param DatabaseInterface $database
     */
    protected function oeGdprBaseDeletePriceAlarms(DatabaseInterface $database)
    {
        $ids = $database->getCol(
            'SELECT oxid FROM oxpricealarm WHERE oxuserid = ?',
            array($this->getId())
        );
        array_walk($ids, array($this, 'oeGdprBaseDeleteItemById'), 'oxpricealarm');
    }


    /**
     * Deletes user accepted terms.
     *
     * @param DatabaseInterface $database
     */
    protected function oeGdprBaseDeleteAcceptedTerms(DatabaseInterface $database)
    {
        $database->execute(
            'DELETE FROM oxacceptedterms WHERE oxuserid = ?',
            array($this->getId())
        );
    }


    /**
     * Callback function for array_walk to delete items using the delete method of the given model class
     *
     * @param string  $id        Id of the item to be deleted
     * @param integer $key       Key of the array
     * @param string  $className Model class to be used
     */
    protected function oeGdprBaseDeleteItemById($id, $key, $className)
    {
        /** @var oxBase $modelObject */
        $modelObject = oxNew($className);

        if ($modelObject->load($id)) {
            if ($this->_blMallUsers) {
                $modelObject->setIsDerived(false);
            }
            $modelObject->delete();
        }
    }

    /**
     * Reset the fetch mode of an open database connection to the one it is set by default.
     */
    protected function oeGdprBaseResetFetchModeToDefault()
    {
        oxDb::getDb();
    }
}
