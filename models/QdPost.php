<?php

class QdPost extends QdRoot
{
    static $table_name = 'mpd_post';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'short_content' => array(),
            'avatar' => array(
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
            ),
            'title' => array(),
            'type' => array(
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    '100' => array(
                        'Caption' => array('en' => 'Best choice item', 'vn' => 'Best choice item'),
                    ),
                )
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPost();
        return $obj;
    }
}