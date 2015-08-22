<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Product_List extends Qdmvc_Page_Root_List
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_List';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'code' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                'name' => array(
                    'Order' => 30,
                    'Width' => 200
                ),
                'price' => array(
                    'Order' => 40,
                    'Width' => 100
                ),
                '_product_cat_name' => array(
                    'Order' => 50,
                ),
            )
        );
        $obj['id']['Width'] = 140;
        return $obj;
    }

    public static function getPage()
    {
        return 'product_list';
    }
}
