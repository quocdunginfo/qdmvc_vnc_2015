<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');
class Qdmvc_Page_Setup extends Qdmvc_Page_RootSetup {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Setup';
    }

    public static function getPage()
    {
        return 'setup';
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
                        'Hidden' => true
                    ),
                    'df_language' => array(
                        'SourceExpr' => 'df_language',

                    ),
                )
            )
        );
    }
}