<?php

class QdProductQA extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            static::$TYPE_QUANAO => array(
                'Caption' => array('en' => 'Clothes', 'vn' => 'Quần áo'),
            ),
        );
        $obj['size_id']['TableRelation']['TableFilter'] = array(
            array(
                'Condition' => array(
                    'Field' => '',
                    'Type' => 'CONST',//'FIELD'
                    'Value' => ''
                ),
                'Field' => 'type',
                'Type' => 'CONST',
                'Value' => QdSize::$TYPE_QUANAO
            )
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatQA';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactorQA';

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductQA();
        $obj->description = $tmp->description;

        $obj->type = QdProductQA::$TYPE_QUANAO;
        return $obj;
    }

}