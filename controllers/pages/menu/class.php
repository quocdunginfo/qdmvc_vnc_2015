<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('widgetnav');

class Qdmvc_Page_Menu extends Qdmvc_Page_WidgetNav
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Menu';
    }

    public static function getPage()
    {
        return 'menu';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        unset($obj['Group1']['Fields']['path']);
        unset($obj['Group1']['Fields']['button_text']);
        unset($obj['Group1']['Fields']['target']);

        unset($obj['Group1']['Fields']['group_id']);
        unset($obj['Group1']['Fields']['_group_name']);
        return $obj;
    }
}