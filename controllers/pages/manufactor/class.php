<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('product_cat_card');
class Qdmvc_Page_Manufactor extends Qdmvc_Page_ProductCat_Card {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Manufactor';
    }

    public static function getPage()
    {
        return 'manufactor';
    }
}