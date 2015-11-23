<?php

class QdProductXEMAY extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_XEMAY => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_XEMAY]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEMAY';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEMAY();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_XEMAY;
        return $obj;
    }

}