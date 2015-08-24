<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');

class Qdmvc_Page_SetupProductOrder extends Qdmvc_Page_RootSetup
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SetupProductOrder';
    }

    public static function getPage()
    {
        return 'setup_product_order';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Order' => 10,
                'Name' => array(
                    'vi-VN' => 'Thông tin chung',
                    'en-US' => 'General'
                ),
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                        'Hidden' => true
                    ),
                    'btn_dathang' => array(
                        'Order' => 20,
                    ),
                    'btn_goidathang' => array(
                        'Order' => 30,
                    ),

                )
            ),
            'Tab1' => array(
                'Type' => 'Group',
                'Order' => 20,
                'Name' => array(
                    'vi-VN' => 'Form đặt hàng',
                    'en-US' => 'Form order'
                ),
                'Fields' => array(
                    'advice_phone' => array(
                        'Order' => 10,
                    ),
                    'support_phone' => array(
                        'Order' => 20,
                    ),
                    'order_form_title' => array(
                        'Order' => 30,
                    ),
                )
            ),
            'Tab2' => array(
                'Type' => 'Group',
                'Order' => 30,
                'Name' => array(
                    'vi-VN' => 'Đặt hàng thành công',
                    'en-US' => 'Message done'
                ),
                'Fields' => array(
                    'form_order_done_title' => array(
                        'Order' => 10,
                    ),
                    'form_order_done_tpl' => array(
                        'Order' => 20,
                    ),
                    'order_done_email_title' => array(
                        'Order' => 30,
                    ),
                    'order_done_email_tpl' => array(
                        'Order' => 40,
                    ),
                    'form_order_done_avatar' => array(
                        'Order' => 50,
                    ),
                )
            )
        );
    }

}