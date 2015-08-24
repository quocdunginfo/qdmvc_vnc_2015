<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_WidgetNav extends Qdmvc_Page_Root
{
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
                        'Order' => 10,
                        'ReadOnly' => true
                    ),
                    'title' => array(
                        'Order' => 20,
                    ),
                    'content' => array(
                        'Order' => 30,
                    ),
                    'button_text' => array(
                        'Order' => 40,
                    ),
                    'path' => array(
                        'Order' => 50,
                    ),
                    'active' => array(
                        'Order' => 60,
                    ),
                    'order' => array(
                        'Order' => 70,
                    ),
                    'group_id' => array(
                        'Order' => 80,
                    ),
                    '_group_name' => array(
                        'Order' => 90,
                    ),
                    'type' => array(
                        'Order' => 90,
                    ),
                    'target' => array(
                        'Order' => 100,
                    ),
                    'avatar' => array(
                        'Order' => 110,
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