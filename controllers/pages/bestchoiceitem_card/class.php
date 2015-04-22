<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('post_card');
class Qdmvc_Page_BestChoiceItem extends Qdmvc_Page_Post {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceItem';
    }

    public static function getPage()
    {
        return 'bestchoiceitem_card';
    }
}