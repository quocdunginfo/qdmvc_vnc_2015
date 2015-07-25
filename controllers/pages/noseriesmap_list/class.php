<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_NoSeriesMap_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_NoSeriesMap_List';
    }

    public static function getPage()
    {
        return 'noseriesmap_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
            'model' => array(
            ),
            'noseries' => array(),
            'active' => array()
        ));
    }

}
