<?php

class QdProductDHMK extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_PKTT => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_PKTT]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDHMK';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDHMK();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdManufactor::$LV2_MANUFACTOR_PKTT;
        return $obj;
    }

}