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
                        '_product_name' => array(
                            'SourceExpr' => '_product_name',
                            'ReadOnly'=>static::isReadOnly('_product_name'),
                        ),
                        'group_id' => array(
                            'SourceExpr' => 'group_id',
                        ),
                        '_group_name' => array(
                            'SourceExpr' => '_group_name',
                            'ReadOnly'=>static::isReadOnly('_group_name')
                        ),
                        'order' => array(
                            'SourceExpr' => 'order',
                        ),
                        'group_type' => array(
                            'SourceExpr' => 'group_type',
                            'DataType' => static::getDataType('group_type'),
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