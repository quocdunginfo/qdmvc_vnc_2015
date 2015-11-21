<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product_pg3');

class Qdmvc_Page_ProductTHOITRANG_Card extends Qdmvc_Page_Product_PG3_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductTHOITRANG_Card';
    }

    public static function getPage()
    {
        return 'product_thoitrang';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();

        return $obj;
    }

}