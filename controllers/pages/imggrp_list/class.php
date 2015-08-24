<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('postcat_list');

class Qdmvc_Page_ImgGrp_List extends Qdmvc_Page_PostCat_List
{

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPostCat::$TYPE_IMGGRP
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_ImgGrp_List';
    }

    public static function getPage()
    {
        return 'imggrp_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'description' => array(
                    'Order' => 70,
                ),
            ));
        unset($obj['parent_id']);
        return $obj;
    }
}
