<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_UserPersonalization_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_UserPersonalization_List';
    }

    public static function getPage()
    {
        return 'user_personalization_list';
    }

    protected static function initFields()
    {
        $obj = array_merge(
            parent::initFields(),
            array(
                'userid' => array(
                    'Order' => 20,
                ),
                'username' => array(
                    'Order' => 30,
                ),
                'language' => array(
                    'Order' => 40,
                ),
                'active' => array(
                    'Order' => 50,
                )
            ));
        unset($obj['id']);
        return $obj;
    }

}
