<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('progrp');
class Qdmvc_Page_ProBigSale_Card extends Qdmvc_Page_ProGrp_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProBigSale_Card';
    }

    public static function getPage()
    {
        return 'probigsale';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        $obj['General']['Fields']['group_id'] = array(
            'SourceExpr' => 'group_id',

        );
        return $obj;
    }
}