<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_BestChoiceItem_List extends Qdmvc_Page_Root
{
    public function run()
    {
       parent::run();
    }
    protected function getCustomPageView()
    {
        return array(
            'type' => 100
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceItem_List';
    }

    public static function getPage()
    {
        return 'bestchoiceitem_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
            'content' => array(
                'SourceExpr' => 'content',
            ),
            'title' => array(
                'SourceExpr' => 'title',
            ),
            'type' => array(
                'SourceExpr' => 'type',
            ),
        ));
    }

}
