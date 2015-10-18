<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('image');

class Qdmvc_Page_ImageUnused extends Qdmvc_Page_Image
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImageUnused';
    }

    public static function getPage()
    {
        return 'image_unused';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'Order' => 10,
                        'Hidden' => true
                    ),
                    'type' => array(
                        'Order' => 25,
                    ),
                    'path' => array(
                        'Order' => 20,
                    ),
                    '_path_preview' => array(
                        'Order' => 5
                    )
                )
            )
        );
    }

}