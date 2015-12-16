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
                        'Order' => 100,
                        'Hidden' => true
                    ),
                    'df_pro_cat_avatar' => array(
                        'Order' => 200,
                    ),
                    'df_product_desc_tpl' => array(
                        'Order' => 300,
                    ),
                    'df_product_doitra_baohanh_tpl' => array(
                        'Order' => 400,
                    ),
                    'df_product_giaohang_thanhtoan_tpl' => array(
                        'Order' => 500,
                    ),
                    'df_pro_avatar' => array(
                        'Order' => 600,
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