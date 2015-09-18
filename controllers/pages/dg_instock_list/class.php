<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_DgInstock_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgInStock_List';
    }

    public static function getPage()
    {
        return 'dg_instock_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'keyword' => array(
                    'Order' => 15,
                ),
                'cat_id' => array(
                    'Order' => 20,
                ),
                'req_id' => array(
                    'Order' => 30,
                ),
                'seq_no' => array(
                    'Order' => 40,
                ),
                'price' => array(
                    'Order' => 50,
                ),
                'suggest_price' => array(
                    'Order' => 60,
                ),
                'date_created' => array(
                    'Order' => 70,
                )
            ));
    }

}
