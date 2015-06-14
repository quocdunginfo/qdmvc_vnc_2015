<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ObjectTask_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ObjectTask_List';
    }

    public static function getPage()
    {
        return 'object_task_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'layer' => array(
                    'SourceExpr' => 'layer',

                ),
                'action' => array(
                    'SourceExpr' => 'action',

                ),
                'object_type' => array(
                    'SourceExpr' => 'object_type',

                ),
                'object_name' => array(
                    'SourceExpr' => 'object_name',
                ),
                'version' => array(
                    'SourceExpr' => 'version',

                ),
                'description' => array(
                    'SourceExpr' => 'description',

                ),
                'compatible' => array(
                    'SourceExpr' => 'compatible',
                ),
        ));
    }

}
