<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ProUOM_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProUOM_List';
    }

    public static function getPage()
    {
        return 'pro_uom_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'product_id' => array(
                    'Order' => 20,
                ),
                'uom_id' => array(
                    'Order' => 30,
                ),
                'conversion_qty' => array(
                    'Order' => 40,
                )
            ));
        unset($obj['id']);
        return $obj;
    }

}
