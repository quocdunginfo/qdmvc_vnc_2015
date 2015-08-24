<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_VnWard extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_VnWard';
    }

    public static function getPage()
    {
        return 'vnward';
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
                    'type' => array(
                        'Order' => 30,
                    ),
                    'location' => array(
                        'Order' => 40,
                    ),
                    'districtid' => array(
                        'Order' => 50,
                    ),
                    '_districtname' => array(
                        'Order' => 60,
                    ),
                    '_provinceid' => array(
                        'Order' => 70,
                    ),
                    '_provincename' => array(
                        'Order' => 80,
                    )
                )
            )
        );
    }

}