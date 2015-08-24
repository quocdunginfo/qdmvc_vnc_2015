<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('post_card');

class Qdmvc_Page_BestChoiceItem extends Qdmvc_Page_Post
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceItem';
    }

    public static function getPage()
    {
        return 'bestchoiceitem_card';
    }

    protected static function initFields()
    {
        $obj = parent::initFields();
        $obj['Group1']['Fields']['_post_cat_desc'] = array(
            'Order' => 100,
        );
        $obj['Group1']['Fields']['title_color'] = array(
            'Order' => 110,
        );
        $obj['Group1']['Fields']['link'] = array(
            'Order' => 120,
        );
        unset($obj['Group1']['Fields']['content']);
        unset($obj['Group1']['Fields']['short_content']);
        return $obj;
    }

}