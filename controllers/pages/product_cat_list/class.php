<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ProductCat_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCat_List';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'order' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                'name' => array(
                    'Order' => 30,
                ),
                'parent_id' => array(
                    'Order' => 40,
                    'Width' => 100
                ),
                '_parent_name' => array(
                    'Order' => 50,
                ),
                'level' => array(
                    'Order' => 60,
                ),
            ));
    }

    public static function getPage()
    {
        return 'product_cat_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdProductCat::$TYPE_PRODUCTCAT
        );
    }

}