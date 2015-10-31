<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_pg2_dcn_card');

class Qdmvc_Page_ProductCatLT_Card extends Qdmvc_Page_ProductCat_PG2_DCN_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCatLT_Card';
    }

    public static function getPage()
    {
        return 'product_cat_lt';
    }
}