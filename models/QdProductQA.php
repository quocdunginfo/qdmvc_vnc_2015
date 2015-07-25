<?php

class QdProductQA extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_QUANAO => array(
                'Caption' => array('en-US' => 'Clothes', 'vi-VN' => 'Quần áo'),
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
                'Value' => QdManufactor::$TYPE2_MANUFACTOR_QUANAO
            )
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatQA';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactorQA';

        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Pro',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'product_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                ),
            )
        );

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductQA();
        $obj->transferFieldsFrom($tmp);


        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_QUANAO;
        return $obj;
    }
}
