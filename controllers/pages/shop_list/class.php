<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('contact_list');

class Qdmvc_Page_Shop_List extends Qdmvc_Page_Contact_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Shop_List';
    }

    public static function getPage()
    {
        return 'shop_list';
    }

    protected function getPageView()
    {
        return array(
            'type' => QdShop::$TYPE_SHOP
        );
    }

}
