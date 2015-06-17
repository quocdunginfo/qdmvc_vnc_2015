<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Pro2Shop_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Shop_List';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'product_id' => array(

                    'Width' => 100
                ),
                '_product_name' => array(

                    'Width' => 200,
                ),
                'shop_id' => array(

                    'Width' => 100
                ),
                '_shop_name' => array(

                )
            )
        );
    }

    public static function getPage()
    {
        return 'pro2shop_list';
    }
}
