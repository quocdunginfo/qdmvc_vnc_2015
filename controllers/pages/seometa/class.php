<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_SEOMeta extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SEOMeta';
    }

    public static function getPage()
    {
        return 'seometa';
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
                    'model' => array(

                    ),
                    'model_id' => array(

                    ),
                    'active' => array(

                    ),

                    'meta_name' => array(
                    ),
                    'meta_value' => array(
                    ),
                )
            )
            /* SAMPLE
            ,
            'Group2' => array(
                'Type' => 'Part',
                'Name' => 'Lines',
                'PagePartID' => '',
                'SubPageLink' => array(
                    'Field' => '',
                    'Type' => 'FIELD',//'CONST',
                    'Value' => ''
                )
            )
            */
        );
    }

}