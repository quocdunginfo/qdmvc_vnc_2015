<?php

class QdProductMTB extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_MTB => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_MTB]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatMTB';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductMTB();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_MTB;
        return $obj;
    }

}