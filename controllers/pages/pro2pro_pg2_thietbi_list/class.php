<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('pro2pro_pg2_list');

class Qdmvc_Page_Pro2Pro_PG2_THIETBI_List extends Qdmvc_Page_Pro2Pro_PG2_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Pro_PG2_THIETBI_List';
    }

    public static function getPage()
    {
        return 'pro2pro_pg2_thietbi_list';
    }
}
