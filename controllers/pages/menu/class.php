<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('widgetnav');

class Qdmvc_Page_Menu extends Qdmvc_Page_WidgetNav
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Menu';
    }

    public static function getPage()
    {
        return 'menu';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        //add
        $obj['Group1']['Fields']['position_1'] = array(
            'SourceExpr' => 'position_1',

        );
        $obj['Group1']['Fields']['position_2'] = array(
            'SourceExpr' => 'position_2',

        );
        //hide
        $obj['Group1']['Fields']['type'] = array(
            'SourceExpr' => 'type',
            'Hidden' => true
        );
        //disable
        /*
        $obj['Group1']['Fields']['group_id'] = array(
            'SourceExpr' => 'group_id',
            //'DataType' => static::getDataType('type'),
            'Hidden' => true
        );
        $obj['Group1']['Fields']['_group_name'] = array(
            'SourceExpr' => '_group_name',
            //'DataType' => static::getDataType('type'),
            'Hidden' => true
        );*/
        unset($obj['Group1']['Fields']['group_id']);
        unset($obj['Group1']['Fields']['_group_name']);
        return $obj;
    }
}