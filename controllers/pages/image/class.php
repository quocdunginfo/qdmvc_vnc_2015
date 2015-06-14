<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Image extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Image';
    }

    public static function getPage()
    {
        return 'image';
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
                    'path' => array(
                        'SourceExpr' => 'path',

                    ),
                    'active' => array(
                        'SourceExpr' => 'active',

                    ),
                    'order' => array(
                        'SourceExpr' => 'order'
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