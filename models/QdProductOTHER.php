<?php

class QdProductOTHER extends QdProductPG2THIETBI
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_OTHER => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_OTHER]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatOTHER';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductOTHER();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_OTHER;
        return $obj;
    }

}