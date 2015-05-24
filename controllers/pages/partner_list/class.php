<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('widgetnav_list');

class Qdmvc_Page_Partner_List extends Qdmvc_Page_WidgetNav_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Partner_List';
    }

    public static function getPage()
    {
        return 'partner_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPartner::$TYPE_PARTNER
        );
    }

}
