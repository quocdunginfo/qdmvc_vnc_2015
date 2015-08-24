<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Navigation extends Qdmvc_Page_Root
{
    function __construct()
    {
        parent::__construct();
        $this->data['setup'] = QdSetup::GET();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Navigation';
    }

    public static function getPage()
    {
        return 'navigation';
    }
}