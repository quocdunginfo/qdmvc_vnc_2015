<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Log_List extends Qdmvc_Page_Root_List
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Log_List';
    }

    public static function getPage()
    {
        return 'log_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'location' => array(
                    'Order' => 20,
                ),
                'owner_id' => array(
                    'Order' => 30,
                ),
                'action' => array(
                    'Order' => 40,
                ),
                'ip' => array(
                    'Order' => 50,
                    'Width' => 150
                ),
            ));
    }

}
