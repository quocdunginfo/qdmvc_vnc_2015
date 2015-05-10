<?php

class QdBestChoiceItem extends QdPost
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_BESTCHOICEITEM, 'exact' => true, 'operator' => '=')
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
            'Caption' => array('en' => 'Product Cat Desc', 'vn' => 'Mô tả loại'),
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
        return $obj;
    }

}