<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_PBHanh_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PBHanh_List';
    }

    public static function getPage()
    {
        return 'pbhanh_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'product_name' => array(
                    'Order' => 20
                ),
                'product_no' => array(
                    'Order' => 40
                ),
                'model' => array(
                    'Order' => 60
                ),
                'cust_name' => array(
                    'Order' => 80
                ),
                'cust_phone' => array(
                    'Order' => 100
                ),
                'purchase_date' => array(
                    'DataType' => 'Date',
                    'Order' => 120
                ),
                'status' => array(
                    'Order' => 140
                ),
            ));
        $obj['id']['Width'] = 120;
        return $obj;
    }

    protected function getCustomPageView()
    {
        return array(
            'status' => array(
                'field' => 'status',
                'value' => sprintf('!=%s&&!=%s', QdPBHanh::$STATUS_CLOSE, QdPBHanh::$STATUS_SHIPPED),
                'operator' => ''
            ),
        );
    }


}
