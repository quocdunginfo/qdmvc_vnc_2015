<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:34 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Root_List extends Qdmvc_Page_Root
{
    function __construct()
    {
        parent::__construct();
        $this->data['page_navigate'] = Qdmvc_Helper::getCompactPageNavigateLink(Qdmvc_Page_Index::getNavigatePage(static::getPage()), array(), 'lookup', $this->data['returnid'], $this->data['getfield'], $this->data['lookupid']);
    }

    protected static function getFieldsConfig($f_name, $meta_name, $lang = 'en-US')
    {
        //check in Layout first
        $tmp_config = static::initFields();
        if (!QdT_Library::isNullOrEmpty($tmp_config[$f_name][$meta_name])) {
            return $tmp_config[$f_name][$meta_name];
        }
        //check in Model
        $c = static::getModel();
        $tmp = $c::getSingleFieldConfig($f_name, $meta_name, $lang);
        if (QdT_Library::isNullOrEmpty($tmp) && $meta_name == 'SourceExpr') {
            $tmp = $f_name;
        }
        return $tmp;
    }
}