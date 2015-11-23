<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_pg2_list');

class Qdmvc_Page_Product_PG2_DCN_List extends Qdmvc_Page_Product_PG2_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_PG2_List';
    }

    public static function getPage()
    {
        return 'product_pg2_dcn_list';
    }
    protected function getCustomPageView()
    {
        $obj = array_merge(parent::getCustomPageView() ,array(
            'struct_lv_1' => QdProductCat::$LV1_DCN,
        ));
        return $obj;
    }
}
