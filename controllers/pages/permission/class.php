<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Permission extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Permission';
    }

    public static function getPage()
    {
        return 'permission';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                    ),
                    'usergroupid' => array(
                    ),
                    'classname' => array(
                    ),
                    'methodname' => array(
                    ),
                    'active' => array(
                    ),
                )
            )

        );
    }

}