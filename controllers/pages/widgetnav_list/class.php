<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_WidgetNav_List extends Qdmvc_Page_Root_List
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
                    'Order' => 20,
                ),
                'content' => array(
                    'Order' => 30,
                ),
                'button_text' => array(
                    'Order' => 40,
                ),
                'path' => array(
                    'Order' => 50,
                ),
                'order' => array(
                    'Order' => 60,
                ),
                '_group_name' => array(
                    'Order' => 70,
                )
            ));
    }
}
