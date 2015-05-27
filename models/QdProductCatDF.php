<?php

class QdProductCatDF extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatDF();
        $obj->type = $tmp->type;
        $obj->active = $tmp->active;

        $obj->type2 = QdManufactorDF::$TYPE2_MANUFACTOR_DEFAULT;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DEFAULT => array(
                'Caption' => array('en-US' => 'Product Cat DF', 'vi-VN' => 'Loại SP DF'),
            )
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatDF';

        return $obj;
    }
}