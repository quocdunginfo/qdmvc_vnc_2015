<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('post_list');

class Qdmvc_Page_About_List extends Qdmvc_Page_Post_List
{
    protected function getCustomPageView()
    {
        return array(
            'type' => QdAbout::$TYPE_ABOUT
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_About_List';
    }

    public static function getPage()
    {
        return 'about_list';
    }
}
