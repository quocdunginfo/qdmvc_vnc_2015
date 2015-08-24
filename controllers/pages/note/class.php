<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Note extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Note';
    }

    public static function getPage()
    {
        return 'note';
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
                    'content' => array(
                        'Order' => 20,
                    ),
                    'model' => array(
                        'Order' => 30,
                    ),
                    'model_id' => array(
                        'Order' => 40,
                    )
                )
            )
        );
    }

}