<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_ImportData_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImportData_List';
    }

    public static function getPage()
    {
        return 'importdata_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'model' => array(
                    'Order' => 200,
                ),
                'path' => array(
                    'Order' => 300,
                )
            ));
    }

}
