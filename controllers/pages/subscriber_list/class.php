<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('contact_list');

class Qdmvc_Page_Subscriber_List extends Qdmvc_Page_Contact_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Subscriber_List';
    }

    public static function getPage()
    {
        return 'subscriber_list';
    }

    protected function getPageView()
    {
        return array(
            'type' => QdSubscriber::$TYPE_CUSTOMER
        );
    }

}
