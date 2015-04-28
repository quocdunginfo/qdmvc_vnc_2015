<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_WidgetNav extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_WidgetNav';
    }

    public static function getPage()
    {
        return 'widgetnav';
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
                        'PrimaryKey' => true
                    ),
                    'title' => array(
                        'SourceExpr' => 'title',
                    ),
                    'content' => array(
                        'SourceExpr' => 'content'
                    ),
                    'button_text' => array(
                        'SourceExpr' => 'button_text',
                    ),
                    'path' => array(
                        'SourceExpr' => 'path',
                    ),
                    'order' => array(
                        'SourceExpr' => 'order',
                    ),
                    'group_id' => array(
                        'SourceExpr' => 'group_id',
                        'DataType' => static::getDataType('group_id'),
                        'LookupURL' => static::getLookupURL('group_id')
                    ),
                    '_group_name' => array(
                        'SourceExpr' => '_group_name',
                        'DataType' => static::getDataType('_group_name'),
                        'ReadOnly' => static::isReadOnly('_group_name')
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