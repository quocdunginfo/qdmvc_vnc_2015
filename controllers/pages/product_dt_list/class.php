<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_pg2_list');

class Qdmvc_Page_ProductDT_List extends Qdmvc_Page_Product_PG2_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductDT_List';
    }

    public static function getPage()
    {
        return 'product_dt_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'struct_lv_2' => QdProductCat::$LV2_MANUFACTOR_DIENTHOAI
        ));
    }

}
