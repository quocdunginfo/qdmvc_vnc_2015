<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 03/05/2015
 * Time: 9:48 AM
 */
class Qdmvc_Page_IndexCustomMenu
{
    public static function getIndex()
    {
        return static::getMenu();
    }
    private static function getMenuFolder(){

        return array(
            /*Folder*/

        );
    }
    private static function getMenu()
    {
        $obj = array(

        );
        $obj = array_merge($obj, static::getMenuFolder());
        return $obj;
    }
}