<?php

class QdProductCatPG2XE extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2XE();
        $obj->transferFieldsFrom($tmp);

        $obj->type3 = static::$TYPE3_XE;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type3']['Options'] = array(
            static::$TYPE3_XE => array(
                'Caption' => array('en-US' => 'Xe', 'vi-VN' => 'Xe'),
            ),
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPG2XE';

        return $obj;
    }
}