<?php

class QdProductPTST extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_SUUTAP => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_SUUTAP]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPTST';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductPTST();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_SUUTAP;
        return $obj;
    }

}