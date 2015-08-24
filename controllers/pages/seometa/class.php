<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_SEOMeta extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SEOMeta';
    }

    public static function getPage()
    {
        return 'seometa';
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
                    ),
                    'model' => array(
                        'Order' => 20,
                    ),
                    'model_id' => array(
                        'Order' => 30,
                    ),
                    'active' => array(
                        'Order' => 40,
                    ),
                    'overwrite' => array(
                        'Order' => 50,
                    ),
                    'meta_name' => array(
                        'Order' => 60,
                    ),
                    'seo_tpl' => array(
                        'Order' => 70,
                    ),
                    'meta_value' => array(
                        'Order' => 80,
                    ),
                    '_meta_value_preview' => array(
                        'Order' => 90,
                    ),
                )
            )
        );
    }

}