<?php

class QdProductCatMTB extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatMTB();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_MTB;

        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            static::$LV2_MANUFACTOR_MTB => $obj['struct_lv_2']['Options'][static::$LV2_MANUFACTOR_MTB]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductMTB';

        return $obj;
    }
}