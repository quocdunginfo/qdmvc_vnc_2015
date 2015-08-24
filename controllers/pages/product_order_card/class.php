<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ProductOrder_Card extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductOrder_Card';
    }

    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                    ),
                    'product_id' => array(
                        'Order' => 20,
                    ),
                    '_product_name' => array(
                        'Order' => 30,
                    ),
                    'sex' => array(
                        'Order' => 40,
                    ),
                    'customer_name' => array(
                        'Order' => 50,
                    ),
                    'customer_phone' => array(
                        'Order' => 60,
                    ),
                    'customer_email' => array(
                        'Order' => 70,
                    ),
                    'customer_address' => array(
                        'Order' => 80,
                    ),
                    'count' => array(
                        'Order' => 90,
                    ),
                    'done' => array(
                        'Order' => 100,
                    ),
                    'mota' => array(
                        'Order' => 110,
                    ),
                )
            )
        );
    }

    public static function getPage()
    {
        return 'product_order_card';
    }
}