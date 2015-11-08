<?php

class QdProductTHOITRANG extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_THOITRANG => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_THOITRANG]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatTHOITRANG';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductTHOITRANG();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_THOITRANG;
        return $obj;
    }

}