<?php

class QdProductDODUNG extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DODUNG => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_DODUNG]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDODUNG';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDODUNG();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_DODUNG;
        return $obj;
    }

}