<?php

class QdObjectTask extends QdRoot
{
    static $table_name = 'mpd_object_task';
    public static $LAYER_FW = 'FW';
    public static $LAYER_APP = 'APP';
    public static $LAYER_THEME = 'THEME';
    public static $LAYER_DB = 'DB';
    public static $LAYER_OTHER = 'OTHER';

    public static $ACTION_CREATE = 'CREATE';
    public static $ACTION_MODIFY = 'MODIFY';
    public static $ACTION_REMOVE = 'REMOVE';
    public static $ACTION_OTHER = 'OTHER';

    public static $OBJECT_TYPE_MODEL = 'MODEL';
    public static $OBJECT_TYPE_PAGE = 'PAGE';
    public static $OBJECT_TYPE_DATAPORT = 'DATAPORT';
    public static $OBJECT_TYPE_LAYOUT = 'LAYOUT';
    public static $OBJECT_TYPE_MENU = 'MENU';
    public static $OBJECT_TYPE_TABLE = 'TABLE';
    public static $OBJECT_TYPE_COLUMN = 'COLUMN';
    public static $OBJECT_TYPE_OTHER = 'OTHER';


    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'description' => array(
                'DataType' => 'WYSIWYG',
            ),
            'compatible' => array(
                'DataType' => 'Boolean',
            ),
            'object_type' => array(
                'Caption' => array('en' => 'Object Type', 'vn' => 'Object Type'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$OBJECT_TYPE_MODEL => array(
                        'Caption' => array('en' => 'Model', 'vn' => 'Model'),
                    ),
                    static::$OBJECT_TYPE_PAGE => array(
                        'Caption' => array('en' => 'Page', 'vn' => 'Page'),
                    ),
                    static::$OBJECT_TYPE_DATAPORT => array(
                        'Caption' => array('en' => 'Dataport', 'vn' => 'Dataport'),
                    ),
                    static::$OBJECT_TYPE_LAYOUT => array(
                        'Caption' => array('en' => 'Layout', 'vn' => 'Layout'),
                    ),
                    static::$OBJECT_TYPE_MENU => array(
                        'Caption' => array('en' => 'menu', 'vn' => 'Menu'),
                    ),
                    static::$OBJECT_TYPE_TABLE => array(
                        'Caption' => array('en' => 'Table', 'vn' => 'Table'),
                    ),
                    static::$OBJECT_TYPE_COLUMN => array(
                        'Caption' => array('en' => 'Column', 'vn' => 'Column'),
                    ),
                    static::$OBJECT_TYPE_OTHER => array(
                        'Caption' => array('en' => 'Other', 'vn' => 'Other'),
                    ),
                )
            ),
            'object_name' => array(),
            'version' => array(),
            'layer' => array(
                'Caption' => array('en' => 'Layer', 'vn' => 'Layer'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$LAYER_FW => array(
                        'Caption' => array('en' => 'Framework', 'vn' => 'Framework'),
                    ),
                    static::$LAYER_APP => array(
                        'Caption' => array('en' => 'App', 'vn' => 'App'),
                    ),
                    static::$LAYER_THEME => array(
                        'Caption' => array('en' => 'Theme', 'vn' => 'Theme'),
                    ),
                    static::$LAYER_DB => array(
                        'Caption' => array('en' => 'Database', 'vn' => 'Database'),
                    ),
                    static::$LAYER_OTHER => array(
                        'Caption' => array('en' => 'Other', 'vn' => 'Other'),
                    ),
                )
            ),
            'action' => array(
                'Caption' => array('en' => 'Action', 'vn' => 'Action'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$ACTION_CREATE => array(
                        'Caption' => array('en' => 'Create', 'vn' => 'Create'),
                    ),
                    static::$ACTION_MODIFY => array(
                        'Caption' => array('en' => 'Modify', 'vn' => 'Modify'),
                    ),
                    static::$ACTION_REMOVE => array(
                        'Caption' => array('en' => 'Remove', 'vn' => 'Remove'),
                    ),
                    static::$ACTION_OTHER => array(
                        'Caption' => array('en' => 'Other', 'vn' => 'Other'),
                    ),
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdObjectTask();
        $obj->object_type = static::$OBJECT_TYPE_MODEL;
        $obj->compatible = true;
        $obj->layer = static::$LAYER_APP;
        return $obj;
    }
}