<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('product_cat_list');

class Qdmvc_Page_PromotionCat_List extends Qdmvc_Page_ProductCat_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_PromotionCat_List';
    }

    public static function getPage()
    {
        return 'promotioncat_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPromotionCat::$TYPE_PROMOTION
        );
    }

}