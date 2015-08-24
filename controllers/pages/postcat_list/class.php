<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_PostCat_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PostCat_List';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPostCat::$TYPE_POSTCAT
        );
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'parent_id' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                'order' => array(
                    'Order' => 30,
                    'Width' => 100
                ),
                'title' => array(
                    'Order' => 40,
                ),
                'type' => array(
                    'Order' => 50,
                ),
                'active' => array(
                    'Order' => 60,
                    'Width' => 100
                ),
            ));
    }

    public static function getPage()
    {
        return 'postcat_list';
    }
}