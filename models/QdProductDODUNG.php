<?php

class QdProductDODUNG extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_DODUNG => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_DODUNG]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDODUNG';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDODUNG();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_DODUNG;
        return $obj;
    }

}