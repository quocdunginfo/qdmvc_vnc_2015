<?php

class QdBestChoiceItem extends QdPost
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_BESTCHOICEITEM, 'operator' => static::$OP_EQUAL)
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdBestChoiceItem();
        $obj->type = static::$TYPE_BESTCHOICEITEM;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['post_cat_id']['TableRelation'] = array(
            'Table' => 'QdBestChoiceCat',
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
                    'Value' => QdBestChoiceCat::$TYPE_BESTCHOICECAT
                )
            )
        );
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
        $obj['link'] = array(
            'Caption' => array('en-US' => 'Link', 'vi-VN' => 'Link'),
            'DataType' => 'Text',
        );
        $obj['title_color'] = array(
            'Caption' => array('en-US' => 'Title color', 'vi-VN' => 'Màu tiêu đề'),
            'DataType' => 'Color',
        );
        $obj['type']['Options'] = array(
            static::$TYPE_BESTCHOICEITEM => array(
                'Caption' => array('en-US' => 'Best choice item', 'vi-VN' => 'Best choice item'),
            ),
        );
        unset($obj['content']);
        unset($obj['short_content']);
        return $obj;
    }

}