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
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'oegdprbase',
    'title'       => array(
        'de' => 'GDPR Base',
        'en' => 'GDPR Base',
    ),
    'description' => array(
        'de' => 'Das Modul stellt Basisfunktionalit&auml;t f&uuml;r die Datenschutz-Grundverordnung (DSGVO) bereit',
        'en' => 'This module provides the basic functionality for the European General Data Protection Regulation (GDPR)',
    ),
    'thumbnail'   => 'out/pictures/logo.png',
    'version'     => '1.0.0',
    'author'      => 'OXID eSales AG',
    'url'         => 'https://www.oxid-esales.com/',
    'email'       => 'info@oxid-esales.com',
    'extend' => array(
        'suggest'            => 'oe/oegdprbase/controllers/oegdprbaserecommend',
        'account'            => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_password'   => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_newsletter' => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_user'       => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_order'      => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_noticelist' => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_wishlist'   => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_downloads'  => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'account_recommlist' => 'oe/oegdprbase/controllers/oegdprbaseaccount',
        'compare'            => 'oe/oegdprbase/controllers/oegdprbasecompare',
        'oxcmp_user'         => 'oe/oegdprbase/components/oegdprbaseoxcmp_user',
        'oxrating'           => 'oe/oegdprbase/models/oegdprbaseoxrating',
        'oxreview'           => 'oe/oegdprbase/models/oegdprbaseoxreview',
        'oxuser'             => 'oe/oegdprbase/models/oegdprbaseoxuser',
        'oxviewconfig'       => 'oe/oegdprbase/core/oegdprbaseviewconfig',
    ),
    'files' => array(
        'oegdprbasemodule'                  => 'oe/oegdprbase/core/oegdprbasemodule.php',
        'oegdprbaseaccountreviewcontroller' => 'oe/oegdprbase/controllers/oegdprbaseaccountreviewcontroller.php',

        //Internal
        'oegdprbasecontainer'                           => 'oe/oegdprbase/internal/common/oegdprbasecontainer.php',
        'oegdprbaseentrydoesnotexistdaoexception'       => 'oe/oegdprbase/internal/common/exception/oegdprbaseentrydoesnotexistdaoexception.php',
        'oegdprbaseinvalidobjectiddaoexception'         => 'oe/oegdprbase/internal/common/exception/oegdprbaseinvalidobjectiddaoexception.php',
        'oegdprbaseproductratingbridge'                 => 'oe/oegdprbase/internal/review/bridge/oegdprbaseproductratingbridge.php',
        'oegdprbaseuserratingbridge'                    => 'oe/oegdprbase/internal/review/bridge/oegdprbaseuserratingbridge.php',
        'oegdprbaseuserreviewandratingbridge'           => 'oe/oegdprbase/internal/review/bridge/oegdprbaseuserreviewandratingbridge.php',
        'oegdprbaseuserreviewbridge'                    => 'oe/oegdprbase/internal/review/bridge/oegdprbaseuserreviewbridge.php',
        'oegdprbaseproductratingdao'                    => 'oe/oegdprbase/internal/review/dao/oegdprbaseproductratingdao.php',
        'oegdprbaseratingdao'                           => 'oe/oegdprbase/internal/review/dao/oegdprbaseratingdao.php',
        'oegdprbasereviewdao'                           => 'oe/oegdprbase/internal/review/dao/oegdprbasereviewdao.php',
        'oegdprbaseproductrating'                       => 'oe/oegdprbase/internal/review/dataobject/oegdprbaseproductrating.php',
        'oegdprbaserating'                              => 'oe/oegdprbase/internal/review/dataobject/oegdprbaserating.php',
        'oegdprbasereview'                              => 'oe/oegdprbase/internal/review/dataobject/oegdprbasereview.php',
        'oegdprbaseratingpermissionexception'           => 'oe/oegdprbase/internal/review/exception/oegdprbaseratingpermissionexception.php',
        'oegdprbasereviewandratingobjecttypeexception'  => 'oe/oegdprbase/internal/review/exception/oegdprbasereviewandratingobjecttypeexception.php',
        'oegdprbasereviewpermissionexception'           => 'oe/oegdprbase/internal/review/exception/oegdprbasereviewpermissionexception.php',
        'oegdprbaseproductratingservice'                => 'oe/oegdprbase/internal/review/service/oegdprbaseproductratingservice.php',
        'oegdprbaseratingcalculatorservice'             => 'oe/oegdprbase/internal/review/service/oegdprbaseratingcalculatorservice.php',
        'oegdprbasereviewandratingmergingservice'       => 'oe/oegdprbase/internal/review/service/oegdprbasereviewandratingmergingservice.php',
        'oegdprbaseuserratingservice'                   => 'oe/oegdprbase/internal/review/service/oegdprbaseuserratingservice.php',
        'oegdprbaseuserreviewandratingservice'          => 'oe/oegdprbase/internal/review/service/oegdprbaseuserreviewandratingservice.php',
        'oegdprbaseuserreviewservice'                   => 'oe/oegdprbase/internal/review/service/oegdprbaseuserreviewservice.php',
        'oegdprbasereviewservicefactory'                => 'oe/oegdprbase/internal/review/servicefactory/oegdprbasereviewservicefactory.php',
        'oegdprbasereviewandrating'                     => 'oe/oegdprbase/internal/review/viewdataobject/oegdprbasereviewandrating.php',
    ),
    'templates' => array(
        'oegdprbasedashboard_azure.tpl'                            => 'oe/oegdprbase/views/blocks/page/account/oegdprbasedashboard_azure.tpl',
        'oegdprbasedashboard_flow.tpl'                             => 'oe/oegdprbase/views/blocks/page/account/oegdprbasedashboard_flow.tpl',
        'oegdprbaseaccountreviewaccount_menu_azure.tpl'            => 'oe/oegdprbase/views/blocks/page/account/inc/oegdprbaseaccountreviewaccount_menu_azure.tpl',
        'oegdprbaseaccountreviewaccount_menu_flow.tpl'             => 'oe/oegdprbase/views/blocks/page/account/inc/oegdprbaseaccountreviewaccount_menu_flow.tpl',
        'oegdprbasedeletemyaccountconfirmation_azure_modal.tpl'    => 'oe/oegdprbase/views/blocks/page/account/oegdprbasedeletemyaccountconfirmation_azure_modal.tpl',
        'oegdprbasedeletemyaccountconfirmation_flow_modal.tpl'     => 'oe/oegdprbase/views/blocks/page/account/oegdprbasedeletemyaccountconfirmation_flow_modal.tpl',
        'oegdprbaseaccountreviewcontroller.tpl'                    => 'oe/oegdprbase/views/blocks/page/account/oegdprbaseaccountreviewcontroller.tpl',
        'oegdprbaseaccountreviewcontroller_azure.tpl'              => 'oe/oegdprbase/views/blocks/page/account/oegdprbaseaccountreviewcontroller_azure.tpl',
        'oegdprbaseaccountreviewcontroller_flow.tpl'               => 'oe/oegdprbase/views/blocks/page/account/oegdprbaseaccountreviewcontroller_flow.tpl',
        'oegdprbaseaccountreviewcontroller_confirmation_azure.tpl' => 'oe/oegdprbase/views/blocks/page/account/oegdprbaseaccountreviewcontroller_confirmation_azure.tpl',
        'oegdprbaseaccountreviewcontroller_confirmation_flow.tpl'  => 'oe/oegdprbase/views/blocks/page/account/oegdprbaseaccountreviewcontroller_confirmation_flow.tpl',
    ),
    'blocks'      => array(
        array('template' => 'layout/base.tpl', 'block'=>'base_style', 'file'=>'/views/blocks/layout/base.tpl'),
        array('template' => 'form/fieldset/user_shipping.tpl', 'block'=>'form_user_shipping_address_select', 'file' => '/views/blocks/form/fieldset/user_shipping.tpl'),
        array('template' => 'form/user.tpl', 'block'=>'user', 'file' => '/views/blocks/form/delete_shipping_address_modal.tpl'),
        array('template' => 'form/user_checkout_change.tpl', 'block'=>'user_checkout_change', 'file' => '/views/blocks/form/delete_shipping_address_modal.tpl'),
        array('template' => 'form/user_checkout_noregistration.tpl', 'block'=>'user_checkout_noregistration', 'file' => '/views/blocks/form/delete_shipping_address_modal.tpl'),
        array('template' => 'form/user_checkout_registration.tpl', 'block'=>'user_checkout_registration', 'file' => '/views/blocks/form/delete_shipping_address_modal.tpl'),
        array('template' => 'page/account/dashboard.tpl', 'block'=>'account_dashboard_col2', 'file' => '/views/blocks/page/account/dashboard.tpl'),
        array('template' => 'page/account/inc/account_menu.tpl', 'block'=>'account_menu', 'file' => '/views/blocks/page/account/inc/account_menu.tpl'),
        array('template' => 'page/details/inc/productmain.tpl', 'block'=>'details_productmain_productlinks', 'file' => '/views/blocks/page/details/inc/productmain.tpl'),
    ),
    'settings' => array(
        array(
            'group' => 'oegdprbase_account_settings',
            'name'  => 'blOeGdprBaseAllowUsersToDeleteTheirAccount',
            'type'  => 'bool',
            'value' => 'false'
        ),
        array(
            'group' => 'oegdprbase_account_settings',
            'name'  => 'blOeGdprBaseAllowUsersToManageReviews',
            'type'  => 'bool',
            'value' => 'false'
        ),
        array(
            'group' => 'oegdprbase_recommendation_settings',
            'name'  => 'blOeGdprBaseAllowRecommendArticle',
            'type'  => 'bool',
            'value' => 'true'
        ),
    )
);
