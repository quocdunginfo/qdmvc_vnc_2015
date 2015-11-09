<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product_pg2');

class Qdmvc_Page_Product_PG2_THIETBI_Card extends Qdmvc_Page_Product_PG2_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_PG2_THIETBI_Card';
    }


    public static function getPage()
    {
        return 'product_pg2_thietbi';
    }
}