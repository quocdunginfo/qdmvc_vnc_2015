<?php

class QdProductXEMAY extends QdProductPG2XE
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_XEMAY => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_XEMAY]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatXEMAY';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductXEMAY();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_XEMAY;
        return $obj;
    }

}