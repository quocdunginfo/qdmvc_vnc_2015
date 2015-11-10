<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product_pg2_thietbi');

class Qdmvc_Page_ProductOTHER_Card extends Qdmvc_Page_Product_PG2_THIETBI_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductOTHER_Card';
    }

    public static function getPage()
    {
        return 'product_other';
    }
}