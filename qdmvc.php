<?php
/*
Plugin Name: qdmvc
*/

//Because Helper is declared outside to public provider for other location use (theme)
//Router and helper does not using Model so it could be loaded 1st
Qdmvc::loadHelper('main');
Qdmvc::loadRouter();
//Model must load public to ensure other location usage
Qdmvc::loadModel();

class Qdmvc
{
    private static $included_file = array(
        'native/register-admin-menu',
        'native/page-meta-box',
        'native/db-init',
        'native/shortcode',
        'native/menu-nav-provider',
        'notification/index',
    );
    //dependency plugins
    private static $dependencies = array('phpactiverecords', 'jqwidgets');

    private static $connection = null;
    function __construct()
    {

    }

    private static function init()
    {
        //require related library
        foreach (static::$included_file as $item) {
            static::load($item);
        }
        //loading widgets
        require_once(Qdmvc::getWidget('index.php'));
    }

    public static function loadJS()
    {
        wp_register_script('qdmvc_js_msg-' . Qdmvc_Config::getLanguage(), plugins_url('/messages/js/msg-' . Qdmvc_Config::getLanguage() . '.js', __FILE__));
        wp_enqueue_script('qdmvc_js_msg-' . Qdmvc_Config::getLanguage());
    }

    public static function loadNative($pure_path)
    {
        static::load('native/' . $pure_path);
    }

    /*
     * External use
     */
    public static function loadPage($name)
    {
        static::loadController('pages/' . $name . '/class');
    }

    public static function loadPageView($name)
    {
        static::loadController('pages/' . $name . '/view');
    }

    public static function runPage($name)
    {
        //wp_enqueue_media();//must place outside cache area (static::loadPage()) because of WP random security code

        /*
        $cache_key = $_SERVER['REQUEST_URI'].get_current_user_id().Qdmvc_Config::getLanguage();
        $cache_result = Qdmvc_Helper::cacheGetByKey($cache_key);
        if($cache_result!==false)
        {
            echo $cache_result;
            return;
        }
        ob_start();
        */

        //MAIN fn: load class
        static::loadPage($name);
        //load controller
        static::loadController('pages/' . $name . '/controller');
        //END Main fn
        /*
        $cache_result = ob_get_contents();
        Qdmvc_Helper::cacheRegister($cache_key, $cache_result);
        */

    }

    public static function loadLayout($pure_path)
    {
        require_once(static::getView('layouts/' . $pure_path . '.php'));
    }

    public static function loadController($pure_path)
    {
        require_once(static::getController($pure_path . '.php'));
    }

    public static function loadHelper($pure_path)
    {
        require_once(static::getHelper($pure_path . '.php'));
    }

    public static function runDataPort($pure_path)
    {
        static::loadDataPort($pure_path);
        static::loadController('dataports/' . $pure_path . '/controller');
    }

    public static function loadDataPort($pure_path)
    {
        require_once(static::getController('dataports/' . $pure_path . '/class.php'));
    }

    public static function loadIndex($pure_path)
    {
        require_once(static::getPluginDir($pure_path) . '.php');
    }

    public static function getPluginDir($pure_path = '')
    {
        return plugin_dir_path(__FILE__) . $pure_path;
    }

    /*
     * Internal use
     */


    public static function getWidget($path = '')
    {
        return Qdmvc::getPluginDir('widgets/' . $path);
    }

    protected static function getHelper($path = '')
    {
        return Qdmvc::getPluginDir('helpers/' . $path);
    }

    protected static function getView($path = '')
    {
        return (Qdmvc::getPluginDir('views/' . $path));
    }

    public static function getModel($path = '')//Power net new server need public
    {
        return (Qdmvc::getPluginDir('models/' . $path));
    }

    protected static function getController($path = '')
    {
        return (Qdmvc::getPluginDir('controllers/' . $path));
    }

    public static function run()
    {
        //check dependency
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        foreach (static::$dependencies as $item) {
            if (!is_plugin_active($item . "/$item.php")) {
                //plugin is not activated
                echo 'Qdmvc: require plugin ' . $item;
                return;
            }
        }
        //2nd level construct
        static::init();
    }

    public static function loadModel()
    {
        //Index must be loaded before Model
        //Reason: QdRoot->getDefaultLookupPage
        Qdmvc::loadIndex('index');//quocdunginfo, performance

        //Phpactive record init
        static::$connection = QdPhpactiverecords::getCon();
        $tmp_con = static::$connection;
        ActiveRecord\Config::initialize(function ($cfg) use ($tmp_con) {
            $model_dir = Qdmvc::getModel();
            $cfg->set_model_directory($model_dir);
            $cfg->set_connections($tmp_con);

            # default connection is now production
            $cfg->set_default_connection('production');
        });
    }
    public static function getCon(){
        return static::$connection;
    }

    public static function load($pure_path)
    {
        require_once(Qdmvc::getPluginDir($pure_path) . '.php');
    }

    public static function loadRouter()
    {
        static::load('native/router');
    }

    public static function IS_QDMVC_PAGE()
    {
        return (isset($_GET['page']) && array_key_exists($_GET['page'], Qdmvc_Page_Index::getIndex()));
    }

    public static function getResourcePath($r_path = '')
    {
        return plugins_url($r_path, __FILE__);
    }
}

if (is_admin()) {
    Qdmvc::run();

    //load UI Kit
    if (Qdmvc::IS_QDMVC_PAGE()) {
        QdJqwidgets::registerResource(true);//quocdunginfo, need to find other solution because every WP page got this hook
    }
}