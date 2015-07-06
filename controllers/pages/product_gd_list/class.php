<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_list');

class Qdmvc_Page_ProductGD_List extends Qdmvc_Page_Product_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductGD_List';
    }

    public static function getPage()
    {
        return 'product_gd_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP
        );
    }

}