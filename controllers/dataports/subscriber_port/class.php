<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('contact_port');

class Qdmvc_DataPort_Subscriber extends Qdmvc_DataPort_Contact
{
    protected static $model = 'QdSubscriber';
}