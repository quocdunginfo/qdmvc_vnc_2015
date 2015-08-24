<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('postcat_card');

class Qdmvc_Page_BestChoiceCat extends Qdmvc_Page_PostCat
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceCat';
    }

    public static function getPage()
    {
        return 'bestchoicecat_card';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        unset($obj['Group1']['Fields']['parent_id']);
        unset($obj['Group1']['Fields']['avatar']);
        return $obj;
    }

}