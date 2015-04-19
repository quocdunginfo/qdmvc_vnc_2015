<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Note_List extends Qdmvc_Page_Root
{
    public function run()
    {
       parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Note_List';
    }

    public static function getPage()
    {
        return 'note_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
            'content' => array(
                'SourceExpr' => 'content',
            )
        ));
    }

}
