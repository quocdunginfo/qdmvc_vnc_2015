<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Size extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Size';
    }

    public static function getPage()
    {
        return 'size';
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
                    'code' => array(
                        'SourceExpr' => 'code'
                    ),
                    'name' => array(
                        'SourceExpr' => 'name',
                    ),
                    'type' => array(
	                    'SourceExpr' => 'type',
	                    'DataType' => static::getDataType('type')
                    ),
                    'description' => array(
                        'SourceExpr' => 'description',
                        'DataType' => static::getDataType('description')
                    )
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