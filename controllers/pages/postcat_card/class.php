<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_PostCat extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PostCat';
    }

    public static function getPage()
    {
        return 'postcat_card';
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
                    'description' => array(
                        'SourceExpr' => 'description',

                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',

                    ),
                    'order' => array(
                        'SourceExpr' => 'order',

                    ),
                    'active' => array(
                        'SourceExpr' => 'active',

                    ),
                    'type' => array(
                        'SourceExpr' => 'type',


                    ),
                    'parent_id' => array(
                        'SourceExpr' => 'parent_id',

                    ),
                )
            )
        );
    }

}