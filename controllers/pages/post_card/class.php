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
                'Order' => 10,
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                        'ReadOnly' => true,
                        'Order' => 10
                    ),
                    'title' => array(
                        'SourceExpr' => 'title',
                        'Order' => 20
                    ),
                    'content' => array(
                        'SourceExpr' => 'content',
                        'Order' => 30

                    ),
                    'short_content' => array(
                        'SourceExpr' => 'short_content',
                        'Order' => 40
                    ),
                    'type' => array(
                        'SourceExpr' => 'type',
                        'Order' => 50
                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',
                        'Order' => 60
                    ),
                    'order' => array(
                        'SourceExpr' => 'order',
                        'Order' => 70
                    ),
                    'post_cat_id' => array(
                        'SourceExpr' => 'post_cat_id',
                        'Order' => 80
                    ),
                    '_post_cat_name' => array(
                        'SourceExpr' => '_post_cat_name',
                        'Order' => 90
                    ),
                )
            )
        );
    }

}