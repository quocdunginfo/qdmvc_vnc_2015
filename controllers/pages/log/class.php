<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Log extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Log';
    }

    public static function getPage()
    {
        return 'log';
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
                    'ip' => array(
                        'Order' => 20,
                    ),
                    'location' => array(
                        'Order' => 30,
                    ),
                    '__owner_name' => array(
                        'Order' => 40,
                    ),
                    'action' => array(
                        'Order' => 50,
                    ),
                    'model' => array(
                        'Order' => 60,
                    ),
                    'model_id' => array(
                        'Order' => 70,
                    )
                )
            )
        );
    }

}