<?php

class QdProductDHMK extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DONGHO_MK => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_DONGHO_MK]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDHMK';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDHMK();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_DONGHO_MK;
        return $obj;
    }

}