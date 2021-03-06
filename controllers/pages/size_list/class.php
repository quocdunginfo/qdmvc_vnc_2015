<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Size_List extends Qdmvc_Page_Root_List
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Size_List';
    }

    public static function getPage()
    {
        return 'size_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'type' => array(
                    'Order' => 20,
                ),
                'code' => array(
                    'Order' => 30,
                ),
                'name' => array(
                    'Order' => 40,
                ),
                'description' => array(
                    'Order' => 50,
                )
            ));
    }

}
