<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Pro2Pro_List extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Pro_List';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'product_id' => array(
                    'SourceExpr' => 'product_id',
                    'Width' => 100
                ),
                '_product_name' => array(
                    'SourceExpr' => '_product_name',
                    'Width' => 200,
                ),
                'r_product_id' => array(
                    'SourceExpr' => 'r_product_id',
                    'Width' => 100
                ),
                '_r_product_name' => array(
                    'SourceExpr' => '_r_product_name',
                )
            )
        );
    }

    public static function getPage()
    {
        return 'pro2pro_list';
    }
}
