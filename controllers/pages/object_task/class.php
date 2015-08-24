<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ObjectTask extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ObjectTask';
    }

    public static function getPage()
    {
        return 'object_task';
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
                    'layer' => array(
                        'Order' => 20,
                    ),
                    'action' => array(
                        'Order' => 30,
                    ),
                    'object_type' => array(
                        'Order' => 40,
                    ),
                    'object_name' => array(
                        'Order' => 50,
                    ),
                    'version' => array(
                        'Order' => 60,
                    ),
                    'description' => array(
                        'Order' => 70,
                    ),
                    'compatible' => array(
                        'Order' => 80,
                    ),
                )
            )
        );
    }

}