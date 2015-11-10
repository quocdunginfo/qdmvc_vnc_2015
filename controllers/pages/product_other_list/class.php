<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_pg2_thietbi_list');

class Qdmvc_Page_ProductOTHER_List extends Qdmvc_Page_Product_PG2_THIETBI_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductOTHER_List';
    }

    public static function getPage()
    {
        return 'product_other_list';
    }

    protected function getCustomPageView()
    {
        return array_merge(parent::getCustomPageView(), array(
            'type' => QdManufactor::$TYPE2_MANUFACTOR_OTHER
        ));
    }

}
