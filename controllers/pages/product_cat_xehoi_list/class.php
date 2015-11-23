<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_pg2_xe_list');

class Qdmvc_Page_ProductCatXEHOI_List extends Qdmvc_Page_ProductCat_PG2_XE_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatXEHOI_List';
    }

    public static function getPage()
    {
        return 'product_cat_xehoi_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'struct_lv_2' => QdProductCat::$LV2_MANUFACTOR_OTO,
            'level' => 3
        ));
    }

}