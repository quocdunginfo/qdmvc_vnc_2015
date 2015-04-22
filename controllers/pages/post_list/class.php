<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Post_List extends Qdmvc_Page_Root
{
    public function run()
    {
        parent::run();
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPost::$TYPE_POST
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Post_List';
    }

    public static function getPage()
    {
        return 'post_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'title' => array(
                    'SourceExpr' => 'title'
                ),
                'content' => array(
                    'SourceExpr' => 'content'
                ),
                'type' => array(
                    'SourceExpr' => 'type',
                    'DataType' => static::getDataType('type')
                )
            ));
    }
}
