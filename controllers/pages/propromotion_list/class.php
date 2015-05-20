<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('progrp_list');
class Qdmvc_Page_ProPromotion_List extends Qdmvc_Page_ProGrp_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProPromotion_List';
    }

    public static function getPage()
    {
        return 'propromotion_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'group_type' => QdPromotionCat::$TYPE_PROMOTION
        );
    }

}
