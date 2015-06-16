<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_list');

class Qdmvc_Page_ProductDF_List extends Qdmvc_Page_Product_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductDF_List';
    }

    public static function getPage()
    {
        return 'product_df_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdManufactor::$TYPE2_MANUFACTOR_DEFAULT
        );
    }

}
