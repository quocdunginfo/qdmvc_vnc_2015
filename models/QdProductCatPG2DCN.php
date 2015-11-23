<?php

class QdProductCatPG2DCN extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2DCN();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_1 = static::$LV1_DCN;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_1']['Options'] = array(
            static::$LV1_DCN => $obj['struct_lv_1']['Options'][static::$LV1_DCN]
        );
        $obj['struct_lv_1']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        return $obj;
    }
}