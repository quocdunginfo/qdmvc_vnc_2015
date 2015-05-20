<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('manufactor_list');

class Qdmvc_Page_ManufactorQA_List extends Qdmvc_Page_Manufactor_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ManufactorQA_List';
    }

    public static function getPage()
    {
        return 'manufactor_qa_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdManufactor::$TYPE_MANUFACTOR_QUANAO
        );
    }
}
