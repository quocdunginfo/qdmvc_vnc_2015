<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ProGrp_List extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProGrp_List';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'product_id' => array(
                    'SourceExpr' => 'product_id',
                    'Width' => 100
                ),
                'group_id' => array(
                    'SourceExpr' => 'group_id',
                ),
            )
        );
    }

    public static function getPage()
    {
        return 'progrp_list';
    }
}
