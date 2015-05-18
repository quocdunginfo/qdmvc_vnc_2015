<?php

class QdMenu extends QdWidgetNav
{
    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'position_1' => array(),
            'position_2' => array(),
        ));
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