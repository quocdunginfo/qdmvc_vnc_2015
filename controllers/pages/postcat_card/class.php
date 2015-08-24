<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_PostCat extends Qdmvc_Page_Root
{
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
                        'Order' => 10,
                        'ReadOnly' => true
                    ),
                    'title' => array(
                        'Order' => 20
                    ),
                    'description' => array(
                        'Order' => 30
                    ),
                    'avatar' => array(
                        'Order' => 30
                    ),
                    'order' => array(
                        'Order' => 40
                    ),
                    'active' => array(
                        'Order' => 50
                    ),
                    'type' => array(
                        'Order' => 60
                    ),
                    'parent_id' => array(
                        'Order' => 70
                    ),
                )
            )
        );
    }

}