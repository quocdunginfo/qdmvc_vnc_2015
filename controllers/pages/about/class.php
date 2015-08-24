<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('post_card');

class Qdmvc_Page_About extends Qdmvc_Page_Post
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_About';
    }

    public static function getPage()
    {
        return 'about';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        $obj['Group1']['Fields']['_post_cat_desc'] = array(
            'Order' => 100
        );
        $obj['Group1']['Fields']['tpl_type'] = array(
            'Order' => 110
        );
        return $obj;
    }

}