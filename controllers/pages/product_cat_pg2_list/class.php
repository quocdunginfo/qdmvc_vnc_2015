<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_list');

class Qdmvc_Page_ProductCat_PG2_List extends Qdmvc_Page_ProductCat_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCat_PG2_List';
    }


    public static function getPage()
    {
        return 'product_cat_pg2_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'property_grp_type' => QdProductCat::$PROPERTY_G2
        ));
    }

}