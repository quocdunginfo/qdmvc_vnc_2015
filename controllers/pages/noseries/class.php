<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_NoSeries extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_NoSeries';
    }

    public static function getPage()
    {
        return 'noseries';
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
                    'prefix' => array(
                        'Order' => 20,
                    ),
                    'manual_allowed' => array(
                        'Order' => 30,
                    ),
                    'from_no' => array(
                        'Order' => 40,
                    ),
                    'to_no' => array(
                        'Order' => 50,
                    ),
                    'last_no' => array(
                        'Order' => 60,
                    ),
                    'active' => array(
                        'Order' => 70,
                    ),
                    'fixed_length' => array(
                        'Order' => 80,
                    ),
                )
            )
        );
    }

}