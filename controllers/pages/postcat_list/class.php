<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_PostCat_List extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PostCat_List';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPostCat::$TYPE_POSTCAT
        );
    }
    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'parent_id' => array(
                    'SourceExpr' => 'parent_id',
                    'Width' => 100
                ),
                'order' => array(
                    'SourceExpr' => 'order',
                    'Width' => 100
                ),
                'title' => array(
                    'SourceExpr' => 'title'
                ),
                'type' => array(
                    'SourceExpr' => 'type',
                    'DataType' => static::getDataType('type')
                ),
                'active' => array(
                    'SourceExpr' => 'active',
                    'Width' => 100
                ),
            ));
    }

    public static function getPage()
    {
        return 'postcat_list';
    }
}