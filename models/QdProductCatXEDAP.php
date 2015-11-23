<?php

class QdProductCatXEDAP extends QdProductCatPG2XE
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatXEDAP();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_XEDAP;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_XEDAP => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_XEDAP]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductXEDAP';

        return $obj;
    }
}