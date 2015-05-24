<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('widgetnavcat_list');

class Qdmvc_Page_PartnerGrp_List extends Qdmvc_Page_WidgetNavCat_List
{

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPostCat::$TYPE_PARTNER
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_PartnerGrp_List';
    }

    public static function getPage()
    {
        return 'partnergrp_list';
    }
}
