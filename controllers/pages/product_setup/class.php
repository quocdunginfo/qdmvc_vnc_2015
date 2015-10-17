<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');

class Qdmvc_Page_ProductSetup extends Qdmvc_Page_RootSetup
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductSetup';
    }

    public static function getPage()
    {
        return 'product_setup';
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
                    'df_pro_cat_avatar' => array(
                        'Order' => 20,
                    ),
                    'df_product_desc_tpl' => array(
                        'Order' => 30,
                    ),
                    'df_pro_avatar' => array(
                        'Order' => 40,
                    ),
                    /*
                    'product_noseries' => array(

                    ),
                    'product_qa_noseries' => array(

                    ),*/
                )
            )
        );
    }

}