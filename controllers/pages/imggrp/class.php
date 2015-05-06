<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('postcat_card');
class Qdmvc_Page_ImgGrp extends Qdmvc_Page_PostCat {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImgGrp';
    }

    public static function getPage()
    {
        return 'imggrp';
    }
    protected static function initFields()
    {
        $obj = parent::initFields();
        unset($obj['Group1']['Fields']['parent_id']);
        unset($obj['Group1']['Fields']['avatar']);
        return $obj;
    }

}