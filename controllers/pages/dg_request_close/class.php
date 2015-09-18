<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('dg_request');

class Qdmvc_Page_DgRequestClose extends Qdmvc_Page_DgRequest
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgRequestClose';
    }

    public static function getPage()
    {
        return 'dg_request_close';
    }
}