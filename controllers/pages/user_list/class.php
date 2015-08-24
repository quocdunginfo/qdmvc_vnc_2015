<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_User_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_User_List';
    }

    public static function getPage()
    {
        return 'user_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'username' => array(
                    'Order' => 20,
                ),
                'displayname' => array(
                    'Order' => 30,
                ),
                'status' => array(
                    'Order' => 40,
                ),
            ));
    }

}
