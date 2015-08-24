<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Feedback_Card extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Feedback_Card';
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
                    'customer_name' => array(
                        'Order' => 20,
                    ),
                    'customer_phone' => array(
                        'Order' => 30,
                    ),
                    'customer_email' => array(
                        'Order' => 40,
                    ),
                    'done' => array(
                        'Order' => 50,
                    ),
                    'title' => array(
                        'Order' => 60,
                    ),
                    'content' => array(
                        'Order' => 70,
                    )
                )
            )
        );
    }

    public static function getPage()
    {
        return 'feedback_card';
    }
}