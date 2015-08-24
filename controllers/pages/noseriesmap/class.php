<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_NoSeriesMap extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_NoSeriesMap';
    }

    public static function getPage()
    {
        return 'noseriesmap';
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
                    'noseries' => array(
                        'Order' => 30,
                    ),
                    'active' => array(
                        'Order' => 40,
                    )
                )
            )
        );
    }

}