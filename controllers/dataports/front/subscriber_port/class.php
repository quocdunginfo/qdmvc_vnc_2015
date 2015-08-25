<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('subscriber_port');

class Qdmvc_DataPort_FrontSubscriber extends Qdmvc_DataPort_Subscriber
{
    protected static function allowSubmitFields()
    {
        return array('email');
    }

    protected static function canView()
    {
        return false;
    }

    protected static function canDelete()
    {
        return false;
    }

    protected static function canEdit()
    {
        return false;
    }

    protected function checkSecurity()
    {
        return true;
    }
}