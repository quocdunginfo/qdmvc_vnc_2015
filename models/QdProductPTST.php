<?php

class QdProductPTST extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_SUUTAP => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_SUUTAP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPTST';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductPTST();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_SUUTAP;
        return $obj;
    }

}