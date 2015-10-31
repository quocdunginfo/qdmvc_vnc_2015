<?php

class QdProductXEDAP extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_XEDAP => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_XEDAP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEDAP';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEDAP();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_XEDAP;
        return $obj;
    }

}