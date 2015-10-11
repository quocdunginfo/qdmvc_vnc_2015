<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_DgInStock extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgInStock';
    }

    public static function getPage()
    {
        return 'dg_instock';
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
                    'cat_id' => array(
                        'Order' => 25,
                    ),
                    'price' => array(
                        'Order' => 50,
                    ),
                    'suggest_price' => array(
                        'Order' => 50,
                    ),
                    'req_id' => array(
                        'Order' => 60,
                    ),
                    'seq_no' => array(
                        'Order' => 70,
                    ),
                )
            )
        );
    }

}