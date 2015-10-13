<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_pg2_list');

class Qdmvc_Page_ProductCat_PG2_XE_List extends Qdmvc_Page_ProductCat_PG2_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCat_PG2_XE_List';
    }


    public static function getPage()
    {
        return 'product_cat_pg2_xe_list';
    }

    protected function getCustomPageView()
    {
        $obj = array_merge(parent::getCustomPageView(),
            array(
                'type3' => QdProductCat::$TYPE3_XE
            ));
        return $obj;
    }

}