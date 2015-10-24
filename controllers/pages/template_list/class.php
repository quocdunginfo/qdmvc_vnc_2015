<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Template_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Template_List';
    }

    public static function getPage()
    {
        return 'template_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'type' => array(
                    'Order' => 50,
                ),
                'description' => array(
                    'Order' => 100,
                ),
            ));
        $obj['id']['Width'] = 250;
        return $obj;
    }

}
