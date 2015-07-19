<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_UserGroup_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_UserGroup_List';
    }

    public static function getPage()
    {
        return 'usergroup_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'description' => array(),
                'parent_id' => array(),
                'active' => array(),
            ));
        $obj['id']['Width'] = 150;
        return $obj;
    }

}
