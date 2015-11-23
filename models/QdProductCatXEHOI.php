<?php

class QdProductCatXEHOI extends QdProductCatPG2XE
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatXEHOI();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_OTO;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_OTO => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_OTO]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductXEHOI';

        return $obj;
    }
}