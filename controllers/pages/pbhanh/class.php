<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_PBHanh extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PBHanh';
    }

    public static function getPage()
    {
        return 'pbhanh';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Order' => 10,
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                    ),
                    /*'data_no' => array(
                        'Order' => 30,
                    ),*/
                    'product_no' => array(
                        'Order' => 50,
                    ),
                    'product_name' => array(
                        'Order' => 70,
                    ),
                    'model' => array(
                        'Order' => 90,
                    ),
                    /*
                    'serial_no' => array(
                        'Order' => 110,
                    ),*/
                    'purchase_date' => array(
                        'Order' => 130,
                    ),
                    'guarantee_exp_date' => array(
                        'Order' => 150,
                    ),
                    'days_of_warranty' => array(
                        'Order' => 155
                    ),
                    'free_days_exchange' => array(
                        'Order' => 160
                    ),
                    /*
                    'stock_out_date' => array(
                        'Order' => 150,
                    ),*/
                    'description' => array(
                        'Order' => 170,
                    ),
                    'status' => array(
                        'Order' => 190,
                    ),
                    '__owner_name' => array(
                        'Order' => 210,
                    ),
                    'date_modified' => array(
                        'Order' => 230,
                        'ReadOnly' => true
                    ),

                )
            ),
            'CustInfo' => array(
                'Type' => 'Group',
                'Order' => 20,
                'Name' => array(
                    'vi-VN' => 'Thông tin KH',
                    'en-US' => 'Customer Info'
                ),
                'Fields' => array(
                    'cust_name' => array(
                        'Order' => 10,
                    ),
                    'cust_addr' => array(
                        'Order' => 30,
                    ),
                    'cust_phone' => array(
                        'Order' => 50,
                    ),
                    'cust_email' => array(
                        'Order' => 70,
                    ),
                )
            ),
            'Other' => array(
                'Type' => 'Group',
                'Order' => 30,
                'Name' => array(
                    'vi-VN' => 'Thông tin khác...',
                    'en-US' => 'Other...'
                ),
                'Fields' => array(
                    'dealer_id' => array(
                        'Order' => 1,
                    ),
                    'dealer_name' => array(
                        'Order' => 10,
                    ),
                    'dealer_addr' => array(
                        'Order' => 30,
                    ),
                    'guarantee_address' => array(
                        'Order' => 50,
                    ),
                    /*
                    'type' => array(
                        'Order' => 50,
                    ),
                    */
                )
            )
        );
    }

}