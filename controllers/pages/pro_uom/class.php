<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ProUOM extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProUOM';
    }

    public static function getPage()
    {
        return 'pro_uom';
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
                    'product_id' => array(
                        'Order' => 20,
                    ),
                    'uom_id' => array(
                        'Order' => 30,
                    ),
                    'conversion_qty' => array(
                        'Order' => 40,
                    ),
                )
            )
        );
    }

}