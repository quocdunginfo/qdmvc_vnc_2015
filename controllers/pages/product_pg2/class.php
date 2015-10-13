<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product');

class Qdmvc_Page_Product_PG2_Card extends Qdmvc_Page_Product_Card
{
    protected static function initFields()
    {
        $obj = parent::initFields();
        unset($obj['General']['Fields']['size_id']);
        return $obj;
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_PG2_Card';
    }


    public static function getPage()
    {
        return 'product_pg2';
    }
}