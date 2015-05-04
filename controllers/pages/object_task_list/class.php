<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ObjectTask_List extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ObjectTask_List';
    }

    public static function getPage()
    {
        return 'object_task_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'layer' => array(
                    'SourceExpr' => 'layer',
                    'DataType' => static::getDataType('layer')
                ),
                'action' => array(
                    'SourceExpr' => 'action',
                    'DataType' => static::getDataType('action')
                ),
                'object_type' => array(
                    'SourceExpr' => 'object_type',
                    'DataType' => static::getDataType('object_type')
                ),
                'object_name' => array(
                    'SourceExpr' => 'object_name',
                ),
                'version' => array(
                    'SourceExpr' => 'version',
                    'DataType' => static::getDataType('version')
                ),
                'description' => array(
                    'SourceExpr' => 'description',
                    'DataType' => static::getDataType('description')
                ),
                'compatible' => array(
                    'SourceExpr' => 'compatible',
                    'DataType' => static::getDataType('compatible')
                ),
        ));
    }

}
