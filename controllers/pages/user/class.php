<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_User extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_User';
    }

    public static function getPage()
    {
        return 'user';
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
                    'username' => array(
                    ),
                    'displayname' => array(

                    ),
                    'status' => array(
                    )
                )
            )

        );
    }

}