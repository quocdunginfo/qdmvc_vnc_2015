<?php

class QdProductLT extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_LAPTOP => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_LAPTOP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatLT';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductLT();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_LAPTOP;
        return $obj;
    }

}