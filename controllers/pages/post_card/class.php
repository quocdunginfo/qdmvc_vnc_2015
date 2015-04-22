<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Post extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Post';
    }

    public static function getPage()
    {
        return 'post_card';
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
                    'content' => array(
                        'SourceExpr' => 'content',
                    ),
                    'title' => array(
                        'SourceExpr' => 'title',
                    ),
                    'type' => array(
                        'SourceExpr' => 'type',
                        'DataType' => static::getDataType('type')
                    ),
                    'short_content' => array(
                        'SourceExpr' => 'short_content',
                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',
                        'DataType' => static::getDataType('avatar')
                    ),
                    'post_cat_id' => array(
                        'SourceExpr' => 'post_cat_id',
                        'DataType' => static::getDataType('post_cat_id'),
                        'LookupURL' => static::getLookupURL('post_cat_id')
                    )
                )
            )
        );
    }

}