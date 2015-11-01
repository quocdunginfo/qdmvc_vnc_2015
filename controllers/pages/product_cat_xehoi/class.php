<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_pg2_xe_card');

class Qdmvc_Page_ProductCatXEHOI_Card extends Qdmvc_Page_ProductCat_PG2_XE_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatXEHOI_Card';
    }

    public static function getPage()
    {
        return 'product_cat_xehoi';
    }
}