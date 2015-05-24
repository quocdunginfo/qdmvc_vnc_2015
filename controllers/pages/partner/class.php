<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('widgetnav');
class Qdmvc_Page_Partner extends Qdmvc_Page_WidgetNav {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Partner';
    }

    public static function getPage()
    {
        return 'partner';
    }
}