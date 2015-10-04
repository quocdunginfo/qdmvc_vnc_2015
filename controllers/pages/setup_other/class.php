<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');

class Qdmvc_Page_SetupOther extends Qdmvc_Page_RootSetup
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SetupOther';
    }

    public static function getPage()
    {
        return 'setup_other';
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
                        'Hidden' => true
                    ),
                    'pbhanh_tpl' => array(
                        'Order' => 20,
                    ),
                )
            )
        );
    }
}