<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_ImportData extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImportData';
    }

    public static function getPage()
    {
        return 'importdata';
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
                    ),
                    'model' => array(
                        'Order' => 200,
                    ),
                    'path' => array(
                        'Order' => 300,
                    )
                )
            )
        );
    }

}