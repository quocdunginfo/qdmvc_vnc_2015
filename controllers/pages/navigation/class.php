<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Navigation extends Qdmvc_Page_Root {
    function __construct(){
        parent::__construct();
        $this->data['setup'] = QdSetup::GET();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Navigation';
    }

    public static function getPage()
    {
        return 'navigation';
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
                    'content' => array(
                        'SourceExpr' => 'content'
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