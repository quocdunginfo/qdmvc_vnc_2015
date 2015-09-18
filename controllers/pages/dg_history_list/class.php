<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('dg_instock_list');

class Qdmvc_Page_DgHistory_List extends Qdmvc_Page_DgInstock_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgHistory_List';
    }

    public static function getPage()
    {
        return 'dg_history_list';
    }
}
