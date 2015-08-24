<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Contact_Card extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Contact_Card';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Order' => 10,
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                    ),
                    'type' => array(
                        'Order' => 20,
                    )
                ,
                    'name' => array(
                        'Order' => 30,
                    ),
                    'email' => array(
                        'Order' => 40,
                    ),
                    'phone' => array(
                        'Order' => 50,
                    ),
                    'website' => array(
                        'Order' => 60,
                    ),
                    'address' => array(
                        'Order' => 70,
                    ),
                    'active' => array(
                        'Order' => 80,
                    ),
                    'order' => array(
                        'Order' => 90,
                    ),
                    'description' => array(
                        'Order' => 100,
                    )
                )
            ),
            'Tab1' => array(
                'Type' => 'Group',
                'Name' => array('vi-VN' => 'Vị trí', 'en-US' => 'Location'),
                'Order' => 20,
                'Fields' => array(
                    'address_province_id' => array(
                        'Order' => 10,
                    ),
                    'address_district_id' => array(
                        'Order' => 20,
                    ),
                    'address_ward_id' => array(
                        'Order' => 30,
                    ),
                )
            )
        );
    }

    public static function getPage()
    {
        return 'contact';
    }
}