<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_PostCat extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PostCat';
    }

    public static function getPage()
    {
        return 'postcat_card';
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
                        'DataType' => static::getDataType('title')
                    ),
                    'description' => array(
                        'SourceExpr' => 'description',
                        'DataType' => static::getDataType('description')
                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',
                        'DataType' => static::getDataType('avatar')
                    ),
                    'order' => array(
                        'SourceExpr' => 'order',
                        'DataType' => static::getDataType('order')
                    ),
                    'type' => array(
                        'SourceExpr' => 'type',
                        'DataType' => static::getDataType('type'),
                        'ReadOnly' => static::isReadOnly('type')
                    ),
                    'parent_id' => array(
                        'SourceExpr' => 'parent_id',
                        'LookupURL' => static::getLookupURL('parent_id')
                    ),
                )
            )
        );
    }

}