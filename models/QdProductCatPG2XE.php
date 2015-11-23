<?php

class QdProductCatPG2XE extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2XE();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_XE;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_1']['Options'] = array(
            static::$LV1_XE => $obj['struct_lv_1']['Options'][static::$LV1_XE]
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPG2XE';

        return $obj;
    }
}