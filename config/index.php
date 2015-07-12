<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 02/04/2015
 * Time: 10:51 PM
 */
class Qdmvc_Config {
    private static $language = null;
    private static $current_username = null;
    private static $product_setup = null;
    public static $LANG_viVN = 'vi-VN';
    public static $LANG_enUS = 'en-US';
    function __construct(){

    }
    public static function getLanguage()
    {
        if(static::$language==null)
        {
            //check user personalization first
            $username = Qdmvc_Helper::getCurrentUserName();
            if($username!=null)
            {
                $tmp = new QdUserPersonalization();
                $tmp->SETRANGE('username', $username);
                $tmp->SETRANGE('active', true);
                $tmp = $tmp->GETLIST();
                if(!Qdmvc_Helper::isNullOrEmpty($tmp))
                {
                    if($tmp[0]->language != '')
                    {
                        static::$language = $tmp[0]->language;
                        return static::$language;
                    }
                }
            }

            //check in general setup
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