<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_UserPersonalization extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_UserPersonalization';
    }

    public static function getPage()
    {
        return 'user_personalization';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'Hidden' => true,
                        'Order' => 10,
                    ),
                    'userid' => array(
                        'Order' => 20,
                    ),
                    'username' => array(
                        'Order' => 30,
                    ),
                    'language' => array(
                        'Order' => 40,
                    ),
                    'active' => array(
                        'Order' => 50,
                    )
                )
            )
        );
    }

}