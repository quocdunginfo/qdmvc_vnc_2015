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
                    'Order' => 20,
                    'Width' => 100
                ),
                '_product_name' => array(
                    'Order' => 30,
                    'Width' => 200,
                ),
                'group_id' => array(
                    'Order' => 40,
                    'Width' => 100
                ),
                '_group_name' => array(
                    'Order' => 50,
                )
            )
        );
    }

    public static function getPage()
    {
        return 'progrp_list';
    }
}
