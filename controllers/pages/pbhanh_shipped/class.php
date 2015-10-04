<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('pbhanh');

class Qdmvc_Page_PBHanh_Shipped extends Qdmvc_Page_PBHanh
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PBHanh_Shipped';
    }

    public static function getPage()
    {
        return 'pbhanh_shipped';
    }
}