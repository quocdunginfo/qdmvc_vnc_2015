<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_pg3_card');

class Qdmvc_Page_ProductCatTHOITRANG_Card extends Qdmvc_Page_ProductCat_PG3_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatTHOITRANG_Card';
    }

    public static function getPage()
    {
        return 'product_cat_thoitrang';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        $obj['General']['Fields']['type4']['Hidden'] = false;
        return $obj;
    }

}