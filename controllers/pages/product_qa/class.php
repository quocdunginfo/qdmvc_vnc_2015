<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('product');

class Qdmvc_Page_ProductQA_Card extends Qdmvc_Page_Product_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductQA_Card';
    }

    public static function getPage()
    {
        return 'product_qa';
    }
}