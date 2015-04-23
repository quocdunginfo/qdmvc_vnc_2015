<?php

class QdWidgetNav extends QdRoot
{
    static $table_name = 'mpd_widgetnav';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'title' => array(),
            'button_text' => array(),
            'path' => array(),
            'order' => array(

            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdWidgetNav();
        return $obj;
    }
}