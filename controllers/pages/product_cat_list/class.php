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
                    'SourceExpr' => 'order',
                    'Width' => 100
                ),
                'name' => array(
                    'SourceExpr' => 'name',
                ),
                'parent_id' => array(
                    'SourceExpr' => 'parent_id',
                    'Width' => 100
                ),
                '_parent_name' => array(
                    'SourceExpr' => '_parent_name',
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