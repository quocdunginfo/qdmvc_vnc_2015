<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Pro2Shop_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

    protected static function initFields()
    {
        return array(
                'General' => array(
                    'Type' => 'Group',
                    'Fields' => array(
                        'id' => array(

                        ),
                        'product_id' => array(

                        ),
                        '_product_name' => array(


                        ),
                        'shop_id' => array(


                        ),
                        '_shop_name' => array(

                        ),
                    )
                )
            );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Shop_Card';
    }


    public static function getPage()
    {
        return 'pro2shop';
    }
}