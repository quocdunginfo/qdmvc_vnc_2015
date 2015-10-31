<?php

class QdProductLT extends QdProductPG2DCN
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_LAPTOP => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_LAPTOP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatLT';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductLT();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_LAPTOP;
        return $obj;
    }

}