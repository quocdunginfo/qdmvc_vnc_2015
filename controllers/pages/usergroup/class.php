<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_UserGroup extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_UserGroup';
    }

    public static function getPage()
    {
        return 'usergroup';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                    ),
                    'description' => array(
                        'Order' => 20,
                    ),
                    'parent_id' => array(
                        'Order' => 30,
                    ),
                    'active' => array(
                        'Order' => 40,
                    ),
                )
            )
        );
    }

}