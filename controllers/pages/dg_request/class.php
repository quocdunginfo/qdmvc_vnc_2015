<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_DgRequest extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgRequest';
    }

    public static function getPage()
    {
        return 'dg_request';
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
                    'keyword' => array(
                        'Order' => 20,
                    ),
                    'tags' => array(
                        'Order' => 22,
                    ),
                    'description' => array(
                        'Order' => 25,
                    ),
                    'cat_id' => array(
                        'Order' => 30,
                    ),
                    'status' => array(
                        'Order' => 40,
                    ),
                    'price' => array(
                        'Order' => 50,
                    ),
                    'suggest_price' => array(
                        'Order' => 50,
                    ),
                    '__owner_name' => array(
                        'Order' => 60,
                    ),
                    'date_modified' => array(
                        'Order' => 70,
                    ),
                )
            )
        );
    }

}