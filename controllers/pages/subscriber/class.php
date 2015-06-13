<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('contact');
class Qdmvc_Page_Subscriber_Card extends Qdmvc_Page_Contact_Card
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Subscriber_Card';
    }


    public static function getPage()
    {
        return 'subscriber';
    }
}