<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_ObjectTask extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ObjectTask';
    }

    public static function getPage()
    {
        return 'object_task';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                        'ReadOnly' => true
                    ),
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
                )
            )
            /* SAMPLE
            ,
            'Group2' => array(
                'Type' => 'Part',
                'Name' => 'Lines',
                'PagePartID' => '',
                'SubPageLink' => array(
                    'Field' => '',
                    'Type' => 'FIELD',//'CONST',
                    'Value' => ''
                )
            )
            */
        );
    }

}