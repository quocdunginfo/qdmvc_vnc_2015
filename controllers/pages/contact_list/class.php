<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Contact_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Contact_List';
    }

    public static function getPage()
    {
        return 'contact_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'name' => array(
                    'Order' => 20,
                ),
                'email' => array(
                    'Order' => 30,
                ),
                'phone' => array(
                    'Order' => 40,
                )
            ));
    }

    protected function getPageView()
    {
        return array(
            'type' => QdContact::$TYPE_VNC
        );
    }

}
