<?php

class QdProductCatPG2 extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2();
        $obj->transferFieldsFrom($tmp);

        $obj->property_grp_type = static::$PROPERTY_G2;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['property_grp_type']['Options'] = array(
            static::$PROPERTY_G2 => array(
                'Caption' => array('en-US' => '2 properties', 'vi-VN' => '2 thuộc tính'),
            ),
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPG2';

        return $obj;
    }
}