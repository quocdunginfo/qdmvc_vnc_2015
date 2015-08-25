<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('root');

class Qdmvc_DataPort_VnDistrict extends Qdmvc_Dataport
{
    protected static $model = 'QdVnDistrict';

    protected static function canInsert()
    {
        return false;
    }

    protected static function canEdit()
    {
        return false;
    }

    protected static function canDelete()
    {
        return false;
    }
}