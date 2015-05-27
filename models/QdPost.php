<?php

class QdPost extends QdRoot
{
    static $table_name = 'mpd_post';
    public static $TYPE_BESTCHOICEITEM = 100;
    public static $TYPE_POST = 0;
    public static $TYPE_ABOUT = 57;

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'order' => array(

            ),
            'content' => array(
                'Caption' => array('en-US' => 'Content', 'vi-VN' => 'Nội dung'),
                'DataType' => 'WYSIWYG',
            ),
            'short_content' => array(
                'Caption' => array('en-US' => 'Short content', 'vi-VN' => 'Tóm tắt'),
                'DataType' => 'WYSIWYG',
            ),
            'avatar' => array(
                'Caption' => array('en-US' => 'Avatar', 'vi-VN' => 'Hình đại diện'),
                'DataType' => 'Image',
            ),
            'title' => array(
                'Caption' => array('en-US' => 'Title', 'vi-VN' => 'Tiêu đề'),
            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_BESTCHOICEITEM => array(
                        'Caption' => array('en-US' => 'Best choice item', 'vi-VN' => 'Best choice item'),
                    ),
                    static::$TYPE_POST => array(
                        'Caption' => array('en-US' => 'Post', 'vi-VN' => 'Post'),
                    ),
                    static::$TYPE_ABOUT => array(
                        'Caption' => array('en-US' => 'About', 'vi-VN' => 'About'),
                    ),
                )
            ),
            'post_cat_id' => array(
                'Name' => 'post_cat_id',
                'Caption' => array('en-US' => 'Cat ID', 'vi-VN' => 'Mã loại'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdPostCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'type',
                            'Type' => 'FIELD',
                            'Value' => QdPostCat::$TYPE_POSTCAT
                        )
                    )
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPost();
        $obj->type = static::$TYPE_POST;
        return $obj;
    }
}