<?php

class QdProductMTB extends QdProductPG2
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_MTB => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_MTB]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatMTB';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductMTB();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_MTB;
        return $obj;
    }

}