<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('dg_instock');

class Qdmvc_Page_DgHistory extends Qdmvc_Page_DgInStock
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgHistory';
    }

    public static function getPage()
    {
        return 'dg_history';
    }
}