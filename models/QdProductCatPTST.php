<?php

class QdProductCatPTST extends QdProductCatPG2THIETBI
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPTST();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_SUUTAP;
        $obj->property_grp_type = static::$PROPERTY_G2;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_SUUTAP => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_SUUTAP]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPTST';

        $obj['property_grp_type']['Options'] = array(
            static::$PROPERTY_G2 => $obj['property_grp_type']['Options'][static::$PROPERTY_G2]
        );
        $obj['property_grp_type']['ReadOnly'] = true;


        return $obj;
    }
}