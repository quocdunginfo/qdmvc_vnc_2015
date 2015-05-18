<?php

class QdWidgetNav extends QdRoot
{
    static $table_name = 'mpd_widgetnav';
    public static $TARGET_BLANK = '_blank';
    public static $TARGET_SELF = '_self';
    public static $TYPE_DEFAULT = 0;
    public static $TYPE_MENU = 10;

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'title' => array(),
            'button_text' => array(),
            'path' => array(),
            'order' => array(),
            'target' => array(
                'Caption' => array('en' => 'Target', 'vn' => 'Target'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TARGET_SELF => array(
                        'Caption' => array('en' => 'Default', 'vn' => 'Mặc định'),
                    ),
                    static::$TARGET_BLANK => array(
                        'Caption' => array('en' => 'New Tab', 'vn' => 'Tab mới'),
                    ),
                )
            ),
            '_group_name' => array(
                'Name' => '_group_name',
                'Caption' => array('en' => 'Group Name', 'vn' => 'Tên nhóm'),
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
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện',
            ),
            'type' => array(
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_DEFAULT => array(
                        'Caption' => array('en' => 'Default', 'vn' => 'Mặc định'),
                    ),
                    static::$TYPE_MENU => array(
                        'Caption' => array('en' => 'Menu', 'vn' => 'Menu'),
                    ),

                )
            ),
            'group_id' => array(
                'Name' => 'post_cat_id',
                'Caption' => array('en' => 'Cat ID', 'vn' => 'Mã loại'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdWidgetNavCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        /*array(
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
        return $obj;
    }
}