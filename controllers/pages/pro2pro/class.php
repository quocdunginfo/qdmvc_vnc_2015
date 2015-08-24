<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Pro2Pro_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

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
                    'r_product_id' => array(
                        'Order' => 40,
                    ),
                    '_r_product_name' => array(
                        'Order' => 50,
                    ),
                    'order' => array(
                        'Order' => 60,
                    ),
                )
            )
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Pro_Card';
    }


    public static function getPage()
    {
        return 'pro2pro';
    }
}