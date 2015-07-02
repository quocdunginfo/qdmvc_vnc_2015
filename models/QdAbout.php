<?php

class QdAbout extends QdPost
{
    public static $TYPE_ABOUT = 57;

    public static $TPL_TYPE_IMG = 0;
    public static $TPL_TYPE_TEXT = 10;
    public static $TPL_TYPE_TEXTIMG = 20;
    public static $TPL_TYPE_IMGTEXT = 30;

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_ABOUT, 'exact' => true, 'operator' => '=')
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdAbout();
        $obj->type = static::$TYPE_ABOUT;
        $obj->tpl_type = static::$TPL_TYPE_TEXTIMG;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['_post_cat_desc'] = array(
            'Name' => 'product_cat_desc',
            'Caption' => array('en-US' => 'Product Cat Desc', 'vi-VN' => 'Mô tả loại'),
            'DataType' => 'Text',
            'FieldClass' => 'FlowField',
            'FieldClass_FlowField' => array(
                'Method' => 'Lookup',
                'Table' => 'QdPostCat',
                'Field' => 'description',
                'TableFilter' => array(
                    0 => array(
                        'Field' => 'id',
                        'Type' => 'FIELD',
                        'Value' => 'post_cat_id'
                    )
                )
            )
        );
        $obj['tpl_type'] = array(
            'Caption' => array('en-US' => 'Template', 'vi-VN' => 'Template'),
            'DataType' => 'Option',
            'Options' => array(
                static::$TPL_TYPE_IMG => array(
                    'Caption' => array('en-US' => 'Img Center', 'vi-VN' => 'Img Center'),
                ),
                static::$TPL_TYPE_TEXT => array(
                    'Caption' => array('en-US' => 'Text Center', 'vi-VN' => 'Text Center'),
                ),
                static::$TPL_TYPE_TEXTIMG => array(
                    'Caption' => array('en-US' => 'Text/Img', 'vi-VN' => 'Text/Img'),
                ),
                static::$TPL_TYPE_IMGTEXT => array(
                    'Caption' => array('en-US' => 'Img/Text', 'vi-VN' => 'Img/Text'),
                ),
            )
        );
        $obj['type']['Options'] = array(
            static::$TYPE_ABOUT => array(
                'Caption' => array('en-US' => 'Post', 'vi-VN' => 'Post'),
            ),
        );
        return $obj;
    }

}