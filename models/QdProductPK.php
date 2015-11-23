<?php

class QdProductPK extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_PHUKIEN => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_PHUKIEN]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPK';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductPK();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_PHUKIEN;
        return $obj;
    }

}