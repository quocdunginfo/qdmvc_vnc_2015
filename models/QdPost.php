<?php

class QdPost extends QdRoot
{
    static $table_name = 'mpd_post';
    public static $TYPE_BESTCHOICEITEM = 100;
    public static $TYPE_POST = 0;

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
                    '0' => array(
                        'Caption' => array('en' => 'Post', 'vn' => 'Post'),
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