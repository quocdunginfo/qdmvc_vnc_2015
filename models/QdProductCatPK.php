<?php

class QdProductCatPK extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPK();
        $obj->transferFieldsFrom($tmp);

        $obj->parent_id = $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_PHUKIEN;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_PHUKIEN => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_PHUKIEN]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPK';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPK';

        return $obj;
    }
}