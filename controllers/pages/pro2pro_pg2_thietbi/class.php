<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('pro2pro_pg2');

class Qdmvc_Page_Pro2Pro_PG2_THIETBI_Card extends Qdmvc_Page_Pro2Pro_PG2_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Pro_PG2_THIETBI_Card';
    }


    public static function getPage()
    {
        return 'pro2pro_pg2_thietbi';
    }
}