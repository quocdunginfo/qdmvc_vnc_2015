<?php

class QdProductXEHOI extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_OTO => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_OTO]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEHOI';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEHOI();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_OTO;
        return $obj;
    }

}