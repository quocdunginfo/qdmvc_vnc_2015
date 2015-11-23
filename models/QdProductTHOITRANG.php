<?php

class QdProductTHOITRANG extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_QUANAO => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_QUANAO]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatTHOITRANG';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductTHOITRANG();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_QUANAO;
        $obj->struct_lv_4 = QdProductCat::$LV4_QUANAO;
        return $obj;
    }

}