<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('widgetnavcat');
class Qdmvc_Page_PartnerGrp extends Qdmvc_Page_WidgetNavCat {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PartnerGrp';
    }

    public static function getPage()
    {
        return 'partnergrp';
    }

}