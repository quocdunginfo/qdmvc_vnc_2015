<?php

class QdWidgetNav extends QdRoot
{
    static $table_name = 'mpd_widgetnav';
    public static $TARGET_BLANK = '_blank';
    public static $TARGET_SELF = '_self';
    public static $TYPE_DEFAULT = 0;
    public static $TYPE_PARTNER = 20;

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'title' => array(),
            'button_text' => array(),
            'path' => array(),
            'order' => array(),
            'target' => array(
                'Caption' => array('en-US' => 'Target', 'vi-VN' => 'Target'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TARGET_SELF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                    static::$TARGET_BLANK => array(
                        'Caption' => array('en-US' => 'New Tab', 'vi-VN' => 'Tab mới'),
                    ),
                )
            ),
            '_group_name' => array(
                'Name' => '_group_name',
                'Caption' => array('en-US' => 'Group Name', 'vi-VN' => 'Tên nhóm'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdWidgetNavCat',
                    'Field' => 'title',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'group_id'
                        )
                    )
                )
            ),
            'avatar' => array(
                'Caption' => array('en-US' => 'Avatar', 'vi-VN' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện',
            ),
            'active' => array(
                'DataType' => 'Boolean',
            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_DEFAULT => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                )
            ),
            'group_id' => array(
                'Name' => 'post_cat_id',
                'Caption' => array('en-US' => 'Cat ID', 'vi-VN' => 'Mã loại'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdWidgetNavCat',
                    'Field' => 'id',
                    'TableFilter' => array(/*array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'type',
                            'Type' => 'FIELD',
                            'Value' => QdPostCat::$TYPE_WIDGETNAV
                        )*/
                    )
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdWidgetNav();
        $obj->target = static::$TARGET_BLANK;
        $obj->type = static::$TYPE_DEFAULT;
        $obj->active = true;
        return $obj;
    }
}