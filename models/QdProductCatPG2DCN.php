<?php

class QdProductCatPG2DCN extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2DCN();
        $obj->transferFieldsFrom($tmp);

        $obj->type3 = static::$TYPE3_DCN;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type3']['Options'] = array(
            static::$TYPE3_DCN => array(
                'Caption' => array('en-US' => 'Đồ công nghệ', 'vi-VN' => 'Đồ công nghệ'),
            ),
        );
        $obj['type3']['Options'] = array(
            QdManufactor::$TYPE3_DCN => $obj['type3']['Options'][QdManufactor::$TYPE3_DCN]
        );
        $obj['type3']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPG2DCN';

        return $obj;
    }
}