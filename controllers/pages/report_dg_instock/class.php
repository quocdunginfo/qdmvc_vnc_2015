<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Report_DgInStock extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Report_DgInStock';
    }

    public static function getPage()
    {
        return 'report_dg_instock';
    }

    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'Order' => 50,
                        'ReadOnly' => true,
                        'Hidden' => true
                    ),
                    'keyword' => array(
                        'Order' => 100,
                    ),
                )
            ),

        );
    }

}