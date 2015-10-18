<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('image_list');

class Qdmvc_Page_ImageUnused_List extends Qdmvc_Page_Image_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImageUnused_List';
    }

    public static function getPage()
    {
        return 'image_unused_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'order' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                'path' => array(
                    'Order' => 30,
                ),
            ));
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdImage::$TYPE_UNUSED,
        );
    }


}
