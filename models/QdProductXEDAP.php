<?php

class QdProductXEDAP extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_XEDAP => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_XEDAP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEDAP';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEDAP();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_XEDAP;
        return $obj;
    }

}