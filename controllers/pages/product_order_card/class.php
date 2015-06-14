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
                        'SourceExpr' => 'id',

                    ),
                    'product_id' => array(
                        'SourceExpr' => 'product_id',

                    ),
                    '_product_name' => array(
                        'SourceExpr' => '_product_name',

                    ),
                    'sex' => array(
                        'SourceExpr' => 'sex',

                    ),
                    'customer_name' => array(
                        'SourceExpr' => 'customer_name'
                    ),
                    'customer_phone' => array(
                        'SourceExpr' => 'customer_phone'
                    ),
                    'customer_email' => array(
                        'SourceExpr' => 'customer_email'
                    ),
                    'customer_address' => array(
                        'SourceExpr' => 'customer_address'
                    ),
                    'count' => array(
                        'SourceExpr' => 'count'
                    ),
                    'done' => array(
                        'SourceExpr' => 'done',

                    ),
                    'mota' => array(
                        'SourceExpr' => 'mota'
                    )
                )
            )
        );
    }

    public static function getPage()
    {
        return 'product_order_card';
    }
}