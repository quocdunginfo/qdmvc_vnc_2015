<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product_pg2_xe');

class Qdmvc_Page_ProductXEDAP_Card extends Qdmvc_Page_Product_PG2_XE_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductXEDAP_Card';
    }

    public static function getPage()
    {
        return 'product_xedap';
    }
}