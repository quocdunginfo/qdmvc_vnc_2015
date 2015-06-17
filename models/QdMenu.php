<?php

class QdMenu extends QdWidgetNav
{
    public static $TYPE_MENU = 10;
    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'position_1' => array(),
            'position_2' => array(),
        ));
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
        $obj->position_1 = 1;
        $obj->position_2 = 0;
        $obj->target = static::$TARGET_BLANK;
        $obj->type = static::$TYPE_MENU;
        return $obj;
    }
}