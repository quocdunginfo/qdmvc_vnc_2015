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
                    'Order' => 20,
                ),
                'action' => array(
                    'Order' => 30,
                ),
                'object_type' => array(
                    'Order' => 40,
                ),
                'object_name' => array(
                    'Order' => 50,
                ),
                'version' => array(
                    'Order' => 60,
                ),
                'description' => array(
                    'Order' => 70,
                ),
                'compatible' => array(
                    'Order' => 80,
                ),
            ));
    }

}
