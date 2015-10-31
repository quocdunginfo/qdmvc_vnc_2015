<?php

class QdProductDT extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDT';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDT();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI;
        return $obj;
    }

}