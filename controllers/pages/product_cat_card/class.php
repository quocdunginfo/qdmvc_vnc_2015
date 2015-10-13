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
                        'Order' => 10,
                        'ReadOnly' => true
                    ),
                    'type' => array(
                        'Order' => 20,
                    ),
                    'property_grp_type' => array(
                        'Order' => 25
                    ),
                    'type3' => array(
                        'Order' => 30
                    ),
                    'type2' => array(
                        'Order' => 35,
                    ),
                    'level' => array(
                        'Order' => 40,
                    ),
                    'name' => array(
                        'Order' => 50,
                    ),
                    'avatar' => array(
                        'Order' => 60,
                    ),
                    'parent_id' => array(
                        'Order' => 70,
                    ),
                    '_parent_name' => array(
                        'Order' => 80,
                    ),
                    'order' => array(
                        'Order' => 90,
                    ),
                    'active' => array(
                        'Order' => 100,
                    ),
                )
            ),

        );
    }
}