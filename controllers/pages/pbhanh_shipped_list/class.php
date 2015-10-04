<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('pbhanh_list');

class Qdmvc_Page_PBHanh_Shipped_List extends Qdmvc_Page_PBHanh_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PBHanh_Shipped_List';
    }

    public static function getPage()
    {
        return 'pbhanh_shipped_list';
    }

    protected function getCustomPageView()
    {
        return array(

        );
    }
}
