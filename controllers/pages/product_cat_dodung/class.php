<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_pg2_thietbi');

class Qdmvc_Page_ProductCatDODUNG_Card extends Qdmvc_Page_ProductCat_PG2_THIETBI_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatDODUNG_Card';
    }

    public static function getPage()
    {
        return 'product_cat_dodung';
    }
}