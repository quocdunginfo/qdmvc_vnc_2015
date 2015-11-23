<?php

class QdProductNUOCHOA extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_NUOCHOA => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_NUOCHOA]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatNUOCHOA';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductNUOCHOA();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_NUOCHOA;
        return $obj;
    }

}