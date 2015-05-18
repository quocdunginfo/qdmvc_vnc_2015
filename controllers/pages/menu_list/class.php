<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('widgetnav_list');

class Qdmvc_Page_Menu_List extends Qdmvc_Page_WidgetNav_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Menu_List';
    }

    public static function getPage()
    {
        return 'menu_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'position_1' => array(
                    'SourceExpr' => 'position_1',
                ),
                'position_2' => array(
                    'SourceExpr' => 'position_2',
                ),
            ));
        unset($obj['_group_name']);
        return $obj;
    }
    protected function getCustomPageView()
    {
        return array(
            'type' => QdMenu::$TYPE_MENU
        );
    }
}
