<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_pg2_dcn_list');

class Qdmvc_Page_ProductLT_List extends Qdmvc_Page_Product_PG2_DCN_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductLT_List';
    }

    public static function getPage()
    {
        return 'product_lt_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'struct_lv_2' => QdProductCat::$LV2_MANUFACTOR_LAPTOP,
        ));
    }

}
