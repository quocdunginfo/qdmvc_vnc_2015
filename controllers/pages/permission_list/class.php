<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Permission_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Permission_List';
    }

    public static function getPage()
    {
        return 'permission_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'usergroupid' => array(
                    'Order' => 20,
                ),
                'classname' => array(
                    'Order' => 30,
                ),
                'methodname' => array(
                    'Order' => 40,
                ),
                'pagename' => array(
                    'Order' => 50,
                ),
                'active' => array(
                    'Order' => 60,
                ),
            ));
    }

}
