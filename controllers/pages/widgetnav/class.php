<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_WidgetNav extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_WidgetNav';
    }

    public static function getPage()
    {
        return 'widgetnav';
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
                        'ReadOnly' => true
                    ),
                    'title' => array(
                        'SourceExpr' => 'title',
                    ),
                    'content' => array(
                        'SourceExpr' => 'content'
                    ),
                    'button_text' => array(
                        'SourceExpr' => 'button_text',
                    ),
                    'path' => array(
                        'SourceExpr' => 'path',
                    ),
                    'active' => array(
                        'SourceExpr' => 'active',

                    ),
                    'order' => array(
                        'SourceExpr' => 'order',
                    ),
                    'group_id' => array(
                        'SourceExpr' => 'group_id',


                    ),
                    '_group_name' => array(
                        'SourceExpr' => '_group_name',


                    ),
                    'type' => array(
                        'SourceExpr' => 'type',

                    ),
                    'target' => array(
                        'SourceExpr' => 'target',

                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',

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