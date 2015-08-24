<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_NoSeries_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_NoSeries_List';
    }

    public static function getPage()
    {
        return 'noseries_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'prefix' => array(
                    'Order' => 20,
                ),
                'manual_allowed' => array(
                    'Order' => 30,
                ),
                'from_no' => array(
                    'Order' => 40,
                ),
                'to_no' => array(
                    'Order' => 50,
                ),
                'last_no' => array(
                    'Order' => 60,
                ),
                'active' => array(
                    'Order' => 70,
                ),
                'fixed_length' => array(
                    'Order' => 80,
                ),
            ));
    }

}
