<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_list');

class Qdmvc_Page_Product_PG3_List extends Qdmvc_Page_Product_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_PG3_List';
    }

    public static function getPage()
    {
        return 'product_pg3_list';
    }
    protected function getCustomPageView()
    {
        return array(
            'property_grp_type' => QdProductCat::$PROPERTY_G3
        );
    }
}
