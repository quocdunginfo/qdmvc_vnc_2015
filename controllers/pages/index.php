<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 15/02/2015
 * Time: 8:06 AM
 */
Qdmvc::loadIndex('controllers/menus/index');

class Qdmvc_Page_Index
{
    public static function getIndex()
    {
        return Qdmvc_Page_IndexMenu::getIndex();
    }

    public static function getDefaultLookupPage($model)
    {
        foreach (static::getIndex() as $page => $config) {
            if ($config['PageType'] == 'List' && $config['Model'] == $model) {
                return $page;
            }
        }
    }

    public static function getNavigatePage($page_list){
        foreach (static::getIndex() as $page => $config) {
            if ($config['PageType'] == 'Card' && $config['PageList'] == $page_list) {
                return $page;
            }
        }
    }

    public static function getDefaultNavigatePage($model)
    {
        foreach (static::getIndex() as $page => $config) {
            if ($config['PageType'] == 'Card' && $config['Model'] == $model) {
                return $page;
            }
        }
    }

    public static function buildJSONTree($lang = 'en-US')
    {
        $u = Qdmvc_Helper::getCurrentUser();
        $debug_mode = isset($_GET['debugmode']) ? $_GET['debugmode'] : 0;
        $re = array();
        foreach (static::getIndex() as $key => $config) {
            if (!$u->hasPermission(null, null, $key)) continue;

            $tmp = array();
            $active = isset($config['Active']) ? $config['Active'] : true;
            $p_id = isset($config['ParentId']) ? $config['ParentId'] : -1;

            if (!$active) {
                continue;
            }

            $text = isset($config['Caption']) && isset($config['Caption'][$lang]) ? $config['Caption'][$lang] : $key;
            $tmp['title'] = $debug_mode == 1 ? $key : $text;
            $tmp['key'] = $key;
            $tmp['parentid'] = $p_id;

            if (!Qdmvc_Helper::isNullOrEmpty($config['PageType']) && $config['PageType'] == 'Folder') {
                $tmp['title'] = '[' . $tmp['title'] . ']';
                $tmp['value'] = '';
                $tmp['folder'] = true;
            } else {
                $tmp['value'] = Qdmvc_Helper::getCompactPageListLink($key);
            }

            array_push($re, $tmp);
        }
        return json_encode($re);
    }
}