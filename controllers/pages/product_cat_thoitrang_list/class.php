<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_pg3_list');

class Qdmvc_Page_ProductCatTHOITRANG_List extends Qdmvc_Page_ProductCat_PG3_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatTHOITRANG_List';
    }

    public static function getPage()
    {
        return 'product_cat_thoitrang_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'type2' => QdManufactor::$TYPE2_MANUFACTOR_THOITRANG
        ));
    }

}