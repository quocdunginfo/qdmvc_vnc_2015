<?php

class QdBestChoiceItem extends QdPost
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            'type' => array('value' => static::$TYPE_BESTCHOICEITEM, 'exact' => true)
        ));
    }

    public static function getInitObj()
    {
        $obj = parent::getInitObj();
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
        return $obj;
    }

}