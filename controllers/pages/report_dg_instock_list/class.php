<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Report_DgInStock_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Report_DgInStock_List';
    }

    public static function getPage()
    {
        return 'report_dg_instock_list';
    }
    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'keyword' => array(
                    'Order' => 100,
                ),
            ));
    }
}
