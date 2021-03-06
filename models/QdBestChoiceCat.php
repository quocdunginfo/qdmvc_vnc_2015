<?php

class QdBestChoiceCat extends QdPostCat
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_BESTCHOICECAT, 'operator' => static::$OP_EQUAL)
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdBestChoiceCat();//init_obj trên page card sẽ không áp đúng __sys_note_url nếu chọn parent::
        $obj->type = static::$TYPE_BESTCHOICECAT;
        $obj->active = true;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig(); // TODO: Change the autogenerated stub
        //change parent_id filter
        $obj['parent_id']['TableRelation'] = array(
            'Table' => 'QdBestChoiceCat',
            'Field' => 'id',
            'TableFilter' => array(/*array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'type',
                    'Type' => 'FIELD',
                    'Value' => static::$TYPE_BESTCHOICECAT
                )*/
            )
        );

        //do not use parent existing-config
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdBestChoiceItem',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'post_cat_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );
        $obj['type']['Options'] = array(
            static::$TYPE_BESTCHOICECAT => array(
                'Caption' => array('en-US' => 'Best choice Cat', 'vi-VN' => 'Best choice Cat'),
            ),
        );
        return $obj;
    }

    public function getBestChoiceItems()
    {
        $record = new QdBestChoiceItem();
        $record->SETFILTERDEFAULT(array(
            array('field' => 'post_cat_id', 'value' => $this->id, 'exact' => true, 'operator' => '=')
        ));
        return $record;
    }
}