<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('manufactor');
class Qdmvc_Page_ManufactorQA extends Qdmvc_Page_Manufactor {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ManufactorQA';
    }

    public static function getPage()
    {
        return 'manufactor_qa';
    }
}