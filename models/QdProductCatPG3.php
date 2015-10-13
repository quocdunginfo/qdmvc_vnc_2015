<?php

class QdProductCatPG3 extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG3();
        $obj->transferFieldsFrom($tmp);

        $obj->property_grp_type = static::$PROPERTY_G3;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['property_grp_type']['Options'] = array(
            static::$PROPERTY_G3 => array(
                'Caption' => array('en-US' => '3 properties', 'vi-VN' => '3 thuộc tính'),
            ),
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPG3';

        return $obj;
    }
}