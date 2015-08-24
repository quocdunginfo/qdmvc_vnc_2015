<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_VnDistrict_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_VnDistrict_List';
    }

    public static function getPage()
    {
        return 'vndistrict_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'name' => array(
                    'Order' => 20,
                ),
                'location' => array(
                    'Order' => 30,
                ),
                'type' => array(
                    'Order' => 40,
                ),
                'provinceid' => array(
                    'Order' => 50,
                ),
                '_provincename' => array(
                    'Order' => 60,
                )
            ));
    }

}
