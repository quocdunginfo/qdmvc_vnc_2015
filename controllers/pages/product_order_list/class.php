<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ProductOrder_List extends Qdmvc_Page_Root_List
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductOrder_List';
    }

    public static function getPage()
    {
        return 'product_order_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'done' => false
        );
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                '_product_name' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                'customer_name' => array(
                    'Order' => 30,
                ),
                'count' => array(
                    'Order' => 40,
                    'Width' => 100
                )
            ));
    }
}
