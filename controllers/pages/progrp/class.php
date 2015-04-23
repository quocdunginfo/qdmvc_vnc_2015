<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_ProGrp_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

    protected static function initFields()
    {
        return array(
                'General' => array(
                    'Type' => 'Group',
                    'Fields' => array(
                        'id' => array(
                            'SourceExpr' => 'id',
                            'PrimaryKey' => true
                        ),
                        'product_id' => array(
                            'SourceExpr' => 'product_id',
                            'LookupURL' => static::getLookupURL('product_id')
                        ),
                        'group_id' => array(
                            'SourceExpr' => 'group_id',
                            'LookupURL' => static::getLookupURL('group_id')
                        ),
                        'order' => array(
                            'SourceExpr' => 'order',
                        ),
                    )
                )
            );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProGrp_Card';
    }


    public static function getPage()
    {
        return 'progrp';
    }
}