<?php

class QdSEOMeta extends QdNote
{
    static $table_name = 'mpd_seo_meta';

    public static $META_NAME_DESCRIPTION = 'DESCRIPTION';
    public static $META_NAME_KEYWORDS = 'KEYWORDS';
    public static $META_NAME_TITLE = 'TITLE';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'meta_name' => array(
                //'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$META_NAME_TITLE => array(
                        'Caption' => array('en-US' => 'Title', 'vi-VN' => 'Title'),
                    ),
                    static::$META_NAME_DESCRIPTION => array(
                        'Caption' => array('en-US' => 'Description', 'vi-VN' => 'Description'),
                    ),
                    static::$META_NAME_KEYWORDS => array(
                        'Caption' => array('en-US' => 'Keywords', 'vi-VN' => 'Keywords'),
                    ),
                )
            ),
            'meta_value' => array(),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'model' => array(
                'ReadOnly' => true
            ),
            'model_id' => array(
                'ReadOnly' => true
            )
        ));
        unset($obj['content']);
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdSEOMeta();
        $obj->active = true;
        return $obj;
    }
}