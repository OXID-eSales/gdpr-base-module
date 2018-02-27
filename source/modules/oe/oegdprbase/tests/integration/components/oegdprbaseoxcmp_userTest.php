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

class oeGdprBaseOxcmp_userTest extends OxidTestCase
{
    /**
     * @return array
     */
    public function providerDeleteShippingAddress()
    {
        return array(
            array('oxdefaultadmin', false),
            array('differentUserId', true),
        );
    }

    /**
     * @param string $userId
     * @param bool $isPossibleToLoadAddressAfterDeletion
     * @throws Exception
     *
     * @dataProvider providerDeleteShippingAddress
     */
    public function testDeleteShippingAddress($userId, $isPossibleToLoadAddressAfterDeletion)
    {
        $addressId = '_testAddressId';
        $this->addShippingAddress($userId, $addressId);
        $this->makeSessionTokenToPassValidation();
        $this->setRequestParam('oxaddressid', $addressId);
        $userComponent = oxNew('oxcmp_user');
        $userComponent->setUser($this->getUserForShippingAddressDeletion());

        $userComponent->oeGdprBaseDeleteShippingAddress();
        $this->assertSame($isPossibleToLoadAddressAfterDeletion, oxNew('oxAddress')->load($addressId));
    }

    /**
     * @param string $userId
     * @param string $addressId
     * @throws Exception
     */
    private function addShippingAddress($userId, $addressId)
    {
        $address = oxNew('oxAddress');
        $address->setId($addressId);
        $address->oxaddress__oxuserid = new oxField($userId);
        $address->save();
    }

    /**
     * @return oxUser
     */
    private function getUserForShippingAddressDeletion()
    {
        $user = oxNew('oxUser');
        $user->load('oxdefaultadmin');

        return $user;
    }

    private function makeSessionTokenToPassValidation()
    {
        $this->setSessionParam('sess_stoken', 'testToken');
        $this->setRequestParam('stoken', 'testToken');
    }
}
