<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Log extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Log';
    }

    public static function getPage()
    {
        return 'log';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                    ),
                    'ip' => array(
                        'SourceExpr' => 'ip',
                    ),
                    'location' => array(
                        'SourceExpr' => 'location',
                    ),
                    '__owner_name' => array(
                        'SourceExpr' => '__owner_name',

                    ),
                    'action' => array(
                        'SourceExpr' => 'action',

                    ),
                    'model' => array(
                        'SourceExpr' => 'model',

                    ),
                    'model_id' => array(
                        'SourceExpr' => 'model_id',

                    )
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