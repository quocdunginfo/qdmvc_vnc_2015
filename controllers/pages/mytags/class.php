<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_MyTags extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_MyTags';
    }

    public static function getPage()
    {
        return 'mytags';
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
                    'name' => array(
                        'Order' => 20,
                    ),
                    'description' => array(
                        'Order' => 30,
                    ),
                    'type' => array(
                        'Order' => 40,
                    )
                )
            )
        );
    }

}