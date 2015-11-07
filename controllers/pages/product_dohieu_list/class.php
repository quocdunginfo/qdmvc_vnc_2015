<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_list');

class Qdmvc_Page_Product_DOHIEU_List extends Qdmvc_Page_Product_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_DOHIEU_List';
    }

    public static function getPage()
    {
        return 'product_dohieu_list';
    }
    protected function getCustomPageView()
    {
        $obj = array_merge(parent::getCustomPageView() ,array(
            'type3' => QdProductCat::$TYPE3_DOHIEU
        ));
        return $obj;
    }
}
