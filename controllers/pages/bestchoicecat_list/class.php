<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('postcat_list');

class Qdmvc_Page_BestChoiceCat_List extends Qdmvc_Page_PostCat_List
{

    protected function getCustomPageView()
    {
        return array(
            'type' => QdPostCat::$TYPE_BESTCHOICECAT
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceCat_List';
    }

    public static function getPage()
    {
        return 'bestchoicecat_list';
    }
    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'description' => array(
                    'SourceExpr' => 'description'
                ),
            ));
        unset($obj['parent_id']);
        return $obj;
    }
}
