<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Pro2Pro_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

    protected static function initFields()
    {
        return array(
                'General' => array(
                    'Type' => 'Group',
                    'Fields' => array(
                        'id' => array(
                            'SourceExpr' => 'id',
                        ),
                        'product_id' => array(
                            'SourceExpr' => 'product_id',
                        ),
                        '_product_name' => array(
                            'SourceExpr' => '_product_name',

                        ),
                        'r_product_id' => array(
                            'SourceExpr' => 'r_product_id',

                        ),
                        '_r_product_name' => array(
                            'SourceExpr' => '_r_product_name',

                        ),
                        'order' => array(
                            'SourceExpr' => 'order',
                        ),
                    )
                )
            );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Pro2Pro_Card';
    }


    public static function getPage()
    {
        return 'pro2pro';
    }
}