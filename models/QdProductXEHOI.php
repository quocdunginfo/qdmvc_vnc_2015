<?php

class QdProductXEHOI extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_OTO => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_OTO]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEHOI';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEHOI();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_OTO;
        return $obj;
    }

}