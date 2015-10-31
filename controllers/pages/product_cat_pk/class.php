<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_pg2_card');

class Qdmvc_Page_ProductCatPK_Card extends Qdmvc_Page_ProductCat_PG2_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatPK_Card';
    }

    public static function getPage()
    {
        return 'product_cat_pk';
    }
}