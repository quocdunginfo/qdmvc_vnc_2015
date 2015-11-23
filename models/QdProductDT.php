<?php

class QdProductDT extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_DIENTHOAI => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_DIENTHOAI]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDT';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDT();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_DIENTHOAI;
        return $obj;
    }

}