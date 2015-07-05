<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_NoSeries extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_NoSeries';
    }

    public static function getPage()
    {
        return 'noseries';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                    ),
                    'prefix' => array(

                    ),
                    'manual_allowed' => array(

                    ),
                    'from_no' => array(

                    ),
                    'to_no' => array(

                    ),
                    'last_no' => array(
                    ),
                    'active' => array(

                    ),
                    'fixed_length' => array(

                    ),
                )
            )
        );
    }

}