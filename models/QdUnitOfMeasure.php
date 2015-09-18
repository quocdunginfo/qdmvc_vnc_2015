<?php

class QdUnitOfMeasure extends QdRoot
{
    static $table_name = 'mpd_unit_of_measure';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'name' => array(),
        ));
        $obj['id']['ReadOnly'] = false;
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdUnitOfMeasure();
        return $obj;
    }
}