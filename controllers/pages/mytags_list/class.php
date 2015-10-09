<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_MyTags_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_MyTags_List';
    }

    public static function getPage()
    {
        return 'mytags_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'name' => array(
                    'Order' => 20,
                ),
                'type' => array(
                    'Order' => 30,
                )
            ));
    }

}
