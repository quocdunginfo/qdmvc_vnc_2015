<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('progrp');

class Qdmvc_Page_ProPromotion_Card extends Qdmvc_Page_ProGrp_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProPromotion_Card';
    }

    public static function getPage()
    {
        return 'propromotion';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        return $obj;
    }

}