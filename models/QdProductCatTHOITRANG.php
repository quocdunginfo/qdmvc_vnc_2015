<?php

class QdProductCatTHOITRANG extends QdProductCatDOHIEU
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatTHOITRANG();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_QUANAO;
        $obj->property_grp_type = static::$PROPERTY_G3;
        $obj->struct_lv_4 = static::$LV4_QUANAO;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            static::$LV2_MANUFACTOR_QUANAO => $obj['struct_lv_2']['Options'][static::$LV2_MANUFACTOR_QUANAO]
        );

        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductTHOITRANG';

        $obj['property_grp_type']['Options'] = array(
            static::$PROPERTY_G3 => $obj['property_grp_type']['Options'][static::$PROPERTY_G3]
        );
        $obj['property_grp_type']['ReadOnly'] = true;


        return $obj;
    }
}