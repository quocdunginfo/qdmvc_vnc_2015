<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ProGrp_List extends Qdmvc_Page_Root_List
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
                '_product_name' => array(
                    'SourceExpr' => '_product_name',
                    'Width' => 200,
                ),
                'group_id' => array(
                    'SourceExpr' => 'group_id',
                    'Width' => 100
                ),
                '_group_name' => array(
                    'SourceExpr' => '_group_name',
                )
            )
        );
    }

    public static function getPage()
    {
        return 'progrp_list';
    }
}
