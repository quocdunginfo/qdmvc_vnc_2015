<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_WpMenu_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_WpMenu_List';
    }

    public static function getPage()
    {
        return 'wpmenu_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'count' => array(
                    'Order' => 20,
                )
            ));
        $obj['id']['Width'] = 400;
        return $obj;
    }

}
