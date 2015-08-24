<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Image extends Qdmvc_Page_Root
{
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
                        'Order' => 10,
                    ),
                    'path' => array(
                        'Order' => 20,
                    ),
                    'active' => array(
                        'Order' => 30,
                    ),
                    'order' => array(
                        'Order' => 40,
                    ),
                    'model' => array(
                        'Order' => 50,
                    ),
                    'model_id' => array(
                        'Order' => 60,
                    )
                )
            )
        );
    }

}