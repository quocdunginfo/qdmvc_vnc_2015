<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_WidgetNav_List extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_WidgetNav_List';
    }

    public static function getPage()
    {
        return 'widgetnav_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'title' => array(
                    'SourceExpr' => 'title',
                ),
                'content' => array(
                    'SourceExpr' => 'content',
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
                '_group_name' => array(
                    'SourceExpr' => '_group_name',
                )
            ));
    }

}
