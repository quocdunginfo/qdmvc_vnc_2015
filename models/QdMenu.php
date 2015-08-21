<?php

class QdMenu extends QdWidgetNav
{
    public static $TYPE_MENU = 10;

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record); // TODO: Change the autogenerated stub

        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_MENU, 'operator' => static::$OP_EQUAL)
        ));
    }


    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'position_1' => array(),
            'position_2' => array(),
        ));
        $obj['content'] = array(
            'Caption' => array(
                'vi-VN' => 'WP Menu Slug',
                'en-US' => 'WP Menu Slug'
            ),
            'DataType' => 'Code',
            'FieldClass' => 'Normal',//'FlowField'
            'TableRelation' => array(
                'Table' => 'QdWpMenu',
                'Field' => 'id',
                'TableFilter' => array(

                )
            )
        );
        $obj['type']['Options'] = array(
            static::$TYPE_MENU => array(
                'Caption' => array('en-US' => 'Menu', 'vi-VN' => 'Menu'),
            ),
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdMenu();
        $obj->active = true;
        $obj->position_1 = 1;
        $obj->position_2 = 0;
        $obj->target = static::$TARGET_BLANK;
        $obj->type = static::$TYPE_MENU;
        return $obj;
    }

    protected function contentOnValidate($field_name)
    {
        $tmp = QdWpMenu::GET($this->$field_name);
        if($tmp!=null) {
            $this->position_1 = $tmp->wpid;
        }
    }

}