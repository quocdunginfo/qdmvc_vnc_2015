<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Product_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Order' => 10,
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                        'ReadOnly' => false
                    ),
                    'struct_lv_1' => array(
                        'Order' => 20,
                    ),
                    'struct_lv_2' => array(
                        'Order' => 25
                    ),
                    'struct_lv_3' => array(
                        'Order' => 20,
                        'Hidden' => true
                    ),
                    'struct_lv_4' => array(
                        'Order' => 25
                    ),
                    'name' => array(
                        'Order' => 30,
                    ),
                    'product_cat_id' => array(
                        'Order' => 40,
                    ),
                    '_product_cat_name' => array(
                        'Order' => 50,
                    ),
                    'manufacturer_id' => array(
                        'Order' => 60,
                    ),
                    '_manufacturer_name' => array(
                        'Order' => 65,
                    ),
                    'size_id' => array(
                        'Order' => 70,
                    ),
                    '_size_name' => array(
                        'Order' => 75,
                    ),
                    'code' => array(
                        'Order' => 90,
                    ),
                    'price' => array(
                        'Order' => 100,
                    ),
                    'discount_percent' => array(
                        'Order' => 110,
                    ),
                    'manual_discount_amt' => array(
                        'Order' => 115,
                    ),
                    '_price_discount' => array(
                        'Order' => 120,
                    ),
                    'active' => array(
                        'Order' => 130,
                    ),
                    'stock_status' => array(
                        'Order' => 140,
                    ),
                )
            ),
            'Tab1' => array(
                'Type' => 'Group',
                'Order' => 20,
                'Name' => array(
                    'vi-VN' => 'Thông tin khác',
                    'en-US' => 'Sub info'
                ),
                'Fields' => array(
                    'avatar' => array(
                        'Order' => 15,
                    ),
                    '_avatar_preview' => array(
                        'Order' => 10,
                    ),
                    'description' => array(
                        'Order' => 20,
                    ),
                    'doitra_baohanh' => array(
                        'Order' => 30,
                    ),
                    'giaohang_thanhtoan' => array(
                        'Order' => 40,
                    ),
                    'date_modified' => array(
                        'Order' => 50,
                    ),
                )
            ),
            'Tab2' => array(
                'Type' => 'Group',
                'Order' => 30,
                'Name' => array(
                    'vi-VN' => 'SEO',
                    'en-US' => 'SEO'
                ),
                'Fields' => array(
                    '_seo_title_preview' => array(
                        'Order' => 10,
                    ),
                    '_seo_description_preview' => array(
                        'Order' => 20,
                    ),
                )
            )
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_Card';
    }


    public static function getPage()
    {
        return 'product';
    }
}