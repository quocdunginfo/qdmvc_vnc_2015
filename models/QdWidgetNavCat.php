<?php

class QdWidgetNavCat extends QdPostCat
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
    }

    public static function getInitObj()
    {
        $obj = new QdWidgetNavCat();//init_obj trên page card sẽ không áp đúng __sys_note_url nếu chọn parent::
        $obj->type = static::$TYPE_WIDGETNAV;
        $obj->active = true;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        //change parent_id filter
        $obj['parent_id']['TableRelation']['Table'] = 'QdWidgetNavCat';

        $obj['type']['Options'] = array(
            static::$TYPE_WIDGETNAV => array(
                'Caption' => array('en-US' => 'WidgetNavs Cat', 'vi-VN' => 'WidgetNavs Cat'),
            ),
        );

        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdWidgetNav',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'group_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );
        return $obj;
    }
}