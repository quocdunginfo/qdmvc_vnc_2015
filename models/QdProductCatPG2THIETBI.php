<?php

class QdProductCatPG2THIETBI extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2THIETBI();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_THIETBI;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_1']['Options'] = array(
            static::$LV1_THIETBI => $obj['struct_lv_1']['Options'][static::$LV1_THIETBI]
        );
        $obj['struct_lv_1']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPG2THIETBI';

        return $obj;
    }
}