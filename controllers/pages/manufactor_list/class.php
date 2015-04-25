<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_list');

class Qdmvc_Page_Manufactor_List extends Qdmvc_Page_ProductCat_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Manufactor_List';
    }

    public static function getPage()
    {
        return 'manufactor_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdProductCat::$TYPE_MANUFACTOR
        );
    }
}
