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
                'Caption' => array('en' => 'Content', 'vn' => 'Nội dung'),
                'DataType' => 'WYSIWYG',
            ),
            'short_content' => array(
                'Caption' => array('en' => 'Short content', 'vn' => 'Tóm tắt'),
                'DataType' => 'WYSIWYG',
            ),
            'avatar' => array(
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
            ),
            'title' => array(
                'Caption' => array('en' => 'Title', 'vn' => 'Tiêu đề'),
            ),
            'type' => array(
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_BESTCHOICEITEM => array(
                        'Caption' => array('en' => 'Best choice item', 'vn' => 'Best choice item'),
                    ),
                    static::$TYPE_POST => array(
                        'Caption' => array('en' => 'Post', 'vn' => 'Post'),
                    ),
                    static::$TYPE_ABOUT => array(
                        'Caption' => array('en' => 'About', 'vn' => 'About'),
                    ),
                )
            ),
            'post_cat_id' => array(
                'Name' => 'post_cat_id',
                'Caption' => array('en' => 'Cat ID', 'vn' => 'Mã loại'),
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