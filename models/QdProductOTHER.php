<?php

class QdProductOTHER extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['struct_lv_2']['Options'] = array(
            QdProductCat::$LV2_MANUFACTOR_OTHER => $obj['struct_lv_2']['Options'][QdProductCat::$LV2_MANUFACTOR_OTHER]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatOTHER';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductOTHER();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_OTHER;
        return $obj;
    }

}