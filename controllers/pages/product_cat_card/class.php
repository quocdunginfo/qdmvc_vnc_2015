<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ProductCat_Card extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCat_Card';
    }

    public static function getPage()
    {
        return 'product_cat_card';
    }

    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'Order' => 100,
                        'ReadOnly' => false
                    ),
                    'type' => array(
                        'Order' => 200,
                    ),
                    'property_grp_type' => array(
                        'Order' => 300
                    ),
                    'struct_lv_1' => array(
                        'Order' => 400
                    ),
                    'struct_lv_2' => array(
                        'Order' => 500,
                    ),
                    'struct_lv_3' => array(
                        'Order' => 600,
                        'Hidden' => false
                    ),
                    'struct_lv_4' => array(
                        'Order' => 700,
                        'Hidden' => false
                    ),
                    'price_range_type' => array(
                        'Order' => 800,
                    ),
                    'level' => array(
                        'Order' => 900,
                    ),
                    'name' => array(
                        'Order' => 1000,
                    ),
                    'avatar' => array(
                        'Order' => 1100,
                    ),
                    'parent_id' => array(
                        'Order' => 1200,
                    ),
                    '_parent_name' => array(
                        'Order' => 1300,
                    ),
                    'order' => array(
                        'Order' => 1400,
                    ),
                    'active' => array(
                        'Order' => 1500,
                    ),
                )
            ),

        );
    }
}