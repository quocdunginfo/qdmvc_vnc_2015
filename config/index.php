<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 02/04/2015
 * Time: 10:51 PM
 */
class Qdmvc_Config {
    private static $language = null;
    private static $product_setup = null;
    function __construct(){

    }
    public static function getLanguage()
    {
        if(static::$language==null)
        {
            $tmp = QdSetup::GET();
            static::$language = $tmp->df_language;
        }
        return static::$language;
    }
    public static function getProductSetup()
    {
        if(static::$product_setup==null)
        {
            $tmp = QdSetupProduct::GET();
            static::$product_setup = $tmp;
        }
        return static::$product_setup;
    }
}