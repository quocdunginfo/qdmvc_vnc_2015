<?php

class QdProductCatQA extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatQA();
        $obj->type = $tmp->type;
        $obj->active = $tmp->active;

        $obj->type2 = QdManufactorQA::$TYPE2_MANUFACTOR_QUANAO;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_QUANAO => array(
                'Caption' => array('en' => 'Product Cat QA', 'vn' => 'Loại SP QA'),
            )
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatQA';

        return $obj;
    }
}