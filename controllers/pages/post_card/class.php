<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Post extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Post';
    }

    public static function getPage()
    {
        return 'post_card';
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
                        'SourceExpr' => 'content',

                    ),
                    'short_content' => array(
                        'SourceExpr' => 'short_content',

                    ),
                    'type' => array(
                        'SourceExpr' => 'type',

                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',

                    ),
                    'order' => array(
                        'SourceExpr' => 'order',

                    ),
                    'post_cat_id' => array(
                        'SourceExpr' => 'post_cat_id',

                    ),
                    '_post_cat_name' => array(
                        'SourceExpr' => '_post_cat_name',
                    ),
                )
            )
        );
    }

}