<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_QdmvcModel_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_QdmvcModel_List';
    }

    public static function getPage()
    {
        return 'qdmvcmodel_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array());
        $obj['id']['Width'] = 250;
        return $obj;
    }

}
