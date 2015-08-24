<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_UserInGroup_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_UserInGroup_List';
    }

    public static function getPage()
    {
        return 'useringroup_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'userid' => array(
                    'Order' => 20,
                ),
                'usergroupid' => array(
                    'Order' => 30,
                ),
            ));
    }

}
